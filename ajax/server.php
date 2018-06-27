<?php

$_GET['op']();

/*
 * @describe 输出json数据
 * */
function json($isOk, $message, $data)
{
    $result = [
        'result' => $isOk ? 'success' : 'error',
        'message' => $message,
        'data' => $data
    ];
    echo json_encode($result);
}

function xhr1(){
    json(true,'xhr1 responds',$_GET);
}

function xhr2(){
    json(true,'xhr2 responds',$_POST);
}

function jq_sync1(){
    json(true,'sync1 responds',$_GET);
}

function jq_xhr1(){
    json(true,'jq_xhr1 responds',$_GET);
}

function jq_xhr2(){
    json(true,'jq_xhr2 responds',$_POST);
}

function jq_formdata1(){
    json(true,'jq_formdata1 responds',$_POST);
}

function jq_formdata2(){
    json(true,'jq_formdata2 responds',$_POST);
}

function jq_xhr_post(){
    json(true,'jq_xhr_post responds',$_POST);
}

function jq_xhr_get(){
    json(true,'jq_xhr_get responds',$_GET);
}
