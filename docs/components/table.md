表格
===============

**1.实例化**

`new Table()`

**2.设置表格列**

`withColumns(array[TableColumn])`

**3.数据获取回调**

`withLoad(TableLoad)`


### TableColumn

字段名 | 说明
--- | ---
field | 字段
text | 表头文本

```
->withColumns([
    [
        'field'=>'id',
        'text'=>'ID'
    ],
    [
        'field'=>'username',
        'text'=>'用户名'
    ],
    [
        'field'=>'create_time',
        'text'=>'创建时间'
    ],
])
```

### TableLoad

> 入参

字段名 | 说明
--- | ---
page | 页码
limit | 每页数量

> 返回参 ListResponse

```
->withLoad(function ($params) {
    $items = [];
    for($i = 0; $i < $params['limit']; $i++) {
        $items[] = [
            'id'=>($i + 1) + (($params['page'] - 1) * $params['limit']),
            'username'=>'第' . $params['page'] . '页数据： 用户名???',
            'create_time'=>'第' . $params['page'] . '页数据： ' . date('Y-m-d H:i:s'),
        ];
    }

    return new ListResponse($items, 130);
})
```
