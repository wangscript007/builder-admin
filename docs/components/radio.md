单选框
===============

**1.实例化**

`new Radio()`

**2.设置名称**

`withName(string)`

**3.设置初始值**

`withValue(string)`

**4.设置选择项**

`withOptions(array[value=>text])`

```
(new Radio())
    ->withName('radio')
    ->withValue(2)
    ->withOptions([
        1=>'单选1',
        2=>'单选2'
    ])
```
