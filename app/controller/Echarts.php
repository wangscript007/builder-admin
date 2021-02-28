<?php


namespace app\controller;


use app\BaseController;
use ke\builder\components\Card;
use ke\builder\components\Container;
use ke\builder\components\Echarts as EchartsComponent;

class Echarts extends BaseController
{
    public function index()
    {
        $this->engine->addComponent((new Container())
            ->addComponent((new Card())
                ->withTitle('图表')

                ->addComponent((new EchartsComponent([
                    'title'=>[
                        'text'=>'折线图'
                    ],
                    'xAxis'=>[
                        'type'=>'category',
                        'data'=>['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                    ],
                    'yAxis'=>[
                        'type'=>'value'
                    ],
                    'series'=>[
                        'data'=>[150, 230, 224, 218, 135, 147, 260],
                        'type'=>'line'
                    ]
                ])))

                ->addComponent((new EchartsComponent([
                    'title'=>[
                        'text'=>'柱状图'
                    ],
                    'xAxis'=>[
                        'type'=>'category',
                        'data'=>['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                    ],
                    'yAxis'=>[
                        'type'=>'value'
                    ],
                    'series'=>[
                        'data'=>[150, 230, 224, 218, 135, 147, 260],
                        'type'=>'bar'
                    ]
                ])))

                ->addComponent((new EchartsComponent([
                    'legend'=>[
                        'orient'=>'vertical',
                        'left'=>'left'
                    ],
                    'series'=>[
                        [
                            'name'=>'访问来源',
                            'type'=>'pie',
                            'radius'=>'50%',
                            'data'=>[
                                ['value'=>1048, 'name'=>'搜索引擎'],
                                ['value'=>735, 'name'=>'直接访问'],
                                ['value'=>580, 'name'=>'邮件营销'],
                                ['value'=>484, 'name'=>'联盟广告'],
                                ['value'=>300, 'name'=>'视频广告'],
                            ],
                            'emphasis'=>[
                                'itemStyle'=>[
                                    'shadowBlur'=>10,
                                    'shadowOffsetX'=>0,
                                    'shadowColor'=>'rgba(0,0,0,0.5)',
                                ]
                            ]
                        ]
                    ]
                ])))
            )
        );

        return $this->engine;
    }

}