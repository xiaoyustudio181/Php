<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>表单提交</title>
</head>
<body>
<?php
echo $_SERVER['REQUEST_METHOD'],'<br />';
#if($_SERVER['REQUEST_METHOD']=='POST')var_dump($_POST);
if($_POST)var_dump($_POST);
?>
<form action="" method="post">
    <input name="Name" type="text" placeholder="姓名" />
    <br />
    <input name="Gender" id="RadioButton1" type="radio" value="Male" checked="checked" />
    <label for="RadioButton1">男</label>
    <input name="Gender" id="RadioButton2" type="radio" value="Female" />
    <label for="RadioButton2">女</label>
    <br />
    <input name="Age" type="number" min="12" max="120" placeholder="年龄" />
    <br />
    <input name="Password" type="password" placeholder="设置密码" />
    <br />
    <select name="BloodType" title="血型">
        <optgroup label="Class1">
            <option value="A">A型</option>
            <option value="B">B型</option>
        </optgroup>
        <optgroup label="Class2">
            <option value="AB">AB型</option>
            <option value="O">O型</option>
        </optgroup>
    </select>
    <br />
    <!--<input id="checkbox1" type="checkbox" name="Hobbies[]" value="Reading" />-->
    <input id="checkbox1" type="checkbox" name="Hobbies[h1][]" value="Reading" />
    <label for="checkbox1">阅读</label>
    <!--<input id="checkbox2" type="checkbox" name="Hobbies[]" value="Swimming" />-->
    <input id="checkbox2" type="checkbox" name="Hobbies[h1][]" value="Swimming" />
    <label for="checkbox2">游泳</label>
    <br />
    <textarea name="More" placeholder="更多信息···"></textarea>
    <br />
    <input type="submit" />
</form>
</body>
</html>