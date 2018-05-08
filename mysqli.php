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

        //ȡ��1�����ֵļ����ͼ�ֵ
        $fetch_all = $mysqli_result->fetch_all();
        var_dump($fetch_all);

        //ȡ��2������������ļ����ͼ�ֵ
//        while ($row = $mysqli_result->fetch_array()) {
//            var_dump($row);
//        }

        //ȡ��3�����ֵļ����ͼ�ֵ
//        while ($row = $mysqli_result->fetch_row()) {
//            var_dump($row);
//        }

        //ȡ��4�������ļ����ͼ�ֵ
//        while ($row=$mysqli_result->fetch_assoc()){
//            var_dump($row);
//        }

        //��ȡ����Ϣ
//        while ($row=$mysqli_result->fetch_field()){
//            var_dump($row);
//        }

    }
}