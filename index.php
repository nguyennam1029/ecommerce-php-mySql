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
  <link rel="stylesheet" href="./css/styles.css" />
  <title>Home</title>
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
  <!-- Swiper -->
  <div class="container slide">
    <div class="swiper mySwiper" id="slide">
      <div class="swiper-wrapper slide-top">
        <!-- ------- item ----  -->
        <div class="swiper-slide">
          <div class="slide-item">
            <div>
              <p class="slide-item-des">Giao dịch tốt nhất trực tuyến trên đồng hồ thông minh</p>
              <h2 class="slide-item-heading">ĐỒNG HỒ edit</h2>
              <p class="slide-item-label">GIẢM GIÁ LÊN ĐẾN 50%</p>

            </div>
            <img src="./image/slide3.png" alt="" />
          </div>
        </div>
        <!-- ------- item ----  -->
        <div class="swiper-slide">
          <div class="slide-item">
            <div>
              <p class="slide-item-des">Giao dịch tốt nhất trực tuyến trên đồng hồ thông minh</p>
              <h2 class="slide-item-heading">Máy tính mới</h2>
              <p class="slide-item-label">GIẢM GIÁ LÊN ĐẾN 30%</p>

            </div>
            <img src="./image/slide2.jpg" alt="" />
          </div>
        </div>
        <!-- ------- item ----  -->
        <div class="swiper-slide">
          <div class="slide-item">
            <div>
              <p class="slide-item-des">Giao dịch tốt nhất trực tuyến trên đồng hồ thông minh</p>
              <h2 class="slide-item-heading">Điện Thoại 2024</h2>
              <p class="slide-item-label">GIẢM GIÁ LÊN ĐẾN 40%</p>

            </div>
            <img src="./image/slide4.png" alt="" />
          </div>
        </div>
        <!-- ------- item ----  -->
        <div class="swiper-slide">
          <div class="slide-item">
            <div>
              <p class="slide-item-des">Giao dịch tốt nhất trực tuyến trên điện thoại thông minh</p>
              <h2 class="slide-item-heading">ĐIỆN THOẠI</h2>
              <p class="slide-item-label">GIẢM GIÁ LÊN ĐẾN 80%</p>

            </div>
            <img src="./image/slide2.jpg" alt="" />
          </div>
        </div>
        <!-- ------- item ----  -->
        <div class="swiper-slide">
          <div class="slide-item">
            <div>
              <p class="slide-item-des">Giao dịch tốt nhất trực tuyến trên điện thoại thông minh</p>
              <h2 class="slide-item-heading">ĐIỆN THOẠI</h2>
              <p class="slide-item-label">GIẢM GIÁ LÊN ĐẾN 80%</p>

            </div>
            <img src="./image/slide2.jpg" alt="" />
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>

      <div class="swiper-button-next mobile">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.5 5L15.5 12L8.5 19" stroke="#008ECC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
      <div class="swiper-button-prev mobile">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15.5 5L8.5 12L15.5 19" stroke="#008ECC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="container">
      <div class="section_category">
        <p class="section_category_p">Today's</p>
      </div>
      <div class="section_header">
        <div class="section_header_left">
          <h3 class="section_title">Flash Sale</h3>
          <div class="countdown-container">
            <div class="countdown-section">
              <div class="countdown-value" id="days">0</div>
              <div class="countdown-label">Days</div>
            </div>
            <div class="separator">:</div>
            <div class="countdown-section">
              <div class="countdown-value" id="hours">0</div>
              <div class="countdown-label">Hours</div>
            </div>
            <div class="separator">:</div>
            <div class="countdown-section">
              <div class="countdown-value" id="minutes">19</div>
              <div class="countdown-label">Minutes</div>
            </div>
            <div class="separator">:</div>
            <div class="countdown-section">
              <div class="countdown-value" id="seconds">59</div>
              <div class="countdown-label">Seconds</div>
            </div>
          </div>
        </div>
        <div class="swiper-button-wrap">
          <div class="swiper-button-prev swiper-button-prev2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11 5L4 12L11 19M4 12H20" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <p></p>
          <div class="swiper-button-next swiper-button-next2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.5 12H20M20 12L13 5M20 12L13 19" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Swiper -->
      <div class="swiper mySwiper2" id="flash_sale">
        <div class="swiper-wrapper">
          <?php

          $sql_lietke_sp = "select * from tbl_sanpham ORDER BY RAND() LIMIT 8";
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

          <?php
          }
          ?>




        </div>
        <!-- <div class="swiper-button-next swiper-button-next2">
            <svg
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M3.5 12H20M20 12L13 5M20 12L13 19"
                stroke="black"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div> -->
      </div>
      <div class="container_btn">
        <a href="products.php" class="container_btn_a">XEM THÊM</a>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="section_category">
        <p class="section_category_p">Danh mục</p>
      </div>
      <div class="section_header">
        <h3 class="section_title">Duyệt theo Danh mục</h3>
      </div>

      <?php

      $sql = "SELECT id_danhmuc, tendanhmuc FROM tbl_danhmuc ORDER BY thutu";
      $result = $conn->query($sql);
      ?>
      <div class="categories">
        <?php
        if ($result->num_rows > 0) {
          // Duyệt qua từng hàng kết quả
          while ($row = $result->fetch_assoc()) {
            // Tạo đường dẫn hình ảnh tương ứng với tên danh mục
            $icon = strtolower($row['tendanhmuc']) . ".png";
            echo '
            <div class="category">
                <a href="products.php?quanlidanhmucsanpham&id=' . $row['id_danhmuc'] . '">
                    <img src="./image/icons/' . $icon . '" alt="' . $row['tendanhmuc'] . '" class="category_icon" />
                    <p class="category_name">' . $row['tendanhmuc'] . '</p>
                </a>
            </div>';
          }
        } else {
          echo '<p>No categories found.</p>';
        }

        ?>
      </div>

      <!-- <div class="categories">
        <div class="category">
          <a href="products.php?quanlidanhmucsanpham&id=3">
            <img src="./image/icons/camera.png" alt="" class="category_icon" />
            <p class="category_name">Cameras</p>
          </a>
        </div>
        <div class="category">
          <a href="products.php?quanlidanhmucsanpham&id=2"><img src="./image/icons/computer.png" alt="" class="category_icon" />
            <p class="category_name">Computers</p>
          </a>
        </div>
        <div class="category">
          <a href="products.php?quanlidanhmucsanpham&id=4">
            <img src="./image/icons/gaming.png" alt="" class="category_icon" />
            <p class="category_name">Gaming</p>
          </a>
        </div>
        <div class="category">
          <a href="products.php?quanlidanhmucsanpham&id=5">
            <img src="./image/icons/headphone.png" alt="" class="category_icon" />
            <p class="category_name">Headphones</p>
          </a>
        </div>
        <div class="category">
          <a href="products.php?quanlidanhmucsanpham&id=6">
            <img src="./image/icons/phone.png" alt="" class="category_icon" />
            <p class="category_name">Phones</p>
          </a>
        </div>
        <div class="category">
          <a href="products.php?quanlidanhmucsanpham&id=7">
            <img src="./image/icons/watch.png" alt="" class="category_icon" />
            <p class="category_name">Watches</p>
          </a>
        </div>
      </div> -->
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section_category">
        <p class="section_category_p">Tháng</p>
      </div>
      <div class="section_header">
        <div class="section_header_left">
          <h3 class="section_title">Sản phẩm bán chạy nhất</h3>
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

          $sql_lietke_sp = "select * from tbl_sanpham ORDER BY RAND() LIMIT 8";
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
              <a href="./detail.php?quanli=sanpham&idsanpham=<?php echo $row['id_sanpham'] ?>">
                <div class="card">
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
                </div>
              </a>
            </div>



          <?php
          }
          ?>



        </div>
      </div>
      <div class="container_btn">
        <a href="products.php" class="container_btn_a">XEM THÊM</a>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container trending-mb">
      <div class="trending">
        <div class="trending_content">
          <p class="trending_p">Headphones</p>
          <h2 class="trending_title">Nâng cao trải nghiệm âm nhạc của bạn</h2>
          <a href="#" class="trending_btn">Mua ngay!</a>
        </div>
        <img src="./image/speaker.png" alt="" class="trending_img" />
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section_category">
        <p class="section_category_p">Sản phẩm của chúng tôi</p>
      </div>
      <div class="section_header">
        <h3 class="section_title">Khám phá sản phẩm khác</h3>
        <p id="demo"></p>
      </div>

      <div class="products">
        <?php

        $sql_lietke_sp = "select * from tbl_sanpham ORDER BY RAND() LIMIT 8";
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
          <a href="./detail.php?quanli=sanpham&idsanpham=<?php echo $row['id_sanpham'] ?>">
            <div class="card">
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
            </div>
          </a>
        <?php } ?>
      </div>
      <div class="container_btn">
        <a href="products.php" class="container_btn_a">XEM THÊM</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section_category">
        <p class="section_category_p">Featured</p>
      </div>
      <div class="section_header">
        <h3 class="section_title">Bài Viết Mới</h3>
      </div>
      <div class="gallery">
        <div class="gallery_item gallery_item_1">
          <img src="./image/gallery/gallery-1.png" alt="" class="gallery_item_img" />
          <div class="gallery_item_content">
            <div class="gallery_item_title">Tay cầm chơi game PS5</div>
            <p class="gallery_item_p">
              Người dùng hoàn toàn có thể chơi game và sạc pin một cách dễ dàng Hiệu ứng âm thanh chân thực
            </p>
            <a href="products.php" class="gallery_item_link">Xem ngay</a>
          </div>
        </div>
        <div class="gallery_item gallery_item_2">
          <img src="./image/gallery/gallery-2.png" alt="" class="gallery_item_img" />
          <div class="gallery_item_content">
            <div class="gallery_item_title">Máy ảnh đa sắc</div>
            <p class="gallery_item_p">
              Máy có thể kết nối với điện thoại thông minh qua Bluetooth để in ảnh từ điện thoại và sử dụng các tính năng in ảnh nâng cao.
            </p>
            <a href="#" class="gallery_item_link">Xem ngay</a>
          </div>
        </div>
        <div class="gallery_item gallery_item_3">
          <img src="./image/gallery/gallery-3.png" alt="" class="gallery_item_img" />
          <div class="gallery_item_content">
            <div class="gallery_item_title">Pin sạc dự phòng Baseus</div>
            <p class="gallery_item_p">
              Với pin sạc dự phòng Baseus Airpow Fast Charge 20000mAh 20W
            </p>
            <a href="#" class="gallery_item_link">Xem ngay</a>
          </div>
        </div>
        <div class="gallery_item gallery_item_4">
          <img src="./image/gallery/t.jpg" alt="" class="gallery_item_img" />
          <div class="gallery_item_content">
            <div class="gallery_item_title">BỘ SẠC KHÔNG DÂY</div>
            <p class="gallery_item_p">
              Chất liệu silicon mềm, có thể gập lại để dễ dàng lưu trữ</p>
            <a href="#" class="gallery_item_link">Xem ngay</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container services_container">
      <div class="service">
        <img src="./image/icons/service-1.png" alt="" class="service_img" />
        <h3 class="service_title">GIAO HÀNG NHANH VÀ MIỄN PHÍ</h3>
        <p class="service_p">Tùy vào thời điểm bạn đặt hàng và khoảng cách shop tới bạn.</p>
      </div>
      <div class="service">
        <img src="./image/icons/service-2.png" alt="" class="service_img" />
        <h3 class="service_title">Hỗ trợ 24/7</h3>
        <p class="service_p">Nhằm nâng cao dịch vụ chung tôi sẻ trực và hỗ trợ các bạn mọi lúc và mọi nơi.</p>
      </div>
      <div class="service">
        <img src="./image/icons/service-3.png" alt="" class="service_img" />
        <h3 class="service_title">ĐẢM BẢO HOÀN TIỀN</h3>
        <p class="service_p">Mọi chính sách đều bảo vệ quyền tiêu dùng của mọi người.</p>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container footer_container">
      <div class="footer_item">
        <a href="#" class="footer_logo">Exclusive</a>
        <div class="footer_p">
          Chào mừng các bạn đến với ngôi nhà trao đến mọi sự tiện lợi về công nghệ. Thứ bạn cần chúng tôi có
        </div>
      </div>
      <div class="footer_item">
        <h3 class="footer_item_titl">Liên hệ</h3>
        <ul class="footer_list">
          <li class="li footer_list_item">Stockholm, Sweden</li>
          <li class="li footer_list_item">email@gmail.com</li>
          <li class="li footer_list_item">+84 123 456 78</li>
          <li class="li footer_list_item">+84 72 345 67</li>
        </ul>
      </div>
      <div class="footer_item">
        <h3 class="footer_item_titl">Chức năng</h3>
        <ul class="footer_list">
          <li class="li footer_list_item">Quản lý</li>
          <li class="li footer_list_item">Đăng ký, đăng nhập</li>
          <li class="li footer_list_item">Giỏ hàng</li>
          <li class="li footer_list_item">Sản phẩm</li>
        </ul>
      </div>
      <div class="footer_item">
        <h3 class="footer_item_titl">Câu hỏi</h3>
        <ul class="footer_list">
          <li class="li footer_list_item">Trang web hoạt động bao lâu?</li>
          <li class="li footer_list_item">Đội ngũ gồm những ai?</li>
          <li class="li footer_list_item">Có bao nhiêu người dùng?</li>
          <li class="li footer_list_item">Lợi nhuận hàng năm?</li>
        </ul>
      </div>
    </div>
  </footer>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="./js/app.js"></script>
</body>

</html>