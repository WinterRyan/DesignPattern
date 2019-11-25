<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/25 11:33
 */

namespace Component;

/**
 * Class Component
 * 使用场景:
 * 1. 维护和展示部分-整体关系的场景:树形菜单,文件和文件夹管理等
 * 2. 从一个整体中能独立出部分模块或功能的场景
 */
abstract class Component {
    private $parent;

    public function doSomething($string)
    {
        var_dump("this is ".$string." doing !");
    }

    public function setParent($component)
    {
        $this->parent = $component;
    }

    public function getParent()
    {
        return $this->parent;
    }
}

class Composite extends Component {
    private $componentList;

    public function add(Component $component)
    {
        $this->componentList[get_class($component)."".rand(1,10)] = $component;
    }

    //todo
    public function remove(Component $component)
    {
        unset($this->componentList[get_class($component)]);
    }

    public function getChildren()
    {
        return $this->componentList;
    }
}

class Leaf extends Component {}

class Client {
    public function test()
    {
        /**
         * 这里是手动创建树形结构,项目中是从数据库中读取并创建
         */
        $root = new Composite();
        $root->doSomething("root");

        $branch = new Composite();
        $leaf1 = new Leaf();
        $leaf2 = new Leaf();

        $branch->add($leaf1);
        $leaf1->setParent("branch");
        $branch->add($leaf2);
        $leaf2->setParent("branch");

        $root->add($branch);
        $branch->setParent("root");

        $this->showTree($root);
    }

    public function showTree(Composite $root)
    {
        foreach ($root->getChildren() as $k=>$v) {
            if ($v instanceof Leaf) {
                $v->doSomething("leaf");
                var_dump($v->getParent());
            } else {
                var_dump($v->getParent());
                $this->showTree($v);
            }
        }
    }
}

$Client = new Client();
$Client->test();