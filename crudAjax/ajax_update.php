<?php
$empid = $_POST["id"];
$fn = $_POST["name"];

$conn = mysqli_connect("localhost", "root", "", "crud");

$sql = "UPDATE employee SET Name = '{$fn}' WHERE id='$empid'";
$res = mysqli_query($conn, $sql);

if ($res) {
    echo 1;
} else {
    echo 0;
}
