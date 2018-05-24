<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    var_dump($_GET);
    echo '<hr/>';

    var_dump($_POST);
    echo '<hr/>';

    var_dump($_REQUEST);//包含get和post的值
    echo '<hr/>';

    parse_str($_SERVER['QUERY_STRING']);//根据get-query参数定义变量
    var_dump($word1.' '.$word2);
    echo '<hr/>';

    var_dump($_FILES);
}
?>
<form action="submit.php?word1=hey&word2=there&nums[]=100&nums[]=200" method="post" enctype="multipart/form-data">
    <h2>表单</h2>
    <dl>
        <dt>姓名</dt>
        <dd>
            <input name="name" type="text" placeholder="name" value="harry" />
        </dd>

        <dt>性别</dt>
        <dd>
            <input name="gender" id="rb1" type="radio" value="male" checked="checked" />
            <label for="rb1">男</label>

            <label>
                <input name="gender" type="radio" value="female" /> 女
            </label>
        </dd>

        <dt>年龄</dt>
        <dd>
            <input name="age" type="number" min="0" max="120" placeholder="age" value="21" />
        </dd>

        <dt>生日</dt>
        <dd>
            <input type="date" name="birthday"/>
        </dd>
        <dd>
            <input type="datetime-local" name="datetime"/>
        </dd>
        <dd>
            <input type="time" name="birth-time"/>
        </dd>

        <dt>家乡（多选）</dt>
        <dd>
            <select multiple="multiple" name="native[]" style="width: 100px">
                <optgroup label="四川省">
                    <option value="chengdu">成都市</option>
                    <option value="mianyang">绵阳市</option>
                    <option value="chengdu">自贡市</option>
                    <option value="panzhihua">攀枝花</option>
                    <option value="luzhou">泸州</option>
                </optgroup>
                <optgroup label="广东省">
                    <option value="guangzhou">广州市</option>
                    <option value="shenzhen">深圳市</option>
                    <option value="zhuhai">珠海市</option>
                    <option value="shantou">汕头市</option>
                    <option value="foshan">佛山市</option>
                </optgroup>
            </select>
        </dd>

        <dt>密码</dt>
        <dd>
            <input name="password" type="password" placeholder="password" value="123" />
        </dd>

        <dt>血型</dt>
        <dd>
            <select name="bloodType" title="血型">
                <optgroup label="class1">
                    <option value="A">A型</option>
                    <option value="B" selected="selected">B型</option>
                </optgroup>
                <optgroup label="class2">
                    <option value="AB">AB型</option>
                    <option value="O">O型</option>
                </optgroup>
            </select>
        </dd>

        <dt>爱好</dt>
        <dd>
            <label>
                <input type="checkbox" name="hobbies[]" value="Reading" checked="checked" />
                阅读
            </label>

            <label>
                <input type="checkbox" name="hobbies[]" value="Swimming" checked="checked" />
                游泳
            </label>
        </dd>

        <dt>技能</dt>
        <dd>
            <label>
                <input type="checkbox" name="skills[type1][]" value="driving" checked="checked"/>驾驶
            </label>

            <label>
                <input type="checkbox" name="skills[type1][]" value="cooking" checked="checked"/>烹饪
            </label>

            <label>
                <input type="checkbox" name="skills[type2][]" value="php" checked="checked"/>PHP开发
            </label>

            <label>
                <input type="checkbox" name="skills[type2][]" value="c#" checked="checked"/>C#开发
            </label>
        </dd>

        <dt>更多</dt>
        <dd>
            <textarea name="more" placeholder="更多信息···">hello world</textarea>
        </dd>

        <dt>头像（可多选）</dt>
        <dd>
            <input type="file" multiple="multiple" name="headimgs[]"/>
        </dd>
    </dl>
    <input type="submit" />
</form>
</body>
</html>