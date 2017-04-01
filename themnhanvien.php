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
    $idTaiKhoan = $_SESSION['IDNhanVien'];
  }
 ?>
<?php include_once("entities/nhanvien.class.php"); ?>
<?php include_once("entities/chucvu.class.php"); ?>
<?php include_once("entities/taikhoan.class.php"); ?>

<?php
  if (isset($_POST["btnsubmitXoaNhanVien"])) {
    $idNhanVienXoa = $_POST["txtIDNhanVienXoa"];
    $idTaiKhoanXoa = $_POST["txtIDTaiKhoanXoa"];
    //kiem tra nhan vien do co la Bao ve ko
    if($idTaiKhoanXoa != "")
    {
      $aTaiKhoan = TaiKhoan::Get_A_TaiKhoan_ByID($idTaiKhoanXoa);
      foreach ($aTaiKhoan as $key => $itemTaiKhoan) {
        $trangThai_TaiKhoan = $itemTaiKhoan['TrangThaiOnline'];

      }
      if($trangThai_TaiKhoan != "Online"){
        $newNhanVien = new NhanVien($idNhanVienXoa, "", "", "", "", "", "", "", "");
        $resultDeleteNhanVien = $newNhanVien->delete();
        $newTaiKhoan = new TaiKhoan($idTaiKhoanXoa, "", "", "", "");
        $resultDeleteTaiKhoan = $newTaiKhoan->delete();
      }
      else {
        header("location: themnhanvien.php?nhanvienOnline");
      }
    }
    else {
      $newNhanVien = new NhanVien($idNhanVienXoa, "", "", "", "", "", "", "", "");
      $resultDeleteNhanVien = $newNhanVien->delete();
      header("location: themnhanvien.php");
    }
  }

  if(isset($_POST["btnsubmit"])){
    $maNhanVien = $_POST["txtMaNhanVien"];
     $hoTenNhanVien = $_POST["txtTenNhanVien"];
     $CMND = $_POST["txtCMND"];
     $gioiTinh = $_POST["txtGioiTinh"];
     $ngaySinh = $_POST["txtNgaySinh"];
     $email = $_POST["txtEmail"];
     $soDienThoai = $_POST["txtDienThoai"];
     $idChucVu = $_POST["txtIDChucVu"];

     if ($idChucVu == 1) {
       $idtaiKhoan = NULL;
       $aNhanVien = new NhanVien($maNhanVien, $hoTenNhanVien, $CMND, $gioiTinh, $ngaySinh, $email, $soDienThoai, $idtaiKhoan, $idChucVu);
       $result = $aNhanVien->insertNVBV();
       if($result){
         header("location: themnhanvien.php?insertednvbv");
       }
       else {
         header("location: themnhanvien.php?failinsertnvbv");
       }
     }
     else {
       header("location: xacnhanthemnhanvien.php?idnv=$maNhanVien&htnv=$hoTenNhanVien&cmnd=$CMND&gt=$gioiTinh&ns=$ngaySinh&em=$email&sdt=$soDienThoai&idcv=$idChucVu");
     }
  }
?>

<?php include_once("header.php"); ?>
<?php
  $allChucVu = ChucVu::Get_All_ChucVu();
  $lastnv = NhanVien::Get_Last_NhanVien();
?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <ol class="breadcrumb" >
                  <li><a href="index.php"><strong>Trang chủ</strong></a></li>
                  <li class="active">Quản lý nhân viên.</li>
                </ol>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm nhân viên....">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Tìm!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
