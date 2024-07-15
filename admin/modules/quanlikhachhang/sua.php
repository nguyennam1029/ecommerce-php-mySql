<?php
$sql_sua_khachhang = "select * from tbl_dangky where id_dangky='$_GET[idkhachhang]'";
$query_sua_khachhang = mysqli_query($conn, $sql_sua_khachhang);
?>
<div class="px-4 py-6 md:px-6 xl:px-7.5">
    <h4 class="text-xl font-bold text-black dark:text-white">
        Sửa thông tin khách hàng
    </h4>
</div>
<form class="max-w-sm mx-auto py-5" method="POST" action="modules/quanlikhachhang/xuli.php?idkhachhang=<?php echo $_GET['idkhachhang'] ?>" enctype="multipart/form-data">
    <?php
    while ($dong = mysqli_fetch_array($query_sua_khachhang)) {
    ?>


        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên</label>
                <input type="text" value="<?php echo $dong['tenkhachhang'] ?>" name="hovaten" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
            </div>
            <div class="w-full">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" value="<?php echo $dong['email'] ?>" name="email" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
            </div>
            <div class="w-full">
                <label for="matkhau" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mật khẩu</label>
                <input disabled type="password" value="<?php echo $dong['matkhau'] ?>" name="matkhau" id="matkhau" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
            </div>
            <div class="w-full">
                <label for="dienthoai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SĐT</label>
                <input type="number" value="<?php echo $dong['dienthoai'] ?>" name="dienthoai" id="dienthoai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
            </div>
            <div class="w-full">
                <label for="diachi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Địa chỉ</label>
                <input type="text" value="<?php echo $dong['diachi'] ?>" name="diachi" id="diachi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
            </div>


        </div>
        <div class="flex items-center justify-center gap-10 mt-6">

            <button name="suakhachhang" type="submit" class="flex items-center col-span-2 px-5 py-2.5  text-sm font-medium text-center text-white bg-[#0083ff] rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Cập nhật
            </button>
            <a href="index.php?action=quanlikhachhang&query=lietke" class="py-2.5 px-5  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Quay lại</a>
        </div>
    <?php

    } ?>
</form>