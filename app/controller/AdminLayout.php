<?php


namespace app\controller;


use app\BaseController;
use ke\builder\ComponentFactory;
use ke\builder\layouts\AdminLayout as DefaultAdminLayout;

class AdminLayout extends BaseController
{

    public function home()
    {
        $this->engine->addComponent(ComponentFactory::Container()
            ->addComponent(ComponentFactory::Text()
                ->withContent('hello world')
            )
        );

        return $this->engine;
    }

    public function index()
    {

        // 容器
        $this->engine->addComponent((new DefaultAdminLayout())
            ->withHomeUrl('AdminLayout/home')
            ->withMenu([
                [
                    'url'=>'/',
                    'icon'=>'home',
                    'text'=>'首页'
                ],
                [
                    'text'=>'组件',
                    'icon'=>'app',
                    'children'=>[
                        [
                            'url'=>url('form/index'),
                            'text'=>'表单',
                        ],
                        [
                            'url'=>url('index/buttonGroup'),
                            'text'=>'按钮组'
                        ],
                        [
                            'url'=>url('index/blockquote'),
                            'text'=>'引用区块'
                        ],
                        [
                            'url'=>url('index/fieldset'),
                            'text'=>'字段集'
                        ],
                        [
                            'url'=>url('index/hr'),
                            'text'=>'横线'
                        ],
                        [
                            'url'=>url('index/card'),
                            'text'=>'卡片'
                        ],
                        [
                            'url'=>url('table/index'),
                            'text'=>'表格'
                        ],
                        [
                            'url'=>url('tree/index'),
                            'text'=>'树形结构'
                        ],
                        [
                            'url'=>url('tinymce/index'),
                            'text'=>'富文本'
                        ],
                        [
                            'url'=>url('tinymce/index2'),
                            'text'=>'富文本2'
                        ],
                        [
                            'url'=>url('tinymce/index3'),
                            'text'=>'富文本3'
                        ],
                        [
                            'url'=>url('tinymce/index4'),
                            'text'=>'富文本4'
                        ],
                        [
                            'url'=>url('tinymce/index5'),
                            'text'=>'富文本5'
                        ],
                        [
                            'url'=>url('tinymce/index6'),
                            'text'=>'富文本6'
                        ],
                    ]
                ],
                [
                    'url'=>'/echarts/index',
                    'icon'=>'chart-screen',
                    'text'=>'图表'
                ],
            ])
            ->withRightHeaderInfo([
                'avatar'=>'//t.cn/RCzsdCq',
                'username'=>'ad',
                'menus'=>[
                    [
                        'text'=>'修改信息',
                        'url'=>'/admin/editinfo'
                    ],
                    [
                        'text'=>'注销登录',
                        'ajax'=>'post',
                        'url'=>'/admin/logout'
                    ]
                ]
            ])
        );

        return $this->engine;
    }
}
