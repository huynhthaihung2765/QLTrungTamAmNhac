<?php include_once("entities/giaovien.class.php"); ?>
<?php include_once("header.php") ?>
<?php 
  $xemgiaovien = GiaoVien::Get_All_GV();
 ?>
<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bảng giáo viên</small></h2>
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
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<?php include_once("footer.php") ?>