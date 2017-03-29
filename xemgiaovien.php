<?php include_once("entities/giaovien.class.php"); ?>
<?php include_once("header.php") ?>
<?php 
  $xemgiaovien = GiaoVien::Get_All_GV();
 ?>
<div class ="right_col" role="main">
          <div class ="">
            <div class ="clearfix"></div>
              <div class ="col-md-12 col-sm-12 col-xs-12">
                <div class ="x_panel">
                  <div class ="x_title">
                    <h2>Bảng giáo viên</small></h2>
                    <ul class ="nav navbar-right panel_toolbox">
                      <li><a class ="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class ="dropdown">
                        <a href ="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class ="dropdown-menu" role="menu">
                          <li><a href ="#">Settings 1</a>
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
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>
               <th><input type="checkbox" id="check-all" class="flat"></th>
              </th>
                          <th>Tên giáo viên</th>
                          <th>Giới tính</th>
                          <th>Điện thoại</th>
                          <th>Địa chỉ</th>
                          <th>Email</th>
                          <th>Chuyên môn</th>
                          <th>Tác vụ</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      foreach ($xemgiaovien as $item){ 
                        ?>
                        <tr>
                          <td>
                            <th><input type="checkbox" id="check-all" class="flat"></th>
                          </td>
                          <td><?php echo $item["HoTenGV"]; ?></td>
                          <td><?php echo $item["GioiTinh"]; ?></td>
                          <td><?php echo $item["SDT"]; ?></td>
                          <td>#</td>
                          <td><?php echo $item["Email"]; ?></td>
                          <td><?php echo $item["ChuyenMon"]; ?></td>
                          <td>
                            <a href="#">Thêm</a> <br> 
                            <a href="#">Xoá</a> <br> 
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target=".<?php echo $item["IDGiaoVien"] ?>" >Sửa thông tin
                              </button>
                              <div class="modal fade <?php echo $item["IDGiaoVien"] ?>" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="gridSystemModalLabel">Sửa thông tin Giáo viên</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">

                                 <div class="col-xs-6">
                                   <h2>THÔNG TIN MUỐN SỬA ĐỔI</h2>
                                   <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                     <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã Giáo viên</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                         <input type="text" style="width: 50%;" name="txtMaGiaoVien" value="<?php echo $item["IDGiaoVien"] ?>" class="form-control" readonly="yes">
                                       </div>
                                     </div>
                                     <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên học viên</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                         <input type="text" name="txtName" value="<?php echo $item["HoTenGV"] ?>" class="form-control" placeholder="Họ/tên">
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
                                         <label for=""><?php echo $item["NgaySinh"] ?></label>
                                         <input type="date" name="txtNgaySinh" value="" class="form-control" placeholder="Ngày/tháng/năm">
                                       </div>
                                     </div>
                                     <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Điện thoại <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                         <input type="number" value="<?php echo $item["SDT"] ?>" name="txtDienThoai" class="form-control">
                                       </div>
                                     </div>
                                     <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                         <input type="text" name="txtEmail" value="<?php echo $item["Email"] ?>" id="autocomplete-custom-append" class="form-control col-md-10"/>
                                       </div>
                                     </div>
                                     <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Chuyên môn</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                         <input type="text" name="txtEmail" value="<?php echo $item["ChuyenMon"] ?>" id="autocomplete-custom-append" class="form-control col-md-10"/>
                                       </div>
                                     </div>
                                     <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Bằng cấp</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                         <input type="text" name="txtEmail" value="<?php echo $item["BangCap"] ?>" id="autocomplete-custom-append" class="form-control col-md-10"/>
                                       </div>
                                     </div>
                                     <button type="submit" class="btn btn-success" name="btnSubmit">Lưu thông tin sửa đổi</button>

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                  
                                   </form>
                                 </div>

                                 <div class="col-xs-6">
                                   <h2>THÔNG TIN TRƯỚC KHI SỬA ĐỔI</h2>
                                   <label>Họ tên Giáo viên:&nbsp</label><?php echo $item["HoTenGV"] ?> <br>
                                   <label>Giới tính:&nbsp</label><?php echo $item["GioiTinh"] ?><br>
                                   <label>NTNS:&nbsp</label><?php echo $item["NgaySinh"] ?><br>
                                   <label>Điện thoại:&nbsp</label><?php echo $item["SDT"] ?><br>
                                   <label>Email:&nbsp</label><?php echo $item["Email"] ?><br>
                                   <label>Chuyên môn:&nbsp</label><?php echo $item["ChuyenMon"] ?><br>
                                   <label>Bằng cấp:&nbsp</label><?php echo $item["BangCap"] ?>
                                   </div>

                                  
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                      <!-- popup end -->
                          </td>
                        </tr>

                        <?php
                        }
                        ?>

                              <!-- popup open -->
                              

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
<script src="public/vendors/jquery/dist/jquery.min.js"></script>
<?php include_once("footer.php") ?>