<?php
$sql_lietke_dh="select * from tbl_cart_detail,tbl_sanpham where tbl_cart_detail.id_sanpham=tbl_sanpham.id_sanpham
and tbl_cart_detail.code_cart='$_GET[code]'";
$query_lietke_dh= mysqli_query($conn,$sql_lietke_dh);
?>
<p> Xem đơn hàng</p>
<table border="1px" style=" width: 100%; border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng mua</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
   
  </tr>
  <?php
 $i=0;
 $tongtien=0;
  while($row=mysqli_fetch_array($query_lietke_dh))
  {
  $i++;
  $thanhtien=$row['giaban']*$row['soluongmua'];
  $tongtien+=$thanhtien;
    ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row['code_cart']?></td>
    <td><?php echo $row['tensanpham']?></td>
    <td> <?php echo $row['soluongmua']?></td>
    <td><?php echo number_format($row['giaban'],0,',','.').'vnđ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ'?></td>
  
  </tr>
  <?php
  }
  ?>
  <td colspan="6">Tổng tiền:<?php echo number_format($tongtien,0,',','.').'vnđ'?></td>
</table>