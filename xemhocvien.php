<?php include_once("entities/hocvien.class.php"); ?>

<?php include_once("header.php") ?>

<?php
  //$hocviens = Hocvien::list_All_HocVien();
  $hocvienlearn = HocVien::Get_All_HV_Learn();
 ?>

<div class="right_col" role="main" style="min-height: 347px;">
      <div class="">
        <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Bảng học viên đang học</h2>
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
                <div id="datatable-checkbox_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                  <div class="row">
                  <div class="col-sm-6"><div class="dataTables_length" id="datatable-checkbox_length"><label>Show <select name="datatable-checkbox_length" aria-controls="datatable-checkbox" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="datatable-checkbox_filter" class="dataTables_filter">
                  <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-checkbox"></label>
                </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                  <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action dataTable no-footer" role="grid" aria-describedby="datatable-checkbox_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 5px;"></th>
                      <th class="sorting_asc" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" style="width: 23px;">
                        <div class="icheckbox_flat-green" style="position: relative;">
                          <input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;">
                          <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div>
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Tên học viên: activate to sort column ascending" style="width: 159px;">Tên học viên</th>
                      <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Giới tính: activate to sort column ascending" style="width: 249px;">Giới tính</th>
                      <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Ngày sinh: activate to sort column ascending" style="width: 122px;">Ngày sinh</th>
                      <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Điện thoại: activate to sort column ascending" style="width: 93px;">Điện thoại</th>
                      <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Địa chỉ: activate to sort column ascending" style="width: 94px;">Địa chỉ</th>
                      <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Ngày vào học: activate to sort column ascending" style="width: 123px;">Ngày vào học</th>
                      <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Ngày vào học: activate to sort column ascending" style="width: 123px;">Ảnh đại diện</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($hocvienlearn as $key => $item) {
                     ?>
                  <tr role="row" class="odd">
                      <td></td>
                      <th class="sorting_1">
                        <div class="icheckbox_flat-green" style="position: relative;">
                          <input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;">
                          <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div></th>
                      <td><a href="xemchitiethocvien.php?id=<?php echo $item['IDHocVien'] ?>&idkh=<?php echo $item['IDKHOAHOC']; ?>"><?php echo $item['HoTenHocVien']; ?></a></td>
                      <td><?php echo $item['GioiTinh']; ?></td>
                      <td><?php echo $item['NgaySinh']; ?></td>
                      <td><?php echo $item['SDT']; ?></td>
                      <td><?php echo $item['NoiOHienTai']; ?></td>
                      <td><?php echo $item['NgayLapPhieu']; ?></td>
                      <td><?php echo $item['NgayLapPhieu']; ?></td>
                    </tr>
                    <?php
                  }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                <div class="dataTables_info" id="datatable-checkbox_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
              </div>
              <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="datatable-checkbox_paginate">
                  <ul class="pagination">
                    <li class="paginate_button previous disabled" id="datatable-checkbox_previous">
                      <a href="#" aria-controls="datatable-checkbox" data-dt-idx="0" tabindex="0">Previous</a>
                    </li>
                    <li class="paginate_button active">
                      <a href="#" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0">1</a>
                    </li><li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="2" tabindex="0">2</a>
                    </li><li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="3" tabindex="0">3</a></li>
                    <li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="4" tabindex="0">4</a></li>
                    <li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="5" tabindex="0">5</a></li>
                    <li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="6" tabindex="0">6</a></li>
                    <li class="paginate_button next" id="datatable-checkbox_next"><a href="#" aria-controls="datatable-checkbox" data-dt-idx="7" tabindex="0">Next</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        Trung tâm âm nhạc <a href="https://colorlib.com">SevenMusic.com</a>
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
  </div>
</div>

<?php include_once("footer.php") ?>
