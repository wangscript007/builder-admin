输入框
===============

**1.实例化**

`new Input()`

**2.设置名称**

`withName(string)`

**3.设置类型**

`withType(Input::TYPE_*)`

**4.设置初始值**

`withValue(string)`

**5.设置占位文本**

`withPlaceholder(string)`

**6.设置是否自动完成**

`withAutocomplete(on | off)`

**7.设置验证器**

`withVerify(string)`

```
(new Input())
    ->withName('input')
    ->withVerify('required')
```
