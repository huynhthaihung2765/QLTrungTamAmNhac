<?php include_once("entities\loaicsvc.php"); ?>
<?php include_once("entities\cosovatchat.class.php"); ?>
<?php include_once("header.php") ?>
<?php
  //$hocviens = Hocvien::list_All_HocVien();
  $allCSVC = Cosovatchat::SelectAllCSVC();
 ?>

 <div class="right_col" role="main">
   <div class="">
     <div class="page-title">
       <div class="title_left">
         <ol class="breadcrumb" >
           <li><a href="index.php"><strong>Trang chủ</strong></a></li>
           <li class="active">Danh sách Cơ sở vật chất.</li>
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
               <h2>Danh sách cơ sở vật chất</h2>
               <br/>
               <div class="clearfix"></div>
             </div>

               <div class="clearfix"></div>
               <div class="ss-box" id="result">
                 <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 160px;">STT</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 160px;">Loại CSVC</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 261px;">Tên vật chất</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 118px;">Giá mua</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 59px;">Địa chỉ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $soluong = 0; ?>
                        <?php foreach ($allCSVC as $key => $itemCSVC): ?>
                          <?php
                          $idLoai = $itemCSVC['IDLoai'];
                            $soluong++;
                            $nameclass = "";
                            if($soluong % 2 == 0){
                              $nameclass= "odd";
                            }
                            else {
                              $nameclass= "even";
                            }

                            $loaiCSVC = Loaicosovatchat::SelectAllLoaiCSVCByIdLoai($idLoai);
                           ?>
                          <tr role="row" class="<?php echo $nameclass; ?>">
                              <td class="sorting_1"><?php echo $soluong; ?></td>
                              <?php foreach ($loaiCSVC as $key => $itemloai): ?>
                                <td><?php echo $itemloai['TenLoai']; ?></td>
                              <?php endforeach; ?>
                              <td><?php echo $itemCSVC['TenVatChat']; ?></td>
                              <td><?php echo $itemCSVC['GiaMua']; ?></td>
                              <td><?php echo $itemCSVC['DiaChiMua']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
               </div>
             </div>
           </div>
         </div>
       </div>

     </div>
   </div>
 </div>
<?php include_once("footer.php"); ?>
