
<?php include_once("entities/lichhoc.class.php"); ?>
<?php include_once("entities/monhoc.class.php"); ?>
<?php include_once("entities/giaovien.class.php"); ?>
<?php include_once("entities/capdo.class.php"); ?>
<?php include_once("entities/lophoc.class.php"); ?>
<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>

<?php
if (isset($_POST["btnSubmit"])){
  $maLopHoc = $_POST["txtLopHoc"];
  $maMonHoc = $_POST["txtMonHoc"];
  $maCapDo = $_POST["txtCapDo"];
  $maGiaoVien = $_POST["txtGiaoVien"];
  $maLich = $_POST["txtLichTrongNgay"];
  $soHocPhi = $_POST["txtHocPhi"];
  $numRecordLopHoc = LopHoc::Count_Record($maMonHoc, $maCapDo, $maLich, $maGiaoVien);
  foreach ($numRecordLopHoc as $key => $value) {
    $numbRecord = $value['SL'];
  }
  if($numbRecord == 0){
    $newLopHoc = new LopHoc($maLopHoc, $maMonHoc, $maCapDo, $maGiaoVien, $maLich, $soHocPhi);
    $resultInsertLopHoc = $newLopHoc->insert();
    header("location: themlophoc.php?inserted");
  }
  else {
    header("location: themlophoc.php?fail");
  }
 }
 ?>

