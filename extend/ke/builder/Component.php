<?php


namespace ke\builder;


use ke\builder\exceptions\Exception;
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

    protected $pluginJs = [];


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
        throw new Exception('method not exist: ' . $name);
    }


    protected function addClientOptions(string $group, array $options)
    {
        Context::addClientOptions($group, $this->id, $options);
    }


    public function build(): string
    {
        return '';
    }

}
