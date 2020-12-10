<?php


namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\ComponentChildren;
use ke\builder\exceptions\Exception;
use ke\builder\Html;

/**
 * 输入框
 * Class Input
 * @package ke\builder\components
 *
 * @method $this withName(string $name) 设置输入框名称
 * @method $this withType(string $type) 设置输入框类型
 * @method $this withValue(string $value) 设置内容
 * @method $this withPlaceholder(string $value)
 * @method $this withAutocomplete(string $value)
 */
class Input extends Component
{
    /** 文本 */
    const TYPE_TEXT = 'text';

    /** 密码 */
    const TYPE_PASSWORD = 'password';

    protected $options = [
        'type'=>[self::TYPE_TEXT],
        'autocomplete'=>['off'],
    ];

    public function getStyle()
    {
        $list = [];

        if (isset($this->options['color'])) {
            $list[] = 'color:' . $this->options['color'][0];
        }
        return implode(';', $list);
    }


    public function build(): string
    {
        if (!isset($this->options['name'])) {
            throw new Exception('input.name is null');
        }

        $html = new Html();
        $html->withTag('input');

        $style = $this->getStyle();
        if ($style) {
            $html->withAttr('style', $style);
        }
        $html->withAttr('id', $this->options['name'][0]);
        $html->withAttr('class', 'layui-input');
        foreach ($this->options as $name=>$value) {
            $html->withAttr($name, $value[0]);
        }
        return $html->toString();
    }

}
