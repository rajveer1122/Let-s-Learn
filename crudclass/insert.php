<?php
include 'cruddb.php';

$obj = new crud_con();
if (isset($_POST['submit'])) {
    //echo"hello";
    $name = $_POST['fname'];
    $email = $_POST['mail'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];
    $sql = $obj->insertion($name, $email, $course, $phone);

    if ($sql) {
        // Message for successfull insertion
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
} //end of isset if

?>


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
    input[type=text],
    input[type=email],
    input[type=password] {
        width: 90%;
        padding: 16px;
        margin: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=email]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    .container {
        padding: 16px;
    }
    </style>
</head>

<body>
    <form action="insert.php" method="POST" name="insert_form" style="border:1px solid #ccc"
        onsubmit="return validateForm()">
        <div class="container">

            <h1> New Student</h1>
            <hr>
            <div class="formdesign" id="name">
                <input type="text" placeholder="Name" name="fname"><br><b><span class="formerror"> </span></b><br>
            </div>
            <div class="formdesign" id="email">
                <input type="email" placeholder="E-mail" name="mail"><br><b><span class="formerror"> </span></b><br>
            </div>
            <div class="formdesign" id="subject">
                <p>Please select your course:</p><br> <b><span class="formerror"> </span></b><br>
                  <input type="radio" id="mca" name="course" value="MCA">
                  <label for="mca">MCA</label><br>

                  <input type="radio" id="bca" name="course" value="BCA">
                  <label for="bca">BCA</label><br>

                  <input type="radio" id="mba" name="course" value="MBA">
                  <label for="mba">MBA</label><br>

                  <input type="radio" id="bba" name="course" value="BBA">
                  <label for="bba">BBA</label><br>
            </div>
            <div class="formdesign" id="phone">
                <input type="text" placeholder="Phone" name="phone"><br><b><span class="formerror"></span></b> <br><br>
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-success">

        </div>
    </form>




</body>

<script>
function clearErrors() {
    errors = document.getElementsByClassName('formerror');
    for (let item of errors) {
        item.innerHTML = "";
    }
}

function seterror(id, error) {
    //sets error inside tag of id
    element = document.getElementById(id); //use the id to check the span class
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm() {
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var name = document.forms['insert_form']["fname"].value;
    if (name.length < 5) {
        seterror("name", "*Name is too short"); // we will pass the id of div tag and error
        returnval = false;
    }

    if (name.length == 0) {
        seterror("name", "*Please provide name.");
        returnval = false;
    }

    if (!(name.match(/^[a-zA-Z. ]{3,}$/im))) {

        seterror("name", "*only alphabets allowed.");
        returnval = false;
    }


    var email = document.forms['insert_form']["mail"].value;
    if (email.length > 15) {
        seterror("email", "*Email is too long");
        returnval = false;
    }

    if (email.length == 0) {
        seterror("email", "*Please provide Email.");
        returnval = false;
    }

    var phone = document.forms['insert_form']["phone"].value;

    if (phone.length != 10) {
        seterror("phone", "*Phone number should be of 10 digits!");
        returnval = false;
    }

    if ((phone.match(/[A-Za-z]/))) {
        seterror("phone", "*Phone number should be Numeric!");
        returnval = false;
    }

    var getSelectedValue = document.querySelector('input[name="course"]:checked');
    if (getSelectedValue == null) {
        seterror("subject", "*Please select your course");
    }


    return returnval;


}
</script>

</html>