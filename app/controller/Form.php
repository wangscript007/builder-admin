<?php


namespace app\controller;


use app\BaseController;
use ke\builder\components\Blockquote;
use ke\builder\components\Button;
use ke\builder\components\ButtonGroup;
use ke\builder\components\Checkbox;
use ke\builder\components\Container;
use ke\builder\components\FormItem;
use ke\builder\components\Input;
use ke\builder\components\Link;
use ke\builder\components\Radio;
use ke\builder\components\Select;
use ke\builder\components\Switchers;
use ke\builder\components\Text;
use ke\builder\decoration\Border;

class Form extends BaseController
{

    public function index()
    {

        // 容器
        $this->engine->addComponent((new Container())
            ->addComponent((new \ke\builder\components\Form())
                ->withName('form')

                ->addComponent((new FormItem())
                    ->withBlock(true)
                    ->withLabel('输入框')
                    ->addComponent((new Input())
                        ->withName('input')
                        ->withVerify('required|phone')
                    )
                )

                ->addComponent((new FormItem())
                    ->withBlock(true)
                    ->withLabel('选择框')
                    ->addComponent((new Select())
                        ->withName('select')
                        ->withValue(2)
                        ->withOptions([
                            1=>'选项一',
                            2=>'选项二',
                        ])
                    )
                )

                ->addComponent((new FormItem())
                    ->withBlock(true)
                    ->withLabel('复选框')
                    ->addComponent((new Checkbox())
                        ->withName('like[write]')
                        ->withTitle('写作')
                    )
                    ->addComponent((new Checkbox())
                        ->withName('like[read]')
                        ->withTitle('阅读')
                        ->withChecked(true)
                    )
                )

                ->addComponent((new FormItem())
                    ->withBlock(true)
                    ->withLabel('开关')
                    ->addComponent((new Switchers())
                        ->withName('switch')
                    )
                )

                ->addComponent((new FormItem())
                    ->withBlock(true)
                    ->withLabel('单选')
                    ->addComponent((new Radio())
                        ->withName('radio')
                        ->withValue(2)
                        ->withOptions([
                            1=>'单选1',
                            2=>'单选2'
                        ])
                    )
                )

                ->addComponent((new FormItem())
                    ->withBlock(true)
                    ->withLabel('文本域')
                    ->addComponent((new Input())
                        ->withName('content')
                        ->withType(Input::TYPE_TEXTAREA)
                        ->withPlaceholder('请输入内容')
                        ->withVerify('required')
                        ->withValue('wewe')
                    )
                )

                ->addComponent((new FormItem())
                    ->withBlock(true)
                    ->addComponent((new Button())
                        ->withText('提交')
                        ->withType(Button::TYPE_SUBMIT)
                    )
                )
            )
        );

        return $this->engine->send();
    }
}
