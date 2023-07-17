<?php
 $empid = $_POST["id"];

 $conn = mysqli_connect("localhost","root","","crud");

 $sql="delete from employee where id='$empid'";
 $res=mysqli_query($conn,$sql);
 
 if($res){
    echo 1;
 }else{
    echo 0;
 }

?>