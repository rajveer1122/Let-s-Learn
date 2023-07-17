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
<form action="add.php" method="POST" name="insert_form" style="border:1px solid #ccc" onsubmit="return validateForm()">
<div class="container">

<h1> New Student</h1>
<hr>

<input type="text" placeholder="Name" name="fname" ><br>

<input type="text" placeholder="E-mail" name="mail" required><br>

<p>Please select your course:</p>
  <input type="radio" id="mca" name="course" value="MCA">
  <label for="mca">MCA</label><br>

  <input type="radio" id="bca" name="course" value="BCA">
  <label for="bca">BCA</label><br>

  <input type="radio" id="mba" name="course" value="MBA">
  <label for="mba">MBA</label><br>

  <input type="radio" id="bba" name="course" value="BBA">
  <label for="bba">BBA</label><br>


<input type="text" placeholder="Phone" name="phone" required><br><br>

<input type="submit" value="Submit" name="submit" class="btn btn-success">

</div>
</form>
    



<script>

function validateForm() {
  let x = document.forms["insert_form"]["fname"].value;
  let phone = document.forms["insert_form"]["phone"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }elseif(phone){
  var phoneno = /^\d{10}$/;
  if((inputtxt.value.match(phoneno))
        {
      return true;
        }
      else
        {
        alert("message");
        return false;
        }

  }
}
</script>
</body>
</html>
