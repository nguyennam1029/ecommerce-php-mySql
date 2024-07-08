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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/products.css" />
    <title>Products</title>
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
            <input
              type="text"
              class="nav_input"
              placeholder="Tìm kiếm ở đây"
              name="tukhoa"
            />
            <button type="submit" name="timkiem"><img src="./image/search.png" alt="" class="nav_search" /></button>
          </form>
          <!-- Div cho trạng thái chưa đăng nhập -->
           <?php
           if(!isset($_SESSION['dangky'])){
           ?>
          <div class="auth-actions">
            <a href="./sign-up.php" class="button-4" role="button">Đăng kí</a>

            <a href="./login.php" class="btn-login" role="button">Đăng nhập</a>
          </div>
          <?php
           } else{
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
              <img src="./image/user.png" alt="" /><?php echo $_SESSION['dangky']?>
              
            </a>
          </div>
          <?php
           }
           ?>
        </div>
        <span class="hamburger">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
            />
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
    <section>
      <div class="container">
        <p class="btn-filter" id="filter-icon">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5"
            />
          </svg>
        </p>
        <div class="product-list-wrap">
          <aside class="filters" id="filters">
            <p id="filter-close">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </p>
            <div class="filter-category">
              <h3>Danh mục sản phẩm</h3>
              <ul>
               <?php
               $id_danhmuc_active = isset($_GET['id']) ? $_GET['id'] : '';

