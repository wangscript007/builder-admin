<?php
namespace app\controller;

use app\BaseController;
use ke\builder\ComponentFactory;
use ke\builder\components\Blockquote;
use ke\builder\components\Button;
use ke\builder\components\Fieldset;
use ke\builder\decoration\Bg;

class Index extends BaseController
{
    public function index()
    {
        // 容器
        $this->engine->addComponent(ComponentFactory::Container()
            ->withLayout(true)
            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('form/index'))
                    ->addComponent(ComponentFactory::Text()
                        ->withContent('表单Demo')
                    )
                )
            )

            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('index/blockquote'))
                    ->addComponent(ComponentFactory::Text()
                        ->withContent('引用区块')
                    )
                )
            )

            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('index/fieldset'))
                    ->addComponent(ComponentFactory::Text()
                        ->withContent('字段集')
                    )
                )
            )

            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('index/hr'))
                    ->addComponent(ComponentFactory::Text()
                        ->withContent('横线')
                    )
                )
            )

            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('index/card'))
                    ->addComponent(ComponentFactory::Text()
                        ->withContent('卡片')
                    )
                )
            )

            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('table/index'))
                    ->addComponent(ComponentFactory::Text()
                        ->withContent('表格')
                    )
                )
            )

            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('tree/index'))
                    ->addComponent(ComponentFactory::Text()
                        ->withContent('树形')
                    )
                )
            )

            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('index/buttonGroup'))
                    ->addComponent(ComponentFactory::Text()
                        ->withContent('按钮组')
                    )
                )
            )

            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('tinymce/index'))
                    ->addComponent(ComponentFactory::Text()
                        ->withContent('富文本 Tinymce')
                    )
                )
            )

            ->addComponent(ComponentFactory::Container()
                ->withPadding(20)
                ->addComponent(ComponentFactory::Link()
                    ->withUrl(url('AdminLayout/index'))
                    ->addComponent(ComponentFactory::Text()
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
        $this->engine->addComponent(ComponentFactory::Container()
            ->withLayout(true)
            ->addComponent(ComponentFactory::ButtonGroup()
                ->addComponent(ComponentFactory::Button()
                    ->withText('button')
                )
                ->addComponent(ComponentFactory::Button()
                    ->withTheme(Button::THEME_WARM)
                    ->withText('button2')
                )
                ->addComponent(ComponentFactory::Button()
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
        $this->engine->addComponent(ComponentFactory::Container()
            ->withLayout(true)
            ->addComponent(ComponentFactory::Blockquote()
                ->withContent('引用区块的文字')
            )

            ->addComponent(ComponentFactory::Blockquote()
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
        $this->engine->addComponent(ComponentFactory::Container()
            ->withLayout(true)
            ->addComponent(ComponentFactory::Fieldset()
                ->withTitle('标题')
                ->addComponent(ComponentFactory::Text()
                    ->withContent('内容')
                )
            )

            ->addComponent(ComponentFactory::Fieldset()
                ->withMode(Fieldset::MODE_TITLE)
                ->withTitle('标题 风格2')
                ->addComponent(ComponentFactory::Text()
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
        $this->engine->addComponent(ComponentFactory::Container()
            ->withLayout(true)
            ->addComponent(ComponentFactory::Hr())

            ->addComponent(ComponentFactory::Hr()
                ->withMode(Bg::COLOR_RED)
            )

            ->addComponent(ComponentFactory::Hr()
                ->withMode(Bg::COLOR_ORANGE)
            )

            ->addComponent(ComponentFactory::Hr()
                ->withMode(Bg::COLOR_GREEN)
            )

            ->addComponent(ComponentFactory::Hr()
                ->withMode(Bg::COLOR_CYAN)
            )

            ->addComponent(ComponentFactory::Hr()
                ->withMode(Bg::COLOR_BLUE)
            )

            ->addComponent(ComponentFactory::Hr()
                ->withMode(Bg::COLOR_BLACK)
            )

            ->addComponent(ComponentFactory::Hr()
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
        $this->engine->addComponent(ComponentFactory::Container()
            ->withLayout(true)

            // 卡片背景是白色，所以需要在非白背景层里使用
            ->withBackgroundColor('#f3f3f3')
            ->withPadding(30)

            ->addComponent(ComponentFactory::Card()
                ->withTitle('测试卡片')
                ->addComponent(ComponentFactory::Text()
                    ->withContent('卡片内容')
                )
            )
        );

        return $this->engine;
    }

}
