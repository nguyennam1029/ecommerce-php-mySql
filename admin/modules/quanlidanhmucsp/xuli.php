<?php
include('../../config/connect.php');
$tenloaisp=$_POST['tendanhmuc'];
$thutu=$_POST['thutu'];
if(isset($_POST['themdanhmuc']))
{
    $sql_them="insert into tbl_danhmuc(tendanhmuc,thutu) value('".$tenloaisp."','".$thutu."')";
    mysqli_query($conn,$sql_them);
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=them');
}
else if(isset($_POST['suadanhmuc']))
{
    $sql_sua="update tbl_danhmuc set tendanhmuc='".$tenloaisp."',thutu='".$thutu."' where id_danhmuc='".$_GET['iddanhmuc']."'";
    mysqli_query($conn,$sql_sua);
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=them');
}
else
$id=$_GET['iddanhmuc'];
$sql_xoa="delete from tbl_danhmuc where id_danhmuc='".$id."'";
mysqli_query($conn,$sql_xoa);
header('Location:../../index.php?action=quanlidanhmucsanpham&query=them');

?>