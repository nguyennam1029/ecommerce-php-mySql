<?php
include('admin/config/connect.php');
session_start();
$id_khachhang = $_SESSION['id_khachhang'];
$sql_select = "select *from tbl_dangky where id_dangky='" . $id_khachhang . "' ";
$query_select = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_array($query_select);
if (isset($_POST['dangxuat'])) {
  unset($_SESSION['dangky']);
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link rel="stylesheet" href="./css/styles.css" />

  <link rel="stylesheet" href="./css/profile.css" />
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
  <section class="section">
    <div class="container">
      <div class="profile">
        <div class="sidebar">
          <ul class="menu">
            <li class="menu-item active"><a href="#">Thông tin của tôi</a></li>

          </ul>
        </div>
        <div class="content">
          <h2>Cập nhật thông tin</h2>

          <div class="form-row">
            <div class="form-group">
              <label for="first-name">Tên</label>
              <input type="text" id="first-name" value="<?php echo $row['tenkhachhang'] ?>" disabled />
            </div>
            <div class="form-group">
              <label for="last-name">Số điện thoại</label>
              <input type="text" id="last-name" value="<?php echo $row['dienthoai'] ?>" disabled />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" value="<?php echo $row['email'] ?>" disabled />
            </div>
            <div class="form-group">
              <label for="address">Địa chỉ</label>
              <input type="text" id="address" value="<?php echo $row['diachi'] ?>" disabled />
            </div>
          </div>
          <form action="" method="POST">
            <div class="form-actions">
              <button type="button" class="cancel-btn">Cancel</button>
              <button type="submit" name="dangxuat" class="save-btn ">Đăng Xuất</button>
            </div>
          </form>
        </div>
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
</body>

</html>