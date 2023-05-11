<!-- PHP BEGIN -->
<?php

include "../db_connect/db.php";
include "functions.php";

if (!empty($_POST)) {
    // Validation Check
    if( empty($_POST["user_name"]) || empty($_POST["user_pw"] )) {
        $error = "Oops, da war wohl was falsch! Probiere es nochmal.";
    } else {
    $sql_user_name = escape($_POST["user_name"]);
    $result = query(" SELECT * FROM admin WHERE user_name='{$sql_user_name}'  ");
    $row = mysqli_fetch_assoc($result);
    
        // Password Check
        if($row) {
            if (password_verify($_POST["user_pw"], $row["user_pw"])) {
                $_SESSION["active_login"] = true;
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION["user_name"] = $row["user_name"];

                query("UPDATE `admin` SET `user_last_login`=NOW() WHERE user_name = '{$row['user_name']}' ");
                header("Location: admin.php");
                exit;
            } else {
                $error = "Oops, da war wohl was falsch! Probiere es nochmal.";
            }
        } else {
            $error = "Oops, da war wohl was falsch! Probiere es nochmal.";
        }
    }
}

?>
<!-- PHP END -->

<!-- HTML BEGIN -->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLAZED - Administrator LOGIN</title>
    <link rel="stylesheet" href="../../../css/admin.css">
</head>
<body>
     <div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <div>
                <label for="user_name">Username</label>
                <input type="text" id="user_name" name="user_name" required>
            </div>      
            <div>
                <label for="user_pw">Passwort: </label>
                <input type="password" name="user_pw" id="user_pw" required>
            </div>
            <div>
                <button type="submit">
                    Login
                </button>
            </div>
    </div>
</body>
</html>
<!-- HTML END -->