<?php
ini_set('session.name','zxy-session');

session_start();

$_SESSION['session_key1']='session_value1';

setcookie('cookie_key2','cookie_value2',time()+24*3600);

$_COOKIE['cookie_key1']='cookie_value1';

var_dump($_SESSION);

var_dump($_COOKIE);