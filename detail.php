<?php
include('admin/config/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/detail.css" />
  <title>Detail</title>
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
  <?php
  $sql_sp = "select * from tbl_sanpham where id_sanpham='$_GET[idsanpham] LIMIT 1'";
  $query_sp = mysqli_query($conn, $sql_sp);
  $row_sp = mysqli_fetch_array($query_sp);

  ?>
  <section>
    <div class="container">
      <div class="product-detail">
        <div class="left">

          <div class="main_image">
            <img src="admin/modules/quanlisanpham/uploads/<?php echo $row_sp['hinhanh'] ?>" class="slide" />
          </div>
        </div>
        <form action="themgiohang.php?idsanpham=<?php echo $row_sp['id_sanpham'] ?>" method="post">
          <div class="right">
            <h3><?php echo $row_sp['tensanpham'] ?></h3>
            <div class="right-rating">
              <div class="right-rating-icon">
                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z" fill="#FFAD33" />
                </svg>
                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z" fill="#FFAD33" />
                </svg>
                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z" fill="#FFAD33" />
                </svg>
                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z" fill="#FFAD33" />
                </svg>
                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.25" d="M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z" fill="black" />
                </svg>
              </div>
              <span>(150 Reviews)</span>
            </div>
            <p class="right-price"><?php echo number_format($row_sp['giaban'], 0, ',', '.') . '.đ' ?></p>
            <span class="overview"> Sô lượng còn : <?php echo $row_sp['soluong'] ?> </span>
            <span class="overview2">
              Mô tả sản phẩm :
              <?php echo $row_sp['noidung'] ?>
            </span>



            <div class="product-detail-btn">
              <div class="quantity">
                <p class="quantity2"><label>Số lượng:</label><input type="number" name="soluongmua" value=1 min="1" max="<?php echo $row_sp['soluong'] ?>">
                  <span>Điền số lượng bạn muốn !</span>
                </p>
              </div>
              <input type="submit" class="product-detail-btn-buynow" value="Thêm vào giỏ" name="themgiohang"></input>
            </div>
        </form>
        <div class="delivery">
          <div class="delivery-item">
            <img src="./image/icons/delivery1.png" alt="" />
            <div class="delivery-item-label">
              <h5>Giao hàng miễn phí</h5>
              <p>Nhập mã bưu chính của bạn để biết Tình trạng sẵn sàng giao hàng</p>
            </div>
          </div>

          <div class="delivery-item">
            <img src="./image/icons/delivery1.png" alt="" />
            <div class="delivery-item-label">
              <h5>Trả lại hàng</h5>
              <p>Trả lại hàng miễn phí trong 30 ngày</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <section class="section Related">
    <div class="container">
      <div class="section_category">
        <p class="section_category_p"></p>
      </div>
      <div class="section_header">
        <div class="section_header_left">
          <h3 class="section_title">Sản phẩm tương tự</h3>
        </div>
        <div class="swiper-button-wrap">
          <div class="swiper-button-prev swiper-button-prev3">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11 5L4 12L11 19M4 12H20" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <p></p>
          <div class="swiper-button-next swiper-button-next3">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.5 12H20M20 12L13 5M20 12L13 19" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Swiper -->
      <div class="swiper mySwiper3" id="flash_sale">
        <div class="swiper-wrapper">
          <?php

          $sql_lietke_sp = "select * from tbl_sanpham LIMIT 0,5";
          $query_lietke_sp = mysqli_query($conn, $sql_lietke_sp);
          while ($row = mysqli_fetch_array($query_lietke_sp)) {
            $randomNumber = rand(1, 100);
            $giamgia = 0;
            if ($row['giasp'] > 0) {
              $giamgia = round(($row['giasp'] - $row['giaban']) / $row['giasp'] * 100, 2);
            } else {
              $giamgia = 0;
            }

          ?>
            <div class="swiper-slide">
              <a href="./detail.php?quanli=sanpham&idsanpham=<?php echo $row['id_sanpham'] ?>" class="card">
                <div class="card_top">
                  <img src="admin/modules/quanlisanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="" class="card_img" />
                  <div class="card_tag"><?php if ($giamgia != 0) echo '- ' . number_format($giamgia) . '%' ?></div>
                  <div class="card_top_icons">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="card_top_icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="card_top_icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                  </div>
                </div>
                <div class="card_body">
                  <h3 class="card_title"><?php echo $row['tensanpham'] ?></h3>

                  <div class="card_list_price">
                    <p class="card_price"><?php echo number_format($row['giaban'], 0, ',', '.') . '.đ' ?></p>
                    <span class="card_del"><?php echo number_format($row['giasp'], 0, ',', '.') . '.đ' ?></span>
                  </div>
                  <div class="card_ratings">
                    <div class="card_stars">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                      </svg>

                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                      </svg>

                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                      </svg>

                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                      </svg>

                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <p class="card_rating_numbers"><?php echo '(' . $randomNumber . ')' ?></p>
                  </div>
                  <button class="add_to_cart">
                    <svg width="40" height="40" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect y="0.5" width="44" height="44" rx="8" fill="#029FAE" />
                      <path d="M12.75 13.75L14.83 14.11L15.793 25.583C15.83 26.0345 16.0358 26.4554 16.3695 26.7618C16.7031 27.0682 17.14 27.2375 17.593 27.236H28.503C28.9367 27.2365 29.3561 27.0803 29.6838 26.7963C30.0116 26.5122 30.2258 26.1194 30.287 25.69L31.237 19.132C31.2623 18.9576 31.253 18.7799 31.2096 18.6091C31.1662 18.4383 31.0896 18.2777 30.9841 18.1365C30.8786 17.9954 30.7463 17.8764 30.5947 17.7864C30.4432 17.6964 30.2754 17.6371 30.101 17.612C30.037 17.605 15.164 17.6 15.164 17.6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M24.125 21.295H26.898" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M17.154 30.703C17.2273 30.6999 17.3006 30.7116 17.3692 30.7375C17.4379 30.7634 17.5007 30.8029 17.5537 30.8537C17.6067 30.9045 17.6488 30.9655 17.6777 31.033C17.7065 31.1005 17.7213 31.1731 17.7213 31.2465C17.7213 31.3199 17.7065 31.3926 17.6777 31.4601C17.6488 31.5276 17.6067 31.5886 17.5537 31.6393C17.5007 31.6901 17.4379 31.7296 17.3692 31.7555C17.3006 31.7814 17.2273 31.7932 17.154 31.79C17.0139 31.784 16.8815 31.7241 16.7845 31.6228C16.6875 31.5216 16.6333 31.3868 16.6333 31.2465C16.6333 31.1063 16.6875 30.9715 16.7845 30.8702C16.8815 30.7689 17.0139 30.709 17.154 30.703Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M28.435 30.703C28.5795 30.703 28.7181 30.7604 28.8204 30.8626C28.9226 30.9648 28.98 31.1035 28.98 31.248C28.98 31.3925 28.9226 31.5312 28.8204 31.6334C28.7181 31.7356 28.5795 31.793 28.435 31.793C28.2904 31.793 28.1518 31.7356 28.0496 31.6334C27.9474 31.5312 27.89 31.3925 27.89 31.248C27.89 31.1035 27.9474 30.9648 28.0496 30.8626C28.1518 30.7604 28.2904 30.703 28.435 30.703Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </button>
                </div>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="container_btn">
        <a href="#" class="container_btn_a">XEM THÊM</a>
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
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="./js/app.js"></script>
  <script>
    function img(anything) {
      document.querySelector(".slide").src = anything;
    }

    function change(change) {
      const line = document.querySelector(".home");
      line.style.background = change;
    }

    var swiper3 = new Swiper("#slide", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });
  </script>
  <!-- Swiper JS -->
</body>

</html>