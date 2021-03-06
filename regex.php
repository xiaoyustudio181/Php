<?php

global $regex;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $value1 = $_POST['value1'];
    $regex = '/[A-Z]+/';
    if (preg_match($regex, $value1)) {
        HTML(1);
    } else {
        HTML(2);
    }
} else HTML($ok = 0);

function HTML($ok)
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PHP正则表达式测试</title>
    </head>
    <body>
    <h3>PHP Regular Expression</h3>
    <form method="post" action="">
        <input type="text" name="value1"/>
        <input type="submit" value="OK"/>
        <?php if ($ok == 1) {
            echo 'Right';
        } elseif ($ok == 2) {
            echo 'Wrong';
        } ?>
        <br/>
        正则表达式：<?= $GLOBALS['regex'] ?>


        <pre style="font-size: large; white-space:pre-wrap">
preg_match()，返回0次(没有匹配)或1次，preg_match()在第一次匹配之后将停止搜索。
preg_match_all()，返回匹配次数，会一直搜索到subject的结尾。出错返回 FALSE。
preg_replace()，该函数与ereg_replace()类似，不同在于它利用匹配的模式去替换输入的参数。
preg_split()，该函数与split()类似，不同在于它将与正则表达式匹配的字符当做分割的模式。
preg_grep()，该函数preg_grep()匹配数组中全部元素，返回符合正则表达式的元素组成的数组。
preg_quote()，转义正则表达式字符。

【常用正则表达式】
1、非负整数：^\d+$
2、正整数：^[0-9]*[1-9][0-9]*$
3、非正整数：^((-\d+)|(0+))$
4、负整数：^-[0-9]*[1-9][0-9]*$
5、整数：^-?\d+$
6、非负浮点数：^\d+(\.\d+)?$
7、正浮点数：^((0-9)+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$
8、非正浮点数：^((-\d+\.\d+)?)|(0+(\.0+)?))$
9、负浮点数：^(-((正浮点数正则式)))$
10、英文字符串：^[A-Za-z]+$
11、英文大写串：^[A-Z]+$
12、英文小写串：^[a-z]+$
13、英文字符数字串：^[A-Za-z0-9]+$
14、英数字加下划线串：^\w+$
15、E-mail地址：^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$
16、URL：^[a-zA-Z]+://(\w+(-\w+)*)(\.(\w+(-\w+)*))*(\?\s*)?$

【元字符】
^
    匹配输入字符串的开始位置。如果设置了RegExp对象的Multiline属性，^也匹配'\n'或'\r'之后的位置。
$
    匹配输入字符串的结束位置。如果设置了RegExp对象的Multiline属性，$也匹配'\n'或'\r'之前的位置。
