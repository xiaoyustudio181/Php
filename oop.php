<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>面向对象</title>
</head>
<body>
<dl>
    <dt>▲类常量，字段，构造与析构函数，外部静态调用常量。</dt>
    <dd><?php
        class Robot01{
            const Name="Robot";
            static $Tpye="01";
            protected $gender="Male";//不能在外部调用
            private $secret="????";//不能在外部调用，也不能在子类调用(除非用方法返回)。
            static function Laugh(){
                echo 'Hahaha...<br />';
            }
            public $alias='Default alias';
            //自PHP5.3.3起在命名空间中与类名同名的方法不再作为构造函数，但不影响不在命名空间中的类。
            public function __construct($alias='')//构造函数
            {
                if(!empty($alias))$this->alias=$alias;
                echo self::Name,self::$Tpye,'. ',$this->alias,'.<br />';
            }
            public function Greeting(){//用于被继承重写
                echo 'Hello. ';
            }
            public function getGender(){//获取属性值
                return $this->gender;
            }
            public function setGender($param){//设置属性值
                $this->gender=$param;
            }
            function __destruct(){//析构函数，先生成的对象后析构。
                echo "I'm dead.<br />";
            }
        }
        $robot1=new Robot01();
        $robot2=new Robot01('Smith');
        Robot01::Laugh();//调用静态方法
        $robot2->alias2='R2';//外部新增字段
        echo Robot01::Name,Robot01::$Tpye,'<br />';//调用常量与静态字段
        echo "Alias: {$robot1->alias}.<br />";
        echo "Alias: {$robot2->alias}. Alias2: {$robot2->alias2}.<br />";//静态调用常量
        unset($robot1,$robot2);//此时析构
        ?>
    </dd>
    <dt>▲判断调用者是否为实例化的对象。</dt>
    <dd>
        <?php
        class TypeA
        {
            function check(){//检查本类是否实例化，根据情况输出不同的结果。
                if (isset($this))
                    echo get_class($this),'<br />' ;
                else
                    echo "It's not specific.<br />";
            }
        }
        class TypeB
        {
            static function check(){
                TypeA::check();//静态调用
            }
        }
        $a=new TypeA();
        $b=new TypeB();
        $a->check();
        $b->check();
        TypeA::check();
        TypeB::check();

        $c=new $b;//TypeB
        $c->check();
        var_dump($c==$b);//true
        echo '<br />';
        var_dump($c===$b);//false
        echo '<br />';
        unset($a,$b,$c);?>
    </dd>
    <dt>▲类的继承。子类可以比父类更公有，不能更私有。</dt>
    <dt>若子类修改父类私有属性为公有并重写值，也只会输出父类的值，不会输出子类修改的值。</dt>
    <dd>
        <?php
        class Robot02 extends Robot01
        {
            function Greeting(){//修改父类方法
                parent::Greeting();//调用父类本身的方法
                echo "It's a nice day. I'm {$this->gender}.<br />" ;
            }
        }
        $robot=new Robot02();
        $robot->Greeting();
        unset($robot);?>
    </dd>
    <dt>▲继承抽象类，子类必须定义抽象类中的所有抽象方法，且方法的调用方式必须完全一致。</dt>
    <dt>这些方法的访问控制要和父类中一样，或者更宽松。</dt>
    <dd>
        <?php
        abstract class Person{
            abstract protected function Hunt();
            abstract protected function Eat();
            abstract protected function Sleep();
        }
        class Person1 extends Person{
            public function Hunt(){
                echo "I hunt tigers.<br />";
            }
            public function Eat(){
                echo "I eat tigers.<br />";
            }
            public function Sleep(){
                echo "I sleep on the tree.<br />";
            }
        }
        class Person2 extends Person{
            public function Hunt(){
                echo "I hunt wolves.<br />";
            }
            public function Eat(){
                echo "I eat wolves.<br />";
            }
            public function Sleep(){
                echo "I sleep on the ground.<br />";
            }
        }
        $p1=new Person1();
        $p2=new Person2();

        $p1->Hunt();
        $p1->Eat();
        $p1->Sleep();

        $p2->Hunt();
        $p2->Eat();
        $p2->Sleep();
        unset($p1,$p2);
        ?>
    </dd>
    <dt>▲接口所有的方法都必须是空的，必须是公有的。类实现接口，定义方法必须完全一致。</dt>
    <dd>
        <?php
        interface Player{
            public function Start();
            public function Next();
            public function Previous();
            public function Stop();
        }
        class Player1 implements Player{
            public function Start(){
                echo 'Started.<br />';
            }
            public function Next(){
                echo 'Next.<br />';
            }
            public function Previous(){
                echo 'Previous.<br />';
            }
            public function Stop(){
                echo 'Stopped.<br />';
            }
        }
        $player=new Player1();
        $player->Start();
        $player->Next();
        $player->Previous();
        $player->Stop();
        unset($player); ?>
    </dd>
    <dt>▲复用。</dt>
    <dd>
        <?php
        trait Common1{//trait可使用多个，用逗号隔开
            public $param1="USA";
            function __construct()
            {
                echo "I exist.<br />";
            }
            function Say(){
                echo 'Hello.<br />';
            }
            function __destruct()
            {
                echo "I'm gone.<br />";
            }
        }
        class Obj1{
            use Common1;
        }
        $obj=new Obj1();
        echo $obj->param1,"<br />";
        $obj->Say();
        unset($obj);
        ?>
    </dd>
    <dt>▲异常处理。</a></dt>
    <dd>
        <?php
        function ExceptionTest(){
            throw new Exception('Oops! There has been an accident. ',9);//抛出异常
        }
        try{
            ExceptionTest();
        }catch(Exception $e){
            echo $e->getMessage(),'Error-Code: ',$e->getCode(),'<br />';
        }
        ?>
    </dd>
    <dt>▲异常类的继承。</dt>
    <dd>
        <?php
        class e1Exception extends Exception{}//继承异常基类e1
        class e2Exception extends Exception{}//继承异常基类e2
        function ExceptionTest2(){//有异常的方法
            try{
                throw new e1Exception('e1 occurred. ');
            }catch (e1Exception $e1){
                echo $e1->getMessage(),'It has been solved.<br />';
            }
            try{
                throw new e2Exception('e2 occurred. ');
            }catch (e2Exception $e2){
                echo $e2->getMessage(),'It has not been solved.<br />';
                throw new Exception($e2->getMessage());//e2未解决异常，则抛出新异常（由异常基类获取）
            }
        }
        try{
            ExceptionTest2();
        }catch (Exception $e){
            echo $e->getMessage(),'It has been solved by base.';
        }
        ?>
    </dd>
</dl>
</body>
</html>