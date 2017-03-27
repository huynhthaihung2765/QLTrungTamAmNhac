<?php include_once("entities/hocvien.class.php"); ?>
<?php include_once("header.php") ?>
<?php
  //$hocviens = Hocvien::list_All_HocVien();
  $allHVSign = HocVien::Get_All_HV_Sign();
 ?>

 <div class="right_col" role="main">
   <div class="">
     <div class="page-title">
       <div class="title_left">
         <ol class="breadcrumb" >
           <li><a href="index.php"><strong>Trang chủ</strong></a></li>
           <li class="active">Danh sách học viên</li>
         </ol>
       </div>

       <div class="title_right">
         <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
           <div class="input-group">
             <input type="text" class="form-control search" id="searchid" placeholder="Tìm kiếm tên học viên..." />
             <span class="input-group-btn">
               <button class="btn btn-default" type="button">Tìm!</button>
             </span>

           </div>
           <div id="result"></div>
           <!--
           <div class="input-group">
             <button class="btn btn-default" id="ss-sort">Sort</button>
                <button class="btn btn-default" id="ss-all">All</button>
                <input type="text" class="form-control" id="ss-name-filter" placeholder="Filter by name">
                <input type="text" class="form-control" id="ss-description-filter" placeholder="Filter by description">
           </div>
         -->
         </div>
       </div>
     </div>

     <div class="clearfix"></div>

     <div class="row">
       <div class="col-md-12">
         <div class="x_panel">
           <div class="x_content ">
             <div class="x_title">
               <h2>Danh sách các học viên</h2>
               <br/>
               <div class="clearfix"></div>
             </div>

               <div class="clearfix"></div>
               <div class="ss-box" id="result">
                 <?php $soluong = 0; ?>
                 <?php foreach ($allHVSign as $key => $itemHVSign){ ?>
                   <?php
                    $soluong++;
                    $idhv = $itemHVSign['IDHocVien'];
                   ?>
                   <div class="col-md-4 col-sm-4 col-xs-12 profile_details" id="<?php echo $idhv; ?>" >
                     <div class="well profile_view">
                       <div class="col-sm-12">
                         <h4 class="brief"><i><?php echo $idhv; ?></i></h4>
                         <div class="left col-xs-7">
                           <h2><?php echo $itemHVSign['HoTenHocVien']; ?></h2>
                           <p><strong>Thành tích: </strong> Học bổng toàn phần trong các khóa.  </p>
                           <ul class="list-unstyled">
                             <li><i class="fa fa-building"></i> Địa chỉ: <?php echo $itemHVSign['NoiOHienTai']; ?></li>
                             <li><i class="fa fa-phone"></i> SDT :<?php echo $itemHVSign['SDT']; ?></li>
                           </ul>
                         </div>
                         <div class="right col-xs-5 text-center">
                           <img src="<?php echo $itemHVSign['HinhAnhHV']; ?>" alt="" class="img-circle img-responsive">
                         </div>
                       </div>
                       <div class="col-xs-12 bottom text-center">
                         <div class="col-xs-12 col-sm-6 emphasis">
                           <p class="ratings">
                             <a>4.0</a>
                             <a href="#"><span class="fa fa-star"></span></a>
                             <a href="#"><span class="fa fa-star"></span></a>
                             <a href="#"><span class="fa fa-star"></span></a>
                             <a href="#"><span class="fa fa-star"></span></a>
                             <a href="#"><span class="fa fa-star-o"></span></a>
                           </p>
                         </div>
                         <div class="col-xs-12 col-sm-6 emphasis">
                             <?php
                             $idhd = $itemHVSign['IDPhieu'];
                              ?>
                            <a class="btn btn-success btn-xs" href="themChitiet_PDK_LopHoc.php?idpdk=<?php echo $idhd; ?>"><i class="fa fa-user"> </i> <i class="fa fa-comments-o"></i>Đăng ký môn học</a>

                             <a class="btn btn-primary btn-xs" href="xemchitiethocvien.php?idHV=<?php echo $itemHVSign['IDHocVien'];  ?>"><i class="fa fa-user"> </i> Xem thông tin</a>
                         </div>
                       </div>
                     </div>
                   </div>
                   <?php if ($soluong == 3){ ?>
                     <div class="clearfix"></div>
                     <?php $soluong = 0; ?>
                   <?php } ?>
                 <?php } ?>
               </div>

             </div>
           </div>
         </div>
       </div>

     </div>
   </div>
 </div>
<?php include_once("footer.php"); ?>
