<?php
if(!isset($_SESSION))
  {
      session_start();
  }
  if(!isset($_SESSION['TenTaiKhoan'])){
    header("Location: login.php");
  }
  $tenQuyenHan = $_SESSION['TenQuyen'];
 ?>
<?php include_once("entities/hocvien.class.php"); ?>
<?php include_once("entities/phieudangky.class.php"); ?>
<?php include_once("entities/chitiet_PDK_LopHoc.class.php"); ?>
<?php include_once("entities/lophoc.class.php"); ?>


<?php
/*
btnXoaHocVienNghiHoc
btnXoaHocVienChuaDangKyMonHoc
*/
$idhocVienXoa = $_GET["idHV"];
  if (isset($_POST['btnXoaHocVienChuaDangKyMonHoc'])){
    $allPDK = PhieuDangKy::Get_All_PDK_ByIDHocVien($idhocVienXoa);
    foreach ($allPDK as $key => $itemPDK) {
      $idPDK = $itemPDK['IDPhieu'];
      $newPhieuDangKy = new PhieuDangKy($idPDK, "", "", "");
      $resultDeletePDK = $newPhieuDangKy->delete();
    }
    $newHocVien = new Hocvien($idhocVienXoa, "", "", "", "", "", "", "");
    $resultDeleteHV = $newHocVien->delete();
    if ($resultDeleteHV) {
      header("location: xemhocvien.php?");
    }
    else {
      header("location: xemchitiethocvien.php?faildelete");
    }
  }

  if (isset($_POST["btnXoaHocVienNghiHoc"])){

    //Get_All_ChiTietPDK_ByTrangThai_Fail($idhocVienXoa)
    $all_ChiTietPDK_ByTrangThai_Fail = ChiTiet_PDK_LH::Get_All_ChiTietPDK_ByTrangThai_Fail($idhocVienXoa);
    foreach ($all_ChiTietPDK_ByTrangThai_Fail as $key => $item_ChiTietPDK_ByTrangThai_Fail) {
      $idCTPDK_ChiTietPDK_ByTrangThai_Fail = $item_ChiTietPDK_ByTrangThai_Fail['IDChiTiet_PDK_LH'];
      $idPDK_ChiTietPDK_ByTrangThai_Fail = $item_ChiTietPDK_ByTrangThai_Fail['IDPhieu'];
      $newChiTietPhieuDangKy = new ChiTiet_PDK_LH($idCTPDK_ChiTietPDK_ByTrangThai_Fail, "", "", "", "", "");
      $resultDeleteCTPDK = $newChiTietPhieuDangKy->delete();
      $newPhieuDangKy = new PhieuDangKy($idPDK_ChiTietPDK_ByTrangThai_Fail, "", "", "");
      $resultDeletePDK = $newPhieuDangKy->delete();
    }
    $newHocVien = new Hocvien($idhocVienXoa, "", "", "", "", "", "", "");
    $resultDeleteHV = $newHocVien->delete();
    if ($resultDeleteHV) {
      header("location: xemchitiethocvien.php?deleted");
    }
    else {
      header("location: xemchitiethocvien.php?faildelete");
    }
  }

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
     $result = $newHocVien->edit($maHocVien);
     if(!$result)
     {
       header("location: xemhocvien.php");
     }
     else {
       header("location: xemchitiethocvien.php?idHV=$maHocVien");
     }
  }
?>


