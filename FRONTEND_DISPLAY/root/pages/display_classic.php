<?php
require_once('../../db/db.php');
$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLAZED - Classic Donuts Display</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../../lib/bootstrap/bootstrap.min.css">

    <style>
        body {
            background-image: url(../assets/Videos/doughnut_video.mp4);
        }
    </style>
</head>
<body class="bg-info">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-1 text-center" style="text-transform: uppercase; letter-spacing: 5px;"> Classic Donuts</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                <td class="fs-2 lh-lg"><?php echo $row['name']?></td>
                                <td class="fs-2 lh-lg"><?php echo $row['description']?></td>
                                <td class="fs-2 lh-lg">€ <?php echo $row['price']?></td>
                            </tr>
                                <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>