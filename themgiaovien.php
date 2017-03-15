<?php 
	require_once("entities/giaovien.class.php");
	if(isset($_POST["btnsubmit"]))
	{
		//
		// lấy giá trị từ form collection
		//
		$hoTenGV = $_POST["txtHoTenGV"];
		$gioiTinh = $_POST["txtGioiTinh"];
		$ngaySinh = $_POST["txtNgaySinh"];
		$cMND = $_POST["txtCMND"];
		$email = $_POST["txtEmail"];
		$bangCap = $_POST["txtBangCap"];
		$chuyenMon = $_POST["txtChuyenMon"];
		$soDienThoai = $_POST["txtSDT"];
		$hinhAnh = $_POST["txtHinhAnh"];
		$diaChi = $_POST["txtDiaChi"];
		//
		// khởi tạo đối tượng giáo viên
		//
		$newGiaoVien = new Giaovien($hoTenGV, $gioiTinh, $ngaySinh, $cMND, $email, $bangCap, $chuyenMon, $soDienThoai, $hinhAnh, $diaChi);
		// lưu xuống CSDL
		$result = $newGiaoVien->insert();
		if(!$result)
		{
			// truy vấn lỗi
			header("Location: themgiaovien.php?failure");
		}
		else
		{
			header("Location: themgiaovien.php?inserted");
		}
	}
 ?>
 <?php include_once("header.php"); ?>
 <?php 
 	if(isset($_GET["inserted"]))
 	{
 		echo "thêm giáo viên thành công";
 	}
 	else
 	{
 		echo "Thêm giáo viên thất bại";
 	}
  ?>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thêm giáo viên</h2>
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
                    <form class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Têm giáo viên</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Họ/tên" name="txtHoTenGV" value="<?php echo isset($_POST["txtHoTenGV"]) ? $_POST["txtHoTenGV"] : "" ; ?>">
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
                          <input type="date" class="form-control" placeholder="Ngày/tháng/năm" name="txtNgaySinh" value="<?php echo isset($_POST["txtNgaySinh"]) ? $_POST["txtNgaySinh"] : "" ; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">CMND</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" placeholder="Ngày/tháng/năm" name="txtCMND" value="<?php echo isset($_POST["txtCMND"]) ? $_POST["txtCMND"] : "" ; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Điện thoại <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" name="txtSDT" class="form-control" value="<?php echo isset($_POST["txtSDT"]) ? $_POST["txtSDT"] : "" ; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" placeholder='Số nhà, Đường, Phường, Quận, TP' name="txtDiaChi" value="<?php echo isset($_POST["txtDiaChi"]) ? $_POST["txtDiaChi"] : "" ; ?>"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="autocomplete-custom-append" class="form-control col-md-10" name="txtEmail" value="<?php echo isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : "" ; ?>"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chuyên môn</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="txtChuyenMon" id="autocomplete-custom-append" class="form-control col-md-10" value="<?php echo isset($_POST["txtChuyenMon"]) ? $_POST["txtChuyenMon"] : "" ; ?>"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bằng cấp</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="txtBangCap" id="autocomplete-custom-append" class="form-control col-md-10" value="<?php echo isset($_POST["txtBangCap"]) ? $_POST["txtBangCap"] : "" ; ?>"/>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary">Trở lại</button>
                          <button type="submit" class="btn btn-success" name="btnsubmit">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              </div>
              </div>
              </div>