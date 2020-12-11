<?php


namespace ke\builder\components;


use ke\builder\Component;
use ke\builder\ComponentChildren;
use ke\builder\exceptions\Exception;
use ke\builder\Html;

/**
 * 表单
 * @method $this withOptions(array $options) 设置选择框选项
 * @method $this withLoad(callable $callback) 提交回调
 */
class Form extends Component
{
    use ComponentChildren;


    public function __construct(string $id)
    {
        parent::__construct();

        $this->id = $id;
    }

    public function load()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
        } else {
            $data = $this->request->get();
        }
        return call_user_func($this->options['load'][0], $data);
    }


    public function build(): string
    {
        if (!isset($this->options['load'])) {
            throw new Exception('form.load is null');
        }

        $html = new Html();
        $html->withTag('form');
        $html->withClass('layui-form');

        $html->withAttr('id', $this->id);
        $html->withAttr('name', $this->id);

        $html->withValue($this->buildComponent());

        return $html->toString();
    }

}
