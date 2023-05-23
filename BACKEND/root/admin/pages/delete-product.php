<?php
    // Functions
    include "functions.php";
    // Login
    activeUser();

    $c_id = $_GET['id'];
    $c_img = $_GET['img'];

    $sql = "DELETE FROM `products` WHERE `id`='$c_id'";
    unlink('../../assets/img/products/'.$c_img);
    $run = mysqli_query($db_connect, $sql);
    if($run == true){
        echo "<script>window.location.href='product.php?status=deleted'</script>";
        //header('Location: category.php')
    }else{
        echo "<script>window.location.href='product.php?status=error'</script>";
    }

?>