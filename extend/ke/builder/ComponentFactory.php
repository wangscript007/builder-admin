<?php
/*
 * +----------------------------------------------------------------------
 * | Builder Admin
 * +----------------------------------------------------------------------
 * | Author: King east <1207877378@qq.com>
 * +----------------------------------------------------------------------
 */

namespace ke\builder;


use ke\builder\components\Blockquote;
use ke\builder\components\Button;
use ke\builder\components\ButtonGroup;
use ke\builder\components\Card;
use ke\builder\components\Checkbox;
use ke\builder\components\Container;
use ke\builder\components\Echarts;
use ke\builder\components\Fieldset;
use ke\builder\components\Form;
use ke\builder\components\FormItem;
use ke\builder\components\Hr;
use ke\builder\components\Icon;
use ke\builder\components\Input;
use ke\builder\components\Link;
use ke\builder\components\Radio;
use ke\builder\components\Select;
use ke\builder\components\Switchers;
use ke\builder\components\Table;
use ke\builder\components\Text;
use ke\builder\components\Tinymce;
use ke\builder\components\Tree;

/**
 * 组件工厂
 * @method static Blockquote Blockquote() 引用区块
 * @method static Button Button() 按钮
 * @method static ButtonGroup ButtonGroup() 按钮
 * @method static Card Card() 卡片
 * @method static Checkbox Checkbox() 复选框
 * @method static Container Container() 容器
 * @method static Echarts Echarts(array $initOption) 图表
 * @method static Fieldset Fieldset() 字段集区块
 * @method static Form Form(string $name) 表单
 * @method static FormItem FormItem() 表单组
 * @method static Hr Hr() 横线
 * @method static Icon Icon(string $name) 图标
 * @method static Input Input() 输入框
 * @method static Link Link() 链接
 * @method static Radio Radio() 单选框
 * @method static Select Select() 选择框
 * @method static Switchers Switchers() 开关
 * @method static Table Table(string $id) 表格
 * @method static Text Text() 文字
 * @method static Tinymce Tinymce(string $name) 富文本编辑器
 * @method static Tree Tree(string $id) 树形结构
 */
class ComponentFactory
{
    public static function __callStatic($name, $arguments)
    {
        $class = '\\ke\\builder\\components\\' . $name;

        return new $class(...$arguments);
    }
}
