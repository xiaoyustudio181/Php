<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php 字符串函数</title>
</head>
<body>
<ol>
    <li>
        以指定字符串，分割字符串为数组。explode($split,$string)<br/>
        <?php
        $str = 'a,b,c';
        $result = explode(',', $str);
        var_dump($result);
        ?>
    </li>
    <li>
        以指定字符串，组合数组元素。implode($split,$array)
        <?php
        $arr = [10, 20, 30];
        $result = implode(',', $arr);
        var_dump($result);
        ?>
    </li>
    <li>
        按指定长度，分割字符串为数组。str_split($string,$length)
        <?php
        $str = 'abcdef';
        $result = str_split($str, 2);
        var_dump($result);
        ?>
    </li>
    <li>
        用指定字符串，按指定长度，分割字符串。chunk_split($string,$length,$spliter)
        <?php
        $str = 'abcdef';
        $result = chunk_split($str, 2, ',');
        var_dump($result);
        ?>
    </li>
    <li>
        用分隔符，将指定长度的字符串断开。wordwrap($string,$length,$spliter,true)
        <?php
        $str = "woooooooooooord";
        $result = wordwrap($str, 8, '<br />', true);
        var_dump($result);
        ?>
    </li>
    <li>
        返回字符串的HTML实体。htmlentities($string)
        <?php
        $str = '<a href="">Link</a>';
        $result = htmlentities($str);
        var_dump($result);
        echo($result);
        ?>
    </li>
    <li>
        把HTML实体转换为字符串返回。html_entity_decode($string)
        <?php
        $str = '&lt;a href=&quot;&quot;&gt;Link&lt;/a&gt;';
        $result = html_entity_decode($str);
        var_dump($result);
        echo $result;
        ?>
    </li>
    <li>
        剥去HTML、XML或PHP标签，可规定不被删除的标签。strip_tags($string)
        <?php
        $str = '<a href="">Link</a>';
        $result = strip_tags($str);
        var_dump($result);
        ?>
    </li>
    <li>
        返回字符串的长度。strlen($string) , mb_strlen($string)
        <?php
        $str = 'abc';
        $result = strlen($str);
        var_dump($result);

        $str = '你好啊';
        $result = mb_strlen($str);
        var_dump($result);
        ?>
    </li>
    <li>
        从左侧移除空白字符，或指定的其他字符。ltrim($string,$char_list)
        <?php
        $str = ' ba hello world ef ';
        $result = ltrim($str);
        var_dump($result);

        $result = ltrim($str, 'abef ');
        var_dump($result);
        ?>
    </li>
    <li>
        从右侧移除空白字符，或指定的其他字符。rtrim($string,$char_list)
        <?php
        $str = ' ba hello world ef ';
        $result = rtrim($str);
        var_dump($result);

        $result = rtrim($str, 'abef ');
        var_dump($result);
        ?>
    </li>
    <li>
        从两边移除空白字符，或指定的其他字符。trim($string,$char_list)
        <?php
        $str = ' ba hello world ef ';
        $result = trim($str);
        var_dump($result);

        $result = trim($str, 'abef ');
        var_dump($result);
        ?>
    </li>
    <li>
        从ASCII码返回字符。chr($number)
        <?php
        $num = 70;
        $result = chr($num);
        var_dump($result);
        ?>
    </li>
    <li>
        返回首个字符的ASCII码。ord($string)
        <?php
        $str = 'F';
        $result = ord($str);
        var_dump($result);
        ?>
    </li>
    <li>
        将字符串重复追加指定次数返回。str_repeat($string,$number)
        <?php
        $str = 'abc_';
        $result = str_repeat($str, 3);
        var_dump($result);
        ?>
    </li>
    <li>
        替换字符串中的一些字符（区分大小写）。str_replace($target,$replace,$string)
        <?php
        $str = 'hello php';
        $result = str_replace('php', 'world', $str);
        var_dump($result);
        ?>
    </li>
    <li>
        返回字符串的子串。substr($string,$start,$length)
        <?php
        $str = 'abcdef';
        $result = substr($str, 0, strlen($str));
        var_dump($result);

        $result = substr($str, 1, strlen($str));
        var_dump($result);

        $result = substr($str, 1, 2);
        var_dump($result);

        $result = substr($str, 0, -1);//abcde
        var_dump($result);

        $result = substr($str, -2, 2);//ef
        var_dump($result);

        ?>
    </li>
    <li>
        替换字符串内指定长度的子串。substr_replace($string,$replace,$start,$length)
        <?php
        $str = 'hello hello world';
        $result = substr_replace($str, 'hi', 6, 5);
        var_dump($result);//hello hi world
        ?>
    </li>
    <li>
        替换字符串中的一些字符（不区分大小写）。str_ireplace($target,$replace,$string)
        <?php
        $str = 'hello php';
        $result = str_ireplace('PHP', 'world', $str);
        var_dump($result);
        ?>
    </li>
    <li>
        替换指定字符或字符串。strtr($string,$target,$replace) , strtr($string,$arr)
        <?php
        $str = 'hello world';
        $result = strtr($str, 'w', 'a');//字符个数要对等
        var_dump($result);

        $result = strtr($str, ['hello' => 'hi', 'world' => 'php']);
        var_dump($result);
        ?>
    </li>
    <li>
        随机打乱字符。str_shuffle($string)
        <?php
        $str = 'abcde';
        $result = str_shuffle($str);
        var_dump($result);
        ?>
    </li>
    <li>
        在字符串所有新行之前插入HTML换行标记。nl2br($string)<br/>
        <?php //PHP中，字符串里的回车与"\n"等效
        $str = "hello
