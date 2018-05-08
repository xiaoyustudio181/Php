<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<ol>
    <li>
        类常量，字段，构造与析构函数，外部静态调用常量。<br/>
        <?php

        class Robot01
        {

            const NAME = "Robot";//类的常量

            static $Type = "01";//静态字段

            protected $gender = "male";//受保护字段，在外部无法调用，可在子类调用

            private $secret = "private variable";//私有字段，在外部无法调用，也不能在子类调用（除非用方法返回）

            /*
             * @describe 静态方法
             * */
            static function Laugh()
            {
                echo 'Hahaha.<br />';
            }

            public $alias = 'Default';//公有字段

            //自PHP5.3.3起在命名空间中与类名同名的方法不再作为构造函数，但不影响不在命名空间中的类。

            /*
             * @describe 构造函数：自报名称、型号、别名。
             * @param $alias 别名
            */
            public function __construct($alias = '')
            {
                if (!empty($alias)) {
                    $this->alias = $alias;
                }
                echo self::NAME, self::$Type, '-', $this->alias, ' has been constructed.<br />';
            }

            /*
             * @describe 公有方法：问候
             * */
            public function Greeting()
            {//用于被继承重写
                echo 'Hello. ';
            }

            /*
             * @describe 获取性别
             * @return 性别
             * */
            public function getGender()
            {//获取属性值
                return $this->gender;
            }

            /*
             * @describe 设置性别
             * @param $param 性别
             * */
            public function setGender($param)
            {
                $this->gender = $param;
            }

            /*
             * @describe 析构函数（销毁时执行。先生成的对象后析构）
             * */
            function __destruct()
            {
                echo self::NAME, self::$Type, '-', $this->alias, ' destructed.<br/>';
            }
        }

        Robot01::Laugh();//调用静态方法

        $robot1 = new Robot01();//无参实例化

        $robot2 = new Robot01('Smith');//有参实例化

        $robot2->alias2 = 'Titanic';//外部新增字段

        echo Robot01::NAME, Robot01::$Type, '<br />';//调用常量与静态字段

        echo "{$robot1->alias}<br />";

        echo "{$robot2->alias} ({$robot2->alias2})<br />";//静态调用常量

        unset($robot1, $robot2);//销毁时，自动析构
        ?>
    </li>
    <li>
        判断调用者是否为实例化的对象。<br/>
        <?php

        class TypeA
        {
            /*
             * @describe 检查本类是否实例化。若已实例化，返回类名。
             * */
            public function check()
            {
                if (isset($this)) {
                    echo get_class($this), '<br />';
                } else {
                    echo "no class<br />";
                }
            }
        }

        class TypeB
        {
            function check()
            {
                TypeA::check();//静态调用
//                $a=new TypeA();
//                $a->check();
            }
        }

        $a = new TypeA();
        $b = new TypeB();
        $c = new $b;

        $a->check();
        $b->check();
        $c->check();
        TypeA::check();
        TypeB::check();

        var_dump($c == $b);//true
        var_dump($c === $b);//false
        unset($a, $b, $c);
        ?>
    </li>
    <li>
        普通类的继承：子类可以比父类更公有，不能更私有。<br/>
        若子类修改父类私有属性为公有并重写值，也只会输出父类的值，不会输出子类修改的值。<br/>
        <?php

        class Robot02 extends Robot01
        {
            function Greeting()
            {//修改父类方法
                parent::Greeting();//调用父类本身的方法
                echo self::NAME, self::$Type, '-', $this->alias, ' say hi to you.<br/>';
            }
        }

        $robot = new Robot02();
        $robot->Greeting();
        unset($robot);
        ?>
    </li>
    <li>
        继承抽象类：子类必须定义抽象类中的所有抽象方法，且方法的调用方式必须完全一致。<br/>
        这些方法的访问控制要和父类中一样，或者更宽松。<br/>
        <?php

        abstract class Person
        {
            abstract protected function Hunt();

            abstract protected function Eat();

            abstract protected function Sleep();
        }

        class Person1 extends Person
        {
            public function Hunt()
            {
                echo "I hunt tigers.<br />";
            }

            public function Eat()
            {
                echo "I eat tigers.<br />";
            }

            public function Sleep()
            {
                echo "I sleep on the tree.<br />";
            }
        }

        class Person2 extends Person
        {
            public function Hunt()
            {
                echo "I hunt wolves.<br />";
            }

            public function Eat()
            {
                echo "I eat wolves.<br />";
            }

            public function Sleep()
            {
                echo "I sleep on the ground.<br />";
            }
        }

        $p1 = new Person1();
        $p2 = new Person2();

        $p1->Hunt();
        $p1->Eat();
        $p1->Sleep();

        $p2->Hunt();
        $p2->Eat();
        $p2->Sleep();
        unset($p1, $p2);
        ?>
    </li>
    <li>
        接口：所有的方法都必须是空的，必须是公有的。类实现接口，定义方法必须完全一致。<br/>
        <?php

        interface Player
        {
            public function Start();

            public function Next();

            public function Previous();

            public function Stop();
        }

        class Player1 implements Player
        {
            public function Start()
            {
                echo 'Started.<br />';
            }

            public function Next()
            {
                echo 'Next.<br />';
            }

            public function Previous()
            {
                echo 'Previous.<br />';
            }

            public function Stop()
            {
                echo 'Stopped.<br />';
            }
        }

        $player = new Player1();
        $player->Start();
        $player->Next();
        $player->Previous();
        $player->Stop();
        unset($player);
        ?>
    </li>
    <li>
        复用。<br/>
        <?php

        trait Common1
        {//trait可使用多个，用逗号隔开
            public $param1 = "USA";

            function __construct()
            {
                echo "I exist.<br />";
            }

            function Say()
            {
                echo 'Hello.<br />';
            }

            function __destruct()
            {
                echo "I'm gone.<br />";
            }
        }

        class Obj1
        {
            use Common1;
        }

        $obj = new Obj1();
        echo $obj->param1, "<br />";
        $obj->Say();
        unset($obj);
        ?>
    </li>
    <li>
        异常处理。<br/>
        <?php
        try {
            throw new Exception('Oops! There has been an accident. ', 9);//抛出异常
        } catch (Exception $e) {
            echo $e->getMessage(), 'Error-Code: ', $e->getCode(), '<br />';
        }
        ?>
    </li>
    <li>
        异常类的继承。<br/>
        <?php

        class Exception1 extends Exception
        {
        }

        class Exception2 extends Exception
        {
        }

        function ExceptionTest()
        {//有异常的方法
            try {
                throw new Exception1('Exception1 occurred. ');
            } catch (Exception1 $e1) {
                echo $e1->getMessage(), 'It has been solved.<br />';
            }
            try {
                throw new Exception2('Exception2 occurred. ');
            } catch (Exception2 $e2) {
                echo $e2->getMessage(), 'It has not been solved.<br />';
                throw new Exception($e2->getMessage());//e2未解决异常，则抛出新异常（由异常基类获取）
            }
        }

        try {
            ExceptionTest();
        } catch (Exception $e) {
            echo $e->getMessage(), 'It has been solved. I am boss.';
        }
        ?>
    </li>
</ol>
</body>
</html>