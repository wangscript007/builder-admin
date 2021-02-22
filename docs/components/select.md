选择框
===============

**1.实例化**

`new Select()`

**2.设置名称**

`withName(string)`

**3.设置初始值**

`withValue(string)`

**4.设置选择项**

`withOptions(array[value=>text])`

**5.设置验证器**

`withVerify(string)`

```
(new Select())
    ->withName('select')
    ->withValue(2)
    ->withOptions([
        1=>'选项一',
        2=>'选项二',
    ])
```
