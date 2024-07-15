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
  <link rel="stylesheet" href="./css/about.css" />
  <title>About</title>
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
      <div class="story">
        <div class="story-left">
          <h1>Về chúng tôi</h1>
          <p>
            Ra mắt vào năm 2015, Exclusive là nơi mua sắm trực tuyến hàng đầu Nam Á với sự hiện diện tích cực ở Bangladesh. Được hỗ trợ bởi nhiều giải pháp tiếp thị, dữ liệu và dịch vụ phù hợp, Exclusive có 10.500 đại lý và 300 thương hiệu và phục vụ 3 triệu khách hàng trên toàn khu vực.
          </p>
          <p>
            Exclusive có hơn 1 triệu sản phẩm để cung cấp, tốc độ tăng trưởng rất nhanh. Độc quyền cung cấp nhiều loại tài sản khác nhau, từ người tiêu dùng.
          </p>
        </div>
        <div class="story-right">
          <img src="./image/about/banner.png" alt="" />
        </div>
      </div>
      <div class="stats-container">
        <div class="stat-item">
          <div class="stat-icon">
            <img src="./image/about/Services.png" alt="Sellers Icon" />
          </div>
          <div class="stat-value">10.5k</div>
          <div class="stat-description">Người dùng trang web</div>
        </div>
        <div class="stat-item stat-item-highlight">
          <div class="stat-icon">
            <img src="./image/about/Services2.png" alt="Sales Icon" />
          </div>
          <div class="stat-value">33k</div>
          <div class="stat-description active">Số lượng bán ra hàng tháng</div>
        </div>
        <div class="stat-item">
          <div class="stat-icon">
            <img src="./image/about/Services3.png" alt="Customers Icon" />
          </div>
          <div class="stat-value">45.5k</div>
          <div class="stat-description">Khách hàng tiềm năng</div>
        </div>
        <div class="stat-item">
          <div class="stat-icon">
            <img src="./image/about/Services4.png" alt="Gross Sale Icon" />
          </div>
          <div class="stat-value">25k</div>
          <div class="stat-description">Doanh thu hàng năm</div>
        </div>
      </div>
      <!-- Swiper -->
      <div class="swiper mySwiper-about" id="flash_sale">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="team-member">
              <div class="team-member-image">
                <img src="./image/about/member1.png" alt="Tom Cruise" />
              </div>
              <div class="team-member-content">
                <h3>Tom Cruise</h3>
                <p>Giám đốc Marketing</p>
                <div class="social-icons">
                  <a href="#"><img src="./image/icons/icon-instagram.png" alt="Twitter" /></a>
                  <a href="#"><img src="./image/icons/Icon-Twitter.png" alt="Instagram" /></a>
                  <a href="#"><img src="./image/icons/Icon-Linkedin.png" alt="LinkedIn" /></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="team-member">
              <div class="team-member-image">
                <img src="./image/about/member2.png" alt="Tom Cruise" />
              </div>
              <div class="team-member-content">
                <h3>Emma Watson</h3>
                <p>Quản lý bán hàng</p>
                <div class="social-icons">
                  <a href="#"><img src="./image/icons/icon-instagram.png" alt="Twitter" /></a>
                  <a href="#"><img src="./image/icons/Icon-Twitter.png" alt="Instagram" /></a>
                  <a href="#"><img src="./image/icons/Icon-Linkedin.png" alt="LinkedIn" /></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="team-member">
              <div class="team-member-image">
                <img src="./image/about/member3.png" alt="Tom Cruise" />
              </div>
              <div class="team-member-content">
                <h3>Will Smith</h3>
                <p>Quản lý phân phối cửa hàng</p>
                <div class="social-icons">
                  <a href="#"><img src="./image/icons/icon-instagram.png" alt="Twitter" /></a>
                  <a href="#"><img src="./image/icons/Icon-Twitter.png" alt="Instagram" /></a>
                  <a href="#"><img src="./image/icons/Icon-Linkedin.png" alt="LinkedIn" /></a>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="team-member">
              <div class="team-member-image">
                <img src="./image/about/member1.png" alt="Tom Cruise" />
              </div>
              <div class="team-member-content">
                <h3>Tom Cruise</h3>
                <p>Founder & Chairman</p>
                <div class="social-icons">
                  <a href="#"><img src="./image/icons/icon-instagram.png" alt="Twitter" /></a>
                  <a href="#"><img src="./image/icons/Icon-Twitter.png" alt="Instagram" /></a>
                  <a href="#"><img src="./image/icons/Icon-Linkedin.png" alt="LinkedIn" /></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="team-member">
              <div class="team-member-image">
                <img src="./image/about/member2.png" alt="Tom Cruise" />
              </div>
              <div class="team-member-content">
                <h3>Emma Watson</h3>
                <p>Managing Director</p>
                <div class="social-icons">
                  <a href="#"><img src="./image/icons/icon-instagram.png" alt="Twitter" /></a>
                  <a href="#"><img src="./image/icons/Icon-Twitter.png" alt="Instagram" /></a>
                  <a href="#"><img src="./image/icons/Icon-Linkedin.png" alt="LinkedIn" /></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="team-member">
              <div class="team-member-image">
                <img src="./image/about/member3.png" alt="Tom Cruise" />
              </div>
              <div class="team-member-content">
                <h3>Will Smith</h3>
                <p>Managing Director</p>
                <div class="social-icons">
                  <a href="#"><img src="./image/icons/icon-instagram.png" alt="Twitter" /></a>
                  <a href="#"><img src="./image/icons/Icon-Twitter.png" alt="Instagram" /></a>
                  <a href="#"><img src="./image/icons/Icon-Linkedin.png" alt="LinkedIn" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container services_container">
      <div class="service">
        <img src="./image/icons/service-1.png" alt="" class="service_img">
        <h3 class="service_title">GIAO HÀNG NHANH VÀ MIỄN PHÍ</h3>
        <p class="service_p">Tùy vào thời điểm bạn đặt hàng và khoảng cách shop tới bạn.</p>
      </div>
      <div class="service">
        <img src="./image/icons/service-2.png" alt="" class="service_img">
        <h3 class="service_title">Hỗ trợ 24/7</h3>
        <p class="service_p">Nhằm nâng cao dịch vụ chung tôi sẻ trực và hỗ trợ các bạn mọi lúc và mọi nơi.</p>
      </div>
      <div class="service">
        <img src="./image/icons/service-3.png" alt="" class="service_img">
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