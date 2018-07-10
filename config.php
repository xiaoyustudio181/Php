<?php
$global_config = [];
$global_config["host"] = "localhost";
$global_config["port"] = "3306";
$global_config["username"] = "root";
$global_config["password"] = "root";
$global_config["dbname"] = "log_data";

$config_my_path = __DIR__ . '/config_my.php';
if (file_exists($config_my_path)) {
    require_once($config_my_path);
}
