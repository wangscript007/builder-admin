表单
===============

**1.实例化**

`new Form(form_id)`

**2.表单回调**

`withLoad(Function(array) array|DataResponse|ListResponse)`

**3.添加组件**

`addComponent(Component)`

```
(new FormComponent('form'))
    ->withLoad(function ($data) {
        // 提交后跳转到某个链接
        return [
            'url'=>'http://baidu.com'
        ];
    })

    ->addComponent((new FormItem())
        ->withBlock(true)
        ->withLabel('输入框')
        ->addComponent((new Input())
            ->withName('input')
            ->withVerify('required')
        )
    )
```
