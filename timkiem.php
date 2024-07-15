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
  <link rel="stylesheet" href="./css/products.css" />
  <title>Tìm Kiếm</title>
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
  <section>
    <div class="container">
      <p class="btn-filter" id="filter-icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5" />
        </svg>
      </p>
      <div class="product-list-wrap">
        <aside class="filters" id="filters">
          <p id="filter-close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </p>
          <div class="filter-category">
            <h3>Category</h3>
            <ul>
              <?php
              $sql_danhmuc = "select *from tbl_danhmuc";
              $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
              while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
              ?>
                <li>
                  <a href="products.php?quanlidanhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
        </aside>
        <main class="products">
          <?php

          if (isset($_POST['timkiem'])) {
            $tukhoa = $_POST['tukhoa'];
          }
          $sql_pro = " select*from tbl_sanpham where tensanpham like '%" . $tukhoa . "%' limit 0,6";
          $query_pro = mysqli_query($conn, $sql_pro);


          ?>

          <div class="products-header">
            <span>Từ khoá tìm kiếm : <?php echo $tukhoa ?></span>
            <!-- <select>
                <option>Popularity</option>
              </select> -->
          </div>

          <?php
          $num_products = mysqli_num_rows($query_pro);
          if ($num_products > 0) {
            while ($row = mysqli_fetch_array($query_pro)) {
              $randomNumber = rand(1, 100);
              $giamgia = 0;
              if ($row['giasp'] > 0) {
                $giamgia = round(($row['giasp'] - $row['giaban']) / $row['giasp'] * 100, 2);
              } else {
                $giamgia = 0;
              }
          ?>
              <div class="product-list">

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
                      <div class="card_sold">
                        <?php echo $randomNumber; ?>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

          <?php
            }
          } else {
            echo '<div class="no-products"><img src="https://i.pinimg.com/originals/b5/a8/84/b5a88474a9a60cb4a961533481ee6b16.gif" alt="No products available" />
              <p>
                Không tìm thấy sản phẩm !
              </p>
              </div>';
          }
          ?>




        </main>
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
  <script>
    // script.js
    var menu = document.getElementById("filters");
    document
      .getElementById("filter-icon")
      .addEventListener("click", function() {
        if (menu.style.right === "0%") {
          menu.style.right = "-75%"; // Ẩn menu
        } else {
          menu.style.right = "0%"; // Hiển thị menu
        }
      });
    const close = document.getElementById("filter-close");
    close.addEventListener("click", function() {
      menu.style.right = "-75%";
    });
    console.log("🚀 ~ close:", close);
  </script>
</body>

</html>