<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>字符串函数</title>
</head>
<body>
<dl>
    <dt>▲以指定字符串分割。explode</dt>
    <dd><?php print_r(explode('.','a.b.c')); ?></dd>

    <dt>▲以指定字符串组合。implode</dt>
    <dd><?=implode(', ',[1,2,3]);?></dd>

    <dt>▲按指定长度分割。str_split</dt>
    <dd><?php print_r(str_split('abcdef',2)); ?></dd>

    <dt>▲用指定字符串 按指定长度分割。chunk_split</dt>
    <dd><?=chunk_split('abcdef',2,'.');?></dd>

    <dt>▲用字符串断点将字符串打断为指定数量的子串。wordwrap</dt>
    <dd><?=wordwrap("woooooooooooord",8,"<br />",TRUE);?></dd>

    <dt>▲返回字符串的HTML实体。htmlentities</dt>
    <dd><?=htmlentities('<a href="">Link</a>')?></dd>

    <dt>▲把HTML实体转换为字符串返回。html_entity_decode</dt>
    <dd><?=html_entity_decode(htmlentities('<a href="">Link</a>'))?></dd>

    <dt>▲剥去HTML、XML或PHP标签，可规定不被删除的标签。strip_tags</dt>
    <dd><?=strip_tags('<a href="">Link</a>')?></dd>

    <dt>▲返回字符串的长度。strlen</dt>
    <dd><?=strlen(" Hello world ")?></dd>
    <dd><?=strlen(" 你好世界 ")?></dd>

    <dt>▲返回字符串（针对中文）的长度。mb_strlen</dt>
    <dd><?=mb_strlen(" Hello world ")?></dd>
    <dd><?=mb_strlen(" 你好世界 ")?></dd>

    <dt>▲从左侧移除空白字符或其他字符。ltrim</dt>
    <dd><?=strlen(ltrim(" Hello world "))?></dd>

    <dt>▲从右侧移除空白字符或其他字符。rtrim</dt>
    <dd><?=strlen(rtrim(" Hello world "))?></dd>

    <dt>▲从首尾移除空白字符或其它字符。trim</dt>
    <dd><?=strlen(trim(" Hello world "))?></dd>

    <dt>▲从ASCII码返回字符。chr</dt>
    <dd><?=chr(70)?></dd>

    <dt>▲返回首个字符的ASCII码。ord</dt>
    <dd><?=ord('F')?></dd>

    <dt>▲将字符串重复追加指定次数返回。str_repeat</dt>
    <dd><?=str_repeat("Abc",3)?></dd>

    <dt>▲替换字符串中的一些字符（区分大小写）。str_replace</dt>
    <dd><?=str_replace("PHP","C#","Hello PHP ")?></dd>

    <dt>▲替换字符串中的一些字符（不区分大小写）。str_ireplace</dt>
    <dd><?=str_ireplace("php","C#","Hello PHP ")?></dd>

    <dt>▲随机打乱字符。str_shuffle</dt>
    <dd><?=str_shuffle("abcdefg")?></dd>

    <dt>▲在字符串所有新行之前插入HTML换行标记。nl2br</dt>
    <dd><?=nl2br("abc
def\nghi")//PHP中字符串回车与\n等效?>
    </dd>

    <dt>▲计算字符串的MD5散列。md5(string,raw)，参数raw可选：TRUE，原始16字符二进制格式；FALSE(默认)，32字符十六进制数。</dt>
    <dd><?=md5('abcd'),'<br />',md5('abcd',true)?></dd>

    <dt>▲获取一个带前缀、基于当前时间微秒数的唯一ID。uniqid([prefix],[entropy])，prefix (前缀)为空则返回的字符串长度为13；</dt>
    <dt>▲entropy 为TRUE则返回的字符串长度为23，字符串结尾增加额外的煽，使得唯一ID更具唯一性。</dt>
    <dd><?=uniqid(),'<br />',uniqid('img'),'<br />',uniqid('img',true)?></dd>

    <dt>▲比较两个字符串，逐一比较ASCII码（区分大小写）。strcmp</dt>
    <dt>返回值：0，两个字符串相等；<0，string1小于string2；>0，string1大于string2。</dt>
    <dd><?=strcmp("abc","abc"),'<br />',strcmp("a","b"),'<br />',strcmp("b","a")?></dd>

    <dt>▲比较两个字符串，逐一比较ASCII码（不区分大小写），返回值同上。strcasecmp</dt>
    <dd><?=strcasecmp("hello world!","HELLO WORLD!")?></dd>

    <dt>▲查找字符串在另一字符串中第一次出现的位置（区分大小写）。strpos</dt>
    <dd><?=strpos("Hello PHP. PHP is easy.","PHP")?></dd>

    <dt>▲查找字符串在另一字符串中第一次出现的位置（不区分大小写）。stripos</dt>
    <dd><?=stripos("Hello PHP. PHP is easy.","php")?></dd>

    <dt>▲查找字符串在另一字符串中最后一次出现的位置（区分大小写）。strrpos</dt>
    <dd><?=strrpos("Hello PHP. PHP is easy.","PHP")?></dd>

    <dt>▲查找字符串在另一字符串中最后一次出现的位置（不区分大小写）。strripos</dt>
    <dd><?=strripos("Hello PHP. PHP is easy.","php")?></dd>

    <dt>▲计算字符串中的单词数。str_word_count(string,return,char)</dt>
    <dt>▲return(可选)：默认0，返回找到的单词的数目；1，返回包含字符串中的单词的数组；2，返回一个数组，其中的键名是单词在字符串中的位置。char(可选)：规定被视为单词的特殊字符。</dt>
    <dd><?php $s="Hello PHP. PHP is not difficult.";
        print_r(str_word_count($s,1));echo '<br />';
        print_r(str_word_count($s,2)); ?>
    </dd>
    
    <dt>▲返回字符串所用字符的信息。count_chars(string,mode)</dt>
    <dt>▲mode：1，键名为字符的ASCII码，键值为出现次数；3，返回字符串中出现过的字符集合。</dt>
    <dd>
        <?php print_r(count_chars($s,1));
        echo '<br />',count_chars($s,3); ?>
    </dd>
    
    <dt>▲将字符串所有字母转化为大写。strtoupper(string)，</dt>
    <dd><?=strtoupper($s)?></dd>

    <dt>▲将字符串所有字母转化为大写。strtolower(string)，</dt>
    <dd><?=strtolower($s)?></dd>

    <dt>▲替换指定字符或字符串。strtr</dt>
    <dd><?=strtr($s,'l','L'),'<br />',strtr($s,['Hello'=>'Hi','PHP'=>'Javascript'])?></dd>

    <dt>▲计算两个字符串的相似度(按字母逐个比较)，并返回匹配字符的数目。similar_text</dt>
    <dd><?=similar_text($s,'Hello')?></dd>

    <dt>▲返回字符串的子串。substr</dt>
    <dd><?=substr($s,0,3),'<br />',substr($s,0,-1),'<br />',substr($s,-2,2)?></dd>

    <dt>▲替换字符串的子串。substr_replace</dt>
    <dd><?=substr_replace($s,"Hi ",0,5)?></dd>

    <dt>▲计算子串在字符串中出现的次数。substr_count</dt>
    <dd><?=substr_count($s,"PHP")?></dd>

    <dt>▲搜索字符串在另一字符串中的第一次出现，返回从第一次出现的位置开始第一次出现的位置开始到结尾的字符串(或之前部分，当第三个参数为true时)。strstr</dt>
    <dd><?=strstr($s,'PHP'),'<br />',strstr($s,'PHP',true)?></dd>

    <dt>▲查找字符在指定字符串中最后一次出现的位置，返回该字符及其后面的字符。strrchr</dt>
    <dd><?=strrchr('Hello Sienna Guillory','S')?></dd>

    <dt>▲在字符串中的引号前增加反斜杠(\)。addslashes</dt>
    <dd><?php $s="\"good\" and 'bad'";
        echo addslashes($s),'<br />';
        echo addcslashes($s,'an'); ?>
    </dd>

    <dt>▲以预定义字符填充字符串到新长度。str_pad</dt>
    <dd><?php $s="zxy";
        echo str_pad($s,30,".",STR_PAD_BOTH),'<br />';
        echo str_pad($s,30,".",STR_PAD_LEFT),'<br />';
        echo str_pad($s,30,".",STR_PAD_RIGHT),'<br />'; ?>
    </dd>

    <dt>▲将字符串的首字母转化为小写。lcfirst</dt>
    <dd><?=lcfirst($s)?></dd>

    <dt>▲将字符串的首字母转化为大写。ucfirst</dt>
    <dd><?=ucfirst($s)?></dd>

    <dt>▲通过千位分组来格式化数字。number_format</dt>
    <dd><?=number_format("5000000.555"),'<br />',number_format("5000000.555",2),'<br />',number_format("5000000.555",3,'.',', ')?></dd>

    <dt>▲在字符串中某些预定义的字符前添加反斜杠，用于转义拥有特殊意义的字符。quotemeta</dt>
    <dt>▲预定义的字符：句号.，反斜杠\，加号+，星号*，问号?，方括号[]，脱字号^，美元符号$，圆括号()。</dt>
    <dd><?=quotemeta(". \ + * ? [ ] ^ $ ( ) ' \"")?></dd>

    <dt>▲把 get 查询字符串解析到变量中。parse_str</dt>
    <dd><?php parse_str("name=Sienna Guillory&age=30");
        echo $name,', ',$age; ?>
    </dd>

    <dt>▲对字符串执行ROT13编码或解码(把每个字母按字母表向后移动13位，数字和非字母字符保持不变)。str_rot13</dt>
    <dd><?=str_rot13("I like Sienna"),'<br />',str_rot13("V yvxr Fvraan")?></dd>

    <dt>▲反转字符串。strrev</dt>
    <dd><?=strrev('Sienna Guillory')?></dd>

    <?php
    function endsWith($haystack, $needle){
        $length = strlen($needle);
        $start = $length * -1; //negative
        return (substr($haystack, $start, $length) === $needle);
    }
    ?>

    <dt>▲反转字符串。strrev</dt>
    <dd><?=endsWith('Sienna Guillory','Guillory')?'true':'false'?></dd>
    <dd><?=endsWith('Sienna Guillory','guillory')?'true':'false'?></dd>
</dl>
</body>
</html>