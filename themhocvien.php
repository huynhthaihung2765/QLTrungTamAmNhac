<?php
  if(!isset($_SESSION)) {
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
    $idTaiKhoan = $_SESSION['IDNhanVien'];
  }
?>
<?php include_once("entities/hocvien.class.php"); ?>
<?php include_once("entities/phieudangky.class.php"); ?>
<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<?php
  if (isset($_POST["btnSubmit"])){
    $maHocVien = $_POST["txtMaHocVien"];
     $hoTenHocVien = $_POST["txtName"];
     $gioiTinh = $_POST["iCheck"];
     $ngaySinh = $_POST["txtNgaySinh"];
     $soDienThoai = $_POST["txtDienThoai"];
     $diaChi = $_POST["txtDiaChi"];
     $email = $_POST["txtEmail"];
     $picture = $_FILES["txtpic"];

     if($_POST['txtCaptcha'] == NULL) {
       header("location: themhocvien.php?failCaptchaNull");
     }
     else {
      if($_POST['txtCaptcha'] == $_SESSION['security_code']) {
        $newHocVien = new Hocvien($maHocVien, $hoTenHocVien, $gioiTinh, $ngaySinh, $soDienThoai, $diaChi, $email, $picture);
        $result = $newHocVien->insert();
        if(!$result) {
          header("location: themhocvien.php?failInsert");
        }
        else {
          //Lấy phiếu đăng ký co id cao nhat
          $countPhieuDangKy = PhieuDangKy::Count_PDK();
          $lastPDK = PhieuDangKy::Get_Last_PDK();
          $idPDKnext = 0;
          foreach ($countPhieuDangKy as $key => $itemCountPDK) {
            $soLuongChiTietPhieuDangKy = $itemCountPDK['soluongphieudangky'];
            if($soLuongChiTietPhieuDangKy == 0){
              $idPDKnext = 1;
            }
            else {
              foreach ($lastPDK as $key => $itemLastPDK) {
                $lastIDPhieuDangKy = $itemLastPDK['IDPhieu'];
                $idPDKnext = intval($lastIDPhieuDangKy) + 1;
              }
            }
          }
          $datenow = date('Y-m-d H:i:s');
          $tenPhieu = "Phieu Dang Ky";
          $newPDK = new PhieuDangKy($idPDKnext, $maHocVien, $tenPhieu, $datenow);
          $insertPHK = $newPDK->insert();
          //header("location: themhocvien.php?inserted&id=$maHocVien");
          header("location: themChitiet_PDK_LopHoc.php?inserted&idpdk=$idPDKnext");
        }
      }
      else {
       header("location: themhocvien.php?failCaptchaInput");
      }
     }
  }
?>
<?php include_once("header.php") ?>
<?php $hvLast = Hocvien::Get_Last_HV(); ?>

 <div class="right_col" role="main">
   <div class="">
     <div class="page-title">
       <div class="title_left">
         <ol class="breadcrumb" >
           <li><a href="index.php"><strong>Trang chủ</strong></a></li>
           <li class="active">Đăng ký học viên</li>
         </ol>
       </div>
     </div>
     <div class="clearfix"></div>

     <div class="row">
       <div class="col-md-6 col-xs-12">
         <div class="x_panel">
           <div class="x_title">
             <h2>Thêm học viên mới</h2>
             <br/>
             <div class="clearfix"></div>
           </div>
           <div class="x_content">
             <br />
             <?php
               if (isset($_GET["inserted"])){
                 echo "<h2>Thêm học viên thành công</h2>";
               }
               if(isset($_GET["failInsert"])) {
                 echo "<h2>Email hoặc số điện thoại trùng.</h2>";
               }
               if(isset($_GET["failCaptchaNull"])) {
                 echo "<h2>Captcha còn bỏ trống.</h2>";
               }
               if(isset($_GET["failCaptchaInput"])) {
                 echo "<h2>Captcha nhập vào sai.</h2>";
               }
             ?>
             <br />
             <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
               <?php foreach ($hvLast as $key => $itemhv): ?>
                <?php
                $idHVLast = $itemhv['IDHocVien'];
                $idHVNext = intval($idHVLast) + 1;
                 ?>
              <?php endforeach; ?>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã học viên</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" style="width: 50%;" name="txtMaHocVien" value="<?php echo $idHVNext ?>" class="form-control" readonly="yes">
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên học viên</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" name="txtName" class="form-control" placeholder="Họ/tên">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-md-3 col-sm-3 col-xs-12 control-label">Giới tính</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <div class="radio">
                     <label>
                       <input type="radio" class="flat" value="Nam" checked name="iCheck">Nam
                     </label>
                   </div>
                   <div class="radio">
                     <label>
                       <input type="radio" class="flat" value="Nữ" name="iCheck">Nữ
                     </label>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="date" name="txtNgaySinh" class="form-control" placeholder="Ngày/tháng/năm">
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Điện thoại <span class="required">*</span>
                 </label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="number" name="txtDienThoai" class="form-control">
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <textarea class="form-control" name="txtDiaChi" rows="3" placeholder='Số nhà, Đường, Phường, Quận, TP'></textarea>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" name="txtEmail" id="autocomplete-custom-append" class="form-control col-md-10"/>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn ảnh học viên</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="file" name="txtpic" accept=".PNG,.JPG,.GIF" class="form-control col-md-10"/>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Captcha</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" name="txtCaptcha" maxlength="10" size="32" />
                   <img src="random_image.php" />
                 </div>
               </div>
               <button type="submit" class="btn btn-success" name="btnSubmit">Đăng ký học viên</button>
             </form>
           </div>
         </div>
       </div>
   </div>
 </div>
</div>

<?php include_once("footer.php"); ?>
<script>
$('.body').on('click', function(){
  function load_unseen_notification(view = '')
  {
    $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data){
        $('.dropdown-menuc').html(data.notification2);
        if(data.unseen_notification2 > 0){
          $('.countc').html(data.unseen_notification2);
        }
      }
    });
  }
  load_unseen_notification();
});
</script>
