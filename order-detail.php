<?php
include('admin/config/connect.php');
session_start();

if (!isset($_GET['code'])) {
    echo "No order code provided.";
    exit();
}

$code_cart = $_GET['code'];

// Fetch order details based on the provided order code
$sql_lietke_dh = "SELECT * FROM tbl_cart_detail, tbl_sanpham 
                  WHERE tbl_cart_detail.id_sanpham = tbl_sanpham.id_sanpham 
                  AND tbl_cart_detail.code_cart = '$code_cart'";
$query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);

if (!$query_lietke_dh) {
    echo "Error fetching order details: " . mysqli_error($conn);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/styles.css" />

    <link rel="stylesheet" href="./css/profile.css" />

</head>

<body>
    <nav class="nav">
        <div class="container nav_container">
            <a href="#" class="nav_logo">EXCLUSIVE</a>
            <ul class="nav_list">
                <li class="nav_item">
                    <a href="./index.php" class="nav_link">Trang chủ</a>
                </li>
                <li class="nav_item">
                    <a href="./products.php" class="nav_link">Sản phẩm</a>
                </li>
                <li class="nav_item">
                    <a href="./about.php" class="nav_link">Giới thiệu</a>
                </li>
                <li class="nav_item">
                    <a href="./contact.php" class="nav_link">Liên hệ</a>
                </li>
            </ul>
            <div class="nav_items">
                <form action="timkiem.php?quanli=timkiem" method="POST" class="nav_form">
                    <input type="text" class="nav_input" placeholder="Tìm kiếm ở đây" name="tukhoa" />
                    <button type="submit" name="timkiem"><img src="./image/search.png" alt="" class="nav_search" /></button>
                </form>
                <!-- Div cho trạng thái chưa đăng nhập -->
                <?php
                if (!isset($_SESSION['dangky'])) {
                ?>
                    <div class="auth-actions">
                        <a href="./sign-up.php" class="button-4" role="button">Đăng kí</a>

                        <a href="./login.php" class="btn-login" role="button">Đăng nhập</a>
                    </div>
                <?php
                } else {
                ?>
                    <!-- Div cho trạng thái đã đăng nhập -->
                    <div class="user-actions">
                        <a href="./liked.html" class="user-actions-liked">
                            <img src="./image/heart.png" alt="" />
                        </a>

                        <a href="./cart.php">
                            <img src="./image/cart.png" alt="" />
                        </a>
                        <a href="./profile.php" class="user-actions-info">
                            <img src="./image/user.png" alt="" /><?php echo $_SESSION['dangky'] ?>

                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
            <span class="hamburger">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </span>
        </div>
    </nav>
    <nav class="mobile_nav mobile_nav_hide">
        <div class="nav-mobile">
            <form action="timkiem.php" class="nav_form">
                <input type="text" class="nav_input" placeholder="search here...." />
                <button><img src="./image/search.png" alt="" class="nav_search" /></button>
            </form>
            <!-- Div cho trạng thái chưa đăng nhập -->
            <div class="auth-actions">
                <a href="./sign-up.php" class="button-4" role="button">Đăng kí</a>

                <a href="./login.php" class="btn-login" role="button">Đăng nhập</a>
                <div></div>
            </div>
            <!-- Div cho trạng thái đã đăng nhập -->
            <div class="user-actions">
                <a href="./liked.html" class="user-actions-liked">
                    <img src="./image/heart.png" alt="" />
                </a>

                <a href="/cart.html">
                    <img src="./image/cart.png" alt="" />
                </a>
                <a href="./profile.html">
                    <img src="./image/user.png" alt="" />
                </a>
            </div>
        </div>
        <ul class="mobile_nav_list">
            <li class="mobile_nav_item">
                <a href="./index.php" class="mobile_nav_link">Trang chủ</a>
            </li>
            <li class="mobile_nav_item">
                <a href="./products.php" class="mobile_nav_link">Sản phẩm</a>
            </li>
            <li class="mobile_nav_item">
                <a href="./about.html" class="mobile_nav_link">Giới thiệu</a>
            </li>
            <li class="mobile_nav_item">
                <a href="./contact.html" class="mobile_nav_link">Liên hệ</a>
            </li>
            <li class="mobile_nav_item">
                <a href="/sign-up.html" class="mobile_nav_link">Đăng kí</a>
            </li>
            <li class="mobile_nav_item">
                <a href="/cart.html" class="mobile_nav_link">Giỏ hàng</a>
            </li>
            <li class="mobile_nav_item">
                <a href="./checkOut.html" class="mobile_nav_link">Thanh toán</a>
            </li>
        </ul>
    </nav>
    <section class="section">
        <div class="container">


            <div class="">
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">

                    <div class="px-4 py-6 md:px-6 xl:px-7.5">
                        <h4 class="text-[20px] font-bold text-black dark:text-white">
                            Đơn hàng chi tiết
                        </h4>
                    </div>
                    <div class="grid grid-cols-6 py-4 bg-gray-400 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                        <div class="col-span-3 flex items-center justify-center">
                            <p class="font-medium">Tên sản phẩm</p>
                        </div>

                        <div class="col-span-1 flex items-center justify-center">
                            <p class="font-medium">Mã đơn hàng</p>
                        </div>
                        <div class="col-span-1 flex items-center justify-center">
                            <p class="font-medium">Số lượng</p>
                        </div>
                        <div class="col-span-1 hidden items-center sm:flex justify-center">
                            <p class="font-medium">Đơn giá</p>
                        </div>
                        <div class="col-span-1 flex items-center justify-center">
                            <p class="font-medium">Thành tiền</p>
                        </div>
                    </div>

                    <?php
                    $tongtien = 0;

                    if (mysqli_num_rows($query_lietke_dh) > 0) {
                        while ($row = mysqli_fetch_assoc($query_lietke_dh)) {
                            $thanhtien = $row['giaban'] * $row['soluongmua'];
                            $tongtien += $thanhtien;

                    ?>
                            <div class="grid grid-cols-6 py-4 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                                <div class="col-span-3 flex items-center">

                                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                                        <div class="h-12.5 w-15 rounded-md">
                                            <img src="admin/modules/quanlisanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="" width="200" height="150">
                                        </div>
                                        <p class="text-[16px] font-medium text-black dark:text-white pr-3">
                                            <?php echo $row['tensanpham'] ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-span-1 flex items-center justify-center">
                                    <p class="font-medium"><?php echo $row['code_cart'] ?></p>
                                </div>
                                <div class="col-span-1 flex items-center justify-center">
                                    <p class="font-medium"><?php echo $row['soluongmua'] ?></p>
                                </div>
                                <div class="col-span-1 hidden items-center sm:flex justify-center">
                                    <p class="font-medium"><?php echo number_format($row['giaban'], 0, ',', '.') . 'vnđ' ?></p>
                                </div>
                                <div class="col-span-1 flex items-center justify-center">
                                    <p class="font-medium"><?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No order details found.";
                    }
                    ?>
                    <div class="flex items-center justify-center gap-4 mt-10 pb-10">
                        <h4 class="text-[18px] font-bold text-black dark:text-white">
                            Tổng tiền đơn hàng:
                        </h4>
                        <p> <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?></p>
                    </div>
                </div>
            </div>
            <a href="./order.php" type="button" class="mt-10 mr-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-[14px] px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Quay lại</a>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer_container">
            <div class="footer_item">
                <a href="#" class="footer_logo">Exclusive</a>
                <div class="footer_p">
                    Chào mừng các bạn đến với ngôi nhà trao đến mọi sự tiện lợi về công nghệ. Thứ bạn cần chúng tôi có
                </div>
            </div>
            <div class="footer_item">
                <h3 class="footer_item_titl">Liên hệ</h3>
                <ul class="footer_list">
                    <li class="li footer_list_item">Stockholm, Sweden</li>
                    <li class="li footer_list_item">email@gmail.com</li>
                    <li class="li footer_list_item">+84 123 456 78</li>
                    <li class="li footer_list_item">+84 72 345 67</li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_item_titl">Chức năng</h3>
                <ul class="footer_list">
                    <li class="li footer_list_item">Quản lý</li>
                    <li class="li footer_list_item">Đăng ký, đăng nhập</li>
                    <li class="li footer_list_item">Giỏ hàng</li>
                    <li class="li footer_list_item">Sản phẩm</li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_item_titl">Câu hỏi</h3>
                <ul class="footer_list">
                    <li class="li footer_list_item">Trang web hoạt động bao lâu?</li>
                    <li class="li footer_list_item">Đội ngũ gồm những ai?</li>
                    <li class="li footer_list_item">Có bao nhiêu người dùng?</li>
                    <li class="li footer_list_item">Lợi nhuận hàng năm?</li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</body>

</html>