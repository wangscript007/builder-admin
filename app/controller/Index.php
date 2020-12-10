<?php
namespace app\controller;

use app\BaseController;
use ke\builder\components\Blockquote;
use ke\builder\components\Button;
use ke\builder\components\ButtonGroup;
use ke\builder\components\Checkbox;
use ke\builder\components\Container;
use ke\builder\components\Form;
use ke\builder\components\FormItem;
use ke\builder\components\Input;
use ke\builder\components\Link;
use ke\builder\components\Radio;
use ke\builder\components\Select;
use ke\builder\components\Switchers;
use ke\builder\components\Text;
use ke\builder\constraint\EngineConfig;
use ke\builder\decoration\Border;
use ke\builder\Engine;

class Index extends BaseController
{
    public function index()
    {
        // 容器
        $this->engine->addComponent((new Container())
            ->withPadding(50)
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
                    ->withUrl(url('form/index'))
                    ->addComponent((new Text())
                        ->withContent('表单Demo')
                    )
                )
            )
        );

        return $this->engine->send();
    }

}
