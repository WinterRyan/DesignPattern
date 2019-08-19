<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/12 14:23
 */
namespace CommonProxy;

interface IGamePlayer {
    public function login($user, $pwd);

    public function killBoss();

    public function upgrade();
}

class GamePlayer implements IGamePlayer {
    private $name;

    public function __construct(IGamePlayer $gamePlayer, $name)
    {
        //if not proxy class instance ,can not make role
        $classname = get_class($gamePlayer);
        if (strpos($classname, 'Proxy') === false) {
            echo "can not make role";
            die;
        } else {
            $this->name = $name;
        }
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

    public function __construct($name)
    {
        $this->gamePlayer = new GamePlayer($this, $name);
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
        $this->bill();
    }

    private function bill()
    {
        var_dump("this bill is 5.00$ !!!");
    }
}

$proxy = new GamePlayerProxy('张三');
$proxy->login('zhangsan', 'pwd');
$proxy->killBoss();
$proxy->upgrade();