<?php


namespace ke\builder;


use ke\builder\lib\KeEntension;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Template
{

    protected $loader;


    protected $twig;


    public function __construct($config)
    {
        $this->loader = new FilesystemLoader(__DIR__ . '/view');
        $this->twig = new Environment($this->loader);

        $this->twig->addExtension(new KeEntension($config));
    }


    public function render($name, $vars = [])
    {
        return $this->twig->render($name . '.twig', $vars);
    }

}
