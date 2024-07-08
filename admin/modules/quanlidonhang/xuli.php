<?php
include('../../config/connect.php');
if(isset($_GET['cart_status'])&&isset($_GET['code']))
{
    $status=$_GET['cart_status'];
    $code=$_GET['code'];
    $sql_update="update tbl_cart set cart_status='".$status."' where code_cart='".$code."'";
    $query=mysqli_query($conn,$sql_update);
    header('Location:../../index.php?action=quanlidonhang&query=lietke');
}
?>