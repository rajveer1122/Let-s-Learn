<?php
    require_once "config.php";

if(isset($_GET["del_id"]) && !empty($_GET["del_id"])){
    // Include config file
    
    $user_id=$_GET['del_id'];
    $sql = "delete  from student where id='$user_id'";
    $result=mysqli_query($conn,$sql) or die("query unsuccesfull");




    if($result){
        echo '<script type ="text/JavaScript">
         alert("Data deleted");
         location= "index.php";

         </script>';  
    }
mysqli_close();
}

?>