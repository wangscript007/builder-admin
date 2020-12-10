<?php


namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\exceptions\Exception;
use ke\builder\Html;

/**
 * Class Text
 * @package ke\builder\components
 *
 * @method $this withContent(string $text) 设置文本内容
 * @method $this withColor(string $color) 设置文本颜色
 */
class Text extends Component
{
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
        if (!isset($this->options['content'])) {
            throw new Exception('text.content is null');
        }
        $html = new Html();
        $html->withTag('span');
        $style = $this->getStyle();
        if ($style) {
            $html->withAttr('style', $style);
        }
        $html->withValue($this->options['content'][0]);
        return $html->toString();
    }

}