<div class="row">
<!-- form input mask -->
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thêm Nhân Viên:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php
                    if (isset($_GET['insertednvbv'])) {
                      echo "Thêm nhân viên bảo vệ thành công.";
                    }
                    if(isset($_GET['failinsertnvbv']))
                    {
                      echo "Thêm nhân viên bảo vệ thất bại.";
                    }
                    ?>
                    <br/>
                    <form class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">MaNhanVien</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php foreach ($lastnv as $key => $itemnv): ?>
                           <?php
                           $idNVLast = $itemnv['IDNhanVien'];
                           $idNVNext = intval($idNVLast) + 1;
                            ?>
                         <?php endforeach; ?>
                          <input type="text" class="form-control" placeholder="Họ/tên" name="txtMaNhanVien" value="<?php echo $idNVNext; ?>" readonly="yes">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên nhân viên</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Họ/tên" name="txtTenNhanVien" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">CMND</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" placeholder="CMND" name="txtCMND">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Giới tính</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" checked name="txtGioiTinh" value="Nam"> Nam
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="txtGioiTinh" value="Nữ"> Nữ
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="date" class="form-control" placeholder="Ngày/tháng/năm" name="txtNgaySinh">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="autocomplete-custom-append" class="form-control col-md-10" name="txtEmail" />
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chức vụ</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="txtIDChucVu">
                            <?php foreach ($allChucVu as $key => $itemChucVu) { ?>
                              <?php
                                $idChucVu = $itemChucVu['IDChucVu'];
                                $TenChucVu = $itemChucVu['TenChucVu'];
                              ?>
                              <option value="<?php echo $idChucVu; ?>"><?php echo $TenChucVu; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <button type="submit" name="btnsubmit" class="btn btn-success">Thêm nhân viên</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /form input mask -->

              <!-- form color picker -->
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách nhân viên.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php
                    if (isset($_GET['nhanvienOnline'])) { ?>
                      <h2 style="color: red;">Nhân viên đang online. không thể xóa</h2>
                    <?php } ?>
                    <br/>
                    <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>
                              STT
                          </th>
                          <th>Tên giáo viên</th>
                          <th>Điện thoại</th>
                          <th>Chức vụ</th>
                          <th>Online</th>
                          <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $stt=0;
                        $all_NhanVienVsChucVu = NhanVien::Get_All_NhanVienVsChucVu($idTaiKhoan);
                        ?>
                        <?php foreach ($all_NhanVienVsChucVu as $key => $item_NhanVienVsChucVu) {?>
                          <?php $stt++;
                          $tenNhanVien = $item_NhanVienVsChucVu['HoTenNV'];
                          $idNhanVien = $item_NhanVienVsChucVu['IDNhanVien'];
                          $idChucVu = $item_NhanVienVsChucVu['IDChucVu'];
                          $emailNhanVien = $item_NhanVienVsChucVu['Email'];
                          $sdtNhanVien = $item_NhanVienVsChucVu['SDT'];
                          $chucVuNhanVien = $item_NhanVienVsChucVu['TenChucVu'];
                          $trangThaiOnline = $item_NhanVienVsChucVu['TrangThaiOnline'];
                          $idTaiKhoan = $item_NhanVienVsChucVu['IDTaiKhoan'];
                          ?>
                          <tr>
                            <td>
  			                         <?php echo $stt; ?>
			                       </td>
                            <td><?php echo $tenNhanVien; ?></td>
                            <td><?php echo $sdtNhanVien; ?></td>
                            <td><?php echo $chucVuNhanVien; ?></td>
                            <td>
                              <?php if ($trangThaiOnline == "Online") { ?>
                                <img src="public\images\NhanVien\online-icon.png" alt="Online">
                              <?php } else if ($trangThaiOnline == "Offline") { ?>
                                <img src="public\images\NhanVien\offline-icon.png" alt="Offline">
                              <?php } else { ?>
                                <p>NV không có Tài khoản.</p>
                              <?php }  ?>
                            </td>
                            <td>
                              <?php if ($trangThaiOnline != "Online") { ?>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Xoa<?php echo $idNhanVien; ?>" data-whatever="@mdo">Xóa</button>
                              <?php } ?>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Sua<?php echo $idNhanVien; ?>" data-whatever="@mdo">Sửa</button>
                            </td>
                          </tr>
                          <div class="modal fade" id="Sua<?php echo $idNhanVien; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="exampleModalLabel">Sửa thông tin nhân viên: <?php echo $tenNhanVien; ?></h4>
                                </div>
                                <form method="post">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">Họ tên nhân viên</label>
                                      <input type="text" class="form-control" id="recipient-name" value="<?php echo $tenNhanVien; ?>" name="txtHoTenNhanVien">
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">Email</label>
                                      <input type="text" class="form-control" id="recipient-name" value="<?php echo $emailNhanVien; ?>" name="txtEmail">
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">Số điện thoại</label>
                                      <input type="text" class="form-control" id="recipient-name" value="<?php echo $sdtNhanVien; ?>" name="txtSodienthoainhanvien">
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">Chọn chức vụ</label>
                                      <select class="form-control" name="txtChucVuNhanVien">
                                        <?php //Get_All_ChucVu()
                                          $all_ChucVu = ChucVu::Get_All_ChucVu();
                                        ?>
                                        <?php foreach ($all_ChucVu as $key => $item_Chucvu) {
                                          $id_Chucvu = $item_Chucvu['IDChucVu'];
                                          $ten_Chucvu = $item_Chucvu['TenChucVu'];
                                        ?>
                                        <option value="<?php echo $id_Chucvu; ?>"><?php echo $ten_Chucvu; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Lưu sửa</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix">
                          </div>
                          <div class="modal fade" id="Xoa<?php echo $idNhanVien; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">Họ tên nhân viên</label>
                                      <p><?php echo $tenNhanVien; ?></p>
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">Email</label>
                                      <p><?php echo $emailNhanVien; ?></p>
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">Số điện thoại</label>
                                      <p><?php echo $sdtNhanVien; ?></p>
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">Chọn chức vụ</label>
                                      <p><?php echo $chucVuNhanVien; ?></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                  <form class=""  method="post">
                                    <input type="text" name="txtIDNhanVienXoa" value="<?php echo $idNhanVien; ?>">
                                    <input type="text" name="txtIDTaiKhoanXoa" value="<?php echo $idTaiKhoan; ?>">
                                    <button type="submit" class="btn btn-primary" name="btnsubmitXoaNhanVien">Xóa</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
              <!-- /form color picker -->
              </div>
              </div>
              </div>
<?php include_once("footer.php"); ?>
