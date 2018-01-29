<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>小练习</title>
</head>
<body>
    <pre style="font-size:18px">
    <?php
    echo '<br />';
    for($a=1;$a<=9;$a++){
        for($b=1;$b<=$a;$b++){
            echo $b."×".$a."=".$a*$b."	";
            if($a==$b)echo '<br />';
        }
    }
    ?>
    </pre>
<hr />
<table width="500px" height="200px" border="1"  cellpadding="0" cellspacing="0">
    <?php
        $x=9;//最大被乘数
        $y=9;//最大乘数
        for($a=1;$a<=($x+1);$a++){//行
            echo '<tr>';
    for($b=1;$b<=($y+1);$b++){//列
    if($a==1&&$b==1){//第一格
    echo '<td align="center" width="10%" height="10%" bgcolor="gray">&nbsp;</td>';
    }elseif($b!==1&&$a==1){//第一行（除了第一格）
    echo '<td align="center" width="10%" height="10%">'.($b-1).'</td>';
    }elseif($a!=1&&$b==1){//第一列（除了第一格）
    echo '<td align="center" width="10%" height="10%">'.($a-1).'</td>';
    }elseif($b<=$a){//相乘结果
    echo '<td align="center" width="10%" height="10%">'.($a-1)*($b-1).'</td>';
    }else echo '<td width="">&nbsp;</td>';//空白格子
    }
    echo '</tr>';
    }
    ?>
</table>
<hr />
输出100以内(不含100)能被3整除的所有整数。<br />
<?php
    for($a=0;$a<100;$a++){
        if($a%3==0)echo $a,', ';
    }
    ?>
<hr /> 输出100以内(不含100)能被3整除且个位数为6的所有整数。<br />
<?php
    for($a=0;$a<100;$a++){
        if($a%3==0&&$a%10==6)echo $a,',';
    }
    ?>
<hr />输出100以内(不含100，不含66)能被3整除且个位数为6的所有整数。<br />
<?php
    for($a=0;$a<100;$a++){
        if($a%3==0&&$a%10==6&&$a!=66)echo $a,',';
    }
    ?>
<hr />输出10000以内(不含1000到5000的数)能被3整除且个位数为6的所有整数，且每输出10个数换一行。<br />
<?php
    for($a=0,$n=0;$a<10000;$a++){
        if($a%3==0&&$a%10==6&&$a!=1000&&$a!=5000){
            $n++;
            echo $a,',';
            if($n==10){
                echo '<br />';
$n=0;
}
}
}
?>
<hr />用表格输出10000以内(不含1000到5000的数)能被3整除且个位数为6的所有整数，且每输出10个数换一行。<br />
<table width="500px" border="1">
    <?php
        for($a=0,$n=0,$n2=0;$a<10000;$a++){
            if($a%3==0&&$a%10==6&&$a!=1000&&$a!=5000){
                $n2++;
                if($n++==0)echo '<tr>';
    echo '<td width="10%" align="center">',$a,'</td>';
    if($n==10){
    echo '</tr>';
    $n=0;
    }
    }
    }
    echo str_repeat('<td width="10%">&nbsp;</td>',10-$n2%10);//补足最后几个空格子
    echo '</tr>';//最后一个</tr>在循环结束时尚未输出
    ?>
</table>
<hr />通过数组拼出指定字符串。<br />
<?php
    $f = array('father' => '王涛', 'mother' => '刘晓', 'sister' => '王小小');
