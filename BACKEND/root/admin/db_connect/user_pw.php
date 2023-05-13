
<?php
// PASSWORD ENCODING 
if (isset($_POST['record'])) {
    if(!empty(trim($_POST['user_pw'])) && !empty(trim($_POST['user_name']))) {
        $pwd = $_POST['user_pw'];
        $username = $_POST['user_name'];
        $enc_pwd = password_hash($pwd, PASSWORD_DEFAULT);

        // HASHED PWD IN DIE DATENBANK EINFÜGEN
        $connection->query("INSERT INTO admin (user_name, user_pw) VALUES ('$username', '$enc_pwd')");

        if($connection->affected_rows != 1) {
            $record_error = "Oops, da war wohl was falsch. Versuche es erneut!";
        } else {
            $record_success = "Du hast dich erfolgreich registriert!";
        }

    } else {
        $record_error = "Bitte füllen Sie alle Felder aus!";
    }
}

// PASSWORD VALIDATION

if(password_verify($username, $enc_pwd)) {
    
} 

?>


