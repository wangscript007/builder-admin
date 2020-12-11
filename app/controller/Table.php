<?php


namespace app\controller;


use app\BaseController;
use ke\builder\components\Table as TableComponent;
use ke\builder\constraint\ListResponse;

class Table extends BaseController
{

    public function index()
    {
        $this->engine->addComponent((new TableComponent('table'))
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
        );


        $this->engine->addComponent((new TableComponent('table2'))
            ->withColumns([
                [
                    'field'=>'id',
                    'text'=>'ID2'
                ],
                [
                    'field'=>'username',
                    'text'=>'文章'
                ],
            ])
            ->withLoad(function ($params) {
                $items = [];
                for($i = 0; $i < $params['limit']; $i++) {
                    $items[] = [
                        'id'=>($i + 1) + (($params['page'] - 1) * $params['limit']),
                        'username'=>'第' . $params['page'] . '页数据： 文章标题???',
                    ];
                }

                return new ListResponse($items, 130);
            })
        );

        return $this->engine->send();
    }
}
