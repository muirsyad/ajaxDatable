<?php
require_once("db_conn.php");
$sel = selectall($conn, "*", "users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                ajax: 'data/objects.txt',
            });
            console.log("TEST");
            $.ajax({
                type: "GET",
                url: "ajaxcall.php",
                data: {},
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    // put on console what server sent back...
                },
                error: function(error){
                    console.warn(error)
                }
            });
        });
    </script>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>email</th>
                <th>gender</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($sel as $key => $value) {
                $fn = $value['first_name'];
                $ln = $value['last_name'];
                $email = $value['email'];
                $gender = $value['gender'];
                $status = $value['status'];
                echo "<tr>";
                echo "<td>$fn</td>
                <td>$ln</td>
                <td>$email</td>
                <td>$gender</td>
                <td>$status</td>
                ";
                echo "</tr>";
            }
            ?>


        </tbody>
    </table>
</body>

</html>