<?php include_once("header.php");
  if(!isset($_GET["idHV"])){
    header('location: 404.php');
  } else {
    $idHocVien = $_GET["idHV"];
    $hv = Hocvien::Get_A_HV($idHocVien);
    $phieuDangKy = PhieuDangKy::Get_A_PDK($idHocVien);
    //if (!isset($_GET["idkh"])) {
    //  header('location: 404.php');
  //  }
    //else {
    //  $idkh = $_GET["idkh"];
    //  $classHVLearn = reset(Hocvien::Get_Class_HV_Learn($idkh));
    //}

    $lichSuHocCuaHocVien = PhieuDangKy::Get_HistoryLearn_ByIDHocVien($idHocVien);
  }
 ?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <ol class="breadcrumb" >
          <li><a href="index.php"><strong>Trang chủ</strong></a></li>
          <li><a href="xemhocvien.php"><strong>Danh sách học viên</strong></a></li>
          <li class="active">Chi tiết học viên</li>
        </ol>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Chi tiết học viên </h2>

            <div class="clearfix"></div>
          </div>
          <?php foreach ($hv as $key => $itemH){ ?>
            <?php
              $idHocVien = $itemH['IDHocVien'];
              $hoTenHocVIen = $itemH['HoTenHocVien'];
              $gioiTinh = $itemH['GioiTinh'];
              $ngaySinh = $itemH['NgaySinh'];
              $sdt = $itemH['SDT'];
              $noiOHienTai = $itemH['NoiOHienTai'];
              $Email = $itemH['Email'];
              $hinhAnhHV = $itemH['HinhAnhHV'];
             ?>
            <div class="x_content">
              <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="<?php echo isset($itemH['HinhAnhHV']) ? $itemH['HinhAnhHV'] : "user.png" ; ?>" alt="Avatar" title="Change the avatar">
                  </div>
                </div>
                <h3><?php echo $itemH['HoTenHocVien']; ?></h3>

                <ul class="list-unstyled user_data">
                  <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $itemH['NoiOHienTai']; ?>
                  </li>

                  <li>
                    <i class="fa fa-briefcase user-profile-icon"></i><?php echo $itemH['SDT']; ?>
                  </li>

                  <li class="m-top-xs">
                    <i class="fa fa-external-link user-profile-icon"></i>
                    <a href="http://www.kimlabs.com/profile/" target="_blank">
                     </a>
                  </li>
                </ul>
                <br/>
                <?php if ($tenQuyenHan == "Quản trị") { ?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit m-right-xs"></i>Sửa thông tin</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-model-xoahocvien"><i class="fa fa-edit m-right-xs"></i>Xóa học viên</button>
                <?php } ?>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Sửa thông tin học viên</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">

                           <div class="col-xs-6">
                             <h2>THÔNG TIN MUỐN SỬA ĐỔI</h2>
                             <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                               <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã học viên</label>
                                 <div class="col-md-9 col-sm-9 col-xs-12">
                                   <input type="text" style="width: 50%;" name="txtMaHocVien" value="<?php echo $idHocVien; ?>" class="form-control" readonly="yes">
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên học viên</label>
                                 <div class="col-md-9 col-sm-9 col-xs-12">
                                   <input type="text" name="txtName" value="<?php echo $hoTenHocVIen; ?>" class="form-control" placeholder="Họ/tên">
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
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh: </label>
                                 <div class="col-md-9 col-sm-9 col-xs-12">
                                   <?php //<?php echo date("mm/dd/yyyy", strtotime($ngaySinh)); ?>
                                   <label for=""><?php echo $ngaySinh; ?></label>
                                   <input type="date" name="txtNgaySinh" value="" class="form-control" placeholder="Ngày/tháng/năm">
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Điện thoại <span class="required">*</span>
                                 </label>
                                 <div class="col-md-9 col-sm-9 col-xs-12">
                                   <input type="number" value="<?php echo $sdt; ?>" name="txtDienThoai" class="form-control">
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                                 <div class="col-md-9 col-sm-9 col-xs-12">
                                   <textarea class="form-control" value="<?php echo $noiOHienTai; ?>" name="txtDiaChi" rows="3" placeholder='Số nhà, Đường, Phường, Quận, TP'></textarea>
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                 <div class="col-md-9 col-sm-9 col-xs-12">
                                   <input type="text" name="txtEmail" value="<?php echo $Email; ?>" id="autocomplete-custom-append" class="form-control col-md-10"/>
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn ảnh học viên</label>
                                 <div class="col-md-9 col-sm-9 col-xs-12">
                                   <input type="file" name="txtpic" accept=".PNG,.JPG,.GIF" class="form-control col-md-10"/>
                                 </div>
                               </div>

                               <button type="submit" class="btn btn-success" name="btnSubmit">Lưu thông tin sửa</button>
                             </form>
                           </div>

                           <div class="col-xs-6">
                             <h2>THÔNG TIN TRƯỚC KHI SỬA ĐỔI</h2>
                             <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ tên</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                 <p><?php echo $hoTenHocVIen; ?></p>
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới tính:</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                 <p><?php echo $gioiTinh; ?></p>
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh:</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                 <p><?php echo $ngaySinh; ?></p>
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                 <p><?php echo $sdt; ?></p>
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                 <p><?php echo $noiOHienTai; ?></p>
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                 <p><?php echo $Email; ?></p>
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                 <img class="img-responsive avatar-view" style="width: 60%; height: 20%;" src="<?php echo isset($itemH['HinhAnhHV']) ? $itemH['HinhAnhHV'] : "user.png" ; ?>" alt="Avatar" title="Change the avatar">
                               </div>
                             </div>
                           </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.modal -->
                <div class="clearfix"></div>
                <!--modal Xoa Hoc Vien-->
                <div class="modal fade bs-model-xoahocvien" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Xóa Học viên: </h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-xs-6">
                            <h2>THÔNG TIN HỌC VIÊN TRƯỚC KHI XÓA</h2>
                            <?php foreach ($hv as $key => $itemH){ ?>
                              <?php
                                $idHocVien = $itemH['IDHocVien'];
                                $hoTenHocVIen = $itemH['HoTenHocVien'];
                                $gioiTinh = $itemH['GioiTinh'];
                                $ngaySinh = $itemH['NgaySinh'];
                                $sdt = $itemH['SDT'];
                                $noiOHienTai = $itemH['NoiOHienTai'];
                                $Email = $itemH['Email'];
                                $hinhAnhHV = $itemH['HinhAnhHV'];
                               ?>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ tên</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <p><?php echo $hoTenHocVIen; ?></p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới tính:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <p><?php echo $gioiTinh; ?></p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <p><?php echo $ngaySinh; ?></p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <p><?php echo $sdt; ?></p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <p><?php echo $noiOHienTai; ?></p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <p><?php echo $Email; ?></p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <img class="img-responsive avatar-view" style="width: 60%; height: 20%;" src="<?php echo isset($itemH['HinhAnhHV']) ? $itemH['HinhAnhHV'] : "user.png" ; ?>" alt="Avatar" title="Change the avatar">
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                          <div class="col-xs-6">
                            <h2>Show các lớp học viên đó đã học</h2>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Tên lớp</th>
                                  <th>Cấp độ</th>
                                  <th>Giáo viên</th>
                                  <th>Ngày bắt đầu</th>
                                  <th>Ngày kết thúc</th>
                                  <th>Trạng thái học</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php $stt = 0;
                                $stringTrangThaiHoc = "";?>
                                <?php foreach ($lichSuHocCuaHocVien as $key => $itemLichSuHocVien){ ?>
                                  <?php
                                    $stt++;
                                    $tenMonHoc = $itemLichSuHocVien['TenMonHoc'];
                                    $tenCapDo = $itemLichSuHocVien['TenCapDo'];
                                    $tenGiaoVien = $itemLichSuHocVien['HoTenGV'];
                                    $ngayBatDau = $itemLichSuHocVien['NgayBatDauKhoaHoc'];
                                    $ngayKetThuc = $itemLichSuHocVien['NgayKetThucKhoaHoc'];
                                    $trangThaiHoc = $itemLichSuHocVien['TrangThaiHoc'];

                                    if ($trangThaiHoc == "true"){
                                      $stringTrangThaiHoc = "Đang học";
                                    }
                                    else {
                                      $stringTrangThaiHoc = "Nghỉ học";
                                    }
                                    ?>
                                    <tr>
                                      <th scope="row"><?php echo $stt; ?></th>
                                      <td><?php echo $tenMonHoc; ?></td>
                                      <td><?php echo $tenCapDo; ?></td>
                                      <td><?php echo $tenGiaoVien; ?></td>
                                      <td><?php echo $ngayBatDau; ?></td>
                                      <td><?php echo $ngayKetThuc; ?></td>
                                      <td><?php echo $stringTrangThaiHoc; ?></td>
                                    </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <form class="form-horizontal form-label-left" method="post">
                          <?php if ($stt != 0){ ?>
                            <?php if ($stringTrangThaiHoc == "Đang học"){ ?>
                              <?php echo "Học viên này vẫn còn đang học.Nên không thể xóa." ?>
                            <?php } else {?>
                              <?php echo "Học viên đã từng học và không còn học nũa."; ?>
                                <input type="submit" class="btn btn-primary" name="btnXoaHocVienNghiHoc" value="Xóa học viên nghỉ học">
                            <?php } ?>
                          <?php } else {?>
                              <?php echo "Học viên này chưa đăng ký học lớp học nào của trung tâm."; ?>
                              <input type="submit" class="btn btn-primary" name="btnXoaHocVienChuaDangKyMonHoc" value="Xóa học viên chưa đăng ký môn">
                          <?php } ?>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <br />

                <!-- start skills -->
                <h4>Skills</h4>
                <ul class="list-unstyled user_data">
                  <li>
                    <p>Web Applications</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                    </div>
                  </li>
                  <li>
                    <p>Website Design</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                    </div>
                  </li>
                  <li>
                    <p>Automation & Testing</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                    </div>
                  </li>
                  <li>
                    <p>UI / UX</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                    </div>
                  </li>
                </ul>
                <!-- end of skills -->

              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="profile_title">
                  <div class="col-md-6">
                    <h2>Lịch sử học: </h2>
                  </div>

                </div>
                <!-- start of user-activity-graph -->
                <!--<div id="graph_bar" style="width:100%; height:280px;"></div>
                <!-- end of user-activity-graph -->

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Đánh giá</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Điểm danh</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Lớp đã học</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                      <!-- start recent activity -->
                      <ul class="messages">
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Hung Huynh</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Cuong Dang</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Phat Cao</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Nhi Nguyen</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Cuong Dang</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>

                      </ul>
                      <!-- end recent activity -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                      <!-- start user projects -->
                      <table class="data table table-striped no-margin">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Ngày tháng</th>
                            <th>Khoá học</th>
                            <th class="hidden-phone">Điểm danh</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>1/2/2017</td>
                            <td>Guitar</td>
                            <td class="hidden-phone">Có</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>2/2/2017</td>
                            <td>Guitar</td>
                            <td class="hidden-phone">Có</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>3/2/2017</td>
                            <td>Guitar</td>
                            <td class="hidden-phone">Có</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>4/2/2017</td>
                            <td>Guitar</td>
                            <td class="hidden-phone">Vắng</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- end user projects -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                      <!--lop da hoc-->
                      <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Bảng quá trình <small>basic table subtitle</small></h2>
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
                            <?php if ($tenQuyenHan == "Quản trị") { ?>
                            <a href="ExcelHistoryHocVien.php?idhv=<?php echo $idHocVien; ?>">Xuất file excel</a>
                            <br/>
                            <a href="ExcelHistoryHocVien2.php?idhv=<?php echo $idHocVien; ?>">Xuất file excel 2</a>
                            <?php } ?>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Tên lớp</th>
                                  <th>Cấp độ</th>
                                  <th>Giáo viên</th>
                                  <th>Ngày bắt đầu</th>
                                  <th>Ngày kết thúc</th>
                                  <th>Trạng thái học</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php $stt = 0; ?>
                                <?php foreach ($lichSuHocCuaHocVien as $key => $itemLichSuHocVien){ ?>
                                  <?php
                                    $stt++;
                                    $tenMonHoc = $itemLichSuHocVien['TenMonHoc'];
                                    $tenCapDo = $itemLichSuHocVien['TenCapDo'];
                                    $tenGiaoVien = $itemLichSuHocVien['HoTenGV'];
                                    $ngayBatDau = $itemLichSuHocVien['NgayBatDauKhoaHoc'];
                                    $ngayKetThuc = $itemLichSuHocVien['NgayKetThucKhoaHoc'];
                                    $trangThaiHoc = $itemLichSuHocVien['TrangThaiHoc'];
                                    $stringTrangThaiHoc = "";
                                    if ($trangThaiHoc == "true"){
                                      $stringTrangThaiHoc = "Đang học";
                                    }
                                    else {
                                      $stringTrangThaiHoc = "Nghỉ học";
                                    }
                                    ?>
                                    <tr>
                                      <th scope="row"><?php echo $stt; ?></th>
                                      <td><?php echo $tenMonHoc; ?></td>
                                      <td><?php echo $tenCapDo; ?></td>
                                      <td><?php echo $tenGiaoVien; ?></td>
                                      <td><?php echo $ngayBatDau; ?></td>
                                      <td><?php echo $ngayKetThuc; ?></td>
                                      <td><?php echo $stringTrangThaiHoc; ?></td>
                                    </tr>
                                <?php } ?>
                              </tbody>
                            </table>


                          </div>
                        </div>
                      </div>
                      <!---->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("footer.php"); ?>
