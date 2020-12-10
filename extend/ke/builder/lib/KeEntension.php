<?php


namespace ke\builder\lib;


use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class KeEntension extends AbstractExtension
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getFunctions()
    {

        return [
            new TwigFunction('assets', function ($type, $src) {
                $data = [
                    'css'=>'<link rel="stylesheet" href="' . $this->config['path'] . '/%s?v=%s">',
                    'js'=>'<script src="' . $this->config['path'] . '/%s?v=%s"></script>',
                ];

                $version = $this->config['version'];
                if ($this->config['debug']) {
                    $version .= '.' . time();
                }

                echo sprintf($data[$type], $src, $version);
            }),
        ];
    }

}