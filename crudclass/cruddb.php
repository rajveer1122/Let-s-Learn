<?php

session_start();
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'crud');
//DB- crud, TABLE- student, COL- name,email,course,phone

class crud_con
{
    private $dbh;
    public function __construct()
    {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbh = $con;
// Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {
            echo "";
        }
    }

//Data Insertion Function
    public function insertion($name, $email, $course, $phone)
    {
        $addrecord = mysqli_query($this->dbh, "insert into student(name,email,course,phone) values('$name','$email','$course','$phone')");
        return $addrecord;
    }

//Data Updation Function
    public function update($name, $email, $course, $phone, $user_id)
    {
        $updaterecord = mysqli_query($this->dbh, "update student set name='$name', email='$email', course='$course', phone='$phone' where id='$user_id' ");
        return $updaterecord;

    }

//Data Deletion Function
    public function del($del_id)
    {

        $delrecord = mysqli_query($this->dbh, "delete from student where id='$del_id' ");
        echo "<script>window.location.href='index.php'</script>";
        return $delrecord;

    }

    public function fetchrecord()
    {
        $result = mysqli_query($this->dbh, "select * from student");
        return $result;
    }

    public function fetchonerecord($u_id)
    {
        $fr = mysqli_query($this->dbh, "SELECT * FROM student  WHERE `id`='$u_id'");
        return $fr;
    }

} //end of class
