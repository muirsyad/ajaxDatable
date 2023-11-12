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
            var table = $('#example').DataTable({
                // 'processing': true,
                // 'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'ajaxcall.php'
                },
                'columns': [{
                        data: 'first_name'
                    },
                    {
                        data: 'last_name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'gender'
                    },
                    {
                        data: 'status'
                    }
                ]
            });
            console.log("TEST");
            setInterval(function() {
                table.ajax.reload();
                console.log('reload');
            }, 30000);
            // $.ajax({
            //     'processing': true,
            //   	'serverSide': true,
            //     type: "post",
            //     url: "ajaxcall.php",
            //     'columns': [
            //      	{ data: 'first_name' },
            //      	{ data: 'last_name' },
            //      	{ data: 'email' },
            //      	{ data: 'gender' },
            //         { data: 'status' }
            //   	],

            //     data: {},
            //     dataType: 'JSON',
            //     success: function(response) {
            //         console.log(response);
            //         // put on console what server sent back...
            //     },
            //     error: function(error){
            //         console.warn(error)
            //     }
            // });
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

    </table>
</body>

</html>