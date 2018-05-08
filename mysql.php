<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQL操作</title>
</head>
<body>
<dl>
    <dt>▲mysql_connect(servername,username,password)，打开一个到MySQL服务器的连接，成功则返回一个MySQL连接标识，或者在失败时返回FALSE。</dt>
    <dt>▲mysql_select_db(database,connection)，选择MySQL数据库，成功时返回TRUE，失败时返回FALSE。</dt>
    <dt>▲mysql_query(str)，发送一条MySQL查询，执行成功时返回TRUE，出错时返回FALSE。</dt>
    <dt>▲mysql_error()，返回上一个MySQL操作产生的文本错误信息。</dt>
    <dt>▲mysql_errno()，返回上一个 MySQL 操作中的错误信息的数字编码。</dt>
    <dt>▲mysql_fetch_row()，从结果集中取得一行作为枚举数组，依次调用mysql_fetch_row()将返回结果集中的下一行，如果没有更多行则返回FALSE。</dt>
    <dt>▲mysql_fetch_assoc()，从结果集中取得一行作为关联数组，返回对应结果集的关联数组，并且继续移动内部数据指针，没有更多行则返回FALSE。</dt>
    <dt>▲mysql_fetch_array()，从结果集中取得一行作为关联数组，或数字数组，或二者兼有。mysql_fetch_row()的扩展版，除了将数据以数字索引方式储存在数组中之外，还可以将数据作为关联索引储存，用字段名作为键名</dt>
    <dt>▲mysql_fetch_field()，从结果集中取得列(字段)信息并作为对象返回。</dt>
    <dt>▲mysql_fetch_object()，从结果集中取得一行作为对象，没有更多行则返回FALSE。</dt>
    <dt>▲mysql_affected_rows()，取得前一次MySQL操作所影响的记录行数。</dt>
    <dt>▲mysql_close($connection)，提前关闭连接。</dt>
    <dd>
        <?php
        $con = mysql_connect("localhost","root","");
        if ($con){
            echo '连接数据库成功！';
        } else {
            die('数据库连接失败：'.mysql_error());
        }
        mysql_select_db("company1", $con);
        mysql_query('set names utf8');//若插入的数据乱码，或读取的中文是问号，或无法查询，则使用此句(运行在首个查询前)
        $result= mysql_query('select * from `profiles`;');
        while($row = mysql_fetch_assoc($result)){//每执行一次取下一行记录，直到返回空
            # mysql_fetch_row()，数字键对值；
            # mysql_fetch_assoc()，关联键对值；
            # mysql_fetch_array()，//数字键对值与关联键对值。
            echo '<br />';
            print_r($row);
        }
        echo '<br />';
        echo '以上受影响行数：',mysql_affected_rows();
        mysql_close($con);
        ?>
    </dd>
</dl>
</body>
</html>