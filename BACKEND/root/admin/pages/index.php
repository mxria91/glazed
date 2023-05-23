<?php
// Functions
include "functions.php";
// Login
activeUser();

// Header
include "header.php";
?>

<div class="area">
    <h2>WILLKOMMEN IM ADMIN-BEREICH</h2>
    
    <div class="login-info">
        <span><strong>USER:</strong> <?php echo $_SESSION['user_name'];?></span><br>
        <span><strong>DATUM:</strong>  <?php echo date("d-m-Y");?></span><br>
        <span><strong>LETZTER LOGIN:</strong> <?php echo $_SESSION['user_last_login']; ?></span>
    </div>
</div>

<div class="text-center">
<?php
// Footer
include "footer.php";
?></div>