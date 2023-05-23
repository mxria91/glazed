<?php
// Functions
include "functions.php";
// Login
activeUser();

// Header
include "header.php";
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

<h2>KATEGORIE ÜBERSICHT</h2>
<div style="text-align: center; margin-bottom: 60px;">
    <a href="category.php" class="btn btn-success">+ Kategorie Hinzufügen</a>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Bild</th>
                <th>Name</th>
                <th>Datum</th>
                <th>Status</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sn = 1;
                $sql = "SELECT * FROM `category` ORDER BY `id` DESC";
                $result = $db_connect->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $status = $row['status'];
                        if($status == "1"){
                            $status = "<b class='text-success'>Active</b>";
                        }else{
                            $status = "<b class='text-danger'>Blocked</b>";
                        }
                        echo '
                        <tr>
                                <th>'.$sn.'</th>
                                <td><img src="../../assets/img/category/'.$row['img'].'" style="width:50px;  border-radius:50%;"></td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['date'].'</td>
                                <td>'.$status.'</td>
                                <td>
                                    <a href="category_status.php?status=1&id='.$row['id'].'" style="border:solid 1px #28a6ff;">&nbsp;<i class="fa fa-check"></i>&nbsp;</a> &nbsp; &nbsp;
                                    <a href="category_status.php?status=0&id='.$row['id'].'" style="border:solid 1px #bc8d2d; color:#bc8d2d;">&nbsp;<i class="fa fa-ban"></i>&nbsp;</a> &nbsp; &nbsp;
                                    <a href="delete_category.php?id='.$row['id'].'&img='.$row['img'].'" style="border:solid 1px #a90928; color:#a90928;">&nbsp;<i class="fa fa-trash"></i>&nbsp;</a>
                                </td>
                        </tr>
                        ';
                    $sn++;}
                }
            ?>
        </tbody>
    </table>
        </div>
    </div>
</div>

<div class="text-center">
<?php
// Footer
include "footer.php";
?></div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>




