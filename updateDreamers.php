<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require('/home/nightshi/connect.php');

$activity = $_POST['status'];
$id = $_POST['dreamerId'];

$activity = mysqli_real_escape_string($cnxn, $activity);
$id = mysqli_real_escape_string($cnxn, $id);

$sql = "UPDATE `dreamers` SET activity = '$activity' WHERE dreamer_id = '$id'";

echo $sql;
$result = mysqli_query($cnxn, $sql);
