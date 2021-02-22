按钮组
===============

**1.实例化**

`new ButtonGroup()`

**2.添加组件**

`addComponent(Component)`


```
(new ButtonGroup())
    ->addComponent((new Button())
        ->withText('button')
    )
    ->addComponent((new Button())
        ->withTheme(Button::THEME_WARM)
        ->withText('button2')
    )
    ->addComponent((new Button())
        ->withTheme(Button::THEME_DANGER)
        ->withText('button3')
    )
```
