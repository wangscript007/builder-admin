<?php


namespace app\command;


use app\Thinkphp;
use ke\apidoc\Parse;
use ke\apidoc\parse\Tp51;
use ke\apidoc\parse\Tp60;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\facade\App;

class ApiDoc extends Command
{
    public function configure()
    {
        $this->setName('apidoc');
    }


    public function execute(Input $input, Output $output)
    {
        $module = 'api';
        $path = App::getRootPath() . 'api/';
        if (!is_dir($path)) {
            mkdir($path, 0555, true);
        }
        (new Parse([
            'title'=>'接口文档',
            'parse'=>Tp60::class,
            'suffix'=>'',
            'path'=>'',
            'api'=>$path . $module . '.json',
            'html'=>$path . $module . '.html',
        ]))->execute();
    }

}
