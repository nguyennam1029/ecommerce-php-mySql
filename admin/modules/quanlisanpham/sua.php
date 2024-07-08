 <?php
    $sql_sua_sp = "select * from tbl_sanpham where id_sanpham='$_GET[idsanpham]'";
    $query_sua_sp = mysqli_query($conn, $sql_sua_sp);

    ?>

 <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Cập nhật sản phẩm</h2>

 <section class="bg-white dark:bg-gray-900">
     <div class="py-2 px-4 mx-auto max-w-2xl pb-6">
         <?php
            while ($row = mysqli_fetch_array($query_sua_sp)) {
            ?>
             <form method="POST" action="modules/quanlisanpham/xuli.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
                 <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                     <div class="sm:col-span-2">
                         <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên</label>
                         <input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                     </div>
                     <div class="w-full">
                         <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mã</label>
                         <input type="text" value="<?php echo $row['masp'] ?>" name="masp" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
                     </div>
                     <div class="w-full">
                         <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Giá gốc</label>
                         <input type="number" value="<?php echo $row['giasp'] ?>" name="giasp" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                     </div>
                     <div class="w-full">
                         <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Giá bán</label>
                         <input type="number" value="<?php echo $row['giaban'] ?>" name="giaban" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                     </div>
                     <div class="w-full">
                         <label for="soluong" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số lượng</label>
                         <input type="text" value="<?php echo $row['soluong'] ?>" name="soluong" id="soluong" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
                     </div>
                     <div>
                         <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Danh mục</label>
                         <select id="category" name="danhmuc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                             <?php
                                $sql_danhmuc = "select *from tbl_danhmuc";
                                $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                    if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {
                                ?>
                                     <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                 <?php
                                    } else {
                                    ?>
                                     <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                 <?php
                                    }
                                    ?>
                             <?php
                                }
                                ?>
                         </select>
                     </div>
                     <div>
                         <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trạng thái</label>
                         <select id="status" name="tinhtrang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                             <?php
                                if ($row['tinhtrang'] == 1) {
                                ?>
                                 <option value="1" selected>Phê duyệt</option>
                                 <option value="0">Đang xử lý</option>
                             <?php
                                } else {
                                ?>
                                 <option value="1">Phê duyệt</option>
                                 <option value="0" selected>Đang xử lý</option>
                             <?php
                                }
                                ?>

                         </select>
                     </div>
                     <div class="sm:col-span-2">
                         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Tải ảnh</label>
                         <input name="hinhanh" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                     </div>

                     <div class="sm:col-span-2">
                         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"">Ảnh sản phẩm</label>

                         <img class=" h-auto max-w-[280px] p-4 w-[240px] mx-auto shadown-lg rounded-lg shadow-xl" src="modules/quanlisanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="image description">

                     </div>

                     <div class="sm:col-span-2">
                         <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mô tả ngắn</label>
                         <textarea id="description" name="tomtat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here">
                            <?php echo $row['tomtat'] ?>
                         </textarea>
                     </div>
                     <div class="sm:col-span-2">
                         <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nội Dung</label>
                         <textarea id="description" name="noidung" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here">
                            <?php echo $row['noidung'] ?>
                         </textarea>
                     </div>
                 </div>
                 <button name="suasanpham" type="submit" class="flex items-center mx-auto px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-[#0083ff] rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                     Cập nhật
                 </button>
             </form>
         <?php
            }
            ?>
     </div>
 </section>