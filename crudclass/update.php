


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<style>
input[type=text], input[type=password] {
  width: 90%;
  padding: 16px;
  margin: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

.container {
  padding: 16px;
}
</style>

</head>
<body>

<?php
  
  include "cruddb.php";

  if (isset($_GET['user_id'])) {
    $user_id=$_GET['user_id'];

    $obj=new crud_con();
    $result=$obj->fetchonerecord($user_id);

  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
      $course=$row['course'];

?>


<form action="update_user.php" method="POST" style="border:1px solid #ccc">
<div class="container">

<h1> Update Student data</h1>
<hr>
<input type= "hidden" name="id" value= "<?php echo $row['id']; ?>">
<input type="text" placeholder="Name" name="fname" value= "<?php echo $row['name']; ?>" ><br>

<input type="text" placeholder="E-mail" name="mail" value= "<?php echo $row['email']; ?>"><br>

<p>Please select your course:</p>
  <input type="radio" id="mca" name="course" value= "MCA" <?php if($course == 'MCA'){ echo "checked";} ?>>
  <label for="mca">MCA</label><br>

  <input type="radio" id="bca" name="course" value= "BCA" <?php if($course == 'BCA'){ echo "checked";} ?>>
  <label for="bca">BCA</label><br>

  <input type="radio" id="mba" name="course" value= "MBA" <?php if($course == 'MBA'){ echo "checked";} ?>>
  <label for="mba">MBA</label><br>

  <input type="radio" id="bba" name="course" value= "BBA" <?php if($course == 'BBA'){ echo "checked";} ?>>
  <label for="bba">BBA</label><br>


<input type="text" placeholder="Phone" name="phone" value= "<?php echo $row['phone']; ?>"><br><br>

<input type="submit" value="Update" name="update" class="btn btn-success">

</div>
</form>
  <?php
   }
   }
}
  ?>
</body>
</html>





  
