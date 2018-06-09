<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<ol>
    <li>
        自定义计时方法，获取当前时间（结束时间-开始时间=消耗时间）。get_time()
        <?php
        $begin = get_time();//计时开始
        ?>
    </li>
    <li>
        设置时间区域。date_default_timezone_set("Asia/Shanghai")
        <?php
        date_default_timezone_set('Asia/Shanghai');
        ?>
    </li>
    <li>
        获取现在时间。date($format)
    </li>
    <li>
        常用输出格式。Y-m-d H:i:s
        <?php
        var_dump(date('Y-m-d H:i:s'));
        ?>
    </li>
    <li>
        年。Y(4) y(2)
        <?php
        var_dump(date('Y'));
        var_dump(date('y'));
        ?>
    </li>
    <li>
        月。m(有前缀0) n(无前缀0)
        <?php
        var_dump(date('m'));
        var_dump(date('n'));
        ?>
    </li>
    <li>
        日。d(有前缀0) j(无前缀0)
        <?php
        var_dump(date('d'));
        var_dump(date('j'));
        ?>
    </li>
    <li>
        时。H(24,有前缀0) G(24,无前缀0)
        <?php
        var_dump(date('H'));
        var_dump(date('G'));
        ?>
    </li>
    <li>
        时。h(12,有前缀0) g(12,无前缀0)
        <?php
        var_dump(date('h'));
        var_dump(date('g'));
        ?>
    </li>
    <li>
        分。i
        <?php
        var_dump(date('i'));
        ?>
    </li>
    <li>
        秒。s
        <?php
        var_dump(date('s'));
        ?>
    </li>
    <li>
        上午下午标识。a(am,pm) A(AM,PM)
        <?php
        var_dump(date('a'));
        var_dump(date('A'));
        ?>
    </li>
    <li>
        今年是闰年？L
        <?php
        var_dump(date('L'));
        ?>
    </li>
    <li>
        今天是今年的第几天。z
        <?php
        var_dump(date('z'));
        ?>
    </li>
    <li>
        本月总天数。t
        <?php
        var_dump(date('t'));
        ?>
    </li>
    <li>
        今日的英文表示。S(英文后缀) jS(日+英文后缀)
        <?php
        var_dump(date('S'));
        var_dump(date('jS'));
        ?>
    </li>
    <li>
        本月。F(完整英文) M(三字母简写)
        <?php
        var_dump(date('F'));
        var_dump(date('M'));
        ?>
    </li>
    <li>
        今天星期几。w(数字0~6) l(完整英文) D(三字母简写)
        <?php
        var_dump(date('w'));
        var_dump(date('l'));
        var_dump(date('D'));
        ?>
    </li>
    <li>
        当前的Unix时间戳（单位：秒）。time()
        <?php
        $result = time();
        var_dump($result);
        ?>
    </li>
    <li>
        自定义Unix时间戳。mktime($hour, $minute, $second, $month, $day, $year)<br/>
        <?php
        $mytime = mktime(9, 12, 31, 4, 19, 1993);//时分秒，月日年
        var_dump(date("Y-m-d h:i:s", $mytime));
        ?>
    </li>
    <li>
        解析英文为Unix时间戳。strtotime($string)
        <?php
        $mytime = strtotime("now");
        var_dump('now', date("Y-m-d H:i:s", $mytime));

        $mytime = strtotime("yesterday");
        var_dump('yesterday', date("Y-m-d H:i:s", $mytime));

        $mytime = strtotime("today");
        var_dump('today', date("Y-m-d H:i:s", $mytime));

        $mytime = strtotime("tomorrow");
        var_dump('tomorrow', date("Y-m-d H:i:s", $mytime));

        $mytime = strtotime("saturday");
        var_dump('saturday', date("Y-m-d H:i:s", $mytime));

        $mytime = strtotime("next saturday");
        var_dump('next saturday', date("Y-m-d H:i:s", $mytime));

        $mytime = strtotime("last monday");
        var_dump('last monday', date("Y-m-d H:i:s", $mytime));

        $mytime = strtotime("+3 months");
        var_dump('+3 months', date("Y-m-d H:i:s", $mytime));
        ?>
    </li>
    <li>
        时间计算
        <?php
        $target = strtotime("December 31");
        $remain = ceil(($target - time()) / 60 / 60 / 24);
        var_dump("今天距离12月31日还有 $remain 天。");
        ?>
    </li>
</ol>
</body>
<?php
echo "运行耗时：" . (get_time() - $begin) . " (秒)";//计时完毕（测试计时方法）
/*
 * @describe 获取当前系统时间，返回float格式，单位：秒
 * */
function get_time()
{
    date_default_timezone_set('Asia/Shanghai');
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

?>
</html>