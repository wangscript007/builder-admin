<?php


namespace ke\builder;


use ke\builder\constraint\DataResponse;
use ke\builder\constraint\EngineConfig;
use ke\builder\constraint\ListResponse;
use ke\builder\exceptions\Exception;
use think\Container;
use think\Request;
use think\Response;

class Engine extends Response
{
    protected $config;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Component[]
     */
    protected $components = [];

    public function __construct(EngineConfig $config)
    {
        $this->config = $config->getData();
        $this->request = Container::pull(Request::class);
    }


    public function addComponent(Component $component)
    {
        $this->components[] = $component;
        return $this;
    }


    protected function loadAssets($src, $version)
    {
        return sprintf('%s/%s?v=%s', $this->config['path'], $src, $version);
    }


    /**
     * 取得组件回调值
     * @param Component $component
     * @return array
     */
    protected function resolveResponse(Component $component)
    {
        try {
            if (!method_exists($component, 'load')) {
                throw new Exception('load function is null');
            }
            $result = ['code'=>0];
            $res = call_user_func([$component, 'load']);
            if ($res instanceof ListResponse) {
                $result['data'] = $res->getItems();
                $result['count'] = $res->getTotal();
            } else if ($res instanceof DataResponse) {
                $result['data'] = $res->getData();
            } else if ($res) {
                $result = array_merge($result, $res);
            }
            return $result;
        } catch (Exception $e) {
            return [
                'code'=>1,
                'msg'=>$e->getMessage()
            ];
        } catch (\Throwable $e) {
            return [
                'code'=>1,
                'msg'=>$e->getMessage(),
            ];
        }
    }


    /**
     * 遍历符合id的组件
     * @param $components
     * @param $componentId
     * @return false|string|null|array
     */
    protected function resolveComponent($components, $componentId)
    {
        foreach ($components as $component) {
            if ($component->id == $componentId) {
                return $this->resolveResponse($component);
            } else if (!empty($component->components)) {
                $res = $this->resolveComponent($component->components, $componentId);
                if ($res) {
                    return $res;
                }
            }
        }

        $this->code(404);
        return null;
    }


    public function send(): void
    {
        $version = $this->config['version'];
        if ($this->config['debug']) {
            $version .= '.' . time();
        }

        $isAjax = $this->request->isAjax();
        if ($isAjax) {
            $this->contentType('application/json');
            $componentId = $this->request->get('component_id');
            $this->content(json_encode($this->resolveComponent($this->components, $componentId)));
        } else {
            $this->contentType('text/html');
            $content = '<!DOCTYPE html>';
            $html = new Html('html');
            $html->withAttr('lang', 'zh-CN');
            $html->withValue([
                (new Html('head'))->withValue([
                    (new Html('meta'))->withAttr('charset', 'UTF-8'),
                    (new Html('meta'))->withAttr('name', 'viewport')
                        ->withAttr('content', 'width=device-width, initial-scale=1, maximum-scale=1'),
                    (new Html('title'))->withValue('test'),
                    (new Html('link'))->withAttr('rel', 'stylesheet')
                        ->withAttr('href', $this->loadAssets('layui/css/layui.css', $version)),
                ]),
                (new Html('body'))->withValue(function () use($version) {
                    $content = '';

                    foreach ($this->components as $component) {
                        $content .= $component->build();
                    }

                    $content .= PHP_EOL . (new Html('script'))
                            ->withValue('')
                            ->withAttr('src', $this->loadAssets('builder/jquery.min.js', '3.5.1'))
                            ->toString();
                    $content .= PHP_EOL . (new Html('script'))
                            ->withValue('')
                            ->withAttr('src', $this->loadAssets('layui/layui.js', $version))
                            ->toString();
                    $content .= PHP_EOL . (new Html('script'))
                            ->withValue('')
                            ->withAttr('src', $this->loadAssets('builder/app.js', $version))
                            ->toString();

                    return $content;
                }),
            ]);

            $this->content($content . PHP_EOL . $html->toString());
        }

        parent::send();
    }

}
