<?php
session_start();
if(!isset($_SESSION['dangnhapad']))
{
    header('Location:login_ad.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/styleadmincp.css">
</head>
<body>
    <h3 class="title_admin"> Wecome to Admin</h3>
    <div class="wrapper">

    // include("config/connect.php");
    // include("modules/header.php");
    // include("modules/menu.php");
    // include("modules/main.php");
    // include("modules/footer.php");
  
       <?php
    include("config/connect.php");
    include("modules/nav.php");
    include("modules/menu.php");
    include("modules/main.php");
    include("modules/footer.php");
    ?>
    </div>
</body>
</html>