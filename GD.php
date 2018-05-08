<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<ol>
    <li>
        获取当前安装的GD库信息。gd_info()
        <?php
        $result = gd_info();
        var_dump($result);
        ?>
    </li>
    <li>
        由JPG文件或URL创建一个新图象。imagecreatefromjpeg($file_path)<br/>
        由PNG文件或URL创建一个新图象。imagecreatefrompng($file_path)<br/>
        由GIF文件或URL创建一个新图象。imagecreatefromgif($file_path)<br/>
        取得图像宽度(px)。imagesx(resource $image)<br/>
        取得图像高度(px)。imagesy(resource $image)
        <?php
        $img_path = './test.jpg';
        $resource = imagecreatefromjpeg($img_path);
        var_dump($resource);
        $img_width = imagesx($resource);
        $img_height = imagesy($resource);
        var_dump($img_width);
        var_dump($img_height);
        ?>
    </li>
    <li>
        获取图像尺寸信息，返回一个数组。getimagesize($file_path)<br/>
        $info[0]，图像宽度像素值。$info[1]，图像高度像素值。<br/>
        $info[2]，图像类型标记：1 = GIF，2 = JPG，3 = PNG，4 = SWF，5 = PSD，6 = BMP，<br/>
        7 = TIFF(intel byte order)，8 = TIFF(motorola byte order)，9 = JPC，10 = JP2，<br/>
        11 = JPX，12 = JB2，13 = SWC，14 = IFF，15 = WBMP，16 = XBM。这些标记与PHP 4.3.0新加的IMAGETYPE常量对应。<br/>
        $info[3]，文本字符串，内容为“height="yyy" width="xxx"”，可直接用于 IMG 标记。<br/><br/>

        取得getimagesize，exif_read_data，exif_thumbnail，exif_imagetype所返回的图像类型的MIME类型。image_type_to_mime_type(int $imagetype)<br/>
        取得图像类型的文件后缀。image_type_to_extension(int $imagetype)
        <?php
        $size_info=getimagesize($img_path);
        var_dump($size_info);
        list($width, $height, $imagetype, $attr) = $size_info;
        echo "<img src='$img_path' $attr style='float: left;'><div style='clear: both;'></div>";
        echo $attr, '<br />';
        echo '图像类型标记：', $imagetype, '<br />';
        echo '由image_type_to_extension(类型标记)获取后缀名： ', image_type_to_extension($imagetype), '<br />';
        echo '由image_type_to_extension(类型标记,false)获取后缀名(没有前缀.)： ', image_type_to_extension($imagetype, false), '<br />';
        echo '由image_type_to_mime_type(类型标记)获取MIME类型： ', image_type_to_mime_type($imagetype), '<br />';
        echo '从本身获取MIME类型： ',$size_info['mime'],'<br/>';
        ?>
    </li>
    <li>
        将整个文件读入一个字符串。file_get_contents($file_path)<br/>
        从字符串中获取图像尺寸信息。getimagesizefromstring(string $imagedata)
        <?php
        $img_data=file_get_contents($img_path);
        var_dump($img_data);
        $size_info=getimagesizefromstring($img_data);
        var_dump($size_info);
        ?>
    </li>
</ol>
</body>
</html>