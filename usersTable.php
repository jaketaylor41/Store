<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link href="MDB-Free_4.7.1/css/addons/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="style.css">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/js/mdb.min.js"></script>
    <script type="text/javascript" src="MDB-Free_4.7.1/js/addons/datatables.min.js"></script>



    <style>

        .table td, .table th{

            padding: 50px;
        }

        .wrapper{

            padding: 20px;

        }





    </style>

</head>


<body>



<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'UserBusinessService.php';

$pds = new UserBusinessService();

$persons = $pds->showAll();


?>
<div class="table-responsive" style="padding: 20px">
    <table id="usersTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >
        <thead>
        <tr>
            <th scope="col">Action</th>
            <th scope="col">ID</th>
            <th scope="col">Users First Name</th>
            <th scope="col">Users Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
        </tr>
        </thead>
        <tbody>
        <?php


        for($x = 0; $x < count($persons); $x++){
            echo "<tr>";
            echo "<td data-id='0'><form action='deleteUser.php'><input name = 'id' type='hidden' value=". $persons[$x]['ID'] ."><button id='deleteBtn' type='btn' style='background: none; border: 0; outline: none; cursor: pointer;'><span style='font-size: 20px;' class='far fa-trash-alt'></span></button></form>
                   <form action='editUserTable.php'><input name = 'id' type='hidden' value=". $persons[$x]['ID'] ."><button id='editBtn' type='btn' style='background: none; border: 0; outline: none; cursor: pointer;'><span style='font-size: 20px;' class='far fa-edit'></span></button></form>
                    <form action='addNewUserTable.php'><input name = 'id' type='hidden' value=". $persons[$x]['ID'] ."><button id='newUserBtn' type='btn' style='background: none; border: 0; outline: none; cursor: pointer;'><span style='font-size: 20px;' class='fas fa-plus'></span></button></form></td>";
            echo "<td data-id='1'>" . $persons[$x]['ID'] . "</td>";
            echo "<td data-id='2'>" . $persons[$x]['FIRST_NAME'] . "</td>";
            echo "<td data-id='3'>" . $persons[$x]['LAST_NAME'] . "</td>";
            echo "<td data-id='4'>" . $persons[$x]['EMAIL'] . "</td>";
            echo "<td data-id='5'>" . $persons[$x]['USERNAME'] . "</td>";
            echo "<td data-id='6'>" . $persons[$x]['PASSWORD'] . "</td>";
            echo "</tr>";
        }


        ?>

        </tbody>
    </table>
</div>

<script>

    $(document).ready(function () {
        $('#usersTable').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

</script>




</body>

</html>