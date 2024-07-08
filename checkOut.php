<?php
session_start();
include('admin/config/connect.php');
$id_khachhang=$_SESSION['id_khachhang'];
$code_order=rand(0,9999);
$insert_cart="insert into tbl_cart(id_khachhang,code_cart,cart_status) value('".$id_khachhang."','".$code_order."',1)";
$cart_query=mysqli_query($conn,$insert_cart);
if($cart_query)
{
  foreach($_SESSION['cart'] as $key=>$value)
  {
    $id_sanpham=$value['id'];
    $soluongmua=$value['soluongmua'];
   
    
    $insert_order_detail="insert into tbl_cart_detail(id_sanpham,code_cart,soluongmua) value('".$id_sanpham."','".$code_order."','".$soluongmua."')";
    $update_soluong="update tbl_sanpham set soluong=soluong-'".$soluongmua."' where id_sanpham='".$id_sanpham."' ";
    mysqli_query($conn,$update_soluong);
    mysqli_query($conn,$insert_order_detail);

  }
}
unset($_SESSION['cart']);
header('Location:camon.php');
?>