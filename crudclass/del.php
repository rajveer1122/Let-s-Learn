<?php
include 'cruddb.php';

$obj =new crud_con();
if(isset($_GET["user_id"]) && !empty($_GET["user_id"])){
    $user_id=$_GET['user_id'];
    $result=$obj->del($user_id);
}
?>

