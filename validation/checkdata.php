<?php
    require_once "config.php";
    //print_r($_POST);
    $name=$_POST['fname'];
    $email=$_POST['femail'];
    $course=$_POST['course'];
    $phone=$_POST['fphone'];
    $pass=$_POST['fpass'];
    $cpass=$_POST['fcpass'];

    $sql="insert into val (name,email,course,phone,password,cpassword) values ('$name','$email','$course','$phone','$pass','$cpass')";
    $result=mysqli_query($conn,$sql) or die ("querry unsuccessful");

    if($result){
        echo '<script type ="text/JavaScript">
         alert("Entry Done")

         </script>';  
    }
    header("location: check.php");

?>