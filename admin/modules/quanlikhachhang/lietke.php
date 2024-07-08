 <?php
  $sql_lietke_kh = "select * from tbl_dangky";
  $query_lietke_kh = mysqli_query($conn, $sql_lietke_kh);
  ?>




 <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
   <div class="px-4 py-6 md:px-6 xl:px-7.5">
     <h4 class="text-xl font-bold text-black dark:text-white">
       Danh sách người dùng
     </h4>
   </div>

   <div class="grid grid-cols-6 py-4 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
     <div class="col-span-3 flex items-center">
       <p class="font-medium">Tên Khách Hàng</p>
     </div>
     <div class="col-span-2 hidden items-center sm:flex">
       <p class="font-medium">Email</p>
     </div>
     <div class="col-span-1 flex items-center">
       <p class="font-medium">Địa chỉ</p>
     </div>
     <div class="col-span-1 flex items-center">
       <p class="font-medium">Số điện thoại</p>
     </div>

   </div>
   <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_kh)) {
      $i++;
    ?>

     <div class="grid grid-cols-6 py-4 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
       <div class="col-span-3 flex items-center">
         <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
           <div class="h-12.5 w-15 rounded-md">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
             </svg>

           </div>
           <p class="text-sm font-medium text-black dark:text-white">
             <?php echo $row['tenkhachhang'] ?>
           </p>
         </div>
       </div>
       <div class="col-span-2 hidden items-center sm:flex">
         <p class="text-sm font-medium text-black dark:text-white">
           <?php echo $row['email'] ?>
         </p>
       </div>
       <div class="col-span-1 flex items-center">
         <p class="text-sm font-medium text-black dark:text-white">
           <?php echo $row['diachi'] ?>
         </p>
       </div>
       <div class="col-span-1 flex items-center">
         <p class="text-sm font-medium text-black dark:text-white">
           <?php echo $row['dienthoai'] ?>
         </p>
       </div>

     </div>

   <?php
    }
    ?>


 </div>