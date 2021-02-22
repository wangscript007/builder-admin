<?php


namespace app\controller;


use app\BaseController;

class Uploads extends BaseController
{
    public function index()
    {
        return json(['location'=>'/upload/1.jpg']);
    }

}