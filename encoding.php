<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GBK</title>
</head>
<body>
<dl>
    <dt>Convert encoding. iconv($old_charset,$new_charset,$str)</dt>
    <dd>
        <?php
        $cn = "汉字";
        var_dump($cn);
        $result = iconv("gbk", "utf-8", $cn);
        var_dump($result);
        ?>
    </dd>
    <dt>detect encoding. mb_detect_encoding($str,$encoding_list,$strict)</dt>
    <dd>
        <?php
        $cn = "汉字";
        $utf = iconv("gbk", "utf-8", $cn);
        $result = mb_detect_encoding($utf, "gb2312, utf-8", true);
        var_dump($result);//UTF-8
        $result = mb_detect_encoding($cn, "gb2312, utf-8", true);
        var_dump($result);//EUC-CN 是 gb2312 编码的一中表示方法
        ?>
    </dd>
</dl>
</body>
</html>