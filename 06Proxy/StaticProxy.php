<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/9 18:01
 */
namespace StaticProxy;

interface IGamePlayer {
    public function login($user, $pwd);

    public function killBoss();

    public function upgrade();
}

class GamePlayer implements IGamePlayer {
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function login($user, $pwd)
    {
        var_dump("this is user:".$user." login,success for username:".$this->name);
    }

    public function killBoss()
    {
        var_dump("this is $this->name killing boss");
    }

    public function upgrade()
    {
        var_dump("username: $this->name upgrade once again");
    }
}

class GamePlayerProxy implements IGamePlayer {
    private $gamePlayer;

    public function __construct(IGamePlayer $gamePlayer)
    {
        $this->gamePlayer = $gamePlayer;
    }

    public function login($user, $pwd)
    {
        $this->gamePlayer->login($user, $pwd);
    }

    public function killBoss()
    {
        $this->gamePlayer->killBoss();
    }

    public function upgrade()
    {
        $this->gamePlayer->upgrade();
    }
}

$player = new GamePlayer('张三');
$proxy = new GamePlayerProxy($player);
$proxy->login('zhangsan', 'pwd');
$proxy->killBoss();
$proxy->upgrade();