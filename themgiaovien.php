<?php 
	require_once("entities/giaovien.class.php");
	if(isset($_POST["btnsubmit"]))
	{
		//
		// lấy giá trị từ form collection
		//
    $idGiaoVien = $_POST["txtMaGiaoVien"];
		$hoTenGV = $_POST["txtHoTenGV"];
		$gioiTinh = $_POST["txtGioiTinh"];
		$ngaySinh = $_POST["txtNgaySinh"];
		$cMND = $_POST["txtCMND"];
		$email = $_POST["txtEmail"];
		$bangCap = $_POST["txtBangCap"];
		$chuyenMon = $_POST["txtChuyenMon"];
		$soDienThoai = $_POST["txtSDT"];
		$hinhAnh = $_FILES["txtHinhAnh"];
		//
		// khởi tạo đối tượng giáo viên
		//
		$newGiaoVien = new Giaovien($idGiaoVien, $hoTenGV, $gioiTinh, $ngaySinh, $cMND, $email, $bangCap, $chuyenMon, $soDienThoai, $hinhAnh);
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
 $gvLast = Giaovien::Get_Last_GV();
  ?>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thêm giáo viên</h2>
                    <?php
		               if (isset($_GET["inserted"])){
		                 echo "<h2>Thêm giáo viên thành công</h2>";
		               }
		               if(isset($_GET["failure"])) {
		                 echo "<h2>Thêm giáo viên thất bại</h2>";
		               }
		             ?>
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
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    <?php foreach ($gvLast as $key => $itemgv): ?>
                      <?php
                        $idGVLast = $itemgv['IDGiaoVien'];
                        $idGVNext = intval($idGVLast) + 1;
                      ?>
                      <?php endforeach; ?>
                      <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã Giáo viên</label>
                       <div class="col-md-9 col-sm-9 col-xs-12">
                         <input type="text" style="width: 50%;" name="txtMaGiaoVien" value="<?php echo $idGVNext ?>" class="form-control" readonly="yes">
                       </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Têm giáo viên</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Họ/tên" name="txtHoTenGV" >
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">CMND</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" placeholder="CMND" name="txtCMND">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Điện thoại <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" name="txtSDT" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" placeholder='Số nhà, Đường, Phường, Quận, TP' name="txtDiaChi""></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="autocomplete-custom-append" class="form-control col-md-10" name="txtEmail" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chuyên môn</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="txtChuyenMon" id="autocomplete-custom-append" class="form-control col-md-10" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bằng cấp</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="txtBangCap" id="autocomplete-custom-append" class="form-control col-md-10" />
                        </div>
                      </div>
                      <div class="form-group">
	                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn ảnh giáo viên</label>
	                 <div class="col-md-9 col-sm-9 col-xs-12">
	                   <input type="file" name="txtHinhAnh" accept=".PNG,.JPG,.GIF" class="form-control col-md-10"/>
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