<?php include_once("header.php") ?>
<?php
    $lastLopHoc = LopHoc::Get_Last_LH();
    $allMonHoc = MonHoc::Get_All_MonHoc();
    $allCapDo = CapDo::SelectAllCD();
    $allGiaoVien = GiaoVien::Get_All_GV();
    $allBuoiTrongNgay = LichHoc::Get_All_BuoiTrongNgay();
    $allLopHoc = LopHoc::Get_All_Lop();
 ?>

 <div class="right_col" role="main">
   <div class="">
     <div class="page-title">
       <div class="title_left">
         <ol class="breadcrumb" >
           <li><a href="index.php"><strong>Trang chủ</strong></a></li>
           <li class="active">Thêm lớp học</li>
         </ol>
       </div>
     </div>
     <div class="clearfix"></div>
     <div class="row">
       <!--lEFT-->
       <div class="col-md-6 col-sm-12 col-xs-12">
         <div class="x_panel">
           <div class="x_title">
             <h2>Thêm lớp học mới</h2>
             <br/>
             <div class="clearfix"></div>
           </div>
           <div class="x_content">
             <br />
             <?php
              if (isset($_GET['fail'])) {
                echo "Không thể xếp 1 giáo viên 2 lần vào cùng 1 cấp độ trong 1 môn.";
              }
             ?>
             <br/>
             <form class="form-horizontal form-label-left" method="post" >

               <?php foreach ($lastLopHoc as $key => $itemLastLopHoc): ?>
                <?php
                $idLastLH = $itemLastLopHoc['IDLopHoc'];
                $idLHNext = intval($idLastLH) + 1;
                 ?>
              <?php endforeach; ?>
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã lớp học</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" name="txtLopHoc" class="form-control" value="<?php echo $idLHNext; ?>" readonly="yes">
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn môn học</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <select class="" name="txtMonHoc">
                     <?php foreach ($allMonHoc as $key => $itemMonHoc){ ?>
                       <?php
                        $idMonHoc = $itemMonHoc['IDMonHoc'];
                        $tenMonHoc = $itemMonHoc['TenMonHoc'];
                        ?>
                        <option value="<?php echo $idMonHoc; ?>">
                          <?php echo $tenMonHoc; ?>
                        </option>
                     <?php } ?>
                   </select>
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn cấp độ</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <select class="" name="txtCapDo">
                     <?php foreach ($allCapDo as $key => $itemCapDo){ ?>
                       <?php
                        $idCapDo = $itemCapDo['IDCapDo'];
                        $tenCapDo = $itemCapDo['TenCapDo'];
                        ?>
                        <option value="<?php echo $idCapDo; ?>">
                          <?php echo $tenCapDo; ?>
                        </option>
                     <?php } ?>
                   </select>
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn giáo viên</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <select class="" name="txtGiaoVien">
                     <?php foreach ($allGiaoVien as $key => $itemGiaoVien){ ?>
                       <?php
                        $idGiaoVien = $itemGiaoVien['IDGiaoVien'];
                        $tenGiaoVien = $itemGiaoVien['HoTenGV'];
                        ?>
                        <option value="<?php echo $idGiaoVien; ?>">
                          <?php echo $tenGiaoVien; ?>
                        </option>
                     <?php } ?>
                   </select>
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn lịch học</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <select class="" name="txtLichTrongNgay">
                     <?php foreach ($allBuoiTrongNgay as $key => $itemBuoiTrongNgay){ ?>
                       <?php $tenBuoiTrongNgay = $itemBuoiTrongNgay['BuoiTrongNgay']; ?>
                       <optgroup label="<?php echo $tenBuoiTrongNgay; ?>">
                         <?php $allNgayTrongTuanTheoBuoi = LichHoc::Get_All_NgayTrongTuanTheoBuoi($tenBuoiTrongNgay); ?>
                         <?php foreach ($allNgayTrongTuanTheoBuoi as $key => $itemNgayTrongTuanTheoBuoi){ ?>
                           <?php
                            $idLich = $itemNgayTrongTuanTheoBuoi['IDLichHoc'];
                            $tenNgayTrongTuan = $itemNgayTrongTuanTheoBuoi['NgayTrongTuan'];
                           ?>
                           <option value="<?php echo $idLich; ?>"><?php echo $tenBuoiTrongNgay; ?> - <?php echo $tenNgayTrongTuan; ?></option>
                         <?php } ?>
                       </optgroup>
                     <?php } ?>
                   </select>
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhập học phí</label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" name="txtHocPhi" class="form-control" placeholder="1.000.000 (VND)">
                 </div>
               </div>
               <button type="submit" class="btn btn-success" name="btnSubmit">Thêm lớp học</button>
             </form>
           </div>
         </div>

         <div class="x_panel">
           <div class="x_title">
             <h2>Danh sách lớp học theo môn học</h2>
             <br/>
             <div class="clearfix"></div>
           </div>
           <div class="x_content">
             <br />
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Tên môn học</th>
                      <th>Lịch (Cấp độ / Tên giáo viên/buổi học / Thứ trong tuần)</th>
                    </tr>
                  </thead>
                  <?php $allMonHocInLop = MonHoc::Get_All_MonHoc_In_Lop(); ?>
                  <?php foreach ($allMonHocInLop as $key => $itemMonHocInLopHoc) {
                    $idMonHocInLop = $itemMonHocInLopHoc['IDMonHoc'];
                    $tenMonHocInLop = $itemMonHocInLopHoc['TenMonHoc'];
                  ?>
                     <tbody>
                       <tr>
                         <td><?php echo $tenMonHocInLop; ?></td>
                         <td>
                           <table class="table table-bordered table-hover">
                             <tbody>
                               <?php $allCapDoInLopHocByIdMonHoc = CapDo::Get_All_Capo_By_IdMonHOc_InLopHoc($idMonHocInLop); ?>
                               <?php foreach ($allCapDoInLopHocByIdMonHoc as $key => $itemCapDoInLopHocByIdMonHoc) {
                                 $idCapDoInLopHocByIdMonHoc = $itemCapDoInLopHocByIdMonHoc['IDCapDo'];
                                 $tenCapDoInLopHocByIdMonHoc = $itemCapDoInLopHocByIdMonHoc['TenCapDo'];
                               ?>
                                 <tr>
                                   <td>cấp độ: <?php echo $tenCapDoInLopHocByIdMonHoc; ?></td>
                                   <td>
                                     <table class="table table-bordered table-hover">
                                       <tbody>
                                         <?php //Get_All_LichGiaoVien_ByIdMonVsIdCapDo
                                          $allLichGiaoVienByIdMonVsIdCapDo = GiaoVien::Get_All_LichGiaoVien_ByIdMonVsIdCapDo($idMonHocInLop, $idCapDoInLopHocByIdMonHoc);
                                         ?>
                                         <?php foreach ($allLichGiaoVienByIdMonVsIdCapDo as $key => $itemLichGiaoVien) {
                                           $idGiaoVienInLop = $itemLichGiaoVien['IDGiaoVien'];
                                           $idLichHocInLop = $itemLichGiaoVien['IDLichHoc'];
                                           $tenGiaoVienInLop = $itemLichGiaoVien['HoTenGV'];
                                           $buoiTrongNgayInLop = $itemLichGiaoVien['BuoiTrongNgay'];
                                           $ngayTrongTuanInLop = $itemLichGiaoVien['NgayTrongTuan'];
                                         } ?>
                                         <?php for ($soluonggiaovien=1; $soluonggiaovien <= 3; $soluonggiaovien++) { ?>
                                           <tr>
                                             <td><?php echo $tenGiaoVienInLop; ?></td>
                                             <td><?php echo $buoiTrongNgayInLop; ?></td>
                                             <td><?php echo $ngayTrongTuanInLop; ?></td>
                                           </tr>
                                         <?php } ?>
                                       </tbody>
                                     </table>
                                   </td>
                                 </tr>
                               <?php } ?>
                             </tbody>
                           </table>
                         </td>
                       </tr>
                     </tbody>
                   <?php } ?>
                </table>
              </div>
           </div>
         </div>
       </div>
       <!--RIGHT-->
       <div class="col-md-6">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách lớp học theo Giáo viên</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
             <div class="table-responsive">
               <table class="table table-bordered table-hover">
                 <thead>
                   <tr>
                     <th>Giáo viên</th>
                     <th>Lịch (Môn học / Cấp độ / Buổi / Thứ)</th>
                   </tr>
                 </thead>
                 <?php //Get_All_Gv_In_LopHoc
                  $allGiaoVienInLopHoc = GiaoVien::Get_All_Gv_In_LopHoc();
                 ?>
                 <?php foreach ($allGiaoVienInLopHoc as $key => $itemGVInLopHoc) {
                   $idGiaoVienInLopHoc = $itemGVInLopHoc['IDGiaoVien'];
                   $tenGiaoVienInLopHoc = $itemGVInLopHoc['HoTenGV'];
                 ?>
                 <tbody>
                   <tr>
                     <td><?php echo $tenGiaoVienInLopHoc; ?></td>
                     <td>
                       <table class="table table-bordered table-hover">
                         <tbody>
                           <?php //Get_All_MonHoc_In_Lop_ByIdGiaoVien
                            $allMonHocInLopHocByIdGiaoVien = MonHoc::Get_All_MonHoc_In_Lop_ByIdGiaoVien($idGiaoVienInLopHoc);
                           ?>
                           <?php foreach ($allMonHocInLopHocByIdGiaoVien as $key => $itemMonHocInLopHocByIdGiaoVien) {
                             $idMonHocInLopHocByIdGiaoVien = $itemMonHocInLopHocByIdGiaoVien['IDMonHoc'];
                             $TenMonHocInLopHocByIdGiaoVien = $itemMonHocInLopHocByIdGiaoVien['TenMonHoc'];
                           ?>
                           <tr>
                             <td><?php echo $TenMonHocInLopHocByIdGiaoVien; ?></td>
                             <td>
                               <table class="table table-bordered table-hover">
                                 <tbody>
                                   <?php //Get_All_LichMonHoc_ByIdGiaoVienVsIdMonHoc
                                    $allLichMonHocByIdGiaoVienVsIdMonHoc = MonHoc::Get_All_LichMonHoc_ByIdGiaoVienVsIdMonHoc($idGiaoVienInLopHoc, $idMonHocInLopHocByIdGiaoVien);
                                   ?>
                                   <?php foreach ($allLichMonHocByIdGiaoVienVsIdMonHoc as $key => $itemLichMonHocByIdGiaoVienVsIdMonHoc) {
                                     $tenCapDoByIdGiaoVienVsIdMonHoc = $itemLichMonHocByIdGiaoVienVsIdMonHoc['TenCapDo'];
                                     $tenBuoiTrongNgayByIdGiaoVienVsIdMonHoc = $itemLichMonHocByIdGiaoVienVsIdMonHoc['BuoiTrongNgay'];
                                     $tenNgayTrongTuanByIdGiaoVienVsIdMonHoc = $itemLichMonHocByIdGiaoVienVsIdMonHoc['NgayTrongTuan'];
                                   ?>
                                     <tr>
                                       <td><?php echo $tenCapDoByIdGiaoVienVsIdMonHoc; ?></td>
                                       <td><?php echo $tenBuoiTrongNgayByIdGiaoVienVsIdMonHoc; ?></td>
                                       <td><?php echo $tenNgayTrongTuanByIdGiaoVienVsIdMonHoc; ?></td>
                                     </tr>
                                   <?php } ?>
                                 </tbody>
                               </table>
                             </td>
                           </tr>
                           <?php } ?>
                         </tbody>
                       </table>
                     </td>
                   </tr>
                 </tbody>
                 <?php } ?>
               </table>
             </div>
          </div>
        </div> 
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách lớp học</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           <br/>
           <div class="table-responsive">
             <table class="table">
               <thead>
                 <tr>
                   <th>STT</th>
                   <th>Tên môn học</th>
                   <th>Cấp độ</th>
                   <th>Giáo viên</th>
                   <th>Buổi học</th>
                   <th>Các thứ</th>
                 </tr>
               </thead>
               <tbody>
                 <?php $soluong=0; ?>
                 <?php foreach ($allLopHoc as $key => $itemLopHoc){ ?>
                   <?php
                    $soluong++;
                    //mh.TenMonHoc, cd.TenCapDo, gv.HoTenGV, lich.BuoiTrongNgay, lich.NgayTrongTuan
                    $GetTenMonHoc = $itemLopHoc['TenMonHoc'];
                    $GetTenCapDo = $itemLopHoc['TenCapDo'];
                    $GetTenGiaoVien = $itemLopHoc['HoTenGV'];
                    $GetBuoiTrongNgay = $itemLopHoc['BuoiTrongNgay'];
                    $GetNgayTrongTuan = $itemLopHoc['NgayTrongTuan'];
                    ?>
                   <tr>
                     <td><?php echo $soluong; ?></td>
                     <td><?php echo $GetTenMonHoc; ?></td>
                     <td><?php echo $GetTenCapDo; ?></td>
                     <td><?php echo $GetTenGiaoVien; ?></td>
                     <td><?php echo $GetBuoiTrongNgay; ?></td>
                     <td><?php echo $GetNgayTrongTuan; ?></td>
                   </tr>
                 <?php } ?>
               </tbody>
             </table>
           </div>
          </div>
        </div>
      </div>
     </div>
   </div>
 </div>





<?php include_once("footer.php") ?>
