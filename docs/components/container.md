容器
===============

**1.实例化**

`new Container()`

**2.设置背景色**

`withBackgroundColor(string)`

**3.添加组件**

`addComponent(Component)`

**4.设置内间距**

`withPadding(int $left, int $top = null, int $right = null, $bottom = null)`

**5.设置外间距**

`withMargin(int $left, int $top = null, int $right = null, $bottom = null)`

**6.设置边框**

`withBorder(Border)`

**7.开启布局**

`withLayout(bool)`

```
(new Container())
    ->withLayout(true)

    // 卡片背景是白色，所以需要在非白背景层里使用
    ->withBackgroundColor('#f3f3f3')
    ->withPadding(30)

    ->addComponent((new Card())
        ->withTitle('测试卡片')
        ->addComponent((new Text())
            ->withContent('卡片内容')
        )
    )
```
