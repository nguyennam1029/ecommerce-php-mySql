<?php
$sql_sua_danhmucsp = "select * from tbl_danhmuc where id_danhmuc='$_GET[iddanhmuc]'";
$query_sua_danhmucsp = mysqli_query($conn, $sql_sua_danhmucsp);
?>
<div class="px-4 py-6 md:px-6 xl:px-7.5">
    <h4 class="text-xl font-bold text-black dark:text-white">
        Sửa danh mục
    </h4>
</div>
<form class="max-w-sm mx-auto py-5" method="POST" action="modules/quanlidanhmucsp/xuli.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" enctype="multipart/form-data">
    <?php
    while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
    ?>

        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên Danh mục</label>
            <input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Laptop..." required />
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thứ tự</label>
            <input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="8" required />
        </div>
        <div class="flex items-center justify-center gap-10">

            <button type="submit" name="suadanhmuc" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cập nhật</button>

            <a href="index.php?action=quanlidanhmucsanpham&query=them" class="py-2.5 px-5  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Quay lại</a>
        </div>

    <?php

    } ?>
</form>