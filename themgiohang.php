<?php
session_start();
include('admin/config/connect.php');
if (!isset($_SESSION['dangky'])) {
    header('Location:sign-up.php');
    exit();
}
//them so luong
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'id' => $cart_item['id'], 'tensanpham' => $cart_item['tensanpham'], 'soluongmua' => $cart_item['soluongmua'], 'giaban' => $cart_item['giaban'],
                'hinhanh' => $cart_item['hinhanh']
            );
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluongmua'] + 1;
            if ($cart_item['soluongmua'] <= 10) {
                $product[] = array(
                    'id' => $cart_item['id'], 'tensanpham' => $cart_item['tensanpham'], 'soluongmua' => $tangsoluong, 'giaban' => $cart_item['giaban'],
                    'hinhanh' => $cart_item['hinhanh']
                );
            } else {
                $product[] = array(
                    'id' => $cart_item['id'], 'tensanpham' => $cart_item['tensanpham'], 'soluongmua' => $cart_item['soluongmua'], 'giaban' => $cart_item['giaban'],
                    'hinhanh' => $cart_item['hinhanh']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:cart.php');
}
//tru so luong
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'id' => $cart_item['id'], 'tensanpham' => $cart_item['tensanpham'], 'soluongmua' => $cart_item['soluongmua'], 'giaban' => $cart_item['giaban'],
                'hinhanh' => $cart_item['hinhanh']
            );
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluongmua'] - 1;
            if ($cart_item['soluongmua'] > 1) {
                $product[] = array(
                    'id' => $cart_item['id'], 'tensanpham' => $cart_item['tensanpham'], 'soluongmua' => $tangsoluong, 'giaban' => $cart_item['giaban'],
                    'hinhanh' => $cart_item['hinhanh']
                );
            } else {
                $product[] = array(
                    'id' => $cart_item['id'], 'tensanpham' => $cart_item['tensanpham'], 'soluongmua' => $cart_item['soluongmua'], 'giaban' => $cart_item['giaban'],
                    'hinhanh' => $cart_item['hinhanh']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:cart.php');
}
//xoá san phẩm
if ($_SESSION['cart'] && isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'id' => $cart_item['id'], 'tensanpham' => $cart_item['tensanpham'], 'soluongmua' => $cart_item['soluongmua'], 'giaban' => $cart_item['giaban'],
                'hinhanh' => $cart_item['hinhanh']
            );
        }
        $_SESSION['cart'] = $product;

        header('Location:cart.php');
    }
}
//Mua ngay
if (isset($_POST['muangay'])) {

    $id = $_GET['idsanpham'];
    $soluongmua = $_POST['soluongmua'];
    $sql = "select *from tbl_sanpham where id_sanpham='" . $id . "' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {

        $new_product[] = array(
            'id' => $id, 'tensanpham' => $row['tensanpham'], 'soluongmua' => $soluongmua, 'giaban' => $row['giaban'],
            'hinhanh' => $row['hinhanh']
        );
        //kiểm tra xem sesion gio hàng tồn tại 
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    $product[] = array(
                        'id' => $cart_item['id'], 'tensanpham' => $cart_item['tensanpham'], 'soluongmua' => $cart_item['soluongmua'] + $soluongmua, 'giaban' => $cart_item['giaban'],
                        'hinhanh' => $cart_item['hinhanh']
                    );
                    $found = true;
                } else {
                    $product[] = array(
                        'id' => $cart_item['id'], 'tensanpham' => $cart_item['tensanpham'], 'soluongmua' => $cart_item['soluongmua'], 'giaban' => $cart_item['giaban'],
                        'hinhanh' => $cart_item['hinhanh']
                    );
                }
            }
            if ($found == false) {
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else $_SESSION['cart'] = $product;
        } else
            $_SESSION['cart'] = $new_product;
        // header('Location:cart.php');
    }
}
//Thêm giỏ hàng

if (isset($_POST['themgiohang'])) {
    // Lấy id sản phẩm từ URL hoặc từ form, ở đây mình sử dụng $_POST['idsanpham']
    $id = $_GET['idsanpham'];
    $soluongmua = $_POST['soluongmua'];

    // Lấy thông tin sản phẩm từ database
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        // Tạo một mảng sản phẩm mới để thêm vào giỏ hàng
        $new_product = array(
            'id' => $id,
            'tensanpham' => $row['tensanpham'],
            'soluongmua' => $soluongmua,
            'giaban' => $row['giaban'],
            'hinhanh' => $row['hinhanh']
        );

        // Kiểm tra xem session giỏ hàng đã tồn tại
        if (isset($_SESSION['cart'])) {
            $found = false;
            $product = array();

            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    // Nếu sản phẩm đã có trong giỏ hàng thì cập nhật số lượng
                    $product[] = array(
                        'id' => $cart_item['id'],
                        'tensanpham' => $cart_item['tensanpham'],
                        'soluongmua' => $cart_item['soluongmua'] + $soluongmua,
                        'giaban' => $cart_item['giaban'],
                        'hinhanh' => $cart_item['hinhanh']
                    );
                    $found = true;
                } else {
                    // Nếu không thì giữ nguyên thông tin sản phẩm
                    $product[] = array(
                        'id' => $cart_item['id'],
                        'tensanpham' => $cart_item['tensanpham'],
                        'soluongmua' => $cart_item['soluongmua'],
                        'giaban' => $cart_item['giaban'],
                        'hinhanh' => $cart_item['hinhanh']
                    );
                }
            }

            // Nếu không tìm thấy sản phẩm trong giỏ hàng thì thêm mới vào
            if ($found == false) {
                $_SESSION['cart'] = array_merge($product, array($new_product));
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            // Nếu chưa có giỏ hàng thì tạo mới và thêm sản phẩm vào
            $_SESSION['cart'] = array($new_product);
        }

        // Thông báo thành công và chuyển hướng về trang giỏ hàng
        echo '<script>alert("Thêm sản phẩm vào giỏ hàng thành công!"); window.location=`detail.php?quanli=sanpham&idsanpham=' . $id . '`;</script>';
    }
}
