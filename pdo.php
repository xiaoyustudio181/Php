<?php
$M=new Model('localhost','northwind');
$M->ShowDatabases();

class Model
{
    private $PDO;

    function __construct($dbip,$dbname)
    {
        try {
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"];
            $this->PDO = new PDO("mysql:host=$dbip;dbname=$dbname", 'root', '', $options);
        } catch (PDOException $e) {
            echo "连接失败：" . $e->getMessage();
        }
    }

    function __destruct()
    {
        $this->PDO = null;
    }
    public function ShowDatabases(){
        $result=$this->PDO->query('show databases;')->fetchAll();
        foreach ($result as $each) {
            echo $each[0],'<br />';
        }
    }
}