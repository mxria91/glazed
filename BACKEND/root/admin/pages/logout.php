<?php
    session_start();
    unset($_SESSION["active_user"]);
    unset($_SESSION["user_name"]);
    unset($_SESSION["user_pw"]);
    session_unset();
    session_destroy();
    header("Location: login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLAZED - Logout from Administration</title>
</head>
<body>

</body>
</html>