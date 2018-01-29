<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>手机OOP</title>
</head>
<body>
<?php
    class Phone{
        public $battery=100;
        public $num_book=[//电话簿
            'aa'=>'123',
            'bb'=>'234',
            'cc'=>'345'];
        public $record=array();
        public function chargeup(){//充电
            $this->battery=100;
            echo "充电完毕。剩余电量：",$this->battery,"%<br />";
        }
        public function call($num){//拨打电话
            if($this->battery>0){
                $this->battery--;
                foreach ($this->num_book as $name=>$b_num){
                    if($num==$b_num&&isset($this->record[$name])){
                        $this->record[$name]++;
                    }elseif($num==$b_num){
                        $this->record[$name]=1;
                    }
                }
                echo "与",$num,"通话成功。剩余电量：",$this->battery,"%<br />";

            }
            else{
                $this->on=false;
                echo '电量不足。';
            }
        }
        public function showRecord(){//显示通话记录
            echo "<table cellspacing='0' cellpadding='0' border='1'>
<caption>通话记录</caption>
<tr><th>姓名</th><th>通话次数</th></tr>";
            foreach ($this->record as $name=>$times){
                echo "<tr></tr><td>$name</td><td>$times</td></tr>";
            }
            echo "</table>";
        }
    }
    $phone1=new Phone();
    $phone1->call('111');
    $phone1->call('222');
    $phone1->call('123');
    $phone1->call('123');
    $phone1->call('234');
    $phone1->call('345');
    $phone1->showRecord();
    $phone1->chargeup();
    $phone1->call('199');
?>
</body>
</html>