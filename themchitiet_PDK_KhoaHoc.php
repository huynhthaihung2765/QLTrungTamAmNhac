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
                           <div class="tools tools-bottom">
                             <a href="#"><i class="fa fa-link"></i></a>
                             <a href="#"><i class="fa fa-pencil"></i></a>
                             <a href="#"><i class="fa fa-times"></i></a>
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

<?php include_once("footer.php") ?>
