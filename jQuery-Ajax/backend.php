<?php
#前端通过后端定义的接口（地址、数据格式、请求方式）发收数据
#header("Access-Control-Allow-Origin:*");#前端ajax访问用
#header("Access-Control-Allow-Methods:GET,POST");#前端ajax访问用
$data=[//模拟数据库
	['id'=>2, 'name'=>'tom'],
	['id'=>3, 'name'=>'alice']
];

if($_SERVER['REQUEST_METHOD']=='POST'){//前端通过post方式提交数据，后端收到数据后再返回提交结果
	if(empty($_POST['id'])){
		echo ErrorJson('数据格式不正确。');die;
	}
	echo SuccessJson('ID为'.$_POST['id'].'的用户信息已更新。','');
}else{//前端通过get方式请求数据
	if(empty($_GET['requireid'])){
		echo ErrorJson('数据格式不正确。');die;
	}
	foreach ($data as $each){//模拟查询
		if($each['id']==$_GET['requireid']) $data=$each;
	}
	echo SuccessJson('用户的数据。',$data);
}
//=============================================================
function SuccessJson($msg,$data){
	return buildJson('success',$msg,$data);
}
function ErrorJson($msg){
	return buildJson('error',$msg,'');
}
function buildJson($result,$messsge,$data){#封装数据为json格式
	$arr=['result'=>$result, 'message'=>$messsge, 'data'=>$data];
	return json_encode($arr);
}
