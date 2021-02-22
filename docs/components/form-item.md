表单组
===============

**1.实例化**

`new FormItem()`

**2.设置标签文本**

`withLabel(string)`

**3.设置块级元素**

`withBlock(bool)`

**4.添加组件**

`addComponent(Component)`

```
->addComponent((new FormItem())
    ->withBlock(true)
    ->withLabel('输入框')
    ->addComponent((new Input())
        ->withName('input')
        ->withVerify('required')
    )
)
```
