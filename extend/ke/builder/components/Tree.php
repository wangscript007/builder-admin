<?php


namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\exceptions\Exception;
use ke\builder\Html;

/**
 * 树形组件
 */
class Tree extends Component
{
    public function __construct(string $id)
    {
        parent::__construct();

        $this->id = $id;
    }

    public function build(): string
    {
        $html = new Html();
        $html->withTag('div');
        $html->withAttr('id', $this->id);
        $html->withValue('');
        return $html->toString();
    }

}
