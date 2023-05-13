
<?php
/*
// PASSWORD ENCODING 
die("echo");

if (isset($_POST['record'])) {
    if(!empty(trim($_POST['user_pw'])) && !empty(trim($_POST['user_name']))) { // Leerzeichen vor und nach Eingaben entfernen
        $pwd = md5($_POST['user_pw']); // Berechnung MD5 Hash
        $username = $_POST['user_name'];
        $enc_pwd = password_hash($pwd, PASSWORD_DEFAULT);

        // HASHED PWD IN DIE DATENBANK EINFÜGEN
        $connection->query("UPDATE admin SET `user_pw`='{$enc_pwd}' WHERE user_name = '{$username}' ") ;


        if($connection->mysql_affected_rows != 1) { // liefert die Anzahl der betroffenen Datensätze aus vorheriger Operation
            $record_error = "Oops, da war wohl was falsch. Versuche es erneut!";
        } else {
            $record_success = "Du hast dich erfolgreich registriert!";
        }

    } else {
        $record_error = "Bitte füllen Sie alle Felder aus!";
    }
}

// PASSWORD VALIDATION

// if (!empty($_POST['validate'])) {
//     $username = $_POST['validate'];
//     $raw_user_pwd = $_POST['user_pwd'];

//     $result = $connection->query("SELECT user_pw FROM admin WHERE user_name = {'$user_name'}");

//     $hashed_pw = $result->mysqli_fetch_assoc()['user_pw'];

//     if(!password_verify )
// }

*/

?>

<?php

// PW - erweitern um ein Spezifikum (1. User-PW // 2. Systemgeneriertes PW);
$user_pwd = "mary123"; // User-PW
$salt = "köakkäk"; // Systemseitiges PW, wird dem PW des Users angehängt
// $db_pwd = "ba23599ccfcce914cd55f9c24cd071d3";


echo "User-PWD: " . $user_pwd . " " . "<br>" . "DB-PWD: " . $salt;
echo "<br>";

// MD5 für beide Passwörter
$results = md5($user_pwd . $salt);
echo "MD5-Created PWD: " . "<br>" . $results;
echo "<br>";
echo "<br>";


//MD5 für User-PW
$results2 = md5($user_pwd);
echo "<br>";
echo $results2;


// Vergleich beider Passwörter
if (    $results2 == md5($user_pwd . $salt)    ) {
    echo "Passwort ist korrekt." . "<br>";
    echo "<br>";
} else {
    echo "<br>" . "Versuche es nochmal!";
}


// echo "<br>" . strlen($results) ;
 
// md5 - errechnet den MD5 eines Strings; Gibt den Hash als 32 Zeichen lange Hexadezimalzahl zurück (Eine mögliche Variante um geschützte PW zu generieren)



// Password-Hash erstellen (password_hash() creates a new password hash using a strong one-way hashing algorithm.)

echo "<br>";
echo password_hash($user_pwd, PASSWORD_DEFAULT); // PW den ich vom User bekomme, wird hier verschlüsselt mit PW-Default-Art
?>