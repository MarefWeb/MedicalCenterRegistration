<?php
require_once './db.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$third_name = $_POST['third-name'];
$gender = $_POST['gender'];
$born = date("Y-m-d", strtotime($_POST['born']));
$phone = $_POST['phone'];
$doctor = $_POST['doctor'];

$res = mysqli_query($db, "INSERT INTO patients (`name`, `surname`, `third_name`, `gender`, `born`, `phone`, `doctor_id`) VALUES('$name', '$surname', '$third_name', '$gender', '$born', '$phone', '$doctor')");

if($res)
header("Location: /admin/thanks.php");
else
header("Location: /admin/fail.php");