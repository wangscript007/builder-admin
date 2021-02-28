<?php
/*
 * +----------------------------------------------------------------------
 * | Builder Admin
 * +----------------------------------------------------------------------
 * | Author: King east <1207877378@qq.com>
 * +----------------------------------------------------------------------
 */

namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\ComponentChildren;
use ke\builder\exceptions\Exception;
use ke\builder\Html;

/**
 * 横线
 * @method $this withMode(string $mode) 设置风格
 */
class Hr extends Component
{
    public function build(): string
    {
        $mode = $this->options['mode'][0] ?? '';
        $html = new Html();
        $html->withTag('hr');
        if ($mode) {
            $html->withClass('layui-bg-' . $mode);
        }

        return $html->toString();
    }

}
