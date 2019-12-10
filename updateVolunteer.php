<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require('/home/nightshi/connect.php');

$activity = $_POST['status'];
$id = $_POST['volunteerId'];

$activity = mysqli_real_escape_string($cnxn, $activity);
$id = mysqli_real_escape_string($cnxn, $id);

$sql = "UPDATE `volunteer` SET activity = '$activity' WHERE volunteer_id = '$id'";

echo $sql;
$result = mysqli_query($cnxn, $sql);