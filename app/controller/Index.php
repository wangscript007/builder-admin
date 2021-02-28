<?php
namespace app\controller;

use app\BaseController;
use ke\builder\components\Blockquote;
use ke\builder\components\Button;
use ke\builder\components\ButtonGroup;
use ke\builder\components\Card;
use ke\builder\components\Checkbox;
use ke\builder\components\Container;
use ke\builder\components\Fieldset;
use ke\builder\components\Form;
use ke\builder\components\FormItem;
use ke\builder\components\Hr;
use ke\builder\components\Input;
use ke\builder\components\Link;
use ke\builder\components\Radio;
use ke\builder\components\Select;
use ke\builder\components\Switchers;
use ke\builder\components\Text;
use ke\builder\constraint\EngineConfig;
use ke\builder\decoration\Bg;
use ke\builder\decoration\Border;
use ke\builder\Engine;

class Index extends BaseController
{
    public function index()
    {
        // 容器
        $this->engine->addComponent((new Container())
            ->withLayout(true)
            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('form/index'))
                    ->addComponent((new Text())
                        ->withContent('表单Demo')
                    )
                )
            )

            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('index/blockquote'))
                    ->addComponent((new Text())
                        ->withContent('引用区块')
                    )
                )
            )

            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('index/fieldset'))
                    ->addComponent((new Text())
                        ->withContent('字段集')
                    )
                )
            )

            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('index/hr'))
                    ->addComponent((new Text())
                        ->withContent('横线')
                    )
                )
            )

            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('index/card'))
                    ->addComponent((new Text())
                        ->withContent('卡片')
                    )
                )
            )

            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('table/index'))
                    ->addComponent((new Text())
                        ->withContent('表格')
                    )
                )
            )

            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('tree/index'))
                    ->addComponent((new Text())
                        ->withContent('树形')
                    )
                )
            )

            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('index/buttonGroup'))
                    ->addComponent((new Text())
                        ->withContent('按钮组')
                    )
                )
            )

            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('tinymce/index'))
                    ->addComponent((new Text())
                        ->withContent('富文本 Tinymce')
                    )
                )
            )

            ->addComponent((new Container())
                ->withPadding(20)
                ->addComponent((new Link())
                    ->withUrl(url('AdminLayout/index'))
                    ->addComponent((new Text())
                        ->withContent('后台布局')
                    )
                )
            )
        );

        return $this->engine;
    }


    /**
     * 按钮组
     * @return mixed
     */
    public function buttonGroup()
    {
        $this->engine->addComponent((new Container())
            ->withLayout(true)
            ->addComponent((new ButtonGroup())
                ->addComponent((new Button())
                    ->withText('button')
                )
                ->addComponent((new Button())
                    ->withTheme(Button::THEME_WARM)
                    ->withText('button2')
                )
                ->addComponent((new Button())
                    ->withTheme(Button::THEME_DANGER)
                    ->withText('button3')
                )
            )
        );

        return $this->engine;
    }


    /**
     * 引用区块
     * @return mixed
     */
    public function blockquote()
    {
        $this->engine->addComponent((new Container())
            ->withLayout(true)
            ->addComponent((new Blockquote())
                ->withContent('引用区块的文字')
            )

            ->addComponent((new Blockquote())
                ->withMode(Blockquote::MODE_NM)
                ->withContent('引用区块的文字 风格2')
            )
        );

        return $this->engine;
    }


    /**
     * 字段集
     * @return mixed
     */
    public function fieldset()
    {
        $this->engine->addComponent((new Container())
            ->withLayout(true)
            ->addComponent((new Fieldset())
                ->withTitle('标题')
                ->addComponent((new Text())
                    ->withContent('内容')
                )
            )

            ->addComponent((new Fieldset())
                ->withMode(Fieldset::MODE_TITLE)
                ->withTitle('标题 风格2')
                ->addComponent((new Text())
                    ->withContent('内容')
                )
            )
        );

        return $this->engine;
    }


    /**
     * 横线
     * @return mixed
     */
    public function hr()
    {
        $this->engine->addComponent((new Container())
            ->withLayout(true)
            ->addComponent((new Hr()))

            ->addComponent((new Hr())
                ->withMode(Bg::COLOR_RED)
            )

            ->addComponent((new Hr())
                ->withMode(Bg::COLOR_ORANGE)
            )

            ->addComponent((new Hr())
                ->withMode(Bg::COLOR_GREEN)
            )

            ->addComponent((new Hr())
                ->withMode(Bg::COLOR_CYAN)
            )

            ->addComponent((new Hr())
                ->withMode(Bg::COLOR_BLUE)
            )

            ->addComponent((new Hr())
                ->withMode(Bg::COLOR_BLACK)
            )

            ->addComponent((new Hr())
                ->withMode(Bg::COLOR_GRAY)
            )
        );

        return $this->engine;
    }


    /**
     * 卡片
     * @return mixed
     */
    public function card()
    {
        $this->engine->addComponent((new Container())
            ->withLayout(true)

            // 卡片背景是白色，所以需要在非白背景层里使用
            ->withBackgroundColor('#f3f3f3')
            ->withPadding(30)

            ->addComponent((new Card())
                ->withTitle('测试卡片')
                ->addComponent((new Text())
                    ->withContent('卡片内容')
                )
            )
        );

        return $this->engine;
    }

}
