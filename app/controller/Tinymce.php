<?php


namespace app\controller;


use app\BaseController;
use ke\builder\ComponentFactory;

class Tinymce extends BaseController
{

    // 富文本demo
    public function index()
    {

        // 容器
        $this->engine->addComponent(ComponentFactory::Container()
            ->withLayout(true)
            ->addComponent(ComponentFactory::Text()
                ->withContent('测试图片上传都直接返回/uploads/1.jpg')
            )
            ->addComponent(ComponentFactory::Tinymce('tinymce')
                ->withJs('/static/builder/libs/tinymce/tinymce.min.js')
                ->withImageUploadUrl('/uploads/index')
            )
        );

        return $this->engine;
    }
}
