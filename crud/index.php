<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <br>
    
    <h1 ml-3>Student details</h1>
    <a href="insert.php" class="btn btn-success pull-right mr-3"> Add New student</a>

    <?php
                    require_once "config.php";
                    
                    $sql = "SELECT * FROM student";
                    $result=mysqli_query($conn,$sql) or die ("querry unsuccessful");
                    if(mysqli_num_rows($result)>0){
    ?>
    
    <br><br>
    <table cellpadding="4px" class="table table-striped">
        <thead>
            <th> id </th>
            <th> Name </th>
            <th> Email</th>
            <th> course</th>
            <th> Phone</th>
            <th>View</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
        <tbody>

    <?php
                    while($row=mysqli_fetch_assoc($result)){
    ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><a href="display.php?d_id=<?php echo $row['id']; ?>" class="btn btn-info">View</a></td>
                        <td><a href="update.php?up_id=<?php echo $row['id']; ?>" class="btn btn-secondary">Edit</a></td>
                        <td><a href="del.php?del_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
    <?php
                    }//end of while
    ?>
    </tbody>
    </table>

    <?php
                    }//end of if
                    else "0 results";
    ?>


</body>
</html>