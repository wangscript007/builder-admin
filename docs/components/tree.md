树形结构
===============

**1.实例化**

`new Tree()`

**2.设置树形数据**

`withData(array)`

**3.是否显示复选框**

`withCheckbox(bool)`

**4.是否开启节点的操作图标**

`withEdit(array)`

```
->withEdit(['add', 'update', 'del'])
->withData([
    [
        'id'=>1,
        'title'=>'江西',
        'children'=>[
            [
                'id'=>2,
                'title'=>'南昌',
                'children'=>[
                    [
                        'id'=>3,
                        'title'=>'高新区',
                    ]
                ]
            ]
        ]
    ],
    [
        'id'=>4,
        'title'=>'广西',
        'spread'=>true,
        'children'=>[
            [
                'id'=>5,
                'title'=>'南宁',
            ],
            [
                'id'=>6,
                'title'=>'桂林',
            ]
        ]
    ]
])
```