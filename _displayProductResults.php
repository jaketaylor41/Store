<?php
// expects an array of $person; display the results in a table
// $persons = aray
?>

<head>
    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #339;
            color: white;
        }
    </style>
</head>

<table id="customers" class="display">
    <thead>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Photo</th>
    </tr>
    </thead>
    <tbody>

    <?php
    for ($x = 0; $x < count($products); $x++) {

        echo "<tr>";
        echo "<td>" . $products[$x]['ID'] . "</td>";
        echo "<td>" . $products[$x]['PRODUCTNAME'] . "</td>";
        echo "<td>" . $products[$x]['DESCRIPTION'] . "</td>";
        echo "<td>" . $products[$x]['PRICE'] . "</td>";
        echo "<td>" . $products[$x]['PHOTO'] . "</td>";
        echo "</tr>";

    }
    ?>

    </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#customers').DataTable();
    } );
</script>
