<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数组函数</title>
</head>
<body>
<dl>
    <dt>▲返回数组长度。count</dt>
    <dd><?=count([1,1.2,true,null,['aa',"cc"]])?></dd>

    <dt>▲删除键名，按键值升序排序。sort</dt>
    <dd><?php
        $nums=["B"=>"3","D"=>"2","C"=>"5","E"=>"6","A"=>"1","F"=>"4"];
        $chars=["3"=>"B","2"=>"D","5"=>"C","6"=>"E","1"=>"A","4"=>"F"];
        sort($nums);
        sort($chars);
        print_r($nums); echo '<br />';
        print_r($chars); ?>
    </dd>

    <dt>▲删除键名，按键值降序排序。rsort</dt>
    <dd><?php
        $nums=["B"=>"3","D"=>"2","C"=>"5","E"=>"6","A"=>"1","F"=>"4"];
        $chars=["3"=>"B","2"=>"D","5"=>"C","6"=>"E","1"=>"A","4"=>"F"];
        rsort($nums);
        rsort($chars);
        print_r($nums);echo '<br />';
        print_r($chars); ?>
    </dd>

    <dt>▲留旧键名，按键值升序排序。asort</dt>
    <dd>
        <?php
        $nums=["B"=>"3","D"=>"2","C"=>"5","E"=>"6","A"=>"1","F"=>"4"];
        $chars=["3"=>"B","2"=>"D","5"=>"C","6"=>"E","1"=>"A","4"=>"F"];
        asort($nums);
        asort($chars);
        print_r($nums); echo '<br />';
        print_r($chars); ?>
    </dd>

    <dt>▲留旧键名，按键值降序排序。arsort</dt>
    <dd><?php
        $nums=["B"=>"3","D"=>"2","C"=>"5","E"=>"6","A"=>"1","F"=>"4"];
        $chars=["3"=>"B","2"=>"D","5"=>"C","6"=>"E","1"=>"A","4"=>"F"];
        arsort($nums);
        arsort($chars);
        print_r($nums); echo '<br />';
        print_r($chars); ?>
    </dd>

    <dt>▲留旧键名，按键名升序排序。ksort</dt>
    <dd>
        <?php
        $nums=["B"=>"3","D"=>"2","C"=>"5","E"=>"6","A"=>"1","F"=>"4"];
        $chars=["3"=>"B","2"=>"D","5"=>"C","6"=>"E","1"=>"A","4"=>"F"];
        ksort($nums);
        ksort($chars);
        print_r($nums); echo '<br />';
        print_r($chars); ?>
    </dd>

    <dt>▲留旧键名，按键名降序排序。krsort</dt>
    <dd>
        <?php
        $nums=["B"=>"3","D"=>"2","C"=>"5","E"=>"6","A"=>"1","F"=>"4"];
        $chars=["3"=>"B","2"=>"D","5"=>"C","6"=>"E","1"=>"A","4"=>"F"];
        krsort($nums);
        krsort($chars);
        print_r($nums); echo '<br />';
        print_r($chars); ?>
    </dd>

    <dt>▲用回调函数排序（默认从小到大）。usort</dt>
    <dd><?php
        $a=['b',2,'c',1,'a',3,'8','7'];//数组中包含字符串、数字、字符串中的数字。
        function MySort($a,$b){//返回值为正整数的排后面，为负整数的排前面。
            if($a===$b) return 0;
            elseif(is_string($a) && is_string($b)) return strcmp($a,$b);#字符与字符比较，根据ASCII码比较字符串，返回-1,0,1
            elseif(is_string($a) && is_int($b)) return -1;#字符与数字比较
            elseif(is_int($a) && is_string($b)) return 1;#数字与字符比较
            elseif(is_int($a) && is_int($b)) return -($a-$b);#数字与数字比较
            else return 0;
        }
        usort($a,'MySort');
        print_r($a);echo '<br />';?>
    </dd>

    <dt>▲比较键值，返回差集（即与其他数组不同的部分）。array_diff</dt>
    <dt>▲用回调函数比较键值，返回差集。array_udiff</dt>
    <dd>
        <?php
        $a1=["a"=>"red","b"=>"green"];
        $a2=["c"=>"red"];
        print_r($a1); echo '<br />';
        print_r($a2); echo '<br />';
        echo "Result:<br />";
        print_r(array_diff($a1,$a2)); ?>
    </dd>

    <dt>▲比较键名，返回差集。array_diff_key</dt>
    <dt>▲用回调函数比较键名，返回差集。array_diff_ukey</dt>
    <dd><?php
        $a1=["a"=>"red","b"=>"green"];
        $a2=["b"=>"red"];
        print_r($a1); echo '<br />';
        print_r($a2); echo '<br />';
        echo 'Result:<br />';
        print_r(array_diff_key($a1,$a2)); ?>
    </dd>

    <dt>▲比较键名和键值，返回差集。array_diff_assoc</dt>
    <dt>▲比较键名和键值，用回调函数比较键名，返回差集。array_diff_uassoc</dt>
    <dt>▲比较键名和键值，用回调函数比较键值，返回差集。array_udiff_assoc</dt>
    <dt>▲用回调函数比较键名和键值，返回差集。array_udiff_uassoc</dt>
    <dd><?php
        $a1=["a"=>"red","b"=>"green","c"=>"red"];
        $a2=["b"=>"bread","c"=>"red"];
        print_r($a1); echo '<br />';
        print_r($a2); echo '<br />';
        echo "Result:<br />";
        print_r(array_diff_assoc($a1,$a2)); ?>
    </dd>

    <dt>▲比较键值，返回交集。array_intersect</dt>
    <dt>▲用回调函数比较键值，返回交集。array_uintersect</dt>
    <dd><?php
        $a1=["a"=>"chip","b"=>"green","d"=>"red"];
        $a2=["e"=>"green","c"=>"red"];
        print_r($a1); echo '<br />';
        print_r($a2); echo '<br />';
        echo 'Result:<br />';
        print_r(array_intersect($a1,$a2));echo '<br />';
        function MyIntersect($a,$b){
            $result=strcmp($a,$b);
            if($result==1)return 0;
            elseif($result==0)return 0;
            elseif($result==-1)return 0;
            else return 0;
        }
        print_r(array_uintersect($a1,$a2,'MyIntersect')); ?>
    </dd>

    <dt>▲比较键名，返回交集。array_intersect_key</dt>
    <dt>▲用回调函数比较键名，返回交集。array_intersect_ukey</dt>
    <dd><?php
        $a1=["a"=>"chips","b"=>"green","e"=>"red"];
        $a2=["e"=>"green","c"=>"red"];
        print_r($a1); echo '<br />';
        print_r($a2); echo '<br />Result:<br />';
        print_r(array_intersect_key($a1,$a2)); ?>
    </dd>

    <dt>▲比较键名和键值，返回交集。array_intersect_assoc</dt>
    <dt>▲比较键名和键值，用回调函数比较键值，返回交集。array_uintersect_assoc</dt>
    <dt>▲比较键名和键值，用回调函数比较键名，返回交集。array_intersect_uassoc</dt>
    <dt>▲用回调函数比较键名和键值，返回交集。array_uintersect_uassoc</dt>
    <dd><?php
        $a1=["a"=>"chips","b"=>"green","c"=>"red"];
        $a2=["e"=>"green","c"=>"red"];
        print_r($a1); echo '<br />';
        print_r($a2); echo '<br />Result:<br />';
        print_r(array_intersect_assoc($a1,$a2)); ?>
    </dd>

    <dt>▲交换数组中的键和值。array_flip</dt>
    <dd><?php
        $a1=['apple','banana','cheese'];
        $a2=['a'=>'apple','b'=>'banana','c'=>'cheese'];
        print_r($a1); echo '<br />';
        print_r($a2); echo '<br />Result:<br />';
        print_r(array_flip($a1));echo '<br />';
        print_r(array_flip($a2)); ?>
    </dd>

    <dt>▲以指定数量的元素构成数组（指定开始索引）。array_fill</dt>
    <dd><?php
        $a1=array_fill(100,3,"aa");
        print_r($a1); ?>
    </dd>

    <dt>▲用指定值将数组填补到指定长度。array_pad</dt>
    <dd><?php $a2=['apple','banana'];
        print_r(array_pad($a2,4,"cheese")); ?>
    </dd>

    <dt>▲检查某个数组中是否存在指定的键名。array_key_exists</dt>
    <dd>
        <?php
        $a1=['a'=>'apple','b'=>'banana'];
        print_r($a1); echo '<br />';
        var_dump(array_key_exists('a',$a1));echo ', ';
        var_dump(array_key_exists('b',$a1));echo ', ';
        var_dump(array_key_exists('c',$a1)); ?>
    </dd>

    <dt>▲搜索数组中是否存在指定的值。in_array</dt>
    <dd><?php
        $a1=['a'=>'apple','b'=>'banana'];
        print_r($a1); echo '<br />';
        var_dump(in_array('apple',$a1));echo ', ';
        var_dump(in_array('banana',$a1));echo ', ';
        var_dump(in_array('cheese',$a1)); ?>
    </dd>

    <dt>▲返回包含数组中所有键名的数组。array_keys</dt>
    <dd><?php
        $a1=['USA'=>1000,'UFO'=>2000,'FBI'=>3000];
        print_r($a1); echo '<br />';
        print_r(array_keys($a1)); echo '<br />'; ?>
    </dd>

    <dt>▲返回包含数组中所有值的数组。array_values</dt>
    <dd><?php
        $a1=['USA'=>1000,'UFO'=>2000,'FBI'=>3000];
        print_r($a1); echo '<br />';
        print_r(array_values($a1)); ?>
    </dd>

    <dt>▲在数组中搜索某个键值，并返回对应的键名。array_search</dt>
    <dd><?php
        $a1=['USA'=>1000,'UFO'=>2000,'FBI'=>3000];
        print_r($a1); echo '<br />';
        echo array_search(2000,$a1); ?>
    </dd>

    <dt>▲合并一个或多个数组，相同键名的用后值覆盖前值。array_merge</dt>
    <dd><?php
        $a1=['a'=>'apple','b'=>'banana'];
        $a2=['b'=>'dumpling','c'=>'chips'];
        print_r($a1); echo '<br />';
        print_r($a2); echo '<br />Result:<br />';
        print_r(array_merge($a1,$a2)); ?>
    </dd>

    <dt>▲合并一个或多个数组，相同键名的递归合并。array_merge_recursive</dt>
    <dd><?php
        $a1=['a'=>'apple','b'=>'banana'];
        $a2=['b'=>'dumpling','c'=>'chips'];
        print_r($a1); echo '<br />';
        print_r($a2); echo '<br />Result:<br />';
        print_r(array_merge_recursive($a1,$a2)); ?>
    </dd>

    <dt>▲向数组开头插入新元素，返回新数组的长度。array_unshift</dt>
    <dd><?php
        $a1=['apple','banana','chip'];
        print_r($a1);echo '<br />';
        echo array_unshift($a1,'eggplant','fish'),'<br />';
        print_r($a1); ?>
    </dd>

    <dt>▲删除数组中第一个元素，返回被删除元素的值。array_shift</dt>
    <dd><?php print_r($a1);echo '<br />';
        echo array_shift($a1),'<br />';
        print_r($a1); ?>
    </dd>
    <dt>▲删除数组中最后一个元素，返回最后一个元素。array_pop</dt>
    <dd><?php print_r($a1);echo '<br />';
        echo array_pop($a1),'<br />';
        print_r($a1); ?>
    </dd>

    <dt>▲向数组尾部添加新元素，返回新数组的长度。array_push</dt>
    <dd><?php print_r($a1);echo '<br />';
        echo array_push($a1,'UFO','FBI'),'<br />';
        print_r($a1); ?>
    </dd>

    <dt>▲从数组中根据条件(开始与长度)取出一部分，返回取出的数组(true保留键名，false重置键名)。array_slice(array,start,length,preserve)，</dt>
    <dd><?php print_r($a1);echo '<br />';
        print_r(array_slice($a1,2,2,true)); ?></dd>

    <dt>▲从数组中移除选定的元素，用新元素取代它，返回被移除元素的数组。array_splice</dt>
    <dd><?php print_r($a1);echo '<br />';
        print_r($a1);echo '<br />';
        print_r(array_splice($a1,0,2,['JAP','CN','EN']));echo '<br />';
        //从索引0处添加，第三个参数是要删除的元素个数，不会影响要添加的元素个数
        print_r($a1); ?>
    </dd>

    <dt>▲使用后面数组的值替换前数组的值（索引对索引交换，不够长则保留原值；如果前数组有键名，则不会被移除）。array_replace</dt>
    <dd><?php
        $a2=['chiken','noodle'];
        print_r($a1);echo '<br />';
        print_r($a2);echo '<br />';
        print_r(array_replace($a1,$a2)); ?>
    </dd>

    <dt>▲从数组中随机取出一个或多个键名。array_rand</dt>
    <dd><?php
        echo array_rand($a1,1),'<br />';
        print_r(array_rand($a1,2));?>
    </dd>

    <dt>▲以相反的元素顺序返回数组。array_reverse</dt>
    <dd><?php
        print_r($a1);echo '<br />';
        print_r(array_reverse($a1));echo '<br />'; ?>
    </dd>

    <dt>▲移除数组中的重复的值，并返回结果数组。array_unique</dt>
    <dd><?php
        $a1=[1,1,2,2,3];
        print_r($a1);echo '<br />';
        print_r(array_unique($a1)); ?>
    </dd>

    <dt>▲返回数组中的当前元素的值。current</dt>
    <?php $a1=['apple','banana','chip'];?>
    <dd><?=current($a1)?></dd>

    <dt>▲将内部指针指向数组中的下一个元素，并返回该元素。next</dt>
    <dd><?=next($a1)?></dd>

    <dt>▲将内部指针指向数组中的上一个元素，并返回该元素。prev</dt>
    <dd><?=prev($a1)?></dd>

    <dt>▲将数组内部指针指向最后一个元素，若成功则返回该元素的值。end</dt>
    <dd><?=end($a1)?></dd>

    <dt>▲将内部指针指向数组中的第一个元素，并返回该元素的值。reset</dt>
    <dd><?=reset($a1)?></dd>

    <dt>▲返回数组内部指针当前指向元素的键名。key</dt>
    <dd><?=key($a1)?></dd>

    <dt>▲给一组变量赋值。list</dt>
    <dd><?php
        $a1=['first','second','third'];
        list($v1,$v2,$v3)=$a1;
        echo "$v1, $v2, $v3"; ?>
    </dd>

    <dt>▲创建一个包含指定范围的元素的数组。range</dt>
    <dd><?php
        print_r(range(0,7));echo '<br />';
        print_r(range('a','g')); ?>
    </dd>

    <dt>▲把数组中的元素按随机顺序重新排列。shuffle</dt>
    <dd><?php
        shuffle($a1);
        print_r($a1); ?>
    </dd>

    <dt>▲返回输入数组中某个单一列的值组成的数组。array_column</dt>
    <dd><?php
        $arr1 = [
            ['id' => 5698, 'first_name' => 'Bill', 'last_name' => 'Gates'],
            ['id' => 4767, 'first_name' => 'Steve', 'last_name' => 'Jobs'],
            ['id' => 3809, 'first_name' => 'Mark', 'last_name' => 'Zuckerberg']
        ];
        print_r(array_column($arr1, 'id'));echo '<br />';
        print_r(array_column($arr1, 'first_name'));echo '<br />';
        print_r(array_column($arr1, 'last_name')); ?>
    </dd>

    <dt>▲array_combine(keys_array,values_array)，通过合并两个数组来创建一个新数组，其中的一个数组是键名，另一个数组的值为键值（两数组元素个数必须相同）。</dt>
    <dd><?php
        $arr1=array("Bill","Steve","Mark");
        $arr2=array("60","56","31");
        print_r($arr1);echo '<br />';
        print_r($arr2);echo '<br />Result:<br />';
        print_r(array_combine($arr1,$arr2)); ?>
    </dd>

    <dt>▲对数组中的所有值进行计数。array_count_values(array)，</dt>
    <dd><?php
        $arr1=["chips","chips","potatoes","potatoes","potatoes"];
        print_r($arr1);echo '<br />Result:<br />';
        print_r(array_count_values($arr1)); ?>
    </dd>

    <dt>▲创建包含变量名和它们的值的数组。compact</dt>
    <dd><?php
        $firstname = "Bill";
        $lastname = "Gates";
        $age = "60";
        echo $firstname,', ',$lastname,', ',$age,'<br />';
        $result = compact("firstname", "lastname", "age");
        print_r($result); ?>
    </dd>

    <dt>▲递归函数：直接或间接调用函数本身的函数。</dt>
    <dd><?php
        /* 函数功能设计：
        情况一（前后值皆非数组），合并(merge)：
            $arr1=[1=>'a'];
            $arr2=[1=>'b'];
        情况二（前值非数组），覆盖：
            $arr1=['hkuc'=>1];
            $arr2=['hkuc'=>[2,3]];
        情况三（后值非数组），合并到同级数组：
            $arr1=['hkuc'=>[2]];
            $arr2=['hkuc'=>1];
        */
        function doArray($a1,$a2){
            foreach($a1 as $k1=>&$v1){
                foreach($a2 as $k2=>&$v2){
                    if($k1===$k2){//两数组有相同键
                        if(is_array($v1)){//两数组相同键的值，若都是数组，或前者是数组后者非数组
                            $v1= doArray($v1,(array)$v2);
                        }else{//前值非数组
                            return array_merge($a1,$a2);
                        }
                    }
                }
            }
            return $a1;
        }
        $a1=['a'=>['hkuc'=>['hkuc']]];
        $a2=['a'=>['hkuc'=>1]];
        print_r($a1);echo '<br />';
        print_r($a2);echo '<br />';
        print_r(doArray($a1,$a2));
        ?>
    </dd>
</dl>
</body>
</html>