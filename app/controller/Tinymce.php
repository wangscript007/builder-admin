<?php


namespace app\controller;


use app\BaseController;
use ke\builder\components\Text;
use ke\builder\components\Tinymce as TinymceComponent;
use ke\builder\components\Container;

class Tinymce extends BaseController
{

    public function index()
    {

        // 容器
        $this->engine->addComponent((new Container())
            ->withLayout(true)
            ->addComponent((new Text())
                ->withContent('测试图片上传都直接返回/uploads/1.jpg')
            )
            ->addComponent((new TinymceComponent('tinymce'))
                ->withJs('/static/builder/plugins/tinymce/tinymce.min.js')
                ->withImageUploadUrl('/uploads/index')
            )
        );

        return $this->engine;
    }
}
