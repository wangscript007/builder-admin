<?php


namespace app\controller;


use app\BaseController;
use ke\builder\ComponentFactory;
use ke\builder\components\Button;
use ke\builder\components\Input;

class Form extends BaseController
{

    public function index()
    {

        // 容器
        $this->engine->addComponent(ComponentFactory::Container()
            // ->withLayout(true)
            ->addComponent(ComponentFactory::Card()
                ->withTitle('form')
                ->addComponent(ComponentFactory::Form('form')
                    ->withLoad(function ($data) {
                        return $data;
                    })

                    ->addComponent(ComponentFactory::FormItem()
                        ->withBlock(true)
                        ->withLabel('输入框')
                        ->addComponent(ComponentFactory::Input()
                            ->withName('input')
                            ->withVerify('required')
                        )
                    )

                    ->addComponent(ComponentFactory::FormItem()
                        ->withBlock(true)
                        ->withLabel('选择框')
                        ->addComponent(ComponentFactory::Select()
                            ->withName('select')
                            ->withValue(2)
                            ->withOptions([
                                1=>'选项一',
                                2=>'选项二',
                            ])
                        )
                    )

                    ->addComponent(ComponentFactory::FormItem()
                        ->withBlock(true)
                        ->withLabel('复选框')
                        ->addComponent(ComponentFactory::Checkbox()
                            ->withName('like[write]')
                            ->withTitle('写作')
                        )
                        ->addComponent(ComponentFactory::Checkbox()
                            ->withName('like[read]')
                            ->withTitle('阅读')
                            ->withChecked(true)
                        )
                    )

                    ->addComponent(ComponentFactory::FormItem()
                        ->withBlock(true)
                        ->withLabel('开关')
                        ->addComponent(ComponentFactory::Switchers()
                            ->withName('switch')
                        )
                    )

                    ->addComponent(ComponentFactory::FormItem()
                        ->withBlock(true)
                        ->withLabel('单选')
                        ->addComponent(ComponentFactory::Radio()
                            ->withName('radio')
                            ->withValue(2)
                            ->withOptions([
                                1=>'单选1',
                                2=>'单选2'
                            ])
                        )
                    )

                    ->addComponent(ComponentFactory::FormItem()
                        ->withBlock(true)
                        ->withLabel('文本域')
                        ->addComponent(ComponentFactory::Input()
                            ->withName('content')
                            ->withType(Input::TYPE_TEXTAREA)
                            ->withPlaceholder('请输入内容')
                            ->withVerify('required')
                            ->withValue('wewe')
                        )
                    )

                    ->addComponent(ComponentFactory::FormItem()
                        ->withBlock(true)
                        ->addComponent(ComponentFactory::Button()
                            ->withText('提交')
                            ->withType(Button::TYPE_SUBMIT)
                        )
                    )
                )
            )
        );

        return $this->engine;
    }
}
