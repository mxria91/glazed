<?php
// Functions
include "functions.php";
// Login
activeUser();

// Header
include "header.php";
?>

<!-- BEGIN STYLESHEET -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css"> 
<!-- END STYLESHEET -->

<!-- BEGIN PAGE HEADING + ACTION BUTTONS -->
<h2 style="text-align:center;">KATEGORIE ÜBERSICHT</h2>
<div style="text-align: center; margin-bottom: 60px;">
    <a href="category.php" class="btn btn-success">+ Kategorie Hinzufügen</a>
</div>
<!-- END PAGE HEADING + ACTION BUTTONS -->

<!-- BEGIN CONTENT -->
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
            <!-- BEGIN DYNAMISCHE GENERIERUNG DER TABELLENINHALTE -->
            <?php
                $sn = 1; // Serial Number für jede Kategorie/Table
                $sql = "SELECT * FROM `category` ORDER BY `id` DESC";
                $result = $db_connect->query($sql); // Query Ergebnis in $result 
                if ($result->num_rows > 0) { // wenn query Ergebnis mehr wie 0 rows -> while loop
                    while($row = $result->fetch_assoc()) { // jede Row wird iteriert
                        // Prüfung - nur Kategorien anzeigen die aktiv sind (Status = 1 )
                        $status = $row['status']; // Kategorie Status wird in $status gespeichert
                        if($status == "1"){
                            $status = "<b class='text-success'>Aktiv</b>"; // $status variable wird an HTML-Code zugewiesen <b class='text-success'>Active</b> Display wird in grün angezeigt
                        }else{
                            $status = "<b class='text-danger'>Blockiert</b>";  // ansonsten Display in rot
                        } 
                        // Row-Inhalt für folgende Spalten ausgeben:
                            // Aktion-Links haben verschiedene URLS mit Parameter status und id für category_status update und delete_category 
                            // Beinhaltet fontawesome Button Styles
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
            <!-- END DYNAMISCHE GENERIERUNG DER TABELLENINHALTE -->
        </tbody>
    </table>
        </div>
    </div>
</div>
<!-- END CONTENT -->

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