echo '我们一家人有：array(\'';
$n=0;
foreach($f as $key=>$value){
$n++;
if($n<count($f)){
echo $key,'\' => \'',$value,'\', \'';
}else echo $key,'\' => \'',$value,'\');';
}
?>
<hr />输出1~100的偶数，5个数一行。<br />
<?php
    for($a=0,$n=0;$a<=100;$a++){
        if($a%2==0){
            $n++;
            echo $a,', ';
            if($n==5){
                echo '<br />';
$n=0;
}
}
}
?>
<hr />用100元钱买100只鸡，其中公鸡5元一只，母鸡3元一只，小鸡1元3只，要求这3种鸡都必须有。<br />
<?php
    /*
    设公鸡买了g只，母鸡买了m只，小鸡买了x只
    方程：100=5g+3m+x/3
    */
    for($g=1;$g*5<100;$g++){
        for($m=1;$m*3<100;$m++){
            for($x=1;$x/3<100;$x++){
                if(5*$g+3*$m+$x/3==100&&$g+$m+$x==100){
                    echo "公鸡 $g 只，母鸡 $m 只，小鸡 $x 只<br />";
}
}
}
}
?>
<hr />写一个函数，从一个标准url里取出文件的扩展名。<br />
    <pre>
        例如: http://www.sina.com.cn/abc/de/fg.php?id=1   需要取出 php
        例如: http://www.sina.com.cn/km.asp               需要取出 asp
        例如: http://www.sina.com.cn/t.html               需要取出 html
    </pre>
<?php
    $url1='http://www.sina.com.cn/abc/de/fg.php?id=1';
    $url2='http://www.sina.com.cn/km.asp';
    $url3='http://www.sina.com.cn/t.html';
    function extract_($url){
        $url=str_word_count($url,1);
        foreach($url as $value){
            if($value=='php'||$value=='html'||$value=='asp')echo '文件扩展名：',$value,'<br />';
}
}
extract_($url1);
extract_($url2);
extract_($url3);?>
<hr />写一个函数，实现计算两个时间之间相差的小时数。例如： 2015-06-01 12:14:28 和 2015-06-04 10:17:38 之间相差的小时数（相差分钟则不计多余的秒钟，相差小时则不计多余的分钟，相差天数则不计多余的小时）。<br />
<?php
    $a='2015-06-01 12:14:28';
    $b='2015-06-04 10:17:38';
    function geSecDiff($str1,$str2){
        $s1=strtotime($str1);
        $s2=strtotime($str2);
        if($s1>$s2)$diff=$s1-$s2;else $diff=$s2-$s1;
return $diff;
}
$secdiff=geSecDiff($a,$b);
if($secdiff<60){//小于一分钟
echo '相差'.$secdiff.'秒';
}elseif($secdiff<60*60){//小于一小时
echo '相差'.intval($secdiff/60).'分钟';//intval()向下取整
}elseif($secdiff<60*60*24){//小于一天
echo '相差'.intval($secdiff/60/60).'小时';
}else echo '相差'.intval($secdiff/60/60/24).'天';
?>
<hr />用循环嵌套来输出存在两个数组中相同的数据。<br />
    <pre>
        $a1 = array('one', 'two', 'theee', 'four' => 'five', 'six');
        $a2 = array('two', 'four', 'five', 'seven');
        输出："two,four,five"      // 输出结果必须一模一样。包括逗号
    </pre>
<?php
    $a1 = ['one', 'two', 'theee', 'four' => 'five', 'six'];
$a2 = ['two', 'four', 'five', 'seven'];
echo implode(',',array_intersect($a2,$a1));
?>
<hr />反序一个数组。<br />
    <pre>
        例如array(1, 2, 4, 6, 3);
        返回array(3, 6, 4, 2, 1);
        新要求：数字在前，字符在后，且数字都按从大到小排序，字符串按从小到大排序
    </pre>
<?php
    function mysort($a,$b){
        if(gettype($a)==gettype($b)&&$a==$b){
            return 0;
        }elseif($a==$b){
            return 1;
        }elseif(is_string($a)&&is_string($b)){//两者皆为字符串
            return strcmp($a,$b);
        }elseif(is_string($a)&&is_int($b)){//前者是字符串，后者是数字
            return 1;
        }elseif(is_int($a)&&is_string($b)){//前者是数字，后者是字符串
            return -1;
        }elseif(is_int($a)&&is_int($b)){//两者皆为数字
            return -($a-$b);
        }
        return 0;
    }
    $a=['b',2,1,'a'];
    sort($a);
    print_r($a);echo '<br />';
$a=['b',2,1,'a'];
usort($a,'mysort');print_r($a);echo '<br />';

?>
</body>
</html>