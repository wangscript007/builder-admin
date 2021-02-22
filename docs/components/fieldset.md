字段集
===============

**1.实例化**

`new Fieldset()`

**2.设置标题**

`withTitle(string)`

**3.设置风格**

`withMode(Fieldset::MODE_*)`

**4.添加组件**

`addComponent(Component)`

```
$this->engine->addComponent((new Container())
    ->withLayout(true)
    ->addComponent((new Fieldset())
        ->withTitle('标题')
        ->addComponent((new Text())
            ->withContent('内容')
        )
    )

    ->addComponent((new Fieldset())
        ->withMode(Fieldset::MODE_TITLE)
        ->withTitle('标题 风格2')
        ->addComponent((new Text())
            ->withContent('内容')
        )
    )
);
```
