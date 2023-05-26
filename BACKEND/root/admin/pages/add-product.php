<?php
// Functions
include "functions.php";
// Login
activeUser();

// Header
include "header.php";
?>



<h2 style="text-align:center;">Produkt hinzufügen</h2>


<div class="container">
    <form action="" method="post" enctype="multipart/form-data"> 
        <div class="row">
            <!-- BEGIN DARSTELLUNG SUCCESS MESSAGE -->
            <div class="col-12">
            <?php
            error_reporting(0); // Unterdrückung von PHP Errors
                if($_GET['status'] == "true"){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Produkt erfolgreich hinzugefügt! </strong> Anlage überprüfen: <a href="product.php">Produktübersicht</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            
            <?php } ?>
            </div>
            <!-- ENDE DARSTELLUNG SUCCESS MESSAGE -->
        </div>

        <!-- BEGIN: FORM EDITABLE FIELDS -->
        <div class="row">
            <div class="col-6 mt-3">
                <label for="">Kategorie auswählen*</label>
                <select name="category" id="" class="form-control" required>
                    <option value="">...</option>
                    <!-- SQL-ABFRAGE  -->
                    <?php
                        $sql = "SELECT * FROM `category` WHERE `status` = '1' ORDER BY `id` DESC";
                        $result = $db_connect->query($sql);
                        if ($result->num_rows > 0) {
                            // Ausgabe der Daten
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="">Produktname*</label>
                <input type="text" name="p_name" id=""  class="form-control" placeholder="..." required>
            </div>
            <div class="col-6 mt-3">
                <label for="">Preis*</label>
                <input type="number" name="price" step=".01" id=""  class="form-control" placeholder="..." required>
            </div>
            <div class="col-6 mt-3">
                <label for="">Menge*</label>
                <input type="number" name="qty" id=""  class="form-control" placeholder="..." required>
            </div>
            <div class="col-6 mt-3">
                <label for="">Einheit</label>
                <input type="text" name="unit" id=""  class="form-control" placeholder="...">
            </div>
            <div class="col-6 mt-3">
                <label for="">Bild*</label>
                <input type="file" name="img" id=""  class="form-control" required>
            </div>
            
            <div class="col-12 mt-3">
                <label for="">Produktbeschreibung* (max. 100 Zeichen)</label>
                <textarea type="text" name="description" id="" rows="5" class="form-control" placeholder="..." required maxlength="100"></textarea>
            </div>
            <div class="col-12 text-center mt-3">
                <input type="submit" name="submit" value="Submit" class="btn btn-warning mt-5 " style="width:150px;">
            </div>
            <!-- END: FORM EDITABLE FIELDS -->
        </form>
    </div>
</div>

<div class="text-center">
<?php
// Footer
include "footer.php";
?></div>

<!-- BEGIN FORM VALIDIERUNG: PRODUKTE HINZUFÜGEN -->

<?php
    //identer Ablauf wie category.php
    if(isset($_POST['submit'])){
        $category = escape($_POST['category']);
        $p_name = escape($_POST['p_name']);
        $price = escape($_POST['price']);
        $qty = escape($_POST['qty']);
        $unit = escape($_POST['unit']);
        $description = escape($_POST['description']);

        $img = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];
        $img = 'product-'.rand().'.png';
        $folder1 = "../../assets/img/products/".$img;
        move_uploaded_file($tempname, $folder1);
        $date = date('Y-m-d');
        
        $sql = "INSERT INTO `products`(`category`, `name`, `price`, `quantity`, `unit`, `image`, `description`, `date`, `status`) 
        VALUES ('$category', '$p_name', $price, $qty, '$unit', '$img', '$description', '$date', '1')";
        $run = mysqli_query($db_connect, $sql);
        if($run == true){
            echo "<script>window.location.href='add-product.php?status=true'</script>";
            //header('Location: category.php')
        }else{
            echo "<script>window.location.href='add-product.php?status=error'</script>";
        }
    }
?>
<!-- END FORM VALIDIERUNG: PRODUKTE HINZUFÜGEN -->