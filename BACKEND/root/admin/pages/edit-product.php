<?php
// Functions
include "functions.php";
// Login
activeUser();

// Header
include "header.php";
?>




<?php
    $p_id = $_GET['id'];
    $sql = "SELECT * FROM `products` ORDER BY  `id`='$p_id'";
    $result = $db_connect->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $category = $row['category'];
            $p_name = $row['name'];
            $price = $row['price'];
            $qty = $row['quantity'];
            $unit = $row['unit'];
            $description = $row['description'];
            $img = $row['image'];
        }
    }
?>



<h2>Produkt Bearbeiten</h2>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
            <?php
            error_reporting(0);
                if($_GET['status']== "true"){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Produkt erfolgreich bearbeitet!</strong> Zurück zur <a href="product.php">Produktübersicht</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span>&times;</span>
                </button>
                </div>
            
            <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mt-3">
                <label for="">Kategorie auswählen*</label>
                <select name="category" id="" class="form-control" required>
                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                    <?php
                        $sql = "SELECT * FROM `category` WHERE `status` = '1' ORDER BY `id` DESC";
                        $result = $db_connect->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-6 mt-3">
                <label for="">Produktname*</label>
                <input type="text" name="p_name" id=""  class="form-control" value="<?php echo $p_name; ?>" required>
            </div>
            <div class="col-6 mt-3">
                <label for="">Preis*</label>
                <input type="number" name="price" step=".01" id=""  class="form-control" value="<?php echo $price; ?>"  required>
            </div>
            <div class="col-6 mt-3">
                <label for="">Menge*</label>
                <input type="number" name="qty" id=""  class="form-control" value="<?php echo $qty; ?>" required>
            </div>
            <div class="col-6 mt-3">
                <label for="">Einheit</label>
                <input type="text" name="unit" id=""  class="form-control" value="<?php echo $unit; ?>">
            </div>
            <div class="col-6 mt-3">
                <label for="">Bild*</label>
                <input type="file" name="img" id=""  class="form-control" >
                <input type="text" name="img_2" style="display:none;" value="<?php echo $img; ?>">
            </div>
            
            <div class="col-12 mt-3">
                <label for="">Produktbeschreibung*</label>
                <textarea type="text" name="description" id="" rows="5"  class="form-control" placeholder="Enter Product Description" required><?php echo $description; ?></textarea>
            </div>
            <div class="col-12 text-center mt-3">
                <input type="submit" name="submit" value="OK" class="btn btn-warning mt-5 " style="width:150px;">
            </div>
        </form>
    </div>
</div>

<div class="text-center">
<?php
// Footer
include "footer.php";
?></div>


<?php
    if(isset($_POST['submit'])){
        $category = $_POST['category'];
        $p_name = $_POST['p_name'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $unit = $_POST['unit'];
        $description = $_POST['description'];
        $p_id = $_GET['id'];
        $img_2 = $_POST['img_2'];

        $img = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];
        
        if(empty($img)){
            $img = $img_2;
        }else{
            $img = 'product-'.rand().'.png';
            $folder1 = "../../assets/img/products/".$img;
            move_uploaded_file($tempname, $folder1);
        }

        $date = date('Y-m-d');
        $sql = "UPDATE `products` SET `category`='$category',`name`='$p_name',`price`=$price,`quantity`=$qty,`unit`='$unit',`image`='$img',`description`='$description'  WHERE `id`='$p_id'";
        $run = mysqli_query($db_connect, $sql);
        if($run == true){
            echo "<script>window.location.href='product.php?status=true'</script>";
            //header('Location: category.php')
        }else{
            echo "<script>window.location.href='product.php?status=error'</script>";
        }
    }
?>