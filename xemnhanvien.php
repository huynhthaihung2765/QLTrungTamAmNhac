
<?php include_once("header.php") ?>
<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bảng nhân viên</small></h2>
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
                          <th>CMND</th>
                          <th>Chức vụ</th>
                          <th>Tác vụ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
			               <th><input type="checkbox" id="check-all" class="flat"></th>
			              </td>
                          <td>Dương Cường</td>
                          <td>Nam</td>
                          <td>0913563800</td>
                          <th>Bình Thạnh</th>
                          <td>cuong@gmail.com</td>
                          <td>123456789</td>
                          <td>Trưởng phòng</td>
                          <td><a href="#">Sửa</a> <br> <a href="#">Thêm Tài Khoản</a> <br> <a href="#">Xoá</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             </div>
<?php include_once("footer.php"); ?>
