<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbName = 'projectx';

$conn = new mysqli($server,$username,$password,$dbName);

if($conn->connect_error){
    die("Connection Faild");
}
?>