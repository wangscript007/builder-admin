<?php


namespace app\api;


class UserResponse
{
    /**
     * @var int 用户ID
     */
    public $id;

    /**
     * @var string 用户名
     */
    public $user;

    /**
     * @var string 昵称
     */
    public $nick;

    /**
     * @var string 头像
     */
    public $avatar;


    public function send()
    {
        return json([
            'id'=>$this->id,
            'user'=>$this->user,
            'nick'=>$this->nick,
            'avatar'=>$this->avatar
        ]);
    }

}
