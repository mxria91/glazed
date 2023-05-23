<?php
// Functions
include "functions.php";
// Login
activeUser();

// Header
include "header.php";
?>

<h2>PRODUKTÜBERSICHT</h2>

<div style="text-align: center; margin-bottom: 60px;">
    <a href="product.php?sort=ASC" class="btn btn-primary"><i class="fa fa-arrow-up-wide-short"></i></a>
    <a href="product.php?sort=DESC" class="btn btn-warning"><i class="fa fa-arrow-down-wide-short"></i></a>
    <a href="add-product.php" class="btn btn-success">+ Produkt Hinzufügen</a>
</div>
<br><br>
<div class="container">
    <div class="row">
        <?php
         error_reporting(0);
            $sort = $_GET['sort'];
            if(empty($sort)){
                $sort = "ASC";
            }
            $sql = "SELECT *, category.name as catname, products.id as pid, products.name as pname, products.status as pstatus FROM products JOIN category WHERE products.category = category.id ORDER BY products.id $sort";
            $result = $db_connect->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $status = $row['pstatus'];
                    if($status == "1"){
                        $status = "<b class='text-success'>Active</b>";
                        $status_val = "warning";
                        $status_icon = "ban";
                        $status_number = "0";
                    }else{
                        $status = "<b class='text-danger'>Blocked</b>";
                        $status_val = "success";
                        $status_icon = "check";
                        $status_number = "1";
                    }
                   ?>
                        <div class="card col-md-4">
                            <img src="../../assets/img/products/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['pname'].' | '.$row['catname']; ?></h5>
                                <p class="card-text"><?php echo $row['description'];?></p>
                                <div class="row">
                                    <div class="col-4">
                                        <p class="card-text"><b>Preis</b><br>€<?php echo $row['price'];?></p>
                                    </div>
                                    <div class="col-4">
                                        <p class="card-text"><b>Menge</b><br><?php echo $row['quantity'];?></p>
                                    </div>
                                    <div class="col-4">
                                        <p class="card-text"><b>Status</b><br><?php echo $status    ; ?></p>
                                    </div>
                                </div>
                                <br><br>
                                <a href="edit-product.php?id=<?php echo $row['pid']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="delete-product.php?id=<?php echo $row['pid'];?>&img=<?php echo $row['image'];?>" onclick="return confirm('Are you sure you want to delete the product?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <a href="product-status.php?id=<?php echo $row['pid'];?>&status=<?php echo $status_number;?>" onclick="return confirm('Are you sure you want to change status?')" class="btn btn-<?php echo $status_val;?>"><i class="fa fa-<?php echo $status_icon;?>"></i></a>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
</div>

<div class="text-center">
<?php
// Footer
include "footer.php";
?></div>
