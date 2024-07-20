<?php
include('admin/config/connect.php');
session_start();
$id_khachhang = $_SESSION['id_khachhang'];
// echo 'ID khách hàng: ' . $id_khachhang;

// Check if the user is logged in
if (!isset($id_khachhang)) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Fetch orders of the logged-in user
$sql_lietke_dh = "SELECT * FROM tbl_cart, tbl_dangky 
                  WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky 
                  AND tbl_cart.id_khachhang = '$id_khachhang'";
$query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);


if (isset($_GET['cart_status']) && isset($_GET['code'])) {
    $status = $_GET['cart_status'];
    $code = $_GET['code'];
    $sql_update = "update tbl_cart set cart_status='" . $status . "' where code_cart='" . $code . "'";
    $query = mysqli_query($conn, $sql_update);
    header('Location:order.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="./css/styles.css" />

    <link rel="stylesheet" href="./css/profile.css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
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
            <div class="profile">
                <div class="sidebar">
                    <ul class="menu">
                        <li class="menu-item active"><a href="./profile.php">Thông tin</a></li>
                        <li class="menu-item active"><a href="./order.php">Đơn hàng</a></li>

                    </ul>
                </div>
                <div class="">
                    <div class="rounded-sm h-[400px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">


                        <div class="grid grid-cols-8 py-4 bg-gray-400 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                            <div class="col-span-2 flex items-center ">
                                <p class="font-medium">Tên Khách hàng</p>
                            </div>

                            <div class="col-span-1 flex items-center justify-center">
                                <p class="font-medium">SDT</p>
                            </div>
                            <div class="col-span-1 flex items-center justify-center">
                                <p class="font-medium">Mã đơn hàng</p>
                            </div>
                            <div class="col-span-2 hidden items-center sm:flex justify-center">
                                <p class="font-medium">Địa chỉ</p>
                            </div>
                            <div class="col-span-2 flex items-center justify-center">
                                <p class="font-medium">Trạng thái</p>
                            </div>
                        </div>
                        <?php
                        if (mysqli_num_rows($query_lietke_dh) > 0) {
                            while ($row = mysqli_fetch_assoc($query_lietke_dh)) {
                        ?>
                                <div class="grid grid-cols-8 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                                    <div class="col-span-2 flex items-center ">
                                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center ">
                                            <div class="h-12.5 w-15 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[30px] h-[30px]">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>
                                            <div class="my-4">
                                                <p class="text-[14px] font-medium text-black dark:text-white">
                                                    <?php echo $row['tenkhachhang']; ?>
                                                </p>
                                                <p class="text-[14px] font-medium text-black dark:text-white">
                                                    <?php echo $row['email']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1 flex items-center justify-center">
                                        <p class="text-[14px] font-medium  text-black dark:text-white">
                                            <?php echo $row['dienthoai']; ?>
                                        </p>
                                    </div>
                                    <div class="col-span-1 flex items-center justify-center">
                                        <p class="text-[14px] font-medium text-black dark:text-white">
                                            <?php echo $row['code_cart']; ?>
                                        </p>
                                    </div>
                                    <div class="col-span-2 hidden items-center justify-center sm:flex">
                                        <p class="text-[14px] font-medium text-black dark:text-white">
                                            <?php echo $row['diachi']; ?>
                                        </p>
                                    </div>
                                    <div class="col-span-2 flex items-center justify-center">
                                        <p class="text-[14px] font-medium text-meta-3"></p>
                                        <div class="flex items-center space-x-3.5">
                                            <a href="order-detail.php?code=<?php echo $row['code_cart'] ?>" class="hover:text-primary">
                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z" fill=""></path>
                                                    <path d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z" fill=""></path>
                                                </svg>
                                            </a>
                                            <?php
                                            switch ($row['cart_status']) {

                                                case '0':
                                                    echo '<span class="inline-flex items-center px-3 py-1.5 rounded-full text-[14px] font-medium bg-[#00DF80] text-white"> Đã xử lý</span>';
                                                    break;
                                                case '1':
                                                    echo '<span class="inline-flex items-center px-3 py-1.5 rounded-full text-[14px] font-medium bg-[#FFD21E] text-gray-800"> Đang xử lý</span>';
                                                    break;
                                                case '2':
                                                    echo '<span class="inline-flex items-center px-3 py-1.5 rounded-full text-[14px] font-medium bg-[#F04248] text-gray-800"> Đã hủy</span>';
                                                    break;
                                                case '3':
                                                    echo '<span class="inline-flex items-center px-3 py-1.5 rounded-full text-[14px] font-medium bg-[#3680ff] text-white"> Đang vận chuyển</span>';
                                                    break;
                                            }
                                            ?>
                                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown<?php echo $row['code_cart']; ?>" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                                </svg>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdown<?php echo $row['code_cart']; ?>" class="z-10 hidden bg-white divide-x divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                <ul class="py-2 text-[14px] text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">

                                                    <li>
                                                        <?php
                                                        if ($row['cart_status'] == 1) {
                                                            echo '<a href="order.php?cart_status=2&code=' . $row['code_cart'] . '" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hủy đơn</a>';
                                                        } else {
                                                            echo '<a href="order.php?cart_status=1&code=' . $row['code_cart'] . '" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Đặt lại</a>';
                                                        }
                                                        ?>

                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo '
                            <div>
                            <img src="https://cdn.dribbble.com/users/1753953/screenshots/3818675/animasi-emptystate.gif" alt="" class="w-[300px] mx-auto" />
                            <p class="text-center mt-4">Bạn chưa có đơn hàng nào!</p>
                            </div>
                            ';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer_container">
            <div class="footer_item">
                <a href="#" class="footer_logo">Exclusive</a>
                <div class="footer_p">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Exercitationem fuga harum voluptate?
                </div>
            </div>
            <div class="footer_item">
                <h3 class="footer_item_titl">Support</h3>
                <ul class="footer_list">
                    <li class="li footer_list_item">Stockholm, Sweden</li>
                    <li class="li footer_list_item">email@gmail.com</li>
                    <li class="li footer_list_item">+46 123 456 78</li>
                    <li class="li footer_list_item">+46 72 345 67</li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_item_titl">Support</h3>
                <ul class="footer_list">
                    <li class="li footer_list_item">Account</li>
                    <li class="li footer_list_item">Login / Register</li>
                    <li class="li footer_list_item">Cart</li>
                    <li class="li footer_list_item">Shop</li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_item_titl">Support</h3>
                <ul class="footer_list">
                    <li class="li footer_list_item">Privacy policy</li>
                    <li class="li footer_list_item">Terms of use</li>
                    <li class="li footer_list_item">FAQ's</li>
                    <li class="li footer_list_item">Contact</li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Add these lines in the head or just before the closing body tag of your HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script>
        // Toggle dropdown visibility
        document.getElementById('dropdownDefaultButton').addEventListener('click', function() {
            var dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        });

        // Optional: Close dropdown when clicking outside
        window.addEventListener('click', function(event) {
            var dropdown = document.getElementById('dropdown');
            if (!event.target.closest('#dropdownDefaultButton')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>