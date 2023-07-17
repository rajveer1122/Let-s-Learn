<?php
 $first_name = $_POST["first_name"];

 $conn = mysqli_connect("localhost","root","","crud");

 $sql="insert into employee (Name) values ('$first_name')";
 $res=mysqli_query($conn,$sql);
 
 if($res){
    echo 1;
 }else{
    echo 0;
 }

?>