$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
$query_danhmuc = mysqli_query($conn, $sql_danhmuc);
               while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
        // Kiểm tra nếu id của danh mục khớp với id từ URL
        $active_class = ($row_danhmuc['id_danhmuc'] == $id_danhmuc_active) ? 'active' : '';
        ?>
        <li class="<?php echo $active_class; ?>">
            <a href="products.php?quanlidanhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']; ?>">
                <?php echo $row_danhmuc['tendanhmuc']; ?>
            </a>
        </li>
        <?php
    }
               ?>
              </ul>
            </div>
          </aside>
          <main class="products">
          <?php
          if(isset($_GET['trang'])){
            $page=$_GET['trang'];
          }else
          {
            $page='';
          }if($page==''||$page==1)
          {
            $begin=0;
          }else
          {
            $begin=($page*3)-3;
          }
           if(isset($_GET['id'])){
            $sql_pro="select * from tbl_sanpham,tbl_danhmuc where tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc
            and tbl_sanpham.id_danhmuc='$_GET[id]' limit $begin,6";
            $query_pro=mysqli_query($conn,$sql_pro);
           //gọi tên danh mục
            $sql_cate="select * from tbl_danhmuc where tbl_danhmuc.id_danhmuc='$_GET[id]'";
            $query_cate=mysqli_query($conn,$sql_cate);
            $row_title=mysqli_fetch_array($query_cate);
            ?>
            
            <div class="products-header">
              <span>Danh mục sản phẩm : 
                <span class="products-header-category">
                  <?php echo $row_title['tendanhmuc']?>
                </span>
              </span>
              <!-- <select>
                <option>Popularity</option>
              </select> -->
            </div>
            
            <div class="product-list">
            <?php
            while( $row=mysqli_fetch_array($query_pro))
            {  
              $randomNumber = rand(1, 100); 
              $giamgia=0;
              if ($row['giasp'] > 0) {
                $giamgia = round(($row['giasp'] - $row['giaban']) /$row['giasp'] * 100, 2);
                 } else {
              $giamgia = 0;
            }
            ?>
              <a href="./detail.php?quanli=sanpham&idsanpham=<?php echo $row['id_sanpham'] ?>" class="card">
                <div class="card_top">
                  <img src="admin/modules/quanlisanpham/uploads/<?php echo $row['hinhanh']?>" alt="" class="card_img" />
                  <div class="card_tag"><?php if($giamgia!=0) echo '- '.number_format($giamgia).'%'?></div>
                  <div class="card_top_icons">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="card_top_icon"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                      />
                    </svg>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="card_top_icon"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                      />
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                      />
                    </svg>
                  </div>
                </div>
                <div class="card_body">
                  <h3 class="card_title"><?php echo $row['tensanpham']?></h3>

                  <div class="card_list_price">
                    <p class="card_price"><?php echo number_format($row['giaban'],0,',','.').'.đ'?></p>
                    <span class="card_del"><?php echo number_format($row['giasp'],0,',','.').'.đ'?></span>
                  </div>
                  <div class="card_ratings">
                    <div class="card_stars">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <p class="card_rating_numbers"><?php echo '('.$randomNumber.')'?></p>
                  </div>
                  <button class="add_to_cart">
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 44 45"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <rect
                        y="0.5"
                        width="44"
                        height="44"
                        rx="8"
                        fill="#029FAE"
                      />
                      <path
                        d="M12.75 13.75L14.83 14.11L15.793 25.583C15.83 26.0345 16.0358 26.4554 16.3695 26.7618C16.7031 27.0682 17.14 27.2375 17.593 27.236H28.503C28.9367 27.2365 29.3561 27.0803 29.6838 26.7963C30.0116 26.5122 30.2258 26.1194 30.287 25.69L31.237 19.132C31.2623 18.9576 31.253 18.7799 31.2096 18.6091C31.1662 18.4383 31.0896 18.2777 30.9841 18.1365C30.8786 17.9954 30.7463 17.8764 30.5947 17.7864C30.4432 17.6964 30.2754 17.6371 30.101 17.612C30.037 17.605 15.164 17.6 15.164 17.6"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M24.125 21.295H26.898"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M17.154 30.703C17.2273 30.6999 17.3006 30.7116 17.3692 30.7375C17.4379 30.7634 17.5007 30.8029 17.5537 30.8537C17.6067 30.9045 17.6488 30.9655 17.6777 31.033C17.7065 31.1005 17.7213 31.1731 17.7213 31.2465C17.7213 31.3199 17.7065 31.3926 17.6777 31.4601C17.6488 31.5276 17.6067 31.5886 17.5537 31.6393C17.5007 31.6901 17.4379 31.7296 17.3692 31.7555C17.3006 31.7814 17.2273 31.7932 17.154 31.79C17.0139 31.784 16.8815 31.7241 16.7845 31.6228C16.6875 31.5216 16.6333 31.3868 16.6333 31.2465C16.6333 31.1063 16.6875 30.9715 16.7845 30.8702C16.8815 30.7689 17.0139 30.709 17.154 30.703Z"
                        fill="white"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M28.435 30.703C28.5795 30.703 28.7181 30.7604 28.8204 30.8626C28.9226 30.9648 28.98 31.1035 28.98 31.248C28.98 31.3925 28.9226 31.5312 28.8204 31.6334C28.7181 31.7356 28.5795 31.793 28.435 31.793C28.2904 31.793 28.1518 31.7356 28.0496 31.6334C27.9474 31.5312 27.89 31.3925 27.89 31.248C27.89 31.1035 27.9474 30.9648 28.0496 30.8626C28.1518 30.7604 28.2904 30.703 28.435 30.703Z"
                        fill="white"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </button>
                </div>
              </a>
           <?php
          }?>
           <?php
          }else{
         ?>
       
          <?php
          
            $sql_all_sp="select * from tbl_sanpham limit $begin,6";
            $query_all_sp= mysqli_query($conn,$sql_all_sp);
           ?>
            <div class="products-header">
            <span>Sản phẩm mới nhất :</span>
            <!-- <select>
              <option>Popularity</option>
            </select> -->
          </div>
          
          <div class="product-list">
            <?php
            while( $row=mysqli_fetch_array($query_all_sp))
            {  
              $randomNumber = rand(1, 100); 
              $giamgia=0;
              if ($row['giasp'] > 0) {
                $giamgia = round(($row['giasp'] - $row['giaban']) /$row['giasp'] * 100, 2);
                 } else {
              $giamgia = 0;
            }
            ?>
              <a href="./detail.php?quanli=sanpham&idsanpham=<?php echo $row['id_sanpham']?>" class="card">
                <div class="card_top">
                  <img src="admin/modules/quanlisanpham/uploads/<?php echo $row['hinhanh']?>" alt="" class="card_img" />
                  <div class="card_tag"><?php if($giamgia!=0) echo '- '.number_format($giamgia).'%'?></div>
                  <div class="card_top_icons">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="card_top_icon"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                      />
                    </svg>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="card_top_icon"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                      />
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                      />
                    </svg>
                  </div>
                </div>  
                <div class="card_body">
                  <h3 class="card_title"><?php echo $row['tensanpham']?></h3>

                  <div class="card_list_price">
                    <p class="card_price"><?php echo number_format($row['giaban'],0,',','.').'.đ'?></p>
                    <span class="card_del"><?php echo number_format($row['giasp'],0,',','.').'.đ'?></span>
                  </div>
                  <div class="card_ratings">
                    <div class="card_stars">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <p class="card_rating_numbers"><?php echo '('.$randomNumber.')'?></p>
                  </div>
                  <button class="add_to_cart">
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 44 45"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <rect
                        y="0.5"
                        width="44"
                        height="44"
                        rx="8"
                        fill="#029FAE"
                      />
                      <path
                        d="M12.75 13.75L14.83 14.11L15.793 25.583C15.83 26.0345 16.0358 26.4554 16.3695 26.7618C16.7031 27.0682 17.14 27.2375 17.593 27.236H28.503C28.9367 27.2365 29.3561 27.0803 29.6838 26.7963C30.0116 26.5122 30.2258 26.1194 30.287 25.69L31.237 19.132C31.2623 18.9576 31.253 18.7799 31.2096 18.6091C31.1662 18.4383 31.0896 18.2777 30.9841 18.1365C30.8786 17.9954 30.7463 17.8764 30.5947 17.7864C30.4432 17.6964 30.2754 17.6371 30.101 17.612C30.037 17.605 15.164 17.6 15.164 17.6"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M24.125 21.295H26.898"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M17.154 30.703C17.2273 30.6999 17.3006 30.7116 17.3692 30.7375C17.4379 30.7634 17.5007 30.8029 17.5537 30.8537C17.6067 30.9045 17.6488 30.9655 17.6777 31.033C17.7065 31.1005 17.7213 31.1731 17.7213 31.2465C17.7213 31.3199 17.7065 31.3926 17.6777 31.4601C17.6488 31.5276 17.6067 31.5886 17.5537 31.6393C17.5007 31.6901 17.4379 31.7296 17.3692 31.7555C17.3006 31.7814 17.2273 31.7932 17.154 31.79C17.0139 31.784 16.8815 31.7241 16.7845 31.6228C16.6875 31.5216 16.6333 31.3868 16.6333 31.2465C16.6333 31.1063 16.6875 30.9715 16.7845 30.8702C16.8815 30.7689 17.0139 30.709 17.154 30.703Z"
                        fill="white"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M28.435 30.703C28.5795 30.703 28.7181 30.7604 28.8204 30.8626C28.9226 30.9648 28.98 31.1035 28.98 31.248C28.98 31.3925 28.9226 31.5312 28.8204 31.6334C28.7181 31.7356 28.5795 31.793 28.435 31.793C28.2904 31.793 28.1518 31.7356 28.0496 31.6334C27.9474 31.5312 27.89 31.3925 27.89 31.248C27.89 31.1035 27.9474 30.9648 28.0496 30.8626C28.1518 30.7604 28.2904 30.703 28.435 30.703Z"
                        fill="white"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </button>
                </div>
              </a>
           <?php
          }?>
          <?php
          }?>
          
             
              <!-- Repeat product-item for other products -->
            </div>
           

            <div class="pagination">
            <?php
              $sql_trang=mysqli_query($conn,"select*from tbl_sanpham");
              $row_count=mysqli_num_rows($sql_trang);
              
              $trang=ceil($row_count/3);
              $i=1;
              ?>
              <a href="products.php?trang=<?php echo $i?>" class="page-link">Previews</a>
              <?php
              for($i=1;$i<$trang;$i++)
              {
              ?>
              <a href="products.php?trang=<?php echo $i?>" class="page-link"><?php echo $i?></a>
              <?php
              }
              ?>
              <a href="products.php?trang=<?php echo $i+1?>" class="page-link">Next</a>
            </div>
          </main>
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="./js/app.js"></script>
    <script>
      // script.js
      var menu = document.getElementById("filters");
      document
        .getElementById("filter-icon")
        .addEventListener("click", function () {
          if (menu.style.right === "0%") {
            menu.style.right = "-75%"; // Ẩn menu
          } else {
            menu.style.right = "0%"; // Hiển thị menu
          }
        });
      const close = document.getElementById("filter-close");
      close.addEventListener("click", function () {
        menu.style.right = "-75%";
      });
      console.log("🚀 ~ close:", close);
    </script>
  </body>
</html>
