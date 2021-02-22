引用区块
===============

**1.实例化**

`new Blockquote()`

**2.设置内容**

`withContent(string)`

**3.设置风格**

`withMode(Blockquote::MODE_*)`

**4.添加组件**

`addComponent(Component)`

```
$this->engine->addComponent((new Container())
    ->withLayout(true)
    ->addComponent((new Blockquote())
        ->withContent('引用区块的文字')
    )

    ->addComponent((new Blockquote())
        ->withMode(Blockquote::MODE_NM)
        ->withContent('引用区块的文字 风格2')
    )
);
```