\
    将下一个字符标记为一个特殊字符、或一个原义字符、或一个向后引用、或一个八进制转义符。例如，'n'匹配字符"n"，'\n'匹配一个换行符，序列'\\'匹配 "\"，"\("匹配"("。
*
    匹配前面的子表达式零次或多次。例如，'zo*'能匹配"z"以及"zoo"。*等价于{0,}。
+
    匹配前面的子表达式一次或多次。例如，'zo+'能匹配"zo"以及"zoo"，但不能匹配"z"。+等价于{1,}。
?
    匹配前面的子表达式零次或一次。例如，"do(es)?"可以匹配"do"或"does"中的"do"。?等价于{0,1}。
{n}
    n是一个非负整数。匹配确定的n次。例如，'o{2}'不能匹配"Bob"中的'o'，但是能匹配"food"中的两个o。
{n,}
    n是一个非负整数。至少匹配n次。例如，'o{2,}'不能匹配"Bob"中的'o'，但能匹配"foooood"中的所有o。'o{1,}'等价于'o+'。'o{0,}'则等价于'o*'。
{n,m}
    m和n均为非负整数，其中n<= m。最少匹配n次且最多匹配m次。例如，"o{1,3}" 将匹配"fooooood"中的前三个o。'o{0,1}'等价于'o?'。请注意在逗号和两个数之间不能有空格。
?
    当该字符紧跟在任何一个其他限制符(*, +, ?, {n}, {n,}, {n,m})后面时，匹配模式是非贪婪的。非贪婪模式尽可能少的匹配所搜索的字符串，而默认的贪婪模式则尽可能多的匹配所搜索的字符串。例如，对于字符串"oooo"，'o+?'将匹配单个"o"，而'o+'将匹配所有'o'。
.
    匹配除"\n"之外的任何单个字符。要匹配包括'\n'在内的任何字符，请使用象'[.\n]'的模式。（经测试，.是匹配不包含'\'的字符）
(pattern)
    匹配pattern并获取这一匹配(即子表达式)。所获取的匹配可以从产生的Matches集合得到，在VBScript中使用SubMatches集合，在JScript中则使用$0…$9属性。要匹配圆括号字符，请使用'\('或'\)'。
(?:pattern)
    匹配pattern但不获取匹配结果，也就是说这是一个非获取匹配，不进行存储供以后使用。这在使用"或"字符(|)来组合一个模式的各个部分是很有用。例如，'industr(?:y|ies)就是一个比'industry|industries'更简略的表达式。
(?=pattern)
    正向预查，在任何匹配pattern的字符串开始处匹配查找字符串。这是一个非获取匹配，也就是说，该匹配不需要获取供以后使用。例如，'Windows (?=95|98|NT|2000)'能匹配"Windows 2000"中的"Windows" ，但不能匹配"Windows 3.1"中的"Windows"。预查不消耗字符，也就是说，在一个匹配发生后，在最后一次匹配之后立即开始下一次匹配的搜索，而不是从包含预查的字符之后开始。
(?!pattern)
    负向预查，在任何不匹配pattern的字符串开始处匹配查找字符串。这是一个非获取匹配，也就是说，该匹配不需要获取供以后使用。例如'Windows (?!95|98|NT|2000)'能匹配"Windows 3.1"中的"Windows"，但不能匹配"Windows 2000"中的"Windows"。预查不消耗字符，也就是说，在一个匹配发生后，在最后一次匹配之后立即开始下一次匹配的搜索，而不是从包含预查的字符之后开始。
x|y
    匹配x或y。例如，'z|food'能匹配"z"或"food"。'(z|f)ood'则匹配"zood"或"food"。
[xyz]
    字符集合。匹配所包含的任意一个字符。例如，'[abc]'可以匹配"plain"中的'a'。
[^xyz]
    负值字符集合。匹配未包含的任意字符。例如，'[^abc]'可以匹配"plain"中的'p'。
[a-z]
    字符范围。匹配指定范围内的任意字符。例如，'[a-z]'可以匹配'a'到'z'范围内的任意小写字母字符。
[^a-z]
    负值字符范围。匹配任何不在指定范围内的任意字符。例如，'[^a-z]'可以匹配任何不在'a'到'z'范围内的任意字符。
\b
    匹配一个单词边界，也就是指单词和空格间的位置。例如，'er\b'可以匹配"never"中的'er'，但不能匹配"verb"中的'er'。
\B
    匹配非单词边界。'er\B' 能匹配"verb"中的'er'，但不能匹配"never"中的'er'。
\cx
    匹配由x指明的控制字符。例如，\cM匹配一个Control-M或回车符。x的值必须为A-Z或a-z之一。否则，将c视为一个原义的'c'字符。
\d
    匹配一个数字字符。等价于[0-9]。
\D
    匹配一个非数字字符。等价于[^0-9]。
\f
    匹配一个换页符。等价于\x0c和\cL。
\n
    匹配一个换行符。等价于\x0a和\cJ。
\r
    匹配一个回车符。等价于\x0d和\cM。
\s
    匹配任何空白字符，包括空格、制表符、换页符等等。等价于[ \f\n\r\t\v]。
\S
    匹配任何非空白字符。等价于 [^ \f\n\r\t\v]。
\t
    匹配一个制表符。等价于\x09和\cI。
\v
    匹配一个垂直制表符。等价于\x0b和\cK。
\w
    匹配包括下划线的任何单词字符。等价于'[A-Za-z0-9_]'。
\W
    匹配任何非单词字符。等价于'[^A-Za-z0-9_]'。
\xn
    匹配 n，其中n为十六进制转义值。十六进制转义值必须为确定的两个数字长。例如，'\x41' 匹配 "A"。'\x041' 则等价于 '\x04' & "1"。正则表达式中可以使用 ASCII 编码。
\num
    匹配num，其中num是一个正整数。对所获取的匹配的引用。例如，'(.)\1' 匹配两个连续的相同字符。
\n
    标识一个八进制转义值或一个向后引用。如果\n之前至少n个获取的子表达式，则 n 为向后引用。否则，如果n为八进制数字 (0-7)，则n为一个八进制转义值。
\nm
    标识一个八进制转义值或一个向后引用。如果 \nm 之前至少有 nm 个获得子表达式，则 nm 为向后引用。如果 \nm 之前至少有 n 个获取，则 n 为一个后跟文字 m 的向后引用。如果前面的条件都不满足，若 n 和 m 均为八进制数字 (0-7)，则 \nm 将匹配八进制转义值 nm。
\nml
    如果 n 为八进制数字 (0-3)，且 m 和 l 均为八进制数字 (0-7)，则匹配八进制转义值 nml。
\un
    匹配 n，其中 n 是一个用四个十六进制数字表示的 Unicode 字符。例如， \u00A9 匹配版权符号 (?)。</pre>
    </form>
    </body>
    </html>
<?php }
/*
　　
*/