<?php
    // Functions
    include "functions.php";
    // Login
    activeUser();

    $c_id = escape($_GET['id']);
    $c_status = escape($_GET['status']);

    // Status Update in DB auf Basis von id und status
    $sql = "UPDATE `category` SET `status`='$c_status' WHERE `id`='$c_id'";
    $run = mysqli_query($db_connect, $sql);
    if($run == true){ // Wenn $run erfolgreich, dann redirect an folg. Location mit Status = true/error
        echo "<script>window.location.href='view_category.php?status=true'</script>";
        //header('Location: category.php')
    }else{
        echo "<script>window.location.href='view_category.php?status=error'</script>";
    }

?>