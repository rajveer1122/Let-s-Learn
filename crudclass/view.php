
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Student info</title>
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


<div class="container">
    <br><br>
<h1> Student data</h1>
<br><br>
<table class="table table-striped">
  <thead>
    <tr class="table-primary">
      <th scope="col">Student</th>
      <th scope="col">Info</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>ID</td>
      <td><?php echo $row['id']; ?></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $row['name']; ?></td>
    </tr>
    <tr>
      <td>Course</td>
      <td><?php echo $row['course']; ?></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><?php echo $row['phone']; ?></td>
    </tr>

  </tbody>
</table>
<a href="index.php" class="btn btn-success pull-right mr-3"> Go Back </a>
</div>
</form>
  <?php
   }
   }
}
  ?>
</body>
</html>





  
