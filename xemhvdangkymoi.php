<?php include_once("entities/hvdangkymoi.class.php"); ?>
<?php include_once("header.php") ?>
<?php 
  $xemdangky = HVDangKyMoi::GET_ALL_DANGKYMOI();
 ?>
 
<div class ="right_col" role="main">
          <div class ="">
            <div class ="clearfix"></div>
              <div class ="col-md-12 col-sm-12 col-xs-12">
                <div class ="x_panel">
                  <div class ="x_title">
                    <h2>Bảng đăng ký</small></h2>
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
                          <th>Họ và Tên</th>
                          <th>Điện thoại</th>
                          <th>Môn học</th>
                          <th>Ngày trong tuần</th>
                          <th>Buổi trong ngày</th>
                          <th>Nội dung</th>
                          <th>Tác vụ</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      foreach ($xemdangky as $item){ 
                        ?>
                        <tr>
                          <td>
                            <th><input type="checkbox" id="check-all" class="flat"></th>
                          </td>
                          <td><?php echo $item["HoTen"]; ?></td>
                          <td><?php echo $item["SDT"]; ?></td>
                          <td><?php echo $item["MonHoc"]; ?></td>
                          <td><?php echo $item["NgayTrongTuan"]; ?></td>
                          <td><?php echo $item["BuoiTrongNgay"]; ?></td>
                          <td><?php echo $item["NoiDung"]; ?></td>
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