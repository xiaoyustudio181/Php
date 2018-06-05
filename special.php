<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<ol>
    <li>
        当前所在文件的绝对路径。__FILE__
        <?php
        var_dump(__FILE__);
        ?>
    </li>
    <li>
        当前所在目录的绝对路径。__DIR__
        <?php
        var_dump(__DIR__);
        ?>
    </li>
    <li>
        返回当前所在目录的绝对路径。getcwd()
        <?php
        $result = getcwd();
        var_dump($result);
        ?>
    </li>
    <li>
        当前所在行数。__LINE__
        <?php
        var_dump(__LINE__);
        ?>
    </li>
    <li>
        本方法签名。__FUNCTION__
        <?php
        function f1()
        {
            var_dump(__FUNCTION__);
        }

        f1();
        ?>
    </li>
    <li>
        检查指定方法是否存在。function_exists($function_name)
        <?php
        $result = function_exists('f1');
        var_dump($result);
        $result = function_exists('f111');
        var_dump($result);
        ?>
    </li>
    <li>
        检查指定类是否存在。class_exists($class_name)
        <?php

        class Person
        {
            private function eat()
            {
            }
        }

        $result = class_exists('Person');
        var_dump($result);
        $result = class_exists('Person2');
        var_dump($result);
        ?>
    </li>
    <li>
        检查指定对象的方法是否存在。method_exists($object,$method_name)
        <?php
        $result = method_exists(new Person(), 'eat');
        var_dump($result);
        $result = method_exists(new Person(), 'eat2');
        var_dump($result);
        ?>
    </li>
    <li>
        检查变量是否定义。isset($var)<br/>
        销毁变量。unset($var)
        <?php
        $var10 = 0;
        $result = isset($var10);//true
        var_dump($result);

        unset($var10);
        $result = isset($var10);//false
        var_dump($result);
        ?>
    </li>
    <li>
        检查变量是否为空。empty($var)
        <?php
        $result = empty($undefined_var);//true
        var_dump($result);

        $result = empty('');//true
        var_dump($result);

        $result = empty(0);//true
        var_dump($result);

        $result = empty(false);//true
        var_dump($result);

        $result = empty([]);//true
        var_dump($result);

        $result = empty(null);//true
        var_dump($result);
        ?>
    </li>
    <li>
        获取变量的值类型。gettype($var)<br/>
        检查变量是否是字符串。is_string($var)<br/>
        检查变量是否是数字。is_numeric($var)<br/>
        检查变量是否是浮点类型。is_float($var)<br/>
        检查变量是否是逻辑类型。is_bool($var)<br/>
        检查变量是否是数组。is_array($var)<br/>
        检查变量是否是NULL。is_null($var)<br/>
        检查变量是否是对象。is_object($var)<br/>

        <?php
        $str = 'abc';
        $num = 1;
        $float = 1.1;
        $bool = true;
        $null = null;
        $arr = [];
        $object = new Person();

        $result = gettype($str);
        var_dump($result);

        $result = gettype($num);
        var_dump($result);

        $result = gettype($float);
        var_dump($result);

        $result = gettype($bool);
        var_dump($result);

        $result = gettype($null);
        var_dump($result);

        $result = gettype($arr);
        var_dump($result);

        $result = gettype($object);
        var_dump($result);

        #++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        $result = is_string($str);
        var_dump($result);

        $result = is_numeric($str);
        var_dump($result);

        $result = is_float($str);
        var_dump($result);

        $result = is_bool($str);
        var_dump($result);

        $result = is_array($str);
        var_dump($result);

        $result = is_null($str);
        var_dump($result);

        $result = is_object($str);
        var_dump($result);
        ?>
    </li>
    <li>
        变量的自动转换。
        <?php
        var_dump(1 == '1');//T
        var_dump(1 === '1');//F
        var_dump('+++++++++++++++++++');
        var_dump(1 == true);//T
        var_dump(1 == false);//F
        var_dump(0 == false);//T
        var_dump(0 == true);//F
        var_dump(1 === true);//F
        var_dump(0 === false);//F
        var_dump('+++++++++++++++++++');
        var_dump('' == false);//T
        var_dump('' === false);//F
        var_dump('' == true);//F
        var_dump('+++++++++++++++++++');
        var_dump(null == false);//T
        var_dump([] == false);//T
        var_dump([] == true);//F
        var_dump([[]] == false);//F
        ?>
    </li>
    <li>
        变量的特殊用法。
        <?php
        $var = 'name';
        $$var = 'peter parker';//用变量的值定义变量
        var_dump($name);


        $var = 'f1';
        $var();//用变量的值调用方法

        $var = 'Person';
        $person1 = new $var();//用变量的值声明对象
        $result = gettype($person1);
        var_dump($result);
        ?>
    </li>
    <li>
        引用变量（变量别名）。
        <?php
        $var1 = 10;
        $var2 =& $var1;//此方法可用于向方法传递引用参数，或在foreach遍历数组时使用引用
        $var1 = 20;
        var_dump($var2);
        ?>
    </li>
    <li>
        常量。无$符，以字符或下划线开头；定义后无法更改或撤销。define()的第三个参数默认false，即对大小写敏感。
        <?php
        define('MYNAME', 'xiaoyu');
        var_dump(MYNAME);

        $result = defined('MYNAME');
        var_dump($result);

        $result = defined('MYNAME2');
        var_dump($result);
        ?>
    </li>
    <li>
        回调函数。通过函数指针调用函数。
        <?php
        function f11($param)
        {
            var_dump(__FUNCTION__ . ", $param");
        }

        function f12($param1, $param2)
        {
            var_dump(__FUNCTION__ . ", $param1, $param2");
        }

        call_user_func('f1');
        call_user_func('f11', 'hello');
        call_user_func('f12', 'hello', 'world');
        call_user_func_array('f12', ['hello', 'world']);
        ?>
    </li>
    <li>
        将数组转化为json字符串。json_encode($array)
        <?php
        $arr = ['result' => 'success', 'msg' => '指定人物的数据', 'data' => ['id' => 2, 'name' => 'peter']];
        $result = json_encode($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        将json字符串转化为数组。json_decode($array)
        <?php
        $str = '{"result":"success","msg":"\u6307\u5b9a\u4eba\u7269\u7684\u6570\u636e","data":{"id":2,"name":"peter"}}';

        $result = json_decode($str);//转化为stdClass
        var_dump($result);

        $result = json_decode($str, true);//转化为数组
        var_dump($result);
        ?>
    </li>
    <li>
        heredoc用法。
        <?php
        $var1 = 'hello';
        echo <<<heredoc1
        <strong>$var1</strong>
        <em>$var1</em>
        <q>$var1</q>
heredoc1;
        unset($var1);
        ?>
    </li>
    <li>
        global 定义全局变量。<br/>
        <?php
        function do_global()
        {
            global $myname;#函数内定义全局变量
            $myname = 'xiaoyu';
            $var1 = 'hello';
            echo "$myname, {$var1}<br />";//双引号内能识别变量名；花括号用于指定变量输出(仅在双引号内有效)。
        }

        do_global();
        echo $myname, " ---- {$GLOBALS['myname']}<br />";//逗号用于分隔要输出的内容。
        #名为 $GLOBALS 的数组中存储所有全局变量，下标(索引)即变量名。
        #在其他函数内也可以访问这个数组，并可直接更新全局变量。
        ?>
    </li>
    <li>

    <li>
        static 保留局部变量值。<br/>
        <?php
        function do_static()
        {
            static $var1 = 1;
            $var1++;
            echo "$var1<br />";
        }

        do_static();
        do_static();
        ?>
    </li>
    <li>
        返回指定范围内的随机整数。
        <?php
        $result = rand();
        var_dump($result);
        $result = rand(1, 10);
        var_dump($result);
        ?>
    </li>
    <li>
        执行命令（若开启新程序，会占用程序进程直到关闭）。exec($cmd)
        <?php
        $cmd='notepad';
        #exec($cmd);
        ?>
    </li>
</ol>
</body>
</html>