<?php

switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
        $result=$_GET;
        $result['method']='get';
        echo json_encode($result);
        break;
    case 'POST':
        $result=$_POST;
        $result['method']='post';
        echo json_encode($result);
        break;
    default:
        break;
}
