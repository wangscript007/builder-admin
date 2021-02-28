<?php


namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\Html;

/**
 * 图标
 * @method $this withName(string $name) 图标名
 * - 图标库 https://www.layui.com/doc/element/icon.html
 */
class Icon extends Component
{
    protected $name = '';

    public function __construct(string $name)
    {
        parent::__construct();

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        $html = new Html('i');
        $html->withClass('layui-icon layui-icon-' . $this->name);
        $html->withValue('');
        return $html->toString();
    }

}
