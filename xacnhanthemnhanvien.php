<?php
if(!isset($_SESSION))
  {
      session_start();
  }
  if(!isset($_SESSION['TenTaiKhoan'])){
    header("Location: login.php");
  }
  else {
    $tenQuyen = $_SESSION['TenQuyen'];
    if($tenQuyen != "Quản trị")
    {
      header("location: index.php");
    }
  }
 ?>
<?php
include_once("entities/nhanvien.class.php");
include_once("entities/quyenhan.class.php");
include_once("entities/taikhoan.class.php");
?>
<?php
  $idnv = $_GET['idnv'];
  $hoTenNV = $_GET['htnv'];
  $cmnd = $_GET['cmnd'];
  $gioiTinh = $_GET['gt'];
  $ngaySinh = $_GET['ns'];
  $email = $_GET['em'];
  $sdt = $_GET['sdt'];
  $idChucVu = $_GET['idcv'];

  if(isset($_POST["btnsubmit"])){
    $idTaiKhoan = $_POST["txtMaTaiKhoan"];
    $taiKhoan = $_POST["txtTaiKhoan"];
    $matKhau = $_POST["txtMatKhau"];
    $idQuyenHan = $_POST["txtQuyenhan"];
    $aTaiKhoan = new TaiKhoan($idTaiKhoan, $taiKhoan, $matKhau, $idQuyenHan, "Offline");
    $insertTaiKhoan = $aTaiKhoan->insert();
    if($insertTaiKhoan){
      $aNhanVien = new NhanVien($idnv, $hoTenNV, $cmnd, $gioiTinh, $ngaySinh, $email, $sdt, $idTaiKhoan, $idChucVu);
      $insertNhanVien = $result = $aNhanVien->insert();
      if($insertNhanVien)
      {
        header("location: themnhanvien.php");
      }
      else {
        header("location: xacnhanthemnhanvien.php?failInsertNhanVien&idnv=$idnv&htnv=$hoTenNV&cmnd=$cmnd&gt=$gioiTinh&ns=$ngaySinh&em=$email&sdt=$sdt&idcv=$idChucVu");
      }
    }
    else {
      header("location: xacnhanthemnhanvien.php?failInsertTaiKhoan&idnv=$idnv&htnv=$hoTenNV&cmnd=$cmnd&gt=$gioiTinh&ns=$ngaySinh&em=$email&sdt=$sdt&idcv=$idChucVu");
    }
  }
?>

<?php include_once("header.php"); ?>

<?php $lastTaiKhoan = TaiKhoan::Get_Last_TaiKhoan(); ?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <ol class="breadcrumb" >
          <li><a href="index.php"><strong>Trang chủ</strong></a></li>
          <li><a href="themnhanvien.php"><strong>Thêm nhân viên</strong></a></li>
          <li class="active">Xác nhận thêm nhân viên</li>
        </ol>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Thêm tài khoản cho nhân viên: <?php echo $hoTenNV; ?></h2>
            <br/>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php
              echo "Họ tên NV: $hoTenNV<br/>";
              echo "Giới tính: $gioiTinh<br/>";
              echo "Ngày sinh: $ngaySinh<br/>";
              echo "Email: $email<br/>";
              echo "Số dt: $sdt<br/>";
            ?>
            <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã tài Khoản</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <?php foreach ($lastTaiKhoan as $key => $itemTK): ?>
                   <?php
                   $idTKLast = $itemTK['IDTaiKhoan'];
                   $idTKNext = intval($idTKLast) + 1;
                    ?>
                 <?php endforeach; ?>
                  <input type="text" name="txtMaTaiKhoan" class="form-control" value="<?php echo $idTKNext; ?>" placeholder="Tên tài khoản" readonly="yes">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tài Khoản</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="txtTaiKhoan" class="form-control" placeholder="Tên tài khoản">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="txtMatKhau" class="form-control" placeholder="Mật khẩu">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Quyền hạn</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <?php $allQuyenHan = QuyenHan::Get_All_QuyenHan(); ?>
                  <select class="form-control" name="txtQuyenhan">
                    <?php foreach ($allQuyenHan as $key => $itemQuyenHan) {
                      $idQuyenHan = $itemQuyenHan['IDQuyenHan'];
                      $tenQuyenHan = $itemQuyenHan['TenQuyenHan'];
                      ?>
                      <option value="<?php echo $idQuyenHan; ?>"><?php echo $tenQuyenHan; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="btnsubmit">Thêm tài khoản</button>
            </form>
            <div class="clearfix"></div>
            <hr/>
            <div class="">
              <?php
                echo "Họ tên NV: $hoTenNV<br/>";
                echo "Giới tính: $gioiTinh<br/>";
                echo "Ngày sinh: $ngaySinh<br/>";
                echo "Email: $email<br/>";
                echo "Số dt: $sdt<br/>";
              ?>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
