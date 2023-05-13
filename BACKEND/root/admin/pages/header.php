<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLAZED - Administration</title>
    <link rel="stylesheet" href="../../../css/admin.css">
    <link rel="stylesheet" href="../../../css/global.css">
</head>
<body>
    <!-- Header - Begin -->
    <header>
        <nav id="header-nav">
            <span>
                <?php echo "USER: " . $_SESSION["user_name"];?>
                <!-- <?php echo "Last Login: " . $_SESSION["user_last_login"];?> -->
            </span>
            <ul class="nav-link">
                <li><a href="index.php">HOMEPAGE</a></li>
                <li><a href="index.php">PRODUCTS</a></li>
                <li><a href="index.php">SUPER ADMIN</a></li>
            </ul>
            <a href="logout.php"><button class="logout-btn">LOGOUT</button></a>
        </nav>
        <hr>
    </header>
    <!-- Header - End -->