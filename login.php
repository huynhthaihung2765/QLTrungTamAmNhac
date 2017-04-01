<?php
session_start();


/*
  if(isset($_SESSION['user'])!="")
  {
    // người dùng đã đăng nhập, trở về trang chủ
    header("Location: index.php");
  }
  require_once("entities/user.class.php");
  // kiểm tra giá trị được gửi từ form đăng ký
  if (isset($_POST['btn_dangky']))
  {
    $u_name = $_POST['txtname'];
    $u_pass = $_POST['txtpass'];
    $account = new User($u_name, $u_pass);
    $result = $account->inserUser();
    if(!$result)
    {
      ?>
      <script>alert('có lỗi xảy ra, vui lòng kiểm tra dữ liệu')</script>
      <?php
    }
    else
    {
      // đăng ký thành công, chuyển về trang chủ
      $SESSION['user'] = $u_name;
      header("Location: index.php");
    }
  }
*/

include_once("entities/taikhoan.class.php");

if(!isset($_SESSION['TenTaiKhoan'])){
  if (isset($_POST['btn_dangnhap']))
  {
    $u_name = $_POST['txtnameLogin'];
    $u_pass = $_POST['txtpassLogin'];

    //$username = $_POST['username'];
    //$password = md5($_POST['password']);
    $conn=mysqli_connect("localhost","root","") or die("can't connect");
    mysqli_select_db($conn,"qltrungtamamnhac");
    mysqli_set_charset($conn,"utf8");
    $stmt = $conn->prepare("SELECT tk.TenTaiKhoan, qh.TenQuyenHan, cv.TenChucVu, nv.HoTenNV, nv.IDNhanVien, tk.IDTaiKhoan
    from taikhoan tk LEFT join nhanvien nv on tk.IDTaiKhoan = nv.IDTaiKhoan
    LEFT join quyenhan qh on tk.IDQuyenHan = qh.IDQuyenHan
    LEFT join chucvu cv on nv.IDChucVu = cv.IDChucVu
    WHERE tk.TenTaiKhoan = ? and tk.MatKhau = ? LIMIT 1");
    $stmt->bind_param('ss', $u_name, $u_pass);
    $stmt->execute();
   $stmt->bind_result($tentaiKhoan, $tenQuyen, $tenChucVu, $hoTenNhanVien, $idNhanVien, $idTaiKhoan);
   $stmt->store_result();
   if ($stmt->num_rows == 1) {
     if($stmt->fetch()) //fetching the contents of the row
      {
        $newTaiKhoan = new TaiKhoan("", "", "", "", "Online");
        $resultEditStatusOnline = $newTaiKhoan->edit_Status_Online($idTaiKhoan);
          $_SESSION['IDTaiKhoan'] = $idTaiKhoan;
          $_SESSION['TrangThaiOnline'] = "Online";
          $_SESSION['HoTenNhanVien'] = $hoTenNhanVien;
         $_SESSION['TenTaiKhoan'] = $tentaiKhoan;
         $_SESSION['TenQuyen'] = $tenQuyen;
         $_SESSION['TenChucVu'] = $tenChucVu;
         $_SESSION['IDNhanVien'] = $idNhanVien;
         echo 'Success!';
         header("Location: admin.php");
      }
      else {
        header("Location: login.php?failfetch");

      }
   }
   else {
     header("Location: login.php?fail");
   }
  }
}
else {
   header("Location: admin.php");
}

 ?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng nhập vào hệ thống</title>

    <!-- Bootstrap -->
    <link href="public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="public/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="public/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="login.php">
              <h1>Đăng nhập</h1>
              <div>
                <?php
                if(isset($_GET["fail"]))
                  echo "<h4 style="."color:red".">"."Tài khoản hoặc mật khẩu không đúng!</h4>";
                 ?>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="txtnameLogin" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="txtpassLogin" />
              </div>
              <div>
                <input type="submit" name="btn_dangnhap" value="Đăng nhập" class="btn btn-default submit">
                <a class="reset_pass" href="#">Quên mật khẩu?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                  <a href="index.php" class="to_register" > Quay lại trang chủ </a>
                </p>

                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="" method="POST">
              <h1>Đăng ký tài khoản</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="txtname" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="txtpass" />
              </div>
              <div>
                <input type="submit" name="btn_dangky" value="Đăng ký">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Đăng nhập </a>
                </p>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
