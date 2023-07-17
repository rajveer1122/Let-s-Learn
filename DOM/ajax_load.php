<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}

$sql = "select * from employee";
$res = mysqli_query($conn, $sql);

$output = " ";
if (mysqli_num_rows($res) > 0) {
    $output = '<table class="table">
        <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Operations</th>
        </tr>';

    while ($row = mysqli_fetch_assoc($res)) {
        $output .= "<tr>
                <td>{$row['id']}</td>
                <td>{$row['Name']}</td>
                <td>

                    <button type='button' class='del-btn btn btn-danger pull-right mr-3' data-id='{$row['id']}'>Delete</button>
                    <button type='button' class='edit-btn btn btn-primary pull-right mr-3' data-id='{$row['id']}'>Edit</button>
                    </td>
            </tr>";
    }

    mysqli_close($conn);
    echo $output;
} else {
    echo "no";
}
