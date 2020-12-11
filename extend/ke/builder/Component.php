<?php


namespace ke\builder;


use think\Container;
use think\Request;
use function Symfony\Component\String\u;

class Component
{
    public $id;

    /**
     * @var Request
     */
    protected $request;

    protected $options = [];


    public function __construct()
    {
        $this->id = base64_encode(mt_rand(0, 99999) . uniqid());
        $this->request = Container::pull(Request::class);
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
