<?php


namespace ke\builder;


use ke\builder\constraint\EngineConfig;

class Engine
{
    protected $config;

    protected $components = [];

    public function __construct(EngineConfig $config)
    {
        $this->config = $config->getData();
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
