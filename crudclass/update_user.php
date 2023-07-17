<?php
  require_once "cruddb.php";

  $obj = new crud_con();

if(isset($_POST['update'])){
    $user_id = $_POST['id'];
    $name=$_POST['fname'];
    $email=$_POST['mail'];
    $course=$_POST['course'];
    $phone=$_POST['phone'];
   
    $res=$obj->update($name,$email,$course,$phone,$user_id);

    
    if($res){
      echo '<script type ="text/JavaScript">
      alert("Data Updated");
      window.location= "index.php";
      </script>';   
        }
       else{

        echo "Error:" . $res . "<br>" . $conn->error;

       }
}
?>