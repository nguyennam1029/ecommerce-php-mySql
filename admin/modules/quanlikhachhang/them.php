<?php
error_reporting(E_ERROR | E_PARSE);
include('../../config/connect.php');

if (isset($_POST['dangky'])) {

    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = md5($_POST['matkhau']);

    // Check for valid customer name
    if (strlen($tenkhachhang) > 6 && ctype_upper($tenkhachhang[0])) {
        // Check for duplicate email
        $sql_check_email = "SELECT * FROM tbl_dangky WHERE email='$email'";
        $query_check_email = mysqli_query($conn, $sql_check_email);

        if (mysqli_num_rows($query_check_email) > 0) {
            echo "<script>alert('Email đã tồn tại');</script>";
        } else {
            $sql_dangky = mysqli_query($conn, "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) VALUES('$tenkhachhang', '$email', '$diachi', '$matkhau', '$dienthoai')");
            if ($sql_dangky) {
                $_SESSION['dangky'] = $tenkhachhang;
                echo "<script>alert('Bạn đã thêm thành công');</script>";
                // echo "<script>window.location.href='../../index.php?action=quanlikhachhang&query=lietke';</script>";

                // header('Location:login.php');
            } else {
                echo "<script>alert('Đăng ký không thành công');</script>";
            }
        }
    } else {
        echo "<script>alert('Tên khách hàng phải có độ dài lớn hơn 6 và có chữ cái đầu tiên viết hoa.');</script>";
    }
}
?>


<!-- Modal toggle -->
<button data-modal-target="default-modal" data-modal-toggle="default-modal" class="ml-auto mb-6 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Thêm Mới
</button>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Thêm người dùng
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-3 space-y-4">
                <form class="max-w-md mx-auto py-3" method="POST">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên</label>
                            <input type="text" name="hovaten" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="6 kí tự trở lên và chữ cái đầu phải in hoa VD: Hải dev, FullStack..." required="">
                        </div>
                        <div class="w-full">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="email@gmail.com" required="">
                        </div>
                        <div class="w-full">
                            <label for="matkhau" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mật khẩu</label>
                            <input type="password" name="matkhau" id="matkhau" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="******" required="">
                        </div>
                        <div class="w-full">
                            <label for="dienthoai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SĐT</label>
                            <input type="number" name="dienthoai" id="dienthoai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0978434534" required="">
                        </div>
                        <div class="w-full">
                            <label for="diachi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Địa chỉ</label>
                            <input type="text" name="diachi" id="diachi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bách khoa - Hà Nội" required="">
                        </div>
                        <button name="dangky" type="submit" class="flex items-center col-span-2 mx-auto px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-[#0083ff] rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Thêm mới
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>