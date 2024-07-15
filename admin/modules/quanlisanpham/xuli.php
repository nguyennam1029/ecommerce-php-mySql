<?php
include('../../config/connect.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$giaban = $_POST['giaban'];
$soluong = $_POST['soluong'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$thuctrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh_new = time() . '_' . $hinhanh;

if (isset($_POST['themsanpham'])) {
    // Thêm sản phẩm
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham, masp, giasp, giaban, soluong, hinhanh, tomtat, noidung, thuctrang, id_danhmuc) 
                 VALUES ('" . $tensanpham . "', '" . $masp . "', '" . $giasp . "', '" . $giaban . "', '" . $soluong . "', '" . $hinhanh_new . "', '" . $tomtat . "', '" . $noidung . "', '" . $thuctrang . "', '" . $danhmuc . "')";
    mysqli_query($conn, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh_new);
    header('Location:../../index.php?action=quanlisanpham&query=them&success=Thêm sản phẩm thành công');
} else if (isset($_POST['suasanpham'])) {
    // Sửa sản phẩm
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh_new);
        $sql_sua = "UPDATE tbl_sanpham SET tensanpham ='" . $tensanpham . "', masp='" . $masp . "', giasp='" . $giasp . "', giaban='" . $giaban . "', soluong='" . $soluong . "', hinhanh='" . $hinhanh_new . "', tomtat='" . $tomtat . "', noidung='" . $noidung . "', thuctrang='" . $thuctrang . "', id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='" . $_GET['idsanpham'] . "'";

        // Xóa ảnh cũ
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]'";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
    } else {
        $sql_sua = "UPDATE tbl_sanpham SET tensanpham ='" . $tensanpham . "', masp='" . $masp . "', giasp='" . $giasp . "', giaban='" . $giaban . "', soluong='" . $soluong . "', tomtat='" . $tomtat . "', noidung='" . $noidung . "', thuctrang='" . $thuctrang . "', id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='" . $_GET['idsanpham'] . "'";
    }
    mysqli_query($conn, $sql_sua);
    header('Location:../../index.php?action=quanlisanpham&query=them&success=Cập nhật sản phẩm thành công');
} else {
    // Xóa sản phẩm
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='$id'";
    mysqli_query($conn, $sql_xoa);
    header('Location:../../index.php?action=quanlisanpham&query=them&success=Xóa sản phẩm thành công');
}
