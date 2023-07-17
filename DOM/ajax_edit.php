<?php
$empid = $_POST["id"];

$conn = mysqli_connect("localhost", "root", "", "crud");

$sql = "SELECT * from employee where id='$empid'";
$res = mysqli_query($conn, $sql);

$output = " ";

if (mysqli_num_rows($res) > 0) {
    $output .= '<table>';
    while ($row = mysqli_fetch_assoc($res)) {
        $output .= "<tr>
        <td>Name: <input type='text' id='edit-id' hidden value={$row["id"]}></input></td>

                        <td>Name: <input type='text' id='edit-fname' value='" . $row['Name'] . "'></input></td>
                        <td><input type='submit' class='edit-save'></input></td>
        </tr>";
    }

    mysqli_close($conn);
    echo $output;
} else {
    echo "no";
}
