<?php


namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\ComponentChildren;
use ke\builder\exceptions\Exception;
use ke\builder\Html;

/**
 * 表单
 * Class Form
 * @package ke\builder\components
 *
 * @method $this withName(string $text) 设置表单名称
 * @method $this withOptions(array $options) 设置选择框选项
 */
class Form extends Component
{
    use ComponentChildren;

    protected $options = [
    ];


    public function build(): string
    {
        if (!isset($this->options['name'])) {
            throw new Exception('select.name is null');
        }

        $html = new Html();
        $html->withTag('form');
        $html->withClass('layui-form');

        $html->withAttr('name', $this->options['name'][0]);

        $html->withValue($this->buildComponent(function ($str) {
            $div = new Html();
            $div->withTag('div');
            $div->withValue($str);
            $div->withClass('layui-input-block');

            $html = new Html();
            $html->withTag('div');
            $html->withValue($div->toString());
            $html->withClass('layui-form-item');

            return $html->toString();
        }));

        return $html->toString();
    }

}
