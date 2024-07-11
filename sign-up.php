<?php
include('admin/config/connect.php');
session_start();

if (isset($_POST['dangky'])) {

  $tenkhachhang = $_POST['hovaten'];
  $email = $_POST['email'];
  $dienthoai = $_POST['dienthoai'];
  $diachi = $_POST['diachi'];
  $matkhau = $_POST['matkhau'];

  // Check for valid customer name
  if (strlen($tenkhachhang) <= 6 || !ctype_upper($tenkhachhang[0])) {
    echo "<script>alert('Tên khách hàng phải có độ dài lớn hơn 6 và có chữ cái đầu tiên viết hoa.'); window.history.back();</script>";
    exit;
  }

  // Check for valid email format and domain
  if (!filter_var($email, FILTER_VALIDATE_EMAIL) || substr($email, -10) !== '@gmail.com') {
    echo "<script>alert('Email phải có định dạng hợp lệ và đuôi @gmail.com.'); window.history.back();</script>";
    exit;
  }

  // Check for valid password
  if (strlen($matkhau) < 6 || !preg_match('/[A-Z]/', $matkhau)) {
    echo "<script>alert('Mật khẩu phải có độ dài ít nhất 6 kí tự và có ít nhất một chữ cái in hoa.'); window.history.back();</script>";
    exit;
  }

  // Check for valid phone number
  if (strlen($dienthoai) < 10) {
    echo "<script>alert('Số điện thoại phải có độ dài ít nhất 10 kí tự.'); window.history.back();</script>";
    exit;
  }

  // Check for valid customer address
  if (strlen($diachi) <= 6) {
    echo "<script>alert('Địa chỉ phải đầy đủ.'); window.history.back();</script>";
    exit;
  }
  // Check for duplicate email
  $sql_check_email = "SELECT * FROM tbl_dangky WHERE email='$email'";
  $query_check_email = mysqli_query($conn, $sql_check_email);

  if (mysqli_num_rows($query_check_email) > 0) {
    echo "<script>alert('Email đã tồn tại');window.history.back();</script>";
  } else {
    $sql_dangky = mysqli_query($conn, "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) VALUES('$tenkhachhang', '$email', '$diachi', '" . md5($matkhau) . "', '$dienthoai')");
    if ($sql_dangky) {
      // $_SESSION['dangky'] = $tenkhachhang;
      echo "<script>alert('Đăng kí thành công'); window.location.href='login.php';</script>";
    } else {
      echo "<script>alert('Đăng ký không thành công');</script>";
    }
  }
}
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
  <title>Home - Exclusive E-Commerce Website</title>
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
    <div class="auth_container">
      <div class="auth_img">
        <img src="./image/auth-image.png" alt="" class="auth_image" />
      </div>
      <div class="auth_content">
        <form action="" method="POST" class="auth_form">
          <h2 class="form_title">Tạo tài khoản của bạn</h2>
          <p class="auth_p">Nhập thông tin chi tiết của bạn dưới đây</p>
          <div class="form_group">
            <input type="text" placeholder="Họ và Tên: 6 kí tự trở lên và chữ cái đầu phải in hoa VD: Hải dev, FullStack..." name="hovaten" class="form_input" />
          </div>
          <div class="form_group">
            <input type="text" placeholder="Email" name="email" class="form_input" />
          </div>
          <div class="form_group form_pass password-toggle">
            <input type="password" id="new-password" placeholder="Password: 6 kí tự trở lên và có chữ in hoa" name="matkhau" class="form_input" />
            <span toggle="#new-password" class="eye-toggle eye-toggle-signUp" onclick="togglePasswordVisibility(this)">
              <!-- Icon hiển thị mật khẩu -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 eye-icon" id="eye-icon-open">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <!-- Icon ẩn mật khẩu -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 eye-icon" id="eye-icon-closed" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
              </svg>
            </span>
          </div>
          <div class="form_group">
            <input type="text" placeholder="Điện thoại" name="dienthoai" class="form_input" />
          </div>
          <div class="form_group">
            <input type="text" placeholder="Địa chỉ" name="diachi" class="form_input" />
          </div>

          <div class="form_group">
            <input type="submit" class="form_btn" name="dangky" value="Đăng ký">
          </div>
        </form>
        <div class="form_group">
          <span>Bạn đã có tài khoản?
            <a href="./login.php" class="form_auth_link">Đăng Nhập</a></span>
        </div>

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
    function togglePasswordVisibility(element) {
      const input = document.querySelector(element.getAttribute('toggle'));
      const eyeIconOpen = document.getElementById('eye-icon-open');
      const eyeIconClosed = document.getElementById('eye-icon-closed');

      if (input.getAttribute('type') === 'password') {
        input.setAttribute('type', 'text');
        eyeIconOpen.style.display = 'none';
        eyeIconClosed.style.display = 'block';
      } else {
        input.setAttribute('type', 'password');
        eyeIconOpen.style.display = 'block';
        eyeIconClosed.style.display = 'none';
      }
    }
  </script>
</body>

</html>