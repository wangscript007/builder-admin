<?php


namespace ke\builder;


use ke\builder\constraint\EngineConfig;
use think\Container;

class Engine
{
    protected $config;

    protected $template;

    protected $components = [];

    public function __construct(EngineConfig $config)
    {
        $this->config = $config->getData();
        $this->template = Container::pull(Template::class, ['config'=>$this->config]);
    }


    public function addComponent(Component $component)
    {
        $this->components[] = $component;
        return $this;
    }


    public function send()
    {
        return $this->template->render('layout', [
            'components'=>$this->components,
        ]);
    }

}
