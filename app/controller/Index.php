<?php
namespace app\controller;

use app\BaseController;
use ke\builder\components\Blockquote;
use ke\builder\components\Button;
use ke\builder\components\ButtonGroup;
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
        );

        return $this->engine->send();
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

        return $this->engine->send();
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

        return $this->engine->send();
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

        return $this->engine->send();
    }

}
