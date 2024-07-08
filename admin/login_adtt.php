<?php
session_start();
include('config/connect.php');
if(isset($_POST['dangnhap']))
{
    
    $taikhoan=$_POST['username'];
    $matkhau=md5($_POST['password']);
    $sql="select *from tbl_admin where username='".$taikhoan."' and password='".$matkhau."' ";
    $row=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($row);
    if($count>0)
    {
        
        $_SESSION['dangnhapad']=$taikhoan;
        header('Location:index.php');
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập admin</title>
    <style>
        body{
            background: #f2f2f2;
        }
        .wrapper-login{
            width: 15%;
            margin: 0 auto;
        }
        table.table-login{
            width: 100%;
        }
        table.table-login tr td{
            padding: 5px;
        }

    </style>
</head>
<body>
<div class="wrapper-login">
    <form action="" autocomplete="off" method="POST">
    <table  class="table-login" border="1" style="text-align: center;">
        <tr>
            <td colspan="2">Đăng nhập Admin</td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" name="password"></td>
        </tr>
        <tr>
            
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>
