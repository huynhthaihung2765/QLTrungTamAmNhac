<?php include_once("entities/hocvien.class.php"); ?>
<?php include_once("entities/monhoc.class.php"); ?>
<?php include_once("entities/capdo.class.php"); ?>
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

     //$ngayHienTai = $_POST["ngayHienTai"];
     //$format = 'Y-m-d H:i:s';
     //$date = DateTime::createFromFormat($format, $ngayHienTai);

     $newHocVien = new Hocvien($maHocVien, $hoTenHocVien, $gioiTinh, $ngaySinh, $soDienThoai, $diaChi, $email, $picture);
     $result = $newHocVien->insert();
     if(!$result)
     {
       header("location: themhocvien.php?fail");
     }
     else {
       $lastPDK = PhieuDangKy::Get_Last_PDK();
       foreach ($lastPDK as $key => $itempdk) {
          $lastpdk = $itempdk['IDPhieu'];
          $idPDKnext = intval($lastpdk) + 1;
       }
       $datenow = date('Y-m-d H:i:s');
       $tenPhieu = "Phieu Dang Ky";
        $newPDK = new PhieuDangKy($idPDKnext, $maHocVien, $tenPhieu, $datenow);
        $insertPHK = $newPDK->insert();

       header("location: themhocvien.php?inserted&id=$maHocVien");
     }
  }
?>

<?php include_once("header.php") ?>


<?php
  $monhocs = MonHoc::SelectAllMH();

  //$hocviens = Hocvien::list_All_HocVien();
  $hocvienlearn = HocVien::Get_All_HV_Learn();
  $capdos = CapDo::SelectAllCD();
  $hvLast = Hocvien::Get_Last_HV();

 ?>

 <div class="right_col" role="main">
   <div class="">
     <div class="row">
       <div class="col-md-6 col-xs-12">
         <div class="x_panel">
           <div class="x_title">
             <h2>Thêm học viên mới</h2>
             <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
               </li>
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                 <ul class="dropdown-menu" role="menu">
                   <li><a href="#">Settings 1</a>
                   </li>
                   <li><a href="#">Settings 2</a>
                   </li>
                 </ul>
               </li>
               <li><a class="close-link"><i class="fa fa-close"></i></a>
               </li>
             </ul>
             <div class="clearfix"></div>
           </div>
           <div class="x_content">
             <br />
             <?php
               if (isset($_GET["inserted"])){
                 echo "<h2>Thêm học viên thành công</h2>";
               }
               if(isset($_GET["fail"])) {
                 echo "<h2>Thêm học viên thất bại</h2>";
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
               <!--
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" name="country" id="autocomplete-custom-append" class="form-control col-md-10"/>
                 </div>
               </div>
             -->
               <!--
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Môn học</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <select name="slcMonHoc" class="form-control">
                     <?php
                      foreach ($monhocs as $key => $item) {
                      ?>
                     <option value="<?php echo $item['IDLopHoc']; ?>"><?php echo $item['TenLopHoc']; ?></option>
                     <?php
                        }
                      ?>
                   </select>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Cấp độ</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <select class="select2_single form-control" name="slcCapDo" tabindex="-1">
                     <?php
                      foreach ($capdos as $key => $item) {
                      ?>
                     <option value="<?php echo $item['IDCapDo']; ?>"><?php echo $item['TenCapDo']; ?></option>
                     <?php
                      }
                      ?>
                   </select>
                 </div>
               </div>
             --> 
               <button type="submit" class="btn btn-success" name="btnSubmit">Đăng ký học viên</button>
             </form>
           </div>
         </div>
       </div>
   </div>
 </div>
</div>

<?php include_once("footer.php") ?>
