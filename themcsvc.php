<?php include_once("entities/cosovatchat.class.php"); ?>
<?php include_once("header.php") ?>
<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>

<?php
  if (isset($_POST["btnSubmit"])){
     $Idcsvc = $_POST["txtIDcsvc"];
     $Idloai = $_POST["txtIDloai"];
     $Tenccsvc = $_POST["txtTencsvc"];
     $Soluong = $_POST["txtSoluong"];
     $Ngaymua = $_POST["txtNgaymua"];
     $Diachimua = $_POST["txtDiaChiMua"];
     $Hinhanhcsvc = $_FILES["txtpic"];

     //$ngayHienTai = $_POST["ngayHienTai"];
     //$format = 'Y-m-d H:i:s';
     //$date = DateTime::createFromFormat($format, $ngayHienTai);

     $newCosovatchat = new Cosovatchat($Idcsvc, $Idloai, $Tenccsvc, $Soluong, $Ngaymua, $Diachimua, $Hinhanhcsvc);
     $result = $newCosovatchat->insert();
     if(!$result)
     {
       header("location: themcsvc.php?fail");
     }
     else {
       
       header("location: themcsvc.php?inserted&id=$Idcsvc");
     }
  }
?>


<?php include_once("header.php") ?>

<?php
  $cosovatchat = Cosovatchat::SelectAllCSVC();

  //$hocviens = Hocvien::list_All_HocVien();
  $cosovatchatidloai = Cosovatchat::Get_All_CSVC_by_Idloai();

 ?>

 <div class="right_col" role="main">
   <div class="">
     <div class="row">
       <div class="col-md-6 col-xs-12">
         <div class="x_panel">
           <div class="x_title">
             <h2>Thêm cơ sở vật chất mới</h2>
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
                 echo "<h2>Thêm cơ sở vật chất thành công</h2>";
               }
               if(isset($_GET["fail"])) {
                 echo "<h2>Thêm cơ sở vật chất thất bại</h2>";
               }
             ?>
             <br />
             <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
               <?php foreach ($hvLast as $key => $itemcsvc): ?>
                <?php
                $idCSVCLast = $itemcsvc['$Idcsvc'];
                $idCSVCNext = intval($idcsvcVLast) + 1;
                 ?>
              <?php endforeach; ?>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã cơ sở vật chất</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" style="width: 50%;" name="txtIDcsvc" value="<?php echo $idCSVCNext ?>" class="form-control" readonly="yes">
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại cơ sở vật chất</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" name="txtIDloai" class="form-control" placeholder="Loại">
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên cơ sở vật chất</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" name="txtTencsvc" class="form-control" placeholder="Tên sơ cở vật chất">
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày mua</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="date" name="txtNgaymua" class="form-control" placeholder="Ngày/tháng/năm">
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ mua hàng</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <textarea class="form-control" name="txtDiaChiMua" rows="3" placeholder='Số nhà, Đường, Phường, Quận, TP'></textarea>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" name="txtSoluong" id="autocomplete-custom-append" class="form-control col-md-10"/>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn ảnh cơ sở vật chất</label>
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
                     <option value="<?php echo $item['IDCSVC']; ?>"><?php echo $item['TenVatChat']; ?></option>
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
                     <option value="<?php echo $item['IDLoai']; ?>"><?php echo $item['TenLoai']; ?></option>
                     <?php
                      }
                      ?>
                   </select>
                 </div>
               </div>
             --> 
               <button type="submit" class="btn btn-success" name="btnSubmit">Đăng ký bổ sung cơ sở vật chất mới</button>
             </form>
           </div>
         </div>
       </div>
   </div>
 </div>
</div>

<?php include_once("footer.php") ?>
