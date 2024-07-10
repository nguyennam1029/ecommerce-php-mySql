<?php
$sql_lietke_dh = "select * from tbl_cart_detail,tbl_sanpham where tbl_cart_detail.id_sanpham=tbl_sanpham.id_sanpham
and tbl_cart_detail.code_cart='$_GET[code]'";
$query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);
?>
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
              <img src="modules/quanlisanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="" width="200" height="150">
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