<!-- PHP BEGIN -->
<?php
include "functions.php";

// ANMELDEDATEN ÜBERPRÜFUNG
if (isset($_POST)) {
    // Validation Check
    if( empty($_POST["user_name"]) || empty($_POST["user_pw"] )) {
        $error = "Oops, da war wohl was falsch! Probiere es nochmal.";
    } else {
    $sql_user_name = escape($_POST["user_name"]);
    $result_login = query(" SELECT * FROM admin WHERE user_name='{$sql_user_name}'  ");
    $row = mysqli_fetch_assoc($result_login);
    
        // Password Check
        if($row) {
            if (password_verify($_POST["user_pw"], $row["user_pw"])) {
                $_SESSION["active_login"] = true;
                $_SESSION["user_name"] = $row["user_name"];

                query("UPDATE `admin` SET `user_last_login`=NOW() WHERE user_name = '{$row['user_name']}' ");
                header("Location: index.php");
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
    <link rel="stylesheet" href="../../../css/global.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo:wght@400&display=swap"/>
    <link rel="shortcut icon" href="../../assets/img/doughnut.png" type="image/x-icon">
</head>
<body>
    <nav>
        <h1>glazed</h1>
    </nav>

    <div class="login-box" >
        <h2>Administration</h2>
        <div class="form-box">
            <!-- FORM LOGIN -->
            <form action="" method="post">
                <div class="form-input">
                    <label for="user_name">USER </label><br>
                    <input type="text" id="user_name" name="user_name" required>
                </div>
                <div class="form-input"> 
                    <label for="user_pw">PASSWORT </label><br>
                    <input type="password" name="user_pw" id="user_pw" required>
                </div>
                <div>
                    <button type="submit" name="record" class="btn-nav" id="btn-login">
                        Login
                    </button>
                </div>
                <div class="log-message">
                    <p class="error"><?php echo @$record_error?></p>
                    <p class="success"><?php echo @$record_success?></p>
                    <!-- <?php
                         if ( !empty($error) ) {
                            echo "<p>{$error}</p>";
                        }
                    ?> -->
                </div>
    </div>
</body>
</html>
<!-- HTML END -->