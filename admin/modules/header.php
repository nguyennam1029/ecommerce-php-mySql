 
 <?php
if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1)
{
    unset($_SESSION['dangnhapad']);
    header('Location:login_ad.php');
}
?>
 <a href="index.php?dangxuat=1"> Đăng xuất :<?php if(isset($_SESSION['dangnhapad'])){echo $_SESSION['dangnhapad'];}?></a>