<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件上传</title>
</head>
<body>
<!--
* 在<form>表单需要上传二进制数据(如文件内容)时，使用 method="post" enctype="multipart/form-data"。
* 上传多文件时：<input name="Images[]" type="file" multiple="multiple" />
* $_files[name][..]获取上传文件的信息。
* 文件名：$_files["name"]["name"]
* 文件类型：$_files["name"]["type"]
* 文件大小：$_files["name"]["size"]（单位byte，字节）
* 临时副本路径：$_files["name"]["tmp_name"]
* 错误代码：$_files["name"]["error"]
    * 1：上传的文件超过了php.ini中upload_max_filesize选项限制的值；
    * 2：上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值；
    * 3：文件只有部分被上传；
    * 4：没有文件被上传。
-->
<hr/>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file1"/>
    <input type="submit" value="上传文件"/>
</form>
<?php
if (isset($_FILES['file1'])) {
    if ($_FILES['file1']['error'] > 0) {
        switch ($_FILES['file1']['error']) {
            case 1:
                echo '文件超过了php.ini中upload_max_filesize选项限制的值。';
                break;
            case 2:
                echo '上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值。';
                break;
            case 3:
                echo '文件只有部分被上传。';
                break;
            case 4:
                echo '没有文件被上传。';
                break;
            default:
                break;
        }
    } elseif ($_FILES['file1']['error'] == 0) {
        echo $_FILES['file1']['name'], "<br />";
        echo $_FILES['file1']['type'], "<br />";
        echo $_FILES['file1']['size'], "<br />";
        echo $_FILES['file1']['size'] / 1024, " KB<br />";//单位千字节
        echo $_FILES['file1']['tmp_name'], "<br />";
    }
}

?>

<hr/>

<form action="" enctype="multipart/form-data" method="post">
    <input type="file" name="files[]" multiple="multiple"/>
    <input type="submit" name="submit" value="上传多文件"/>
</form>
<?php
if (isset($_FILES["files"])) {
//            var_dump($_FILES);
    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
        if ($_FILES['files']['error'][$i] > 0) {//遍历上传的文件
            switch ($_FILES['files']['error'][$i]) {
                case 1:
                    echo '文件超过了php.ini中upload_max_filesize选项限制的值。';
                    break;
                case 2:
                    echo '上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值。';
                    break;
                case 3:
                    echo '文件只有部分被上传。';
                    break;
                case 4:
                    echo '没有文件被上传。';
                    break;
                default:
                    break;
            }
        } elseif ($_FILES['files']['error'][$i] == 0) {
            echo $_FILES['files']['name'][$i], "<br />";
            echo $_FILES['files']['type'][$i], "<br />";
            echo $_FILES['files']['size'][$i], "<br />";
            echo $_FILES['files']['size'][$i] / 1024, " KB<br />";//单位千字节
            echo $_FILES['files']['tmp_name'][$i], "<br />";
        }
        echo '<hr />';
    }

} ?>

<hr/>

<form action="" method="post" enctype="multipart/form-data">
    <input name="image1" type="file"/>
    <input type="submit" value="上传图片"/>
</form>
<?php
if (isset($_FILES['image1'])) {
    if ($_FILES['image1']['error'] > 0) {
        switch ($_FILES['image1']['error']) {
            case 1:
                echo '文件超过了php.ini中upload_max_filesize选项限制的值。';
                break;
            case 2:
                echo '上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值。';
                break;
            case 3:
                echo '文件只有部分被上传。';
                break;
            case 4:
                echo '没有图片被上传。';
                break;
            default:
                break;
        }
    } elseif ($_FILES['image1']['error'] == 0) {
        if ($_FILES['image1']['type'] == 'image/gif' ||
            $_FILES['image1']['type'] == 'image/jpeg' ||#FireFox等浏览器识别的jpg文件的类型是jpeg
            $_FILES['image1']['type'] == 'image/pjpeg' ||#IE识别的jpg文件的类型是pjpeg
            $_FILES['image1']['type'] == 'image/png') {
            echo $_FILES['image1']['name'], "<br />";
            echo $_FILES['image1']['type'], "<br />";
            echo $_FILES['image1']['size'], "<br />";
            echo $_FILES['image1']['size'] / 1024, " KB<br />";//单位千字节
            echo $_FILES['image1']['tmp_name'], "<br />";

            if (file_exists('./' . $_FILES['image1']['name'])) echo '文件已被上传过。';
            else move_uploaded_file($_FILES['image1']["tmp_name"], './' . $_FILES['image1']["name"]);
        } else {
            echo '上传的不是图片。';
        }
    }
}
?>
<hr/>
</body>
</html>