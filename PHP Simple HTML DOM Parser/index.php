<?php
/*
　　一直以来使用php解析html文档树都是一个难题。
　　Simple HTML DOM parser 帮我们很好地解决了使用 php html 解析 问题。
　　可以通过这个php类来解析html文档，对其中的html元素进行操作 (PHP5+以上版本)。
　　解析器不仅仅只是帮助我们验证html文档；更能解析不符合W3C标准的html文档。
　　它使用了类似jQuery的元素选择器，通过元素的id，class，tag等等来查找定位；
　　同时还提供添加、删除、修改文档树的功能。
　　当然，这样一款强大的html Dom解析器也不是尽善尽美；在使用的过程中需要十分小心内存消耗的情况。
　　不过，不要担心；本文中，笔者在最后会为各位介绍如何避免消耗过多的内存。*/

include_once 'simple_html_dom.php';
$html=new simple_html_dom();

//有三种方式调用这个类：

    //1，从url中加载html文档。
//$html->load_file('http://www.cnphp.info/php-simple-html-dom-parser-intro.html');

    //2，从字符串中加载html文档。
//$html->load('<html><body>从字符串中加载html文档演示</body></html>');

    //3，从文件中加载html文档。
//$html->load_file('path/file/test.html');

$html->load_file('./a.html');

//使用find函数：查找html文档中的元素。
//返回的结果是一个包含了对象的数组。
//我们使用HTML DOM解析类中的函数来访问这些对象：
//查找html文档中的超链接元素

$result = $html->find('a');//所有超链接
$result = $html->find('a',0);//第一个超链接
//如果没有找到则返回空数组
$result = $html->find('div[id=main]',0);// 查找id为main的div元素
$result = $html->find('div[id]');// 查找所有包含有id属性的div元素
$result = $html->find('[id]');// 查找所有包含有id属性的元素
$result = $html->find('#main');// 查找id='container'的元素
$result = $html->find('.ol1_li');// 找到所有class=foo的元素
$result = $html->find('a, span');// 查找多个html标签
$result = $html->find('a[title], span[title]');
$result = $html->find('ol li');// 查找 ul列表中所有的li项
$result = $html->find('ol li.ol1_li');//查找 ul 列表指定class=selected的li项

//内置函数？
$result = $result->parent;// 返回父元素
var_dump($result);die;
$result = $result->children;// 返回子元素数组
$result = $result->children(0);// 通过索引号返回指定子元素
$result = $result->first_child ();// 返回第一个子元素
$result = $result->last_child ();// 返回最后一个子元素
$result = $result->prev_sibling ();// 返回上一个相邻元素
$result = $result->next_sibling ();//返回下一个相邻元素

/*使用简单的正则表达式来操作属性选择器。
[attribute] – 选择包含某属性的html元素
[attribute=value] – 选择所有指定值属性的html元素
[attribute!=value]- 选择所有非指定值属性的html元素
[attribute^=value] -选择所有指定值开头属性的html元素
[attribute$=value] 选择所有指定值结尾属性的html元素
[attribute*=value] -选择所有包含指定值属性的html元素*/

/*每个对象都有4个基本对象属性：
tag – 返回html标签名
innertext – 返回innerHTML
outertext – 返回outerHTML
plaintext – 返回html标签中的文本*/

//操作属性
/*$href = $result->href;// 本例中将锚链接值赋给$link变量
$result->href = 'http://www.cnphp.info';//给锚链接赋新值
$result->href = null;// 删除锚链接
if(isset($result->href)) {// 检测是否存在锚链接

}*/
$result = $html->find('a',0);//第一个超链接

//解析器中没有专门的方法来添加、删除元素，不过可以变通一下使用：
$result->outertext = '<div class="wrap">' . $result->outertext . '<div>';// 封装元素
#$result->outertext = '';// 删除元素
$result->outertext = $result->outertext . '<div>foo<div>';// 添加元素
$result->outertext = '<div>foo<div>' . $result->outertext;// 插入元素
#var_dump($result->outertext);die;？


//保存修改后的html DOM文档也非常简单：
$doc = $html;
echo $doc;// 输出

//如何避免解析器消耗过多内存
//在本文的开篇中，笔者就提到了Simple HTML DOM解析器消耗内存过多的问题。
//如果php脚本占用内存太多，会导致网站停止响应等一系列严重的问题。
//解决的方法也很简单，在解析器加载html文档并使用完成后，记得清理掉这个对象就可以了。
//当然，也不要把问题看得太严重了。如果只是加载了2、3个文档，清理或不清理是没有多大区别的。
//当你加载了5个10个甚至更多的文档的时候，用完一个就清理一下内存绝对是对自己负责啦^_^
$html->clear();
