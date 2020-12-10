<?php
namespace app\controller;

use app\BaseController;
use ke\builder\components\Button;
use ke\builder\components\ButtonGroup;
use ke\builder\components\Container;
use ke\builder\components\Form;
use ke\builder\components\Input;
use ke\builder\components\Link;
use ke\builder\components\Select;
use ke\builder\components\Text;
use ke\builder\constraint\EngineConfig;
use ke\builder\decoration\Border;
use ke\builder\Engine;

class Index extends BaseController
{
    public function index()
    {
        $engine = new Engine((new EngineConfig())
            ->withPath('/static')
        );

        // 容器
        $engine->addComponent((new Container())
            ->withBackgroundColor('#000000')
            ->withPadding(10, 20, 30, 40)
            ->withBorder((new Border())
                ->withStyle(Border::STYLE_SOLID)
                ->withWidth(2)
                ->withColor('#456456')
                ->withRadius(20)
            )
            ->addComponent((new Container())
                ->withBackgroundColor('#ffffff')
                ->withPadding(20, 30, 40, 50)
                ->addComponent((new Link())
                    ->withUrl('http://baidu.com')
                    ->addComponent((new Text())
                        ->withContent('test')
                    )
                )
            )
            ->addComponent((new Input())
                ->withName('name')
                ->withPlaceholder('we')
            )
            ->addComponent((new Button())
                ->withText('按钮')
                ->withSize(Button::SIZE_LG)
                ->withTheme(Button::THEME_DANGER)
            )
            ->addComponent((new Container())
                ->withBackgroundColor('#456456')
                ->addComponent((new ButtonGroup())
                    ->addComponent((new Button())
                        ->withText('按钮1')
                    )
                    ->addComponent((new Button())
                        ->withText('按钮2')
                    )
                    ->addComponent((new Button())
                        ->withText('按钮3')
                    )
                )
            )

            ->addComponent((new Select())
                ->withName('select')
                ->withOptions([
                    1=>'选项一',
                    2=>'选项二',
                ])
            )
            ->addComponent((new Form())
                ->withName('form')
                ->addComponent((new Select())
                    ->withName('select')
                    ->withOptions([
                        1=>'选项一',
                        2=>'选项二',
                    ])
                )
            )
        );

        return $engine->send();
    }

}
