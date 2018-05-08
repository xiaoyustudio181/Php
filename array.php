<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数组函数</title>
</head>
<body>
<ol>
    <li>
        返回数组长度。count($array)
        <?php
        $arr = [1, 2, 3];
        $result = count($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        删除键名，按键值升序排序。sort($array)
        <?php
        $arr1 = ["B" => "3", "D" => "2", "C" => "5", "E" => "6", "A" => "1", "F" => "4"];
        $arr2 = ["3" => "B", "2" => "D", "5" => "C", "6" => "E", "1" => "A", "4" => "F"];
        sort($arr1);
        sort($arr2);
        var_dump($arr1);
        var_dump($arr2);
        ?>
    </li>
    <li>
        删除键名，按键值降序排序。rsort($array)
        <?php
        $arr1 = ["B" => "3", "D" => "2", "C" => "5", "E" => "6", "A" => "1", "F" => "4"];
        $arr2 = ["3" => "B", "2" => "D", "5" => "C", "6" => "E", "1" => "A", "4" => "F"];
        rsort($arr1);
        rsort($arr2);
        var_dump($arr1);
        var_dump($arr2);
        ?>
    </li>
    <li>
        留旧键名，按键值升序排序。asort($array)
        <?php
        $arr1 = ["B" => "3", "D" => "2", "C" => "5", "E" => "6", "A" => "1", "F" => "4"];
        $arr2 = ["3" => "B", "2" => "D", "5" => "C", "6" => "E", "1" => "A", "4" => "F"];
        asort($arr1);
        asort($arr2);
        var_dump($arr1);
        var_dump($arr2);
        ?>
    </li>
    <li>
        留旧键名，按键值降序排序。arsort($array)
        <?php
        $arr1 = ["B" => "3", "D" => "2", "C" => "5", "E" => "6", "A" => "1", "F" => "4"];
        $arr2 = ["3" => "B", "2" => "D", "5" => "C", "6" => "E", "1" => "A", "4" => "F"];
        arsort($arr1);
        arsort($arr2);
        var_dump($arr1);
        var_dump($arr2);
        ?>
    </li>
    <li>
        留旧键名，按键名升序排序。arsort($array)
        <?php
        $arr1 = ["B" => "3", "D" => "2", "C" => "5", "E" => "6", "A" => "1", "F" => "4"];
        $arr2 = ["3" => "B", "2" => "D", "5" => "C", "6" => "E", "1" => "A", "4" => "F"];
        ksort($arr1);
        ksort($arr2);
        var_dump($arr1);
        var_dump($arr2);
        ?>
    </li>
    <li>
        留旧键名，按键名降序排序。arsort($array)
        <?php
        $arr1 = ["B" => "3", "D" => "2", "C" => "5", "E" => "6", "A" => "1", "F" => "4"];
        $arr2 = ["3" => "B", "2" => "D", "5" => "C", "6" => "E", "1" => "A", "4" => "F"];
        krsort($arr1);
        krsort($arr2);
        var_dump($arr1);
        var_dump($arr2);
        ?>
    </li>
    <li>
        用回调函数排序（默认从小到大）。usort($array)
        <?php
        function mysort($a, $b)//返回值为正整数的排后面，为负整数的排前面。
        {
            if ($a === $b) {
                return 0;
            } elseif (is_string($a) && is_string($b)) {#字符与字符比较，根据ASCII码比较字符串，返回-1,0,1
                return strcmp($a, $b);
            } elseif (is_string($a) && is_int($b)) {#字符与数字比较
                return -1;
            } elseif (is_int($a) && is_string($b)) {#数字与字符比较
                return 1;
            } elseif (is_int($a) && is_int($b)) {#数字与数字比较
                return -($a - $b);
            } else {
                return 0;
            }
        }

        $arr = ['b', 2, 'c', 1, 'a', 3, '8', '7'];//包含字符串、数字、字符串中的数字
        usort($arr, 'mysort');
        var_dump($arr);
        ?>
    </li>
    <li>
        比较键值，返回差集（即与其他数组不同的部分）。array_diff($arr1,$arr2)<br/>
        <?php
        $arr1 = ["a" => "red", "b" => "green"];
        $arr2 = ["c" => "red"];
        $result = array_diff($arr1, $arr2);
        var_dump($arr1);
        var_dump($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        比较键名，返回差集（即与其他数组不同的部分）。array_diff_key($arr1,$arr2)<br/>
        <?php
        $arr1 = ["a" => "red", "b" => "green"];
        $arr2 = ["b" => "red"];
        $result = array_diff_key($arr1, $arr2);
        var_dump($arr1);
        var_dump($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        比较键名和键值，返回差集。array_diff_assoc($arr1,$arr2)<br/>
        比较键名和键值，用回调函数比较键名，返回差集。array_diff_uassoc<br/>
        比较键名和键值，用回调函数比较键值，返回差集。array_udiff_assoc<br/>
        用回调函数比较键名和键值，返回差集。array_udiff_uassoc
        <?php
        $arr1 = ["a" => "red", "b" => "green", "c" => "red"];
        $arr2 = ["b" => "bread", "c" => "red"];
        $result = array_diff_assoc($arr1, $arr2);
        var_dump($arr1);
        var_dump($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        比较键值，返回交集。array_intersect($arr1,$arr2)<br/>
        <?php
        $arr1 = ["a" => "chip", "b" => "green", "d" => "red"];
        $arr2 = ["e" => "green", "c" => "red"];
        $result = array_intersect($arr1, $arr2);
        var_dump($arr1);
        var_dump($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        比较键名，返回交集。array_intersect_key($arr1,$arr2)<br/>
        <?php
        $arr1 = ["a" => "chips", "b" => "green", "e" => "red"];
        $arr2 = ["e" => "green", "c" => "red"];
        $result = array_intersect_key($arr1, $arr2);
        var_dump($arr1);
        var_dump($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        比较键名和键值，返回交集。array_diff_assoc($arr1,$arr2)<br/>
        比较键名和键值，用回调函数比较键名，返回差集。array_intersect_uassoc<br/>
        比较键名和键值，用回调函数比较键值，返回差集。array_uintersect_assoc<br/>
        用回调函数比较键名和键值，返回交集。array_uintersect_uassoc
        <?php
        $arr1 = ["a" => "red", "b" => "green", "c" => "red"];
        $arr2 = ["e" => "green", "c" => "red"];
        $result = array_intersect_assoc($arr1, $arr2);
        var_dump($arr1);
        var_dump($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        交换数组中的键和值。array_flip($array)
        <?php
        $arr1 = ['apple', 'banana', 'cheese'];
        $arr2 = ['a' => 'apple', 'b' => 'banana', 'c' => 'cheese'];
        var_dump($arr1);
        var_dump($arr2);
        $result = array_flip($arr1);
        var_dump($result);
        $result = array_flip($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        以指定数量的元素，构成数组（指定开始索引）。array_fill($start_index,$number,$value)
        <?php
        $result = array_fill(101, 5, 'hello');
        var_dump($result);
        ?>
    </li>
    <li>
        用指定值，将数组填补到指定长度。array_pad($array,$pad_size,$pad)
        <?php
        $arr = ['apple', 'banana'];
        $result = array_pad($arr, 5, 'cheese');
        var_dump($result);
        ?>
    </li>
    <li>
        检查某个数组中，是否存在指定的键名。array_key_exists($key,$array)
        <?php
        $arr = ['a' => 'apple', 'b' => 'banana'];
        $result = array_key_exists('a', $arr);
        var_dump($result);

        $result = array_key_exists('c', $arr);
        var_dump($result);
        ?>
    </li>
    <li>
        检查某个数组中，是否存在指定的键值。in_array($value,$array)
        <?php
        $arr = ['a' => 'apple', 'b' => 'banana'];
        $result = in_array('apple', $arr);
        var_dump($result);

        $result = in_array('cheese', $arr);
        var_dump($result);
        ?>
    </li>
    <li>
        返回包含数组中所有键名的数组。array_keys($array)
        <?php
        $arr = ['USA' => 1001, 'UFO' => 1002, 'FBI' => 1003];
        $result = array_keys($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        返回包含数组中所有值的数组。array_values($array)
        <?php
        $arr = ['USA' => 1001, 'UFO' => 1002, 'FBI' => 1003];
        $result = array_values($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        在数组中搜索某个键值，并返回对应的键名。array_search($value,$array)
        <?php
        $arr = ['USA' => 1001, 'UFO' => 1002, 'FBI' => 1003];
        $result = array_search(1002, $arr);
        var_dump($result);
        ?>
    </li>
    <li>
        合并一个或多个数组，相同键名的用后值覆盖前值。array_merge($arr1,$arr2)
        <?php
        $arr1 = ['a' => 'apple', 'b' => 'banana'];
        $arr2 = ['b' => 'dumpling', 'c' => 'chips'];
        $result = array_merge($arr1, $arr2);
        var_dump($arr1);
        var_dump($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        合并一个或多个数组，相同键名的递归合并。array_merge_recursive($arr1,$arr2)
        <?php
        $arr1 = ['a' => 'apple', 'b' => 'banana'];
        $arr2 = ['b' => 'dumpling', 'c' => 'chips'];
        $result = array_merge_recursive($arr1, $arr2);
        var_dump($arr1);
        var_dump($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        向数组开头插入新元素，返回新数组的长度。array_unshift($array,$value...)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        $result = array_unshift($arr, 'eggplant', 'fish');
        var_dump($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        向数组尾部添加新元素，返回新数组的长度。array_push($array,$value...)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        $result = array_push($arr, 'eggplant', 'fish');
        var_dump($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        删除数组中第一个元素，并返回这个元素。array_shift($array)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        $result = array_shift($arr);
        var_dump($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        删除数组中最后一个元素，并返回这个元素。array_pop($array)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        $result = array_pop($arr);
        var_dump($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        从数组中根据条件(开始与长度)取出一部分，返回取出的数组(true保留键名，false重置键名)。array_slice($array,$start,$length,$preserve)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        var_dump($arr);
        $result = array_slice($arr, 2, 2, true);
        var_dump($result);

        $result = array_slice($arr, 2, 2, false);
        var_dump($result);
        ?>
    </li>
    <li>
        从数组中用新元素取代选定的部分，返回被移除的部分。array_splice($array)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        var_dump($arr);
        $result = array_splice($arr, 1, 1, ['JAP', 'CN', 'EN']);
        var_dump($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        使用后面数组的值替换前数组的值（索引对索引交换，不够长则保留原值；如果前数组有键名，则不会被移除）。array_replace($arr1,$arr2)
        <?php
        $arr1 = ['apple', 'banana', 'chip'];
        $arr2 = ['chiken', 'noodle'];
        $result = array_replace($arr1, $arr2);
        var_dump($arr1);
        var_dump($arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        从数组中随机取出一个或指定个数的键名。array_rand($array,$num)
        <?php
        $arr = ['apple', 'banana', 'chip', 'chiken', 'noodle'];
        var_dump($arr);

        $result = array_rand($arr);
        var_dump($result);

        $result = array_rand($arr, 3);
        var_dump($result);
        ?>
    </li>
    <li>
        以相反的元素顺序返回数组。array_reverse($array)
        <?php
        $arr = [1, 3, 5, 7];
        $result = array_reverse($arr);
        var_dump($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        移除数组中的重复的值，并返回结果数组。array_unique($arr)
        <?php
        $arr = [1, 1, 2, 2, 3];
        $result = array_unique($arr);
        var_dump($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        返回数组中当前元素的值。current($array)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        $result = current($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        将内部指针指向数组中的下一个元素，并返回该元素。next($array)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        $result = next($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        将内部指针指向数组中的上一个元素，并返回该元素。next($array)
        <?php
        $result = prev($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        将数组内部指针指向最后一个元素，若成功则返回该元素的值。end($array)
        <?php
        $result = end($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        将内部指针指向数组中的第一个元素，并返回该元素的值。reset($array)
        <?php
        $result = reset($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        返回数组内部指针当前指向元素的键名。key($array)
        <?php
        $result = key($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        给一组变量赋值。list($array)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        var_dump($arr);
        list($var1, $var2, $var3) = $arr;
        var_dump($var1);
        var_dump($var2);
        var_dump($var3);
        ?>
    </li>
    <li>
        创建一个包含指定范围的元素的数组。range($start,$end)
        <?php
        $result = range(0, 6);
        var_dump($result);

        $result = range('a', 'f');
        var_dump($result);
        ?>
    </li>
    <li>
        把数组中的元素按随机顺序重新排列。shuffle($array)
        <?php
        $arr = ['apple', 'banana', 'chip'];
        shuffle($arr);
        var_dump($arr);
        ?>
    </li>
    <li>
        返回输入数组中某个单一列的值组成的数组。array_column($arr,$column_name)
        <?php
        $arr = [
            ['id' => 5698, 'first_name' => 'Bill', 'last_name' => 'Gates'],
            ['id' => 4767, 'first_name' => 'Steve', 'last_name' => 'Jobs'],
            ['id' => 3809, 'first_name' => 'Mark', 'last_name' => 'Zuckerberg']
        ];
        var_dump($arr);
        $result = array_column($arr, 'id');
        var_dump($result);

        $result = array_column($arr, 'first_name');
        var_dump($result);

        $result = array_column($arr, 'last_name');
        var_dump($result);
        ?>
    </li>
    <li>
        合并两个数组为一个新数组，一个数组作键名，一个数组作键值（元素个数必须相同）。array_combine(keys_array,values_array)
        <?php
        $arr1 = array("Bill", "Steve", "Mark");
        $arr2 = array("60", "56", "31");
        var_dump($arr1);
        var_dump($arr2);
        $result = array_combine($arr1, $arr2);
        var_dump($result);
        ?>
    </li>
    <li>
        对数组中的所有值进行计数。array_count_values($array)
        <?php
        $arr = ["chips", "chips", "potatoes", "potatoes", "potatoes"];
        var_dump($arr);
        $result = array_count_values($arr);
        var_dump($result);
        ?>
    </li>
    <li>
        创建包含变量名和它们的值的数组。compact($var_name1,...)
        <?php
        $firstname = "Bill";
        $lastname = "Gates";
        $age = "60";
        $result = compact('firstname', 'lastname', 'age');
        var_dump($result);
        ?>
    </li>
    <li>
        递归函数：直接或间接调用函数本身的函数。
        <?php
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
        function doArray($arr1, $arr2)
        {
            foreach ($arr1 as $key1 => &$value1) {
                foreach ($arr2 as $key2 => &$value2) {
                    if ($key1 === $key2) {//两数组有相同键
                        if (is_array($value1)) {//两数组相同键的值，若都是数组，或前者是数组后者非数组
                            $value1 = doArray($value1, (array)$value2);
                        } else {//前值非数组
                            return array_merge($arr1, $arr2);
                        }
                    }
                }
            }
            return $arr1;
        }

        $arr1 = ['a' => ['hkuc' => ['hkuc']]];
        $arr2 = ['a' => ['hkuc' => 1]];
        var_dump($arr1);
        var_dump($arr2);
        $result = doArray($arr1, $arr2);
        var_dump($result);
        ?>
    </li>
</ol>
</body>
</html>