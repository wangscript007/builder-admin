<?php


namespace app\controller;


use app\BaseController;
use ke\builder\components\Tree as TreeComponent;

class Tree extends BaseController
{

    public function index()
    {
        $this->engine->addComponent((new TreeComponent('tree'))
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
//            ->withLoad(function ($params) {
//                $items = [];
//                for($i = 0; $i < $params['limit']; $i++) {
//                    $items[] = [
//                        'id'=>($i + 1) + (($params['page'] - 1) * $params['limit']),
//                        'username'=>'第' . $params['page'] . '页数据： 用户名???',
//                        'create_time'=>'第' . $params['page'] . '页数据： ' . date('Y-m-d H:i:s'),
//                    ];
//                }
//
//                return new ListResponse($items, 130);
//            })
        );

        return $this->engine;
    }
}
