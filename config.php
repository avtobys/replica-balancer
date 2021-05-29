<?php
 
$slave_load_percent = 77;
if ($_SERVER['SCRIPT_NAME'] == '/index.php' && $slave_load_percent && $slave_load_percent >= (substr(number_format(microtime(true), 1, '.', ''), -3) * 10)) {
    $mysqli = new mysqli('192.168.0.222', 'user', 'pass', 'db');
    if ($mysqli->connect_error) {
        $mysqli = new mysqli('192.168.0.111', 'user', 'pass', 'db');
    }
} else {
    $mysqli = new mysqli('192.168.0.111', 'user', 'pass', 'db');
    if ($mysqli->connect_error) {
        $mysqli = new mysqli('192.168.0.222', 'user', 'pass', 'db');
    }
}
 
if ($mysqli->connect_error) {
    die('Error connection (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");
