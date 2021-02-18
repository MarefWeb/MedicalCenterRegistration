<?php
require_once './db.php';

$id = $_POST['id'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$third_name = $_POST['third-name'];
$gender = $_POST['gender'];
$born = date("Y-m-d", strtotime($_POST['born']));
$phone = $_POST['phone'];
$doctor = $_POST['doctor'];

mysqli_query($db, "UPDATE patients SET `surname` = '$surname', `name` = '$name', `third_name` = '$third_name', `gender` = '$gender', `born` = '$born', `phone` = '$phone', `doctor_id` = '$doctor' WHERE `id` = $id");

header("Location: /admin");