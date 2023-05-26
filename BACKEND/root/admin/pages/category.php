<?php
// Functions
include "functions.php";
// Login
activeUser();

// Header
include "header.php";
?>

<h2 style="text-align:center;">KATEGORIE HINZUFÜGEN</h2>

<div class="container">
    <!-- Bei SuperGlobal $_FILES immer enctype="multipart/form-data" verwenden! -->
    <form action="" method="post" enctype="multipart/form-data"> 
        <div class="row">
            <div class="col-12">
            <?php
            error_reporting(0);
                if($_GET['status']== "true"){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Kategorie erfolgreich hinzugefügt!  </strong>Anlage überprüfen: <a href="view_category.php">Kategorie Übersicht</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            
            <?php } ?>

            </div>
        </div>

        <!-- BEGIN Form für Aktion: Kategorie Hinzufügen -->
        <div class="row">
            <div class="col-6">
                <label for="">Kategorie Name</label>
                <input type="text" name="c_name" placeholder="..." class="form-control" required>
            </div>
            <div class="col-6">
                <label for="">Bild</label>
                <input type="file" name="img" class="form-control">
            </div>
            <div class="col-12 text-center">
                <input type="submit" name="submit" value="ANLAGE BESTÄTIGEN" class="btn btn-warning mt-5 " style="width:200px;">
            </div>
        </form>
        <!-- END Form für Aktion: Kategorie Hinzufügen -->

    </div>
</div>

<div class="text-center">
<?php
// Footer
include "footer.php";
?></div>

<!-- BEGIN: FORM HANDLER VALIDIERUNG -->
<?php
    if(isset($_POST['submit'])){

        // Abruf der Form-Daten
        $c_name = escape($_POST['c_name']);
        $img = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];

        // Generierung einer neuen Filename
        $img = 'category-'.rand().'.png';
        $folder1 = "../../assets/img/category/".$img;
        move_uploaded_file($tempname, $folder1); // Verschieben der Datei von temporärer Location

        // SQL INSERT query an DB
        $date = date('m-d-Y');
        $sql = "INSERT INTO `category`(`name`, `img`, `date`, `status`) VALUES ('$c_name', '$img', '$date', '1')"; // Übergabe Status = 1 (aktiv)
        $run = mysqli_query($db_connect, $sql);
        if($run == true){ 
            // Wann query erfolgreich - dann Navigierung an angeführte Location mit query Parameter status=true
            echo "<script>window.location.href='category.php?status=true'</script>";
            //header('Location: category.php')
        }else{
            echo "<script>window.location.href='category.php?status=error'</script>";
        }
    }
?>
<!-- ENDE: FORM HANDLER VALIDIERUNG -->