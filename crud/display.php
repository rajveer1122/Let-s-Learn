<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<style>
input[type=text], input[type=password] {
  width: 50%;
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

label {
  color: #133955;
  padding-right: 10%;
  font-family: Arial;
}

.container {
  padding: 16px;
}
</style>

</head>
<body>
<?php
if (isset($_GET['d_id'])) {




require_once "config.php";
                    
$user_id = $_GET['d_id']; 
$sql = "SELECT * FROM student  WHERE `id`='$user_id'";
$result=mysqli_query($conn,$sql) or die ("querry unsuccessful");

if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $course=$row['course'];
?>


<form action="edit.php" method="POST" style="border:1px solid #ccc">
<div class="container">

<h1> Student data</h1>
<hr>
<label for="fname">Student ID </label>
<input type= "text" name="id" value= "<?php echo $row['id']; ?>"><br>

<label for="fname">Name      </label>
<input type="text" placeholder="Name" name="fname" value= "<?php echo $row['name']; ?>" ><br>

<label for="fname">Email</label>
<input type="text" placeholder="E-mail" name="mail" value= "<?php echo $row['email']; ?>"><br>

<label for="fname">Course</label>
<input type="text" placeholder="course" name="mail" value= "<?php echo $row['course']; ?>"><br>



<label for="fname">Phone</label>
<input type="text" placeholder="Phone" name="phone" value= "<?php echo $row['phone']; ?>"><br><br>


</div>
</form>
  <?php
}
}
}

  ?>
</body>
</html>


  
