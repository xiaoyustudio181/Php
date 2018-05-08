<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<ol>
    <li>
        date_default_timezone_set("Asia/Shanghai")<br/>
        获取现在日期时间。date($format)<br/>
        <?php
        echo date('Y-m-d H:i:s'), "<br />";#月m有前缀0，月n无前缀0
        echo date('y-m-d H:i:s'), "<br />";#日d有前缀0，日j无前缀0
        #时H(00~23)有前缀0；时G(0~23)无前缀0；时h(01~12)有前缀0，时g(1~12)无前缀0；a(am,pm)，A(AM,PM)
        echo date('今年是否是闰年(1是 0非)？ L'), "<br />";
        echo date('今天是一年中的第 z 天。'), "<br />";
        echo date('当前月份总天数：t。'), "<br />";
        echo date('今日的英文后缀：S。(jS)'), "<br />";
        echo date('本月完整英文：F；三字母英文：M。'), "<br />";
        echo date('今日星期几的数字(0~6)：w；完整英文：l；三字母英文：D。'), "<br />";
        ?>
    </li>
    <li>
        当前的Unix时间戳（单位：秒）。time()
        <?php
        $result=time();
        var_dump($result);
        ?>
    </li>
    <li>
        创建一个日期的Unix时间戳。mktime($hour,$minute,$second,$month,$day,$year)<br/>
        <?php
        $var=mktime(9, 12, 31, 4, 19, 1993);//时分秒，月日年
        echo date("Y-m-d h:i:s", $var);
        ?>
    </li>
    <li>
        将英文日期时间解析为Unix时间戳。strtotime($string)
        <?php

        echo date("Y-m-d h:i:s"), '<br />';
        echo date("Y-m-d h:i:s", time()), '<br />';

        $t = strtotime("today");
        echo date("Y-m-d", $t) . '<br />';

        $t = strtotime("yesterday");
        echo date("Y-m-d", $t) . '<br />';

        $t = strtotime("tomorrow");
        echo date("Y-m-d", $t) . '<br />';

        $t = strtotime("saturday");
        echo date("Y-m-d", $t) . '<br />';

        $t = strtotime("next saturday");
        echo date("Y-m-d", $t) . '<br />';

        $t = strtotime("last monday");
        echo date("Y-m-d", $t) . '<br />';

        $t = strtotime("+3 months");
        echo date("Y-m-d", $t) . '<br /><br />';

        $StartDate = strtotime("today");
        $EndDate = strtotime("+6 days", $StartDate);
        while ($StartDate < $EndDate) {
            echo date("n月j日", $StartDate), "<br />";
            $StartDate = strtotime("+1 day", $StartDate);//递增
        }
        echo '<br />';

        $Target = strtotime("December 31");
        $Remain = ceil(($Target - time()) / 60 / 60 / 24);
        echo "距12月31日还有：", $Remain, " 天。";

        echo '<br /><br />';
        echo strtotime('now'), '<br />';
        echo strtotime('+1 seconds');
        ?>
    </li>
</ol>
</body>
</html>