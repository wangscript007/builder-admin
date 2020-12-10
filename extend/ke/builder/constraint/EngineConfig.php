<?php


namespace ke\builder\constraint;


class EngineConfig
{
    private $data = [
        'debug'=>true,
        'path'=>'',
        'version'=>'0.0.1',
    ];

    public function withPath(string $str)
    {
        $this->data['path'] = $str;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }
}
