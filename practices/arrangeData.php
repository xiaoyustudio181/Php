<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>整理数据</title>
</head>
<body>
<?php
    $original_data = [
        'id'=> [1,3,4],
        'username'=>['hkuc','lion','ligueston'],
        'avatar'=>['lion','butter','butter']
    ];
    $expected_data = [
        ['id'=>1,'username'=>'hkuc','avatar'=>'lion'],
        ['id'=>3,'username'=>'lion','avatar'=>'butter'],
        ['id'=>4,'username'=>'ligueston','avatar'=>'butter']
    ];
    function show($array){
        foreach ($array as $k=>$v){
            echo "{$k}：";
            foreach ($v as $k2=>$v2)
                echo $k2,'=>',$v2,', ';
            echo '<br />';
        }
    }
    echo '原来：<br />';
    show($original_data);
    echo '<hr />';
    echo '目标：<br />';
    show($expected_data);
    echo '<hr />';
    /********************************************/
    /********************************************/
    /********************************************/
    $keys=array_keys($original_data);
    $values=array_values($original_data);
    print_r($keys);//装有键名的数组
    echo '<br />';
    show($values);//装有键值的数组

    /*values:
     *[0][0] [0][1] [0][2]
     *[1][0] [1][1] [1][2]
     *[2][0] [2][1] [2][2]*/
    for($row=0;$row<count($values);$row++){
        for($col=0;$col<count($values[$row]);$col++){//键值数组行列互换
            if($row<=$col){//防止最后互换还原
                #横纵位置互换
                $temp=$values[$col][$row];
                $values[$col][$row]=$values[$row][$col];
                $values[$row][$col]=$temp;
            }
        }
    }
    echo '<br />';
    show($values);
    $result=[];
    foreach ($values as $item){
        $result[]=array_combine($keys,$item);
    }
    echo '<br />';
    show($result);?>
</body>
</html>