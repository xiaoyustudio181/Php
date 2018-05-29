<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<ol>
    <li>
        返回绝对路径，如果文件不存在返回false。realpath($path)
        <?php
        $path = './article.txt';
        $result = realpath($path);
        var_dump($result);

        $result = realpath('.');
        var_dump($result);
        ?>
    </li>
    <li>
        返回路径的目录部分。dirname($path)
        <?php
        $path = './txt/article.txt';
        $result = dirname($path);
        var_dump($result);
        ?>
    </li>
    <li>
        返回文件路径中的文件信息。pathinfo($path)
        <?php
        $path = './txt/article.txt';
        $result = pathinfo($path);
        var_dump($result);
        ?>
    </li>
    <li>
        写文件。返回写入的字节数。若文件不存在将创建。file_put_contents($path,$data,[$mode])<br/>
        $mode 参数：默认为覆盖写入，当值为 FILE_APPEND 时为追加。
        <?php
        $path = './article.txt';
        $result = file_put_contents($path, "AJAX = Asynchronous JavaScript and XML
CSS = Cascading Style Sheets
HTML = Hyper Text Markup Language
PHP = PHP Hypertext Preprocessor
SQL = Structured Query Language
SVG = Scalable Vector Graphics
XML = EXtensible Markup Language");
        var_dump($result);
        ?>
    </li>
    <li>
        读文件。参数可以是URL。file_get_contents($path)
        <?php
        $path = './article.txt';
        $result = file_get_contents($path);
        var_dump($result);

        echo str_replace("\n", '<br/>', $result);
        ?>
    </li>
    <li>
        读文件（从指定位置开始读）。file_get_contents(path,false,null,start_part)
        <?php
        $path = './article.txt';
        $result = file_get_contents($path);
        $result = file_get_contents($path, false, null, strpos($result, 'PHP'));
        var_dump($result);

        echo str_replace("\n", '<br/>', $result);
        ?>
    </li>
    <li>
        获取文件的大小（字节）。filesize($path)
        <?php
        $path = './article.txt';
        $result = filesize($path);
        var_dump($result);
        ?>
    </li>
    <li>
        打开文件。fopen($path,$mode)<br/>
        "r"　只读方式打开。将文件指针指向文件头。<br/>
        "r+"　读写方式打开。将文件指针指向文件头。<br/>
        "w"　写入方式打开。将文件指针指向文件头，将文件大小截为零。如果文件不存在则尝试创建。<br/>
        "w+"　读写方式打开。将文件指针指向文件头，将文件大小截为零。如果文件不存在则尝试创建。<br/>
        "a"　写入方式打开。将文件指针指向文件末尾。如果文件不存在则尝试创建。<br/>
        "a+"　读写方式打开。将文件指针指向文件末尾。如果文件不存在则尝试创建。<br/>
        "x"　创建并以写入方式打开。将文件指针指向文件头。如果文件已存在，则 fopen() 调用失败并返回 FALSE，并生成一条 E_WARNING 级别的错误信息。如果文件不存在则尝试创建。<br/>
        "x+"　创建并以读写方式打开。将文件指针指向文件头。如果文件已存在，则 fopen() 调用失败并返回 FALSE，并生成一条 E_WARNING 级别的错误信息。如果文件不存在则尝试创建。<br/>
        <?php
        $path = './article.txt';
        $res = fopen($path, 'r');
        var_dump($res);
        ?>
    </li>
    <li>
        关闭文件。成功返回true，否则返回false。fclose($resouce)
        <?php
        $result = fclose($res);
        var_dump($result);
        ?>
    </li>
    <li>
        读取文件。fread($resouce,$size)
        <?php
        $path = './article.txt';
        $res = fopen($path, 'r');
        $result = fread($res, filesize($path));
        fclose($res);
        var_dump($result);
        ?>
    </li>
    <li>
        检测是否已到达文件末尾。feof($resouce)<br/>
        读取文件的下一行。fgets($resouce)<br/>
        <?php
        $path = './article.txt';
        $res = fopen($path, 'r');
        while (!feof($res)) {
            $line = fgets($res);
            echo $line, '<br/>';
        }
        fclose($res);
        ?>
    </li>
    <li>
        检查路径是否为文件。is_file($path)
        <?php
        $path = './article.txt';
        $result = is_file($path);
        var_dump($result);

        $path = './test_dir';
        $result = is_file($path);
        var_dump($result);
        ?>
    </li>
    <li>
        检查文件或目录是否存在。file_exists($path)
        <?php
        $path = './article.txt';
        $result = file_exists($path);
        var_dump($result);

        $path = './article2.txt';
        $result = file_exists($path);
        var_dump($result);

        $path = './test_dir';
        $result = file_exists($path);
        var_dump($result);
        ?>
    </li>
    <li>
        创建目录。成功返回 true，否则返回 false 并警告。mkdir($path)
        <?php
        $path = './test_dir';
        if (!file_exists($path)) {
            mkdir($path);
        }
        if (!file_exists($path . '/a.txt'))
            file_put_contents($path . '/a.txt', '');
        if (!file_exists($path . '/b.jpg'))
            file_put_contents($path . '/b.jpg', '');
        if (!file_exists($path . '/c.doc'))
            file_put_contents($path . '/c.doc', '');
        if (!file_exists($path . '/d.exe'))
            file_put_contents($path . '/d.exe', '');
        ?>
    </li>
    <li>
        扫描目录内的文件。scandir($path)
        <?php
        $path = './test_dir';
        $result = scandir($path);
        var_dump($result);
        ?>
    </li>
    <li>
        删除文件。 并警告。unlink($path)
        <?php
        $path = './test_dir/d.exe';
        if (file_exists($path)) {
            $result = unlink($path);
            var_dump($result);
        }
        ?>
    </li>
    <li>
        复制文件到。copy($path,$new_path)
        <?php
        $path = './article.txt';
        $result = copy($path, './test_dir/article_.txt');
        var_dump($result);
        ?>
    </li>
    <li>
        重命名（或移动）文件或目录。成功返回 true，否则返回 false 并警告。rename($oldname,$newname)
        <?php
        $path = './test_dir/article_.txt';
        $result = rename($path, './test_dir/article_.txt');
        var_dump($result);
        ?>
    </li>
</ol>
</body>
</html>