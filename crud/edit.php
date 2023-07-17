<?php
      require_once "config.php";

      $user_id = $_POST['id'];
      $name = $_POST['fname'];
      $email = $_POST['mail'];
      $course = $_POST['course'];
      $phone = $_POST['phone'];

      $sql = "update student set name='$name', email='$email', course='$course', phone='$phone' where id='$user_id' ";
      $result=mysqli_query($conn,$sql);

      if($result){
        echo '<script type ="text/JavaScript">
         alert("Data Updated");
         window.location= "index.php";
         </script>';  
        }
       else{

        echo "Error:" . $sql . "<br>" . $conn->error;

       }

    


?>