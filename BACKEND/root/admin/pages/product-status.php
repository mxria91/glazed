<?php
    // Functions
    include "functions.php";
    // Login
    activeUser();

    $p_id = escape($_GET['id']);
    $p_status = escape($_GET['status']);

    $sql = "UPDATE `products` SET `status`='$p_status' WHERE `id`='$p_id'";
    $run = mysqli_query($db_connect, $sql);
    if($run == true){
        echo "<script>window.location.href='product.php?status=true'</script>";
        //header('Location: category.php')
    }else{
        echo "<script>window.location.href='product.php?status=error'</script>";
    }

?>