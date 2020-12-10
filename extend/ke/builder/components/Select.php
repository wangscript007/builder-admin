<?php


namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\ComponentChildren;
use ke\builder\exceptions\Exception;
use ke\builder\Html;

/**
 * 选择框
 * Class Button
 * @package ke\builder\components
 *
 * @method $this withName(string $text) 设置选择框名称
 * @method $this withOptions(array $options) 设置选择框选项
 */
class Select extends Component
{
    protected $options = [
    ];


    public function build(): string
    {
        if (!isset($this->options['name'])) {
            throw new Exception('select.name is null');
        }
        if (!isset($this->options['options'])) {
            throw new Exception('select.options is null');
        }

        $html = new Html();
        $html->withTag('select');

        $html->withAttr('name', $this->options['name'][0]);
        $html->withAttr('lay-verify', '');

        $content = '';
        foreach ($this->options['options'][0] as $value=>$text) {
            $content .= '<option value="' . $value . '">' . $text . '</option>';
        }
        $html->withValue($content);

        return $html->toString();
    }

}