world\nearth";
        echo $str;
        $result = nl2br($str);
        var_dump($result);
        echo $result;
        ?>
    </li>
    <li>
        计算字符串的md5散列。md5($string,$raw)<br/>
        参数raw可选：true，原始16字符二进制格式；false(默认)，32字符十六进制数。
        <?php
        $str = 'abc';
        $result = md5($str);
        var_dump($result);

        $result = md5($str, true);
        var_dump($result);
        ?>
    </li>
    <li>
        获取一个带前缀、基于当前时间微秒数的唯一ID。uniqid([prefix],[entropy])<br/>
        prefix (前缀)为空则返回的字符串长度为13；<br/>
        entropy 为TRUE则返回的字符串长度为23，字符串结尾增加额外的煽，使得唯一ID更具唯一性。
        <?php
        $result = uniqid();
        var_dump($result);

        $result = uniqid('img');
        var_dump($result);

        $result = uniqid('img', true);
        var_dump($result);
        ?>
    </li>
    <li>
        比较两个字符串，逐一比较ASCII码（区分大小写）。strcmp($string1,$string2)<br/>
        返回0，两个字符串相等；返回-1，string1小于string2；返回1，string1大于string2。
        <?php
        $str1 = 'b';
        $str2 = 'B';
        $result = strcmp($str1, $str1);
        var_dump($result);

        $result = strcmp($str1, $str2);
        var_dump($result);

        $result = strcmp($str2, $str1);
        var_dump($result);
        ?>
    </li>
    <li>
        比较两个字符串，逐一比较ASCII码（不区分大小写）。strcasecmp($string1,$string2)
        <?php
        $str1 = 'b';
        $str2 = 'B';
        $result = strcasecmp($str1, $str1);
        var_dump($result);

        $result = strcasecmp($str1, $str2);
        var_dump($result);

        $result = strcasecmp($str2, $str1);
        var_dump($result);
        ?>
    </li>
    <li>
        查找字符串在一字符串中第一次出现的位置（区分大小写），没有返回false。strpos($string,$target)
        <?php
        $str = 'hello php, php is good';
        $result = strpos($str, 'php');
        var_dump($result);
        ?>
    </li>
    <li>
        查找字符串在一字符串中第一次出现的位置（不区分大小写），没有返回false。stripos($string,$target)
        <?php
        $str = 'hello php, php is good';
        $result = stripos($str, 'Php');
        var_dump($result);
        ?>
    </li>
    <li>
        查找字符串在另一字符串中最后一次出现的位置（区分大小写），没有返回false。strrpos($string,$target)
        <?php
        $str = 'hello php, php is good';
        $result = strrpos($str, 'php');
        var_dump($result);
        ?>
    </li>
    <li>
        查找字符串在另一字符串中最后一次出现的位置（不区分大小写），没有返回false。strripos($string,$target)
        <?php
        $str = 'hello php, php is good';
        ?>
    </li>
    <li>
        搜索字符串在另一字符串中的第一次出现，返回从第一次出现的位置开始到结尾的部分(或之前部分，当第三个参数为true时)。strstr($string,$target)
        <?php
        $str = 'hello php, php is good';
        $result = strstr($str, 'php');
        var_dump($result);

        $result = strstr($str, 'php', true);
        var_dump($result);
        ?>
    </li>
    <li>
        查找字符在指定字符串中最后一次出现的位置，返回该字符及其后面的字符。strrchr($string,$target)
        <?php
        $str = 'hello php, php is good';
        $result = strrchr($str, 'p');
        var_dump($result);
        ?>
    </li>
    <li>
        计算字符串中的单词数。str_word_count($string,[$option],[$char])<br/>
        $option：默认0，返回找到的单词的数目；1，返回包含字符串中的单词的数组；2，返回一个数组，其中的键名是单词在字符串中的位置。<br/>
        $char：规定被视为单词的特殊字符。
        <?php
        $str = 'hello php, php is good';
        $result = str_word_count($str);
        var_dump($result);

        $result = str_word_count($str, 1);
        var_dump($result);

        $result = str_word_count($str, 2);
        var_dump($result);
        ?>
    </li>
    <li>
        计算字符串中子串出现的次数。substr_count($string,$target)
        <?php
        $str = 'hello php, php is good';
        $result = substr_count($str, 'ph');
        var_dump($result);
        ?>
    </li>
    <li>
        返回字符串所用字符的信息。count_chars($string,$mode)<br/>
        $mode：1，键名为字符的ASCII码，键值为出现次数；3，返回字符串中出现过的字符集合。
        <?php
        $str = 'hello php, php is good';
        $result = count_chars($str, 1);
        var_dump($result);

        $result = count_chars($str, 3);
        var_dump($result);
        ?>
    </li>
    <li>
        将字符串所有字母转化为大写。strtoupper($string)
        <?php
        $str = 'hello php, php is good';
        $result = strtoupper($str);
        var_dump($result);
        ?>
    </li>
    <li>
        将字符串所有字母转化为小写。strtolower($string)
        <?php
        $str = 'HELLO PHP, PHP IS GOOD';
        $result = strtolower($str);
        var_dump($result);
        ?>
    </li>
    <li>
        将字符串的首字母转化为小写。lcfirst($string)
        <?php
        $str = 'ABC';
        $result = lcfirst($str);
        var_dump($result);
        ?>
    </li>
    <li>
        将字符串的首字母转化为大写。ucfirst($string)
        <?php
        $str = 'abc';
        $result = ucfirst($str);
        var_dump($result);
        ?>
    </li>
    <li>
        计算两个字符串的相似度(按字母逐个比较)，返回匹配字符的数目。similar_text($string1,$string2)
        <?php
        $str1 = 'hello';
        $str2 = 'heiio';
        $result = similar_text($str1, $str1);
        var_dump($result);

        $result = similar_text($str1, $str2);
        var_dump($result);
        ?>
    </li>
    <li>
        在字符串中的引号前增加反斜杠(\)。addslashes($string)
        <?php
        $str = "\"good\" and 'bad'";
        $result = addslashes($str);
        var_dump($result);
        ?>
    </li>
    <li>
        在字符串中的指定字符前增加反斜杠(\)。addcslashes($string)
        <?php
        $str = "\"good\" and 'bad'";
        $result = addcslashes($str, 'an');
        var_dump($result);
        ?>
    </li>
    <li>
        以预定义字符填充字符串到新长度。str_pad($string,$length,$pad,$type)
        <?php
        $str = 'hello';
        $result = str_pad($str, 30, ".", STR_PAD_BOTH);
        var_dump($result);

        $result = str_pad($str, 30, ".", STR_PAD_LEFT);
        var_dump($result);

        $result = str_pad($str, 30, ".", STR_PAD_RIGHT);
        var_dump($result);
        ?>
    </li>
    <li>
        通过千位分组来格式化数字。number_format($number,[$decimals],[$dec_point],[$thousand_sep])
        <?php
        $num = 5000000.555;
        $result = number_format($num);
        var_dump($result);

        $result = number_format($num, 2);
        var_dump($result);

        $result = number_format($num, 3, '.', ', ');
        var_dump($result);
        ?>
    </li>
    <li>
        在字符串中某些预定义的字符前添加反斜杠，用于转义拥有特殊意义的字符（除了引号）。quotemeta($string)
        <?php
        $str = ". \ + * ? [ ] ^ $ ( ) ' \"";
        $result = quotemeta($str);
        var_dump($result);
        ?>
    </li>
    <li>
        把get查询字符串解析到变量中。parse_str($string)
        <?php
        $str = "name=peter&age=20";
        parse_str($str);
        var_dump($name);
        var_dump($age);
        ?>
    </li>
    <li>
        对字符串执行ROT13编码或解码(把每个字母按字母表向后移动13位，数字和非字母字符保持不变)。str_rot13($string)
        <?php
        $str = 'sienna guillory';
        $result = str_rot13($str);
        var_dump($result);

        $str = 'fvraan thvyybel';
        $result = str_rot13($str);
        var_dump($result);
        ?>
    </li>
    <li>
        反转字符串。strrev($string)
        <?php
        $str = 'abc';
        $result = strrev($str);
        var_dump($result);
        ?>
    </li>
    <li>
        自定义方法：判断字符串是否以指定子串结尾。endsWith($string)
        <?php
        function endsWith($haystack, $needle)
        {
            $length = strlen($needle);
            $start = $length * -1; //negative
            return (substr($haystack, $start, $length) === $needle);
        }

        $str = 'harry potter';
        $result = endsWith($str, 'ter');
        var_dump($result);
        ?>
    </li>
</ol>
</body>
</html>