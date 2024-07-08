<?php
 session_start();
if(!isset($_SESSION['dangky']))
{
    header('Location:sign-up.php');
}
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giỏ Hàng </title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
    <!-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
    /> -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/cart.css" />
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
    <div class="container">
      <div class="sticky-table">
        <table>
          <thead>
            <tr>
              <th>Sản phẩm</th>
              <th>Giá sản phẩm</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(isset($_SESSION['cart']))
            {
              $tongtien=0;
              $thanhtien=0;
              foreach($_SESSION['cart'] as $cart_item)
              {
              
               $soluongmua = intval($cart_item['soluongmua']);
                $giaban = floatval($cart_item['giaban']);
                $thanhtien = $soluongmua * $giaban;
                $tongtien += $thanhtien;
             
            
            ?>
            <tr>
              <td>
                <div class="user">
                  <img src="admin/modules/quanlisanpham/uploads/<?php echo $cart_item['hinhanh']?>" alt="" />
                  <span><?php echo $cart_item['tensanpham']?></span>
                </div>
              </td>
              <td><?php echo number_format($cart_item['giaban'],0,',','.').'.đ'?></td>
              <td>
                <div class="quantity">
                  <a href="themgiohang.php?tru=<?php echo $cart_item['id']?>"><button id="decrement" onclick="stepper(this)">-</button></a>
                  <input
                    type="number"
                    min="0"
                    max="100"
                   
                    value="<?php echo $cart_item['soluongmua']?>"
                    id="my-input"
                    readonly
                  />
                  <a href="themgiohang.php?cong=<?php echo $cart_item['id']?>"><button id="increment" onclick="stepper(this)">+</button></a>
                </div>
              </td>
              <td><?php echo   number_format($thanhtien,0,',','.').'.đ'?></td>
              <td>
                <a href="themgiohang.php?xoa=<?php echo $cart_item['id']?>">
                 <button class="bin-button">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 39 7"
                    class="bin-top"
                  >
                    <line
                      stroke-width="4"
                      stroke="white"
                      y2="5"
                      x2="39"
                      y1="5"
                    ></line>
                    <line
                      stroke-width="3"
                      stroke="white"
                      y2="1.5"
                      x2="26.0357"
                      y1="1.5"
                      x1="12"
                    ></line>
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 33 39"
                    class="bin-bottom"
                  >
                    <mask fill="white" id="path-1-inside-1_8_19">
                      <path
                        d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"
                      ></path>
                    </mask>
                    <path
                      mask="url(#path-1-inside-1_8_19)"
                      fill="white"
                      d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"
                    ></path>
                    <path
                      stroke-width="4"
                      stroke="white"
                      d="M12 6L12 29"
                    ></path>
                    <path stroke-width="4" stroke="white" d="M21 6V29"></path>
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 89 80"
                    class="garbage"
                  >
                    <path
                      fill="white"
                      d="M20.5 10.5L37.5 15.5L42.5 11.5L51.5 12.5L68.75 0L72 11.5L79.5 12.5H88.5L87 22L68.75 31.5L75.5066 25L86 26L87 35.5L77.5 48L70.5 49.5L80 50L77.5 71.5L63.5 58.5L53.5 68.5L65.5 70.5L45.5 73L35.5 79.5L28 67L16 63L12 51.5L0 48L16 25L22.5 17L20.5 10.5Z"
                    ></path>
                  </svg>
                 </button>
                </a>

              </td>
            </tr>
          <?php
                        }
          }
          else
          {
            $thanhtien=0;

          ?>
          <tr>
            <td colspan="4"><p>Hiện tại giỏ hàng trống</p></td>
          </tr>
          <?php
          }
          ?>
            
          </tbody>
        </table>
      </div>

      <div class="cart-total">
        <h2 class="cart-total-heading">Cart Total</h2>
        <div class="cart-total-label">
          <p>Subtotal:</p>
          <span><?php echo   number_format($thanhtien,0,',','.').'.đ'?></span>
        </div>
        <div class="cart-total-label">
          <p>Shipping:</p>
          <span>Free</span>
        </div>
        <div class="cart-total-label">
          <p>Total:</p>
          <span><?php echo   number_format($thanhtien,0,',','.').'.đ'?></span>
        </div>

        <a href="./checkOut.php" class="btn-next">
          <span>Đặt Hàng</span>
          <svg
            width="34"
            height="34"
            viewBox="0 0 74 74"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <circle
              cx="37"
              cy="37"
              r="35.5"
              stroke="black"
              stroke-width="3"
            ></circle>
            <path
              d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z"
              fill="black"
            ></path>
          </svg>
        </a>
      </div>
    </div>

    <script>
      const myInput = document.getElementById("my-input");
      function stepper(btn) {
        let id = btn.getAttribute("id");
        let min = myInput.getAttribute("min");
        let max = myInput.getAttribute("max");
        let step = myInput.getAttribute("step");
        let val = myInput.getAttribute("value");
        let calcStep = id == "increment" ? step * 1 : step * -1;
        let newValue = parseInt(val) + calcStep;

        if (newValue >= min && newValue <= max) {
          myInput.setAttribute("value", newValue);
        }
      }
    </script>
  </body>
</html>
