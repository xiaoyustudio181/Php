<?php
$file = fopen("a.txt", "r");

/* fopen()
r	打开文件为只读。文件指针在文件的开头开始。
r+	打开文件为读/写、文件指针在文件开头开始。

w	打开文件为只写。如果文件不存在，删除文件内容，或创建新文件。文件指针从文件开头开始。
w+	打开文件为读/写。如果文件不存在，删除文件内容，或创建新文件。文件指针从文件开头开始。

a	打开文件为只写。文件中的现有数据会被保留。文件指针在文件结尾开始。如果文件不存在，创建新文件。
a+	打开文件为读/写。文件中已有的数据会被保留。文件指针在文件结尾开始。如果文件不存在，创建新文件。

x	创建新文件为只写。如果文件已存在，返回 FALSE 和错误。
x+	创建新文件为读/写。如果文件已存在，返回 FALSE 和错误。*/

$file_size = filesize("a.txt");

echo '文件大小：', $file_size, ' b(字节)<hr />';

#file_put_contents('a.txt',PHP_EOL.'hello world',FILE_APPEND);//追加写入
//PHP_EOL：换行符(End Of Line)。
//第三个参数：FILE_APPEND，追加非覆盖；（默认覆盖写入）
//LOCK_EX，在写入时获得一个独占锁。

$content = '';

$content = file_get_contents('a.txt');//读取所有内容

#$content = fread($file, $file_size);//读取所有内容

$content=str_replace(PHP_EOL,'<br />',$content);//替换换行符

echo $content;

/*while (!feof($file)) {//逐行读取
    $line = fgets($file);
    echo $line, '<br />';
}*/

fclose($file);