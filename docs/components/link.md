链接
===============

**1.实例化**

`new Link()`

**2.设置跳转链接**

`withUrl(string)`

**3.添加组件**

`addComponent(Component)`

```
(new Link())
    ->withUrl('http://www.baidu.com')
    ->addComponent((new Text())
        ->withContent('跳转至百度')
    )
```
