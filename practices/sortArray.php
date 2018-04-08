<?php
$arr=[43,76,1,54,62,21,66,32,78,36,39];
function Bubble($arr){#冒泡排序法：每次从数组当中冒一个最大的数来
    $len=count($arr);
    for($i=1;$i<$len;$i++){#$i的初始值设为1是因为后面最多会用到arr[9]（第十个元素）与arr[9+1]（第十一个元素）比较
        for($k=0;$k<$len-$i;$k++){#$len-$i是因为每一轮结束后都有一个最大值归位，因此无需再与上一轮的最大值相比较
            if($arr[$k]>$arr[$k+1]){#两两相比：前者比后者大则换位（大的往后放），换位后，大数继续与后一位相比，若比后一位大则继续换位
                $tmp=$arr[$k+1];
                $arr[$k+1]=$arr[$k];
                $arr[$k]=$tmp;
            }
        }
    }
    #第一轮结束：1,43,54,21,62,32,66,36,76,39,78（第一大数值78到位）
    #第二轮结束：1,43,21,54,32,62,36,66,39,76,78（第二大数值76到位）
    #第三轮结束：1,21,43,32,54,36,62,39,66,76,78（第三大数值66到位）
    #第四轮结束：1,21,32,43,36,54,39,62,66,76,78（第四大数值62到位）
    #第五轮结束：1,21,32,36,43,39,54,62,66,76,78（第五大数值54到位）
    #第六轮结束：1,21,32,36,39,43,54,62,66,76,78（第六大数值43到位，至此排序已完成）
    return $arr;
}
function Select($arr) {#选择排序法
    for($i=0, $len=count($arr); $i<$len-1; $i++) {
        $p = $i;
        for($j=$i+1; $j<$len; $j++) {
            if($arr[$p] > $arr[$j]) {
                $p = $j;//$p值的变化将延续在接下来的循环中
            }
        }
        if($p != $i) {#若$p值发生变化，则交换循环初始元素与其最小元素的位置
            $tmp = $arr[$p];
            $arr[$p] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }
    #第一轮(i=0)结束(p=0)：1,43,54,62,21,66,32,78,36,76,39（未改变）
    #第二轮(i=1)结束(p=4)：1,21,54,62,43,66,32,78,36,76,39（43换21）
    #第三轮(i=2)结束(p=6)：1,21,32,62,43,66,54,78,36,76,39（54换32）
    #第四轮(i=3)结束(p=8)：1,21,32,36,43,66,54,78,62,76,39（62换36）
    #第五轮(i=4)结束(p=11)：1,21,32,36,39,66,54,78,62,76,43（43换39）
    #第六轮(i=5)结束(p=11)：1,21,32,36,39,43,54,78,62,76,66（66换43）
    #第七轮(i=6)结束：不变
    #第八轮(i=7)结束(p=8)：1,21,32,36,39,43,54,62,78,76,66（78换62）
    #第九轮(i=8)结束(p=11)：1,21,32,36,39,43,54,62,66,76,78（78换66，至此排序已完成）
    return $arr;
}
function Insert($arr) {#插入排序法
    for($i=1, $len=count($arr); $i<$len; $i++) {
        $tmp = $arr[$i];
        for($j=$i-1;$j>=0;$j--) {
            if($tmp < $arr[$j]) {#若后值小于前值，则交换位置（将小的值换到前面，大的值换到后面）
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {#若后值大于前值，则跳出本次循环
                break;
            }
        }
    }
    #第一轮结束(i=1)：不变
    #第二轮结束(i=2)：不变
    #第三轮结束(i=3)：不变
    #第四轮结束(i=4)：1,21,43,54,62,66,32,78,36,76,39（第二小数值到位）
    #第五轮结束(i=5)：1,21,32,43,54,62,66,78,36,76,39（第三小数值到位）
    #第六轮结束(i=6)：不变
    #第七轮结束(i=7)：1,21,32,36,43,54,62,66,78,76,39（第四小数值到位）
    #第八轮结束(i=8)：不变
    #第九轮结束(i=9)：1,21,32,36,39,43,54,62,66,78,76（第五、六、七、八、九小数值到位）
    #第十轮结束(i=10)：1,21,32,36,39,43,54,62,66,76,78（第十小数值到位，至此排序已完成）
    return $arr;
}
function Quick($arr) {#快速排序法
    $length = count($arr);
    if($length <= 1) {
        return $arr;
    }
    $base_num = $arr[0];
    $left_array = array();
    $right_array = array();
    for($i=1; $i<$length; $i++) {
        if($base_num > $arr[$i]) {
            $left_array[] = $arr[$i];//比标尺小的
        } else {
            $right_array[] = $arr[$i];//比标尺大的
        }
    }
    //递归调用本函数，对left和right两数组进行相同的排序处理方式
    $left_array = Quick($left_array);
    $right_array = Quick($right_array);
    return array_merge($left_array, array($base_num), $right_array);//合并left,base right
}

print_r($arr);echo "<br />";
print_r(Bubble($arr));echo "<br />";
print_r(Select($arr));echo "<br />";
print_r(Insert($arr));echo "<br />";
print_r(Quick($arr));echo "<br />";