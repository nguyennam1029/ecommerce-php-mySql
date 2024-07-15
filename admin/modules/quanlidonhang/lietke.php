 <?php
  $sql_lietke_dh = "select * from tbl_cart,tbl_dangky where tbl_cart.id_khachhang=tbl_dangky.id_dangky";
  $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);
  ?>




 <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
   <div class="px-4 py-6 md:px-6 xl:px-7.5">
     <h4 class="text-xl font-bold text-black dark:text-white">
       Liệt kê các đơn hàng
     </h4>
   </div>

   <div class="grid grid-cols-6 py-4 bg-gray-400 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
     <div class="col-span-2 flex items-center">
       <p class="font-medium">Tên Khách hàng</p>
     </div>

     <div class="col-span-1 flex items-center">
       <p class="font-medium">SDT</p>
     </div>
     <div class="col-span-1 flex items-center">
       <p class="font-medium">Mã đơn hàng</p>
     </div>
     <div class="col-span-2 hidden items-center sm:flex">
       <p class="font-medium">Địa chỉ</p>
     </div>
     <div class="col-span-2 flex items-center">
       <p class="font-medium">Hành động</p>
     </div>
   </div>
   <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
      $i++;
    ?>
     <div class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
       <div class="col-span-2 flex items-center">
         <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
           <div class="h-12.5 w-15 rounded-md">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
             </svg>
           </div>
           <div class="my-4">
             <p class="text-sm font-medium text-black dark:text-white">
               <?php echo $row['tenkhachhang'] ?>
             </p>
             <p class="text-sm font-medium text-black dark:text-white">
               <?php echo $row['email'] ?>
             </p>
           </div>
         </div>
       </div>
       <div class="col-span-1 flex items-center">
         <p class="text-sm font-medium text-black dark:text-white">
           <?php echo $row['dienthoai'] ?>
         </p>
       </div>
       <div class="col-span-1 flex items-center">
         <p class="text-sm font-medium text-black dark:text-white">
           <?php echo $row['code_cart'] ?>
         </p>
       </div>
       <div class="col-span-2 hidden items-center sm:flex">
         <p class="text-sm font-medium text-black dark:text-white">
           <?php echo $row['diachi'] ?>
         </p>
       </div>
       <div class="col-span-2 flex items-center">
         <div class="flex items-center space-x-3.5">
           <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>" class="hover:text-primary">
             <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z" fill=""></path>
               <path d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z" fill=""></path>
             </svg>
           </a>
           <?php
            switch ($row['cart_status']) {
              case '0':
                echo '<span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-[#00DF80] text-white"> Đã xử lý</span>';
                break;
              case '1':
                echo '<span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-[#FFD21E] text-gray-800"> Đang xử lý</span>';
                break;
              case '2':
                echo '<span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-[#F04248] text-gray-800"> Đã hủy</span>';
                break;
              case '3':
                echo '<span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-[#3680ff] text-white"> Đang vận chuyển</span>';
                break;
            }
            ?>
           <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown<?php echo $i; ?>" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
             <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
               <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
             </svg>
           </button>
           <!-- Dropdown menu -->
           <div id="dropdown<?php echo $i; ?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
             <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
               <li>
                 <a href="modules/quanlidonhang/xuli.php?cart_status=0&code=<?php echo $row['code_cart'] ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Đã xử lý</a>
               </li>
               <li>
                 <a href="modules/quanlidonhang/xuli.php?cart_status=1&code=<?php echo $row['code_cart'] ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Đang xử lý</a>
               </li>
               <li>
                 <a href="modules/quanlidonhang/xuli.php?cart_status=2&code=<?php echo $row['code_cart'] ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Đã hủy</a>
               </li>
               <li>
                 <a href="modules/quanlidonhang/xuli.php?cart_status=3&code=<?php echo $row['code_cart'] ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Đang vận chuyển</a>
               </li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   <?php
    }
    ?>



 </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

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