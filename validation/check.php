<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jval</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <style>
input[type=text], input[type=password], input[type=email] {
  width: 50%;
  padding: 16px;
  margin: 10px;
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
<body>
    <h1>Javascript validation</h1>
    <form action ="checkdata.php" name="dataform" onsubmit="return validateForm()" method="POST">
      <div class="formdesign" id="name">
          Name: <input type="text" name="fname" ><b><span class="formerror"> </span></b>
      </div>

      <div class="formdesign" id="email">
          Email: <input type="email" name="femail" ><b><span class="formerror"> </span></b>
      </div>

      <div class="formdesign" id="phone">
          Phone: <input type="text" name="fphone" ><b><span class="formerror"> </span></b>
      </div>

      <div class="formdesign" id="subject">
        <span>Please select your course:</span> <b><span class="formerror"> </span></b><br>
        <input type="radio" id="mca" name="course" value="MCA">
        <label for="mca">MCA</label><br>

        <input type="radio" id="bca" name="course" value="BCA">
        <label for="bca">BCA</label><br>

        <input type="radio" id="mba" name="course" value="MBA">
        <label for="mba">MBA</label><br>

        <input type="radio" id="bba" name="course" value="BBA">
        <label for="bba">BBA</label><br>
      </div>

      <div class="formdesign" id="pass">
          Password: <input type="password" name="fpass" ><b><span class="formerror"> </span></b>
      </div>

      <div class="formdesign" id="cpass">
          Confirm Password: <input type="password" name="fcpass" ><b><span class="formerror"> </span></b>
      </div>




<input type="submit" value="Submit" name="submit" class="btn btn-success">

</form>
    
</body>
<script>



function clearErrors(){
errors = document.getElementsByClassName('formerror');
for(let item of errors)
{
    item.innerHTML = "";
}
}

function seterror(id, error){
//sets error inside tag of id 
element = document.getElementById(id);
element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
var returnval = true;
clearErrors();

//perform validation and if validation fails, set the value of returnval to false
var name = document.forms['dataform']["fname"].value;
if (name.length<5){
    seterror("name", "*Name is too short");
    returnval = false;
}

if (name.length == 0){
    seterror("name", "*Please provide name.");
    returnval = false;
}

if (!(name.match(/^[a-zA-Z. ]{3,}$/im))) { 
            
    seterror("name","*only alphabets allowed."); 
    returnval= false; 
} 


var email = document.forms['dataform']["femail"].value;
if (email.length>15){
    seterror("email", "*Email is too long");
    returnval = false;
}

if (email.length == 0){
    seterror("email", "*Please provide Email.");
    returnval = false;
}

var phone = document.forms['dataform']["fphone"].value;

if (phone.length != 10){
    seterror("phone", "*Phone number should be of 10 digits!");
    returnval = false;
}

if ((phone.match(/[A-Za-z]/))){
    seterror("phone", "*Phone number should be Numeric!");
    returnval = false;
}

var getSelectedValue = document.querySelector( 'input[name="course"]:checked');   
if(getSelectedValue == null) {     
         seterror("subject","*Please select your course");  
 }

var pass = document.forms['dataform']["fpass"].value;
if (pass.length < 7){
    seterror("pass", "*Password should be atleast 8 characters long!");
    returnval = false;
}

if (!(pass.match(/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9!@#$%^&*]{8,}$/m))){
    seterror("pass", "*Password should have atleast one number,one special character and one uppercase lowercase!");
    returnval = false;
}

var cpass = document.forms['dataform']["fcpass"].value;
if (cpass != pass){
    seterror("cpass", "*Password and Confirm password not matched!");
    returnval = false;
}


if(returnval){
    alert("<b>Submitted</b>");
}

return returnval;


}


</script>

</html>
