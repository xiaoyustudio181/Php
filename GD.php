<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GD库</title>
</head>
<body>
<dl>
    <dt>gd_info()，取得当前安装的GD库信息。</dt>
    <dd>
        <?php
        foreach (gd_info() as $key=>$item) {
            echo '<b>',$key,' ====> </b>',$item,' (',gettype($item),')<br />';
        }
        ?>
    </dd>
    <dt>imagecreatefrompng(filename)，由PNG文件或URL创建一个新图象。</dt>
    <dt>imagecreatefromjpeg(filename)，由JPEG文件或URL创建一个新图象。</dt>
    <dt>imagecreatefromgif(filename)，由GIF文件或URL创建一个新图象。</dt>
    <dt>imagesx(resource $image)，取得图像宽度(px)。</dt>
    <dt>imagesy(resource $image)，取得图像高度(px)。</dt>
    <dd>
        <?php
        $img="test.jpg";
        $resource=imagecreatefromjpeg($img);
        var_dump($resource);echo '<br />';
        echo 'width: ',imagesx($resource),' px<br />';
        echo 'height: ',imagesy($resource),' px';
        ?>
    </dd>
    <dt>getimagesize(filename)，取得图像大小，返回一个四元素的数组。</dt>
    <dt>索引 0 是图像宽度像素值。索引 1 是图像高度像素值。索引 2 是图像类型标记：1 = GIF，2 = JPG，3 = PNG，4 = SWF，5 = PSD，6 = BMP，7 = TIFF(intel byte order)，8 = TIFF(motorola byte order)，9 = JPC，10 = JP2，11 = JPX，12 = JB2，13 = SWC，14 = IFF，15 = WBMP，16 = XBM。这些标记与PHP 4.3.0新加的IMAGETYPE常量对应。索引 3 是文本字符串，内容为“height="yyy" width="xxx"”，可直接用于 IMG 标记。</dt>
    <dt>image_type_to_extension(int $imagetype)，取得图像类型的文件后缀。</dt>
    <dt>image_type_to_mime_type(int $imagetype)，取得getimagesize，exif_read_data，exif_thumbnail，exif_imagetype所返回的图像类型的MIME类型。</dt>
    <dd>
        <?php
        $size=getimagesize($img);
        print_r($size); echo '<br />';
        list($width,$height,$type,$attr)=$size;
        echo "原图：<img src='$img' $attr style='vertical-align: middle'><br />";
        echo $attr,'<br />';
        echo '图像类型标记：',$type,'<br />';
        echo '由类型标记获取后缀名： ',image_type_to_extension($type),'<br />';
        echo '由类型标记获取后缀名(没有.)： ',image_type_to_extension($type,false),'<br />';
        echo '由类型标记获取MIME类型： ',image_type_to_mime_type($type);
        ?>
    </dd>
    <dt>file_get_contents(filename)，将整个文件读入一个字符串。</dt>
    <dt>getimagesizefromstring(string $imagedata)，从字符串中获取图像尺寸信息。</dt>
    <dd>
        <?php
        $imgstr=file_get_contents($img);
        print_r(getimagesizefromstring($imgstr));
        ?>
    </dd>
    <dt>imagecreate(int $x_size,int $y_size)，新建一个基于调色板的图像，返回一个图像标识符，代表了一幅大小为x_size和y_size的空白图像。推荐使用imagecreatetruecolor()。</dt>
    <dt>imagecreatetruecolor(int $width,int $height)，新建一个真彩色图像，返回一个图像标识符，代表了一幅大小为x_size和y_size的黑色图像。</dt>
    <dt>imagecopyresampled(resource $dst_image,resource $src_image,int $dst_x, int $dst_y, int $src_x, int $src_y,int $dst_w, int $dst_h, int $src_w, int $src_h)，重采样拷贝部分图像并调整大小。</dt>
    <dt>imagejpeg(resource $image)，以JPEG格式将图像输出到浏览器或文件。</dt>
    <dd>
        <?php
        $a=$width/$height;
        $c=imagecreatetruecolor(200*$a,200);
        $re=imagecopyresampled($c,$resource,0,0,0,0,200*$a,200,$width,$height);
        var_dump($re);
        imagepng($c,'new.jpg');

        $size=getimagesize("new.jpg");
        print_r($size); echo '<br />';
        list($width,$height,$type,$attr)=$size;
        echo "结果图片：<img src=\"new.jpg\" $attr style='vertical-align: middle'>"; echo '<br />';
        ?>
    </dd>
    <dt>imagesavealpha(resource $image,bool $saveflag)，设置标记以在保存PNG图像时保存完整的alpha通道信息（与单一透明色相反）。$saveflag设置是否保存透明(alpha)通道。默认FALSE。要使用本函数，必须将alphablending清位imagealphablending($im, false)。</dt>
    <dt>imagealphablending(resource $image,bool $blendmode)，设定图像的混色模式，blendmode为TRUE则启用混色模式，否则关闭。</dt>
    <dt>imagecolorallocatealpha(resource $image,int $red,int $green,int $blue,int $alpha)，为一幅图像分配颜色，和imagecolorallocate()相同，但多了一个额外的透明度参数alpha，其值从0到127。0表示完全不透明，127表示完全透明。</dt>
    <dt>imagefilledrectangle(resource $image,int $x1,int $y1,int $x2,int $y2,int $color)，画一矩形并填充。</dt>
    <dd>
        <?php
        //拷贝生成背景透明的图片
        //header('Content-type:image/png');
        /*
        $img = imagecreatetruecolor(400,300);
        imagesavealpha($img,true);
        imagealphablending($img,false);
        $trans=imagecolorallocatealpha($img,255,255,255,127);
        imagefilledrectangle($img,0,0,400,300,$trans);
        $size=getimagesize("c4.jpg");
        $height=$size[1];
        $width=$size[0];
        $new_img = imagecreatefrompng("c4.jpg");
        imagecopyresampled($img,$new_img,0,0,0,0,400,300,$width,$height);
        imagepng($img,'new.jpg');
*/
        ?>
    </dd>
    <dt>imagefill(resource $image,int $x,int $y,int $color)，在image图像的坐标x，y(图像左上角为0,0)处用color颜色执行区域填充(即与x,y点颜色相同且相邻的点都会被填充)。</dt>
    <dd>
        <?php
        /*
        $im  =  imagecreatetruecolor ( 100 ,  100 );
        $red  =  imagecolorallocate ( $im ,  255 ,  0 ,  0 );
        var_dump($red);
        imagefill ( $im ,  0 ,  0 ,  $red );
        header ( 'Content-type: image/png' );
        imagepng ( $im );
        imagedestroy ( $im );
        */
        ?>
    </dd>
</dl>
</body>
</html>