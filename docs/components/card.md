卡片
===============

**1.实例化**

`new Card()`

**2.设置标题**

`withTitle(string)`

**3.添加组件**

`addComponent(Component)`

```
(new Card())
    ->withTitle('测试卡片')
    ->addComponent((new Text())
        ->withContent('卡片内容')
    )
```
