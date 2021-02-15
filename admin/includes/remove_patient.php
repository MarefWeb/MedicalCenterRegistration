<?php
require_once './db.php';

$id = $_GET['id'];

mysqli_query($db, "DELETE FROM patients WHERE `id` = $id");

header('Location: /admin/content.php');
