<?php
require_once './db.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$third_name = $_POST['third-name'];
$gender = $_POST['gender'];
$born = date("Y-m-d", strtotime($_POST['born']));
$phone = $_POST['phone'];

$res = mysqli_query($db, "INSERT INTO patients (`name`, `surname`, `third_name`, `gender`, `born`, `phone`) VALUES('$name', '$surname', '$third_name', '$gender', '$born', '$phone')");

$succes = $res == 1 ? 'true' : 'false';
header("Location: /?succes=$succes");