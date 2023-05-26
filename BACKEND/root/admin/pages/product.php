<?php
// Functions
include "functions.php";
// Login
activeUser();

// Header
include "header.php";
?>

<h2 style="text-align:center;">PRODUKTÜBERSICHT</h2>

<!-- Aktionsbuttons Begin -->
<div style="text-align: center; margin-bottom: 60px;">
    <!-- Mitgabe der Parameter sort=ASC / DESC -->
    <a href="product.php?sort=ASC" class="btn btn-primary"><i class="fa fa-arrow-up-wide-short"></i></a> 
    <a href="product.php?sort=DESC" class="btn btn-warning"><i class="fa fa-arrow-down-wide-short"></i></a>
    <a href="add-product.php" class="btn btn-success">+ Produkt Hinzufügen</a>
</div>
<!-- Aktionsbuttons End -->

<br><br>
<div class="container">
    <div class="row">
        <?php
         error_reporting(0); // Unterdrückung PHP Errors
            $sort = $_GET['sort']; // $sort erhält den Wert des sort Parameters aus der GET-Anfrage. Es wird erwartet dass dieser Parameter in der URL übergeben wird.  
            if(empty($sort)){
                $sort = "ASC"; // Default-Wert
            }
            // products und category Tabelle werden verbunden
            $sql = "SELECT *, category.name as catname, products.id as pid, products.name as pname, products.status as pstatus FROM products JOIN category WHERE products.category = category.id ORDER BY products.id $sort"; //Sortierreihenfolge wird durch $sort festgelegt
            $result = $db_connect->query($sql);
            if ($result->num_rows > 0) { // hat das Ergebnis > 0 Zeilen, dann while-Schleife
                while($row = $result->fetch_assoc()) {
                    $status = $row['pstatus']; // Wert 'pstatus' wird der aktuellen Zeile der Variable $status zugewiesen
                    // abhängig vom Wert werden unterschiedliche HTML Codes generiert
                    if($status == "1"){
                        $status = "<b class='text-success'>Aktiv</b>";
                        $status_val = "warning";
                        $status_icon = "ban";
                        $status_number = "0";
                    }else{
                        $status = "<b class='text-danger'>Blockiert</b>";
                        $status_val = "success";
                        $status_icon = "check";
                        $status_number = "1";
                    }
                   ?>
                        <!-- Ausgabe der Produktinfos über Card Component -->
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
                                <!-- Aktionslinks für Card Component -->
                                <a href="edit-product.php?id=<?php echo $row['pid']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="delete-product.php?id=<?php echo $row['pid'];?>&img=<?php echo $row['image'];?>" onclick="return confirm('Wollen Sie dieses Produkt wirklich löschen?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <a href="product-status.php?id=<?php echo $row['pid'];?>&status=<?php echo $status_number;?>" onclick="return confirm('Wollen Sie den Status wirklich ändern?')" class="btn btn-<?php echo $status_val;?>"><i class="fa fa-<?php echo $status_icon;?>"></i></a>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
</div>

/**
 In Bezug auf die Sortiermethode wird die Sortierreihenfolge durch den Wert der $sort-Variable bestimmt. Die Variable wird in der ORDER BY-Klausel der SQL-Abfrage verwendet, um die Sortierreihenfolge festzulegen. Standardmäßig, wenn kein 'sort'-Parameter angegeben wird, werden die Produkte in aufsteigender Reihenfolge anhand ihrer ID sortiert. 
 */

<div class="text-center">
<?php
// Footer
include "footer.php";
?></div>
