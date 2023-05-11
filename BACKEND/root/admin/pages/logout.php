<?php
    session_start();
    unset($_SESSION["active_user"]);
    unset($_SESSION["user_name"]);
    unset($_SESSION["user_pw"]);
    session_unset();
    session_destroy();
    header("Refresh: 2; URL = login.php;")

?>