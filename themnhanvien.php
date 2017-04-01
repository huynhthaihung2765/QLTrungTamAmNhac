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
<?php include_once("entities/nhanvien.class.php"); ?>
<?php include_once("entities/chucvu.class.php"); ?>

<?php
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
                <h3>Nhân Viên Tại Học Viện Âm Nhạc</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
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
                    <h2>Xem Nhân Viên</h2>
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
                    <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>
               <th><input type="checkbox" id="check-all" class="flat"></th>
              </th>
                          <th>Tên giáo viên</th>
                          <th>Điện thoại</th>
                          <th>Email</th>
                          <th>Chức vụ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
			               <th><input type="checkbox" id="check-all" class="flat"></th>
			              </td>
                          <td>Thái Hưng</td>
                          <td>0938557453</td>
                          <td>hung@gmail.com</td>
                          <th>Kế toán</th>
                        </tr>
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
