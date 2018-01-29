<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>基础</title>
</head>
<body>
<!--PhpStorm设置
　　【更换软件字体】[File]=>[Settings]=>[Appearance & Behavior]=>勾选[Override default fonts by (not recommended):]=>调整软件字体和Size(14px).
　　【更换代码字体】[File]=>[Settings]=>[Editor]=>[Colors & Fonts]=>[Font]=>[Save As...]=>命名一个新样式名称=>[OK]=>选择下方代码字体为Source Code Pro Semibold（粗体）=>设置代码尺寸Size(20px)（可使用方向键调整）=>设置代码行间距。
　　【增添代码行号】[File]=>[Settings]=>[Edit]=>[General]=>[Appearance]=>勾选Show line numbers；或可在设置界面左上角的搜索框内搜索show line numbers.
　　【设置代码换行】在代码编辑界面右击左边行号部分，选择Use Soft Wraps.
　　【设置不自动输出一对引号】[File]=>[Settings]=>[Editor]=>[General]=>[Smart Keys]=>取掉[Insert pair quote]前的勾。
　　在设置中可以搜索设置项的名称，例如“Use soft wrap”可以找到含有关键字的设置项。-->
<dl>
    <?php
    switch (2){
        case 1:PhpInfor();break;//PHP相关
        case 2:Basis();break;//PHP基础
        default:break;
    }
    ?>
