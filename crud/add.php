<?php
    require_once "config.php";
    $name=$_POST['fname'];
    $email=$_POST['mail'];
    $course=$_POST['course'];
    $phone=$_POST['phone'];
    $sql="insert into student (name,email,course,phone) values ('$name','$email','$course','$phone')";
    $result=mysqli_query($conn,$sql) or die ("querry unsuccessful");

    if($result){
        echo '<script type ="text/JavaScript">
         alert("Entry Done")

         </script>';  
    }
    header("location: index.php");



?>