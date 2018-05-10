<?php
$M = new MySQLiModel();
$M->Test();

class MySQLiModel
{
    private $mysqli;

    function __construct()
    {
        $this->mysqli = new mysqli('localhost', 'root', '', 'company1', '3306');
        mysqli_query($this->mysqli, 'set names utf8');
    }

    function __destruct()
    {
        mysqli_close($this->mysqli);
    }

    function Test()
    {
        echo '<hr />';

        $mysqli_result = $this->mysqli->query('show databases;');
//        $mysqli_result = $this->mysqli->query('select * from `profiles`;');

        var_dump($mysqli_result);

        //取法1：数字的键名和键值
        $fetch_all = $mysqli_result->fetch_all();
        var_dump($fetch_all);

        //取法2：数字与关联的键名和键值
//        while ($row = $mysqli_result->fetch_array()) {
//            var_dump($row);
//        }

        //取法3：数字的键名和键值
//        while ($row = $mysqli_result->fetch_row()) {
//            var_dump($row);
//        }

        //取法4：关联的键名和键值
//        while ($row=$mysqli_result->fetch_assoc()){
//            var_dump($row);
//        }

        //获取列信息
//        while ($row=$mysqli_result->fetch_field()){
//            var_dump($row);
//        }

    }
}