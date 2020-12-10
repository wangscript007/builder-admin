<?php


namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\ComponentChildren;
use ke\builder\exceptions\Exception;
use ke\builder\Html;

/**
 * 按钮组
 * Class Button
 * @package ke\builder\components
 */
class ButtonGroup extends Component
{
    use ComponentChildren;

    public function build(): string
    {
        $html = new Html();
        $html->withTag('div');

        $html->withValue($this->buildComponent());

        $html->withClass('layui-btn-group');

        return $html->toString();
    }

}
