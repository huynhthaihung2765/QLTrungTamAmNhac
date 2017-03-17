<?php include_once("entities/hocvien.class.php"); ?>
<?php include_once("entities/monhoc.class.php"); ?>
<?php include_once("entities/capdo.class.php"); ?>

<?php include_once("header.php") ?>
<?php
  $allMonHocHasInKhoaHoc = MonHoc::Get_All_Mh_Has_In_KhoaHoc();
  //
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Media Gallery <small> gallery design</small> </h3>
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

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách các lớp học hiện có <small> tham Khảo </small></h2>
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

            <div class="row">
              <?php $demsl =0; ?>
              <?php foreach ($allMonHocHasInKhoaHoc as $key => $itemMonHoc){ ?>
                <?php $demsl++; ?>
                <p>Lớp học: <?php echo $itemMonHoc['TenLopHoc']; ?></p>
                <?php
                  $idMonHoc = $itemMonHoc['IDLopHoc'];
                  $allCapDoHasInLopHoc = CapDo::Get_All_Capo_Has_In_MonHoc($idMonHoc);
                  $dem = 0;
                 ?>
                 <?php foreach ($allCapDoHasInLopHoc as $key => $itemCapdo){
                    $dem++;
                   ?>
                   <div class="col-md-55">
                     <div class="thumbnail">
                       <div class="image view view-first">
                         <img style="width: 100%; display: block;" src="public/images/VatLieu/GuiTar/1.png" alt="image" />
                         <div class="mask">
                           <p>Your Text</p>
                           <div class="tools tools-bottom" data-toggle="modal" data-target="#myModal">
                             
                             <a href="#">Thêm <i class="fa fa-pencil"></i></a>
                             
                           </div>
                         </div>
                       </div>
                       <div class="caption">
                         <p>Học <?php echo $itemMonHoc['TenLopHoc']; ?></p>
                         <p>Cấp độ: <?php echo $itemCapdo['TenCapDo']; ?></p>
                       </div>
                     </div>
                   </div>

                   <?php if ($dem == 5){ ?>
                      <div class="clearfix"> </div>
                      <?php $dem = 0 ?>
                   <?php } ?>
                 <?php } ?>
                 <?php if ($demsl == 1){ ?>
                   <div class="clearfix"> </div>
                   <?php $demsl = 0; ?>
                 <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tên lớp <small>cấp độ</small> </h4>
      </div>
      <div class="modal-body">
        <!-- form thêm chi tiết phiếu dky -->
        <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thông tin phiếu đăng ký</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày bắt đầu</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="date" class="form-control" placeholder="ngày/tháng/năm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Giáo viên</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control">
                            <option>Nguyễn Văn A</option>
                            <option>Nguyễn Văn B</option>
                            <option>Nguyễn Văn C</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày trong tuần</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control">
                            <option>Thứ 2 / 4 / 6</option>
                            <option>Thứ 3 / 5 / 7</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ca trong ngày</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control">
                            <option>Ca sáng</option>
                            <option>Ca chiều</option>
                            <option>Ca tối</option> 
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        <!-- /form thêm chi tiết phiếu dky -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--  -->
<?php include_once("footer.php") ?>
