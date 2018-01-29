<?php
//首次进入页面
$this_year=date('Y');
$this_month=date('n');
$options=options($this_year,$this_month);
//默认显示今天的日期
function options($this_year,$this_month){
	/* 生成年份的下拉内容 $year_options */
	$year_options="";
	$month_options="";
	for($year=date('Y')+5;$year>=1900;$year--){
		if($this_year==$year){
			$year_options.="<option value='$year' selected='selected'>$year</option>";
			continue;
		}
		$year_options.="<option value='$year'>$year</option>";
	}
	/*******************/
	/* 生成月份的下拉内容 $month_options */
	for($month=1;$month<=12;$month++){
		if($this_month==$month){
			$month_options.="<option value='$month' selected='selected'>$month</option>";
			continue;
		}
		$month_options.="<option value='$month'>$month</option>";
	}
	return [$year_options,$month_options];//传递给显示层的数组变量
}
/*******************/
if(!empty($_GET)){//选择了年月之后
	$target_year=$_GET['year'];
	$target_month=$_GET['month'];
	$options=options($target_year,$target_month);//若选择了年月，则在下拉菜单的值显示选择的年月
	/* 生成目标日历内容 $table */
	/* 计算目标月的1号是星期几 */
	$target=mktime(0,0,0,$target_month,1,$target_year);
	$start_day=date('w',$target);//1号在星期几（+1是因为结果是从0开始计，为了方便使用）
	if($start_day==0)$start_day=7;//赋值为7，因为下面循环表格的时候列数只有1~7，这样方便对应
	if($target_year%4==0&&$target_year%100!=0||$target_year%400==0)$year_run=true;//闰年
	else $year_run=false;//非闰年
	switch($target_month){
		case 1:case 3:case 5:case 7:case 8:case 10:case 12:$month_days=31;break;
		case 4:case 6:case 9:case 11:$month_days=30;break;
		case 2:if($year_run)$month_days=29;else $month_days=28;break;
		default:break;
	}
	$table='<tr height="14%"><th width="14%">一</th><th width="14%">二</th><th width="14%">三</th><th width="14%">四</th><th width="14%">五</th><th width="14%">六</th><th width="14%">日</th></tr>';
	for($rows=1;$rows<6;$rows++){//预设显示五行，因为有的月份在五行以内，所以不显示第六行空格子
		$table.='<tr height="14%">';
		for($column=1;$column<=7;$column++){//总共7列
			if($rows==1&&$column==$start_day){//第一行，且列数等于1号所在星期几
				$num=1;//日期号数
				$table.="<td width='14%'>$num</td>";
			}elseif($rows>1||$column>$start_day){//非第一行，或列数大于1号所在星期几
				if($num<$month_days){//号数小于当月总天数（第一天已使用）
					$table.='<td width="14%">'.++$num.'</td>';
				}else $table.='<td width="14%">&nbsp;</td>';//号数超出当月总天数
			}else{//1号之前的空格子
				$table.='<td width="14%">&nbsp;</td>';
			}
		}
		$table.='</tr>';
	}
	if($num<$month_days){//超出第五行的情况，则加上剩余的天数
		$table.='<tr>';
		for($column=0;$column<7;$column++){
			if($column<=$month_days-$num){
				$table.='<td width="14%">'.++$num.'</td>';
			}else $table.='<td width="14%">&nbsp;</td>';
		}
		$table.='</tr>';
	}
	/*******************/
	$data=[$target_year,$target_month,$table];

	HEAD();
	BODY1($options);
	BODY2($data);
	TAIL();
}else{
	HEAD();
	BODY1($options);
	TAIL();
}
?>
<!-- 以上为逻辑层 -->





<!-- 以下为显示层 -->
<?php function HEAD(){ ?>
	<!doctype html>
	<html>
	<head>
	<meta charset="utf-8">
	<title>日历</title>
	<style>
		td{text-align:center;}
	</style>
	</head>
<?php } ?>

<?php function BODY1($options){ ?>
	<body>
	<form method="get" action="">
		<select name="year"><?=$options[0]?></select>年
		<select name="month"><?=$options[1]?></select>月
		<input type="submit" value="显示" />
	</form>
<?php } ?>

<?php function BODY2($data){ ?>
	<table width="300px" height="250px" border="8" cellspacing="0" cellpadding="0">
		<caption><?=$data[0]?>年<?=$data[1]?>月的日历</caption>
		<?=$data[2]?>
	</table>
<?php } ?>

<?php function TAIL(){ ?>
	</body>
	</html>
<?php } ?>