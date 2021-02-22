按钮
===============

**1.实例化**

`new Button()`

**2.设置按钮文本**

`withText(string)`

**3.设置风格**

`withTheme(Button::THEME_*)`

**4.设置按钮类型**

`withType(Button::TYPE_*)`

**5.设置按钮大小**

`withSize(Button::SIZE_*)`

```
(new Button())
    ->withText('提交')
    ->withType(Button::TYPE_SUBMIT)
```
