<?php


namespace ke\builder;


use think\Container as TpContainer;
use function Symfony\Component\String\u;

class Component
{
    /**
     * @var Template
     */
    protected $template;

    protected $options = [];


    public function __construct()
    {
        $this->template = TpContainer::pull(Template::class);
    }


    public function __call($name, $arguments)
    {
        if (substr($name, 0, 4) === 'with') {
            $name = u(substr($name, 4))->snake()->toString();

            $this->options[$name] = $arguments;
            return $this;
        } else if (substr($name, 0, 3) === 'get') {
            $name = u(substr($name, 3))->snake()->toString();

            return $this->options[$name];
        }
        return null;
    }



    public function build(): string
    {
        return '';
    }

}
