<?php
include('../../config/connect.php');

if (isset($_POST['suakhachhang'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $idkhachhang = $_GET['idkhachhang'];

    // Kiểm tra điều kiện cho tên khách hàng
    if (strlen($tenkhachhang) > 5 && ctype_upper($tenkhachhang[0])) {
        $sql_sua = "UPDATE tbl_dangky 
                    SET tenkhachhang='$tenkhachhang', email='$email', dienthoai='$dienthoai', diachi='$diachi' 
                    WHERE id_dangky='$idkhachhang'";
        mysqli_query($conn, $sql_sua);
        header('Location:../../index.php?action=quanlikhachhang&query=lietke&success=Cập nhật thông tin thành công');
    } else {
        // Nếu điều kiện không thỏa mãn, hiển thị thông báo lỗi
        echo "<script>alert('Tên khách hàng phải có độ dài lớn hơn 6 và có chữ cái đầu tiên viết hoa.')</script>";
        echo "<script>window.location.href='../../index.php?action=quanlikhachhang&query=sua&idkhachhang=$idkhachhang';</script>";
    }
} else {
    $id = $_GET['idkhachhang'];
    $sql_xoa = "DELETE FROM tbl_dangky WHERE id_dangky='$id'";
    mysqli_query($conn, $sql_xoa);
    header('Location:../../index.php?action=quanlikhachhang&query=lietke&success=Xóa người dùng thành công');
}
