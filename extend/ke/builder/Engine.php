<?php


namespace ke\builder;


use ke\builder\constraint\DataResponse;
use ke\builder\constraint\EngineConfig;
use ke\builder\constraint\ListResponse;
use ke\builder\exceptions\Exception;
use think\Container;
use think\Request;

class Engine
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


    public function send()
    {
        $version = $this->config['version'];
        if ($this->config['debug']) {
            $version .= '.' . time();
        }

        $isAjax = $this->request->isAjax();
        if ($isAjax) {
            $componentId = $this->request->get('component_id');
            foreach ($this->components as $component) {
                if ($component->id == $componentId) {
                    if (!method_exists($component, 'load')) {
                        throw new Exception($componentId . ' load function is null');
                    }

                    try {
                        $res = call_user_func([$component, 'load']);
                        if ($res instanceof ListResponse) {
                            return [
                                'code'=>0,
                                'data'=>$res->getItems(),
                                'count'=>$res->getTotal()
                            ];
                        } else if ($res instanceof DataResponse) {
                            return [
                                'code'=>0,
                                'data'=>$res->getData()
                            ];
                        } else {
                            return [
                                'code'=>0,
                            ];
                        }
                    } catch (Exception $e) {
                        return [
                            'code'=>1,
                            'msg'=>$e->getMessage()
                        ];
                    } catch (\Throwable $e) {
                        return [
                            'code'=>1,
                            'msg'=>'wewe'
                        ];
                    }
                }
            }

            return null;
        }

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

        return $content . PHP_EOL . $html->toString();
    }

}
