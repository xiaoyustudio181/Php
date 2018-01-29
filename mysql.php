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
        function Query($sql){//执行SQL语句并输出结果
            $result= mysql_query($sql);
            while($row = mysql_fetch_assoc($result)){//每执行一次取下一行记录，直到返回空
                #可测试：
                # mysql_fetch_row()，数字键对值；
                # mysql_fetch_assoc()，关联键对值；
                # mysql_fetch_array()，//数字键对值与关联键对值。
                echo '<br />';
                print_r($row);
            }
            echo '<br />';
        }
        $con = mysql_connect("localhost","root","");
        if ($con)echo '连接数据库成功！'; else die('数据库连接失败：'.mysql_error());
        mysql_select_db("northwind", $con);
        mysql_query('set names utf8');//若插入的数据乱码，或读取的中文是问号，或无法查询，则使用此句(运行在首个查询前)
        Query("select concat(LastName,FirstName) as 姓名,case Gender when 0 then '女' when 1 then '男' end as 性别 from employees;");
        echo '以上受影响行数：',mysql_affected_rows();
        Query("select TitleOfCourtesy as 尊称,count(*) as 人数 from employees group by TitleOfCourtesy;");
        mysql_close($con); ?>
    </dd>
    <dt>▲PDO::__construct(dsn,username,passwrod)，创建一个表示数据库连接的PDO实例。</dt>
    <dt>▲PDO::errorCode()，获取跟数据库句柄上一次操作相关的SQLSTATE。</dt>
    <dt>▲PDO::exec(str)，执行一条SQL语句，并返回受影响的行数，没有受影响的行则返回0。</dt>
    <dt>▲PDO::query(str)，执行一条SQL语句，返回一个结果集PDOstatement对象，执行失败返回false。</dt>
    <dt>▲PDOStatement::fetch()，从结果集中获取下一行。</dt>
    <dd>
        <?php
        try{
            $PDO=new PDO('mysql:dbname=northwind;host:127.0.0.1','root','',[PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
            echo "数据库连接成功！<br />";
        }catch(PDOException $e){
            die("连接失败：".$e->getMessage());
        }
        foreach($PDO->query("select concat(LastName,FirstName) as 姓名,case Gender when 0 then '女' when 1 then '男' end as 性别 from employees;") as $row){//数字键对值与关联键对值
            print_r($row);
            echo '<br />';
        }echo '<br />';

        $Result=$PDO->query("select concat(LastName,FirstName) as 姓名,case Gender when 0 then '女' when 1 then '男' end as 性别 from employees;");//object(PDOStatement)
        var_dump($Result);echo '<br />';

        while($row=$Result->fetch(PDO::FETCH_ASSOC)){//关联键对值
            print_r($row);
            echo '<br />';
        }echo '<br />';

        $Result=$PDO->query("select concat(LastName,FirstName) as 姓名,case Gender when 0 then '女' when 1 then '男' end as 性别 from employees;");
        while($row=$Result->fetch(PDO::FETCH_NUM)){//数字键对值
            print_r($row);
            echo '<br />';
        }echo '<br />';

        $Result=$PDO->query("select concat(LastName,FirstName) as 姓名,case Gender when 0 then '女' when 1 then '男' end as 性别 from employees;");
        foreach ($Result->fetchAll() as $key=>$item){//数字键对值与关联键对值
            echo $key,' ==> ';
            print_r($item);
            echo '<br />';
        }
        $Result=$PDO->query("select concat(LastName,FirstName) as 姓名,case Gender when 0 then '女' when 1 then '男' end as 性别 from employees;");
        echo '查询结果列数：',$Result->columnCount(),'<br />';
        echo '查询结果行数：',$Result->rowCount(),'<br /><br />';

        $Result=$PDO->query("select Title from employees where Gender='7';")->fetchAll();
        var_dump($Result);
        if($Result)echo '有查询结果。<br />';
        else echo '无查询结果。<br />';

        $Result=$PDO->query("select count(*) from employees where Gender='7';")->fetchAll();
        var_dump($Result);
        if($Result)echo '有查询结果。';
        else echo '无查询结果。';

        $PDO=null;//关闭数据库连接
        ?>
    </dd>
</dl>
</body>
</html>