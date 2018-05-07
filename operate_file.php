<?php
$file_path = './content1.txt';

//echo realpath($file_path),'<br />';//获取绝对路径 E:\xampp\htdocs\content1.txt
//echo realpath('.'),'<br />';//获取绝对路径 E:\xampp\htdocs
//echo dirname($file_path),'<br />';//从路径获取目录 .
var_dump(pathinfo($file_path));//文件路径信息
#unlink($file_path);//删除文件

f1($file_path);
//f2($file_path);
//recover_file($file_path);
//f4($file_path);
f5();

/*
$file = fopen($file_path, "r");//打开文件为只读。文件指针在文件的开头开始。
$file = fopen($file_path, "r+");//打开文件为读/写、文件指针在文件开头开始。

$file = fopen($file_path, "w");//打开文件为只写。如果文件不存在，删除文件内容，或创建新文件。文件指针从文件开头开始。
$file = fopen($file_path, "w+");//打开文件为读/写。如果文件不存在，删除文件内容，或创建新文件。文件指针从文件开头开始。

$file = fopen($file_path, "a");//打开文件为只写。文件中的现有数据会被保留。文件指针在文件结尾开始。如果文件不存在，创建新文件。
$file = fopen($file_path, "a+");//打开文件为读/写。文件中已有的数据会被保留。文件指针在文件结尾开始。如果文件不存在，创建新文件。

$file = fopen($file_path, "x");//创建新文件为只写。如果文件已存在，返回 FALSE 和错误。
$file = fopen($file_path, "x+");//创建新文件为读/写。如果文件已存在，返回 FALSE 和错误。
*/

function f1($file_path)
{
    $file = fopen($file_path, "r");//打开文件为只读。文件指针在文件的开头开始。

    $file_size = filesize($file_path);//获取文件大小（单位：字节）

    $content = fread($file, $file_size);//按字节读取文件

    $content = str_replace("\n", '<br />', $content);

    echo $content;

    fclose($file);
}

function f2($file_path)
{
    $content = file_get_contents($file_path);

    $content = str_replace("\n", '<br />', $content);

    echo $content;
}

function recover_file($file_path)
{
    file_put_contents($file_path, "AJAX = Asynchronous JavaScript and XML
CSS = Cascading Style Sheets
HTML = Hyper Text Markup Language
PHP = PHP Hypertext Preprocessor
SQL = Structured Query Language
SVG = Scalable Vector Graphics
XML = EXtensible Markup Language");
    //默认覆盖写入


    /*file_put_contents($file_path,"\n
AJAX = Asynchronous JavaScript and XML
CSS = Cascading Style Sheets
HTML = Hyper Text Markup Language
PHP = PHP Hypertext Preprocessor
SQL = Structured Query Language
SVG = Scalable Vector Graphics
XML = EXtensible Markup Language",FILE_APPEND);//追加写入*/
}

function f4($file_path)
{
    $file = fopen($file_path, "r");//打开文件为只读。文件指针在文件的开头开始。

    while (!feof($file)) {//逐行读取
        $line = fgets($file);
        echo $line, '<br />';
    }

    fclose($file);
}

function f5(){
    $dir_path='./new_dir';
    if(!file_exists($dir_path)){
        mkdir($dir_path);//创建目录
    }
    file_put_contents($dir_path.'/aa.txt','');
    file_put_contents($dir_path.'/bb.jpg','');
    file_put_contents($dir_path.'/cc.doc','');

    $scan_result=scandir($dir_path);
    var_dump($scan_result);
}