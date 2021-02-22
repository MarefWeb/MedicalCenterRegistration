<?php
require_once './db.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$third_name = $_POST['third-name'];
$gender = $_POST['gender'];
$specialization = $_POST['specialization'];

$first_res = mysqli_query($db, "INSERT INTO doctors (`name`, `surname`, `third_name`, `gender`, `specialization`) VALUES('$name', '$surname', '$third_name', '$gender', '$specialization')");

header("Location: /admin");