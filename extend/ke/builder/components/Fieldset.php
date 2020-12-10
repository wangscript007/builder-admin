<?php


namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\ComponentChildren;
use ke\builder\exceptions\Exception;
use ke\builder\Html;

/**
 * 字段集区块
 * @method $this withTitle(string $text) 设置标题
 * @method $this withMode(string $mode) 设置风格
 */
class Fieldset extends Component
{
    use ComponentChildren;

    const MODE_DEFAULT = '';

    const MODE_TITLE = 'title';

    public function build(): string
    {
        if (!isset($this->options['title'])) {
            throw new Exception('fieldset.content is null');
        }

        $mode = $this->options['mode'][0] ?? self::MODE_DEFAULT;
        $html = new Html();
        $html->withTag('fieldset');
        $html->withClass('layui-elem-field');
        if ($mode) {
            $html->withClass('layui-field-' . $mode);
        }

        $title = new Html('legend');
        $title->withValue($this->options['title'][0]);

        $content = new Html('div');
        $content->withClass('layui-field-box');
        $content->withValue($this->buildComponent());

        $html->withValue($title->toString() . $content->toString());

        return $html->toString();
    }

}