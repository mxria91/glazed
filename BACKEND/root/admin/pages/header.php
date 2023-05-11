<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLAZED - Administration</title>
    <link rel="stylesheet" href="../../../css/admin.css">
</head>
<body>
    <!-- Header - Begin -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php"></a></li>
                <li><a href="logout.php"></a></li>
            </ul>
            <span>
                <?php echo "User: " . $_SESSION["user_name"];?>
                <?php echo "Last Login: " . $_SESSION["user_last_login"];?>
            </span>
        </nav>
    </header>
    <!-- Header - End -->