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
* $_FILES[name][..]获取上传文件的信息。
* 文件名：$_FILES["name"]["name"]
* 文件类型：$_FILES["name"]["type"]
* 文件大小：$_FILES["name"]["size"]（单位byte，字节）
* 临时副本路径：$_FILES["name"]["tmp_name"]
* 错误代码：$_FILES["name"]["error"]
    * 1：上传的文件超过了php.ini中upload_max_filesize选项限制的值；
    * 2：上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值；
    * 3：文件只有部分被上传；
    * 4：没有文件被上传。
-->
<dl>
    <dt>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="File1" />
        <input type="submit" value="上传文件" />
    </form>
    <?php
    if(!empty($_FILES['File1'])){
        #var_dump($_FILES["File1"]);
        if($_FILES['File1']['error']>0){
            switch ($_FILES['File1']['error']){
                case 1:echo '文件超过了php.ini中upload_max_filesize选项限制的值。';break;
                case 2:echo '上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值。';break;
                case 3:echo '文件只有部分被上传。';break;
                case 4:echo '没有文件被上传。';break;
                default:break;
            }
        }
        elseif($_FILES['File1']['error']==0){
            echo $_FILES['File1']['name'],"<br />";
            echo $_FILES['File1']['type'],"<br />";
            echo $_FILES['File1']['size'],"<br />";
            echo $_FILES['File1']['size']/1024," KB<br />";//单位千字节
            echo $_FILES['File1']['tmp_name'],"<br />";
        }
    }

    ?>
    </dt>
    <!--=======================================================-->
    <!--=======================================================-->
    <!--=======================================================-->
    <dt>
    <form action="" enctype="multipart/form-data" method="post">
        <input type="file" name="Files[]" multiple="multiple" />
        <input type="submit" name="submit" value="上传多文件" />
    </form>
    <?php
    if(!empty($_FILES["Files"])){
        #var_dump($_FILES["Files"]);
        for($i=0;$i<count($_FILES['Files']['error']);$i++){
            if($_FILES['Files']['error'][$i]>0){
                switch ($_FILES['Files']['error'][$i]){
                    case 1:echo '文件超过了php.ini中upload_max_filesize选项限制的值。';break;
                    case 2:echo '上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值。';break;
                    case 3:echo '文件只有部分被上传。';break;
                    case 4:echo '没有文件被上传。';break;
                    default:break;
                }
            }
            elseif($_FILES['Files']['error'][$i]==0){
                echo $_FILES['Files']['name'][$i],"<br />";
                echo $_FILES['Files']['type'][$i],"<br />";
                echo $_FILES['Files']['size'][$i],"<br />";
                echo $_FILES['Files']['size'][$i]/1024," KB<br />";//单位千字节
                echo $_FILES['Files']['tmp_name'][$i],"<br />";
            }
            echo '<hr />';
        }

    } ?>
    </dt>
    <!--=======================================================-->
    <!--=======================================================-->
    <!--=======================================================-->
    <dt>
    <form action="" method="post" enctype="multipart/form-data">
        <input name="Image1" type="file" />
        <input type="submit" value="上传图片" />
    </form>
    <?php
    if(!empty($_FILES['Image1'])){
        if($_FILES['Image1']['error']>0){
            switch ($_FILES['Image1']['error']){
                case 1:echo '文件超过了php.ini中upload_max_filesize选项限制的值。';break;
                case 2:echo '上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值。';break;
                case 3:echo '文件只有部分被上传。';break;
                case 4:echo '没有图片被上传。';break;
                default:break;
            }
        }
        elseif($_FILES['Image1']['error']==0){
            if($_FILES['Image1']['type']=='image/gif'||
                $_FILES['Image1']['type']=='image/jpeg'||#FireFox等浏览器识别的jpg文件的类型是jpeg
                $_FILES['Image1']['type']=='image/pjpeg'||#IE识别的jpg文件的类型是pjpeg
                $_FILES['Image1']['type']=='image/png'){
                echo $_FILES['Image1']['name'],"<br />";
                echo $_FILES['Image1']['type'],"<br />";
                echo $_FILES['Image1']['size'],"<br />";
                echo $_FILES['Image1']['size']/1024," KB<br />";//单位千字节
                echo $_FILES['Image1']['tmp_name'],"<br />";

                if(file_exists('./'.$_FILES['Image1']['name']))echo '文件已被上传过。';
                else move_uploaded_file($_FILES['Image1']["tmp_name"],'./'.$_FILES['Image1']["name"]);
            }
            else echo '上传的文件不是图片。';
        }
    }
    ?>
    </dt>
</dl>
</body>
</html>