</dl>
<?php function PhpInfor(){?>
    <!--注释切换：/*/  codes1  /*/  codes2  /**/-->
    <!--heredoc：以 <<<TagName 标记开始，以 TagName; 标记结束。结束标记必须顶头写，不能有缩进和空格；heredoc中的变量不需要用连接符拼接。-->
    <!--
    PHP文件能够包含文本、HTML、CSS以及PHP代码。PHP不能解析路径里的中文。
    一个PHP文件可用return返回一个值，在另外一个页面用include('')调用这个页面，include('')本身将返回这个值。
    PHP代码在服务器上执行，而结果以纯文本(HTML)返回浏览器。
    PHP所有变量对大小写敏感；但PHP所有用户定义的函数名、类名和关键词(如if、else、echo等)对大小写不敏感。
    变量命名规则：变量以$符号开头，名称只能是数字、字母、下划线，不能以数字开头。
    PHP是一门类型松散的语言，我们不必告知PHP变量的数据类型，PHP会根据值自动把变量转换为正确的数据类型，因此没有创建变量的命令，变量在首次赋值时创建。
　　数据类型：字符串、整数、浮点数、逻辑、数组、对象、NULL。
    变量作用域，指变量能够被引用/使用的那部分脚本。PHP三种不同的变量作用域：local(局部)；global(全局)；static(静态)。函数之外声明的变量拥有Global作用域，只能在函数以外进行访问；函数内部声明的变量拥有LOCAL作用域，只能在函数内部进行访问。

    服务器是接收请求并返回服务的机器。localhost后可跟端口号。apache配置文件的Listen后是端口号；DocumentRoot后是默认根目录；DirectoryIndex后是默认优先运行文件，若根目录下没有与之匹配的文件，则会显示根目录。
    在php文件夹下打开命令窗口(空白处Shift+鼠标右键)，输入“php.exe -v”回车，可显示版本号；输入“php.exe -v”回车，显示帮助；输入“php.exe -r "echo 'aa';"”回车，直接执行php代码；输入“php.exe -f c:\(...)\.php”回车，执行.php文件。
    PHP集成环境XAMPP，不建议装C盘(否则容易出现很多问题)。1，安装XAMPP，打开面板，开启Apache、MySQL、FileZilla前三项服务；2，打开XAMPP的安装根目录，找到目录htdocs，将里面所有文件删除，放入要测试.php文件；3，打开XAMPP面板，点击Apache后面的Admin，进入服务器，选择打开要测试的文件。
　　for循环的执行顺序：
    for(初始;判断;执行2){
    　　执行1;
    }
　　初始—>判断—>执行1—>执行2
　　判断—>执行1—>执行2
　　判断—>执行1—>执行2
　　······
    -->
    <dd>
        <?php
        $var1='heredoc';
        echo <<<heredoc1
        <strong>$var1 1</strong>
        <em>$var1 2</em>
        <q>$var1 3</q>
heredoc1;
        unset($var1);
        ?>
    </dd>
    <dt>全局变量 $_SERVER 键对值：</dt>
    <dd>
        <?php foreach ($_SERVER as $key=>$item){?>
            <b><?=$key?></b> ====> <?=$item?><br />
        <?php } ?>
    </dd>
    <dt>phpinfo()返回PHP所有信息：</dt>
    <dd><?php phpinfo();?></dd>
<?php }?>
<?php function Basis(){?>
    <dt>使用 global 定义全局变量。</dt>
    <dd>
        <?php
        function variable1(){//此为嵌套函数，在父函数外部必须先调用父函数才能调用此函数。
            global $global_1;#函数内定义全局变量
            $global_1='global variable 1';
            $local_1='local variable 1';
            echo "$global_1<br />{$local_1}<br />";
            //双引号内能识别变量名；花括号用于指定变量输出(仅在双引号内有效)。
        }
        variable1();
        $global_1='another variable';//非variable1()内的变量，只是同名。
        echo $global_1,"<br />{$GLOBALS['global_1']}<br />";//逗号用于分隔要输出的内容。
        #名为 $GLOBALS 的数组中存储所有全局变量，下标(索引)即变量名。
        #在其他函数内也可以访问这个数组，并可直接更新全局变量。
        ?>
    </dd>
    <dt>使用 static 保留局部变量值。</dt>
    <dd>
        <?php
        function variable2() {
            static $Resultic_1=0;
            $normal_1=0;
            echo 'static '.$Resultic_1.' --- normal '.$normal_1.'<br />';//.用于连接字符串
            $Resultic_1++;
            $normal_1++;
        }
        variable2();
        variable2();
        variable2();
        ?>
    </dd>
    <dt>echo()，语言结构(非函数)，输出一个或多个字符串。</dt>
    <dt>gettype()，返回变量的类型。</dt>
    <dt>var_dump()，打印变量的相关信息。</dt>
    <dt>print_r()，打印关于变量的易于理解的信息。</dt>
    <dt>empty()，检测变量是否为空，返回布尔值。</dt>
    <dt>is_int(), is_float(), is_string(), is_bool(), is_array(), is_null()，检测变量是否为指定类型，返回布尔值。</dt>
    <dt>unset()，销毁指定变量。</dt>
    <dt>isset()，检测变量是否已设置，返回布尔值。</dt>
    <dd>
        <?php
        $var1=5;//整型
        $var2=1.2;//浮点型
        $var3='5';//字符串
        $var4="b";//字符串
        $var5=false;//布尔
        $var6=null;//NULL
        $var7=[$var1,$var2,$var3,$var4];//数组(元素可以是任意类型)
        $var8=['key2'=>$var5,56=>$var6,$var7];//[]等价于array()
        var_dump($var1);echo $var1,' -- ',gettype($var1),'<br />';
        var_dump($var2);echo $var2,' -- ',gettype($var2),'<br />';
        var_dump($var3);echo $var3,' -- ',gettype($var3),'<br />';
        var_dump($var4);echo $var4,' -- ',gettype($var4),'<br />';
        var_dump($var5);echo $var5,' -- ',gettype($var5),'<br />';
        var_dump($var6);echo $var6,' -- ',gettype($var6),'<br />';
        var_dump($var7);echo '<br />';print_r($var7);echo ' -- ',gettype($var7),'<br />';
        var_dump($var8);echo '<br />';print_r($var8);echo ' -- ',gettype($var8),'<br />';
        echo gettype(is_int($var7[0])),':',is_int($var7[0]),'<br />';//boolean:1
        echo gettype(is_float($var2)),':',is_float($var2),'<br />';//boolean:1
        echo gettype(is_string($var3)),':',is_string($var3),'<br />';//boolean:1
        echo gettype(is_null($var6)),':',is_null($var6),'<br />';//boolean:1
        echo gettype(is_bool($var8['key2'])),':',is_bool($var8['key2']),'<br />';//boolean:1
        echo gettype(is_array($var7)),':',is_array($var7),'<br />';//boolean:1
        echo gettype(isset($what)),':',isset($what),'<br />';//boolean:
        echo gettype(empty($what)),':',empty($what),'<br />';//boolean:1
        echo gettype(isset($var6)),':',isset($var6),'<br />';//boolean:
        echo gettype(empty($var6)),':',empty($var6),'<br />';//boolean:1
        echo gettype(isset($var8[57])),':',isset($var8[57]),'<br />';//boolean:1
        echo gettype(empty($var8[57])),':',empty($var8[57]),'<br />';//boolean:
        unset($var8[57]);
        echo gettype(isset($var8[57])),':',isset($var8[57]),'<br />';//boolean:
        echo gettype(empty($var8[57])),':',empty($var8[57]),'<br />';//boolean:1
        echo gettype(empty($var7)),':',empty($var7),'<br />';//boolean:
        echo gettype(isset($var8)),':',isset($var8),'<br />';//boolean:1
        echo gettype(empty($var8)),':',empty($var8),'<br />';//boolean:
        unset($var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8);
        echo gettype(empty($var8)),':',empty($var8),'<br />';//boolean:1
        ?>
    </dd>
    <dt>变量类型的自动转换</dt>
    <dd>
        <?php
        if(1=='1')echo 'Right.<br />';else echo 'Wrong.<br />';#R
        if(1==='1')echo 'Right.<br />';else echo 'Wrong.<br />';#W
        if(1==true)echo 'Right.<br />';else echo 'Wrong.<br />';#R
        if(0==true)echo 'Right.<br />';else echo 'Wrong.<br />';#W
        if(1==false)echo 'Right.<br />';else echo 'Wrong.<br />';#W
        if(0==false)echo 'Right.<br />';else echo 'Wrong.<br />';#R
        if(''==false)echo 'Right.<br />';else echo 'Wrong.<br />';#R
        if(''==true)echo 'Right.<br />';else echo 'Wrong.<br />';#W
        if(''===false)echo 'Right.<br />';else echo 'Wrong.<br />';#W
        if(null==true)echo 'Right.<br />';else echo 'Wrong.<br />';#W
        if(null==false)echo 'Right.<br />';else echo 'Wrong.<br />';#R
        if([]==true)echo 'Right.<br />';else echo 'Wrong.<br />';#W
        if([]==false)echo 'Right.<br />';else echo 'Wrong.<br />';#R
        if([[]]==false)echo 'Right.<br />';else echo 'Wrong.<br />';#W
        $var=0;
        if(!$var)echo 1;else echo 0;
        $var=null;
        if(!$var)echo 1;else echo 0;
        $var='';
        if(!$var)echo 1;else echo 0;
        $var=[];
        if(!$var)echo 1;else echo 0;
        $var=[[]];
        if(!$var)echo 1;else echo 0;echo null;
        ?>
    </dd>
    <dt>用变量的值命名新变量。</dt>
    <dd>
        <?php
        $var9='myname';
        $$var9='Shea';
        echo $myname,'<br />';
        echo gettype(isset($myname)),':',isset($myname),'<br />';//boolean:1
        unset($$var9,$var9);
        echo gettype(isset($myname)),':',isset($myname);//boolean:
        ?>
    </dd>
    <dt>引用变量：$a=&$b，$b 即 $a 的别名，两者指向同一物。可用unset()删除别名。</dt>
    <dd>
        <?php
        $var1=10;
        $var2=&$var1;
        echo $var1,' --- ',$var2,'<br />';
        $var1=20;
        echo $var1,' --- ',$var2,'<br />';
        $var2=30;
        echo $var1,' --- ',$var2,'<br />';
        unset($var1);
        echo $var2,'<br />';
        unset($var2);
        ?>
    </dd>
    <dt>普通参数与引用参数。</dt>
    <dd>
        <?php
        function add($param){
            $param+=50;
        }
        function add2(&$param){
            $param+=50;
        }
        $var1=100;
        add($var1);echo $var1,'<br />';
        add2($var1);echo $var1;unset($var1);
        ?>
    </dd>
    <dt>常量。无$符，以字符或下划线开头；定义后无法更改或撤销，贯穿整个脚本；define()的第三个参数默认false(对大小写敏感)。</dt>
    <dd>
        <?php
        define("_CONS1", "constant 1",true);
        echo _cons1,'<br />';
        var_dump(_CONS1);echo '<br />';
        var_dump(defined('_CONS1'));echo '<br />';
        var_dump(defined('_CONS2'));
        ?>
    </dd>
    <dt>回调函数：通过函数指针调用的函数。</dt>
    <dt>call_user_func()，参数1为函数名，其他参数是该函数的参数。</dt>
    <dt>call_user_func_array()，参数1为函数名，参数2是含该函数参数的数组。</dt>
    <dd>
        <?php
        function say($arg1,$arg2){
            echo $arg1,' ',$arg2,'<br />';
        }
        call_user_func('say','Hello','world');
        call_user_func_array('say',['Hello','world']);
        ?>
    </dd>
<?php }?>
</body>
</html>