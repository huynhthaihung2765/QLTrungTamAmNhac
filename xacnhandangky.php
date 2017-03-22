<?php include_once("entities/hocvien.class.php"); ?>
<?php include_once("entities/phieudangky.class.php"); ?>
<?php include_once("entities/lophoc.class.php"); ?>
<?php include_once("entities/chitiet_PDK_LopHoc.class.php"); ?>

<?php
session_start();
//Huy 1 session unset($_SESSION['Name'])
//kiểm tra ton tai 2 random string cua URL va session
  if (isset($_GET["rds"]) && isset($_SESSION['random'])) {
    $xnrds = $_GET["rds"];
    $sessionRandom = $_SESSION['random'];
    //kiểm tra random string URL và random string  cua session
    if($xnrds == $sessionRandom){
      //kiem tra su ton tai cua cac id lop hoc URL
      if(isset($_GET["idpdk"]) && isset($_GET["idmh"]) && isset($_GET["idcd"]) && isset($_GET["idlh"]) && isset($_GET["idgv"])){
        $xnidpdk = $_GET["idpdk"];
        $xnidmh = $_GET["idmh"];
        $xnidcd = $_GET["idcd"];
        $xnidlh = $_GET["idlh"];
        $xnidgv = $_GET["idgv"];
      }
    }
    else {
      header("Location: 404.php");
    }
  }
  else {
    header("Location: 404.php");
  }
 ?>

 <?php
 if (isset($_POST["btnSubmit"])){
   $idlophoc = $_POST["txtidLop"];
   $datenow = date('Y-m-d H:i:s');
   $countChiTietPhieuDangKy = ChiTiet_PDK_LH::Count_ChiTiet_PDK();
   $lastChiTietPhieuDangKy = ChiTiet_PDK_LH::Get_Last_ChiTiet_PDK();
   $idCTPDKnext = 0;
   foreach ($countChiTietPhieuDangKy as $key => $itemCountCTPDK) {
     $soLuongChiTietPhieuDangKy = $itemCountCTPDK['soluongchitietphieudangky'];
     if($soLuongChiTietPhieuDangKy == 0){
       $idCTPDKnext = 1;
     }
     else {
       foreach ($lastChiTietPhieuDangKy as $key => $itemLastCTPDK) {
         $lastIDChiTietPhieuDangKy = $itemLastCTPDK['IDChiTiet_PDK_LH'];
         $idCTPDKnext = intval($lastIDChiTietPhieuDangKy) + 1;
       }
     }
   }
   $newctPDK = new ChiTiet_PDK_LH($idCTPDKnext, $xnidpdk, $idlophoc, null, null, 'true');
   $insertPHK = $newctPDK->insert();
   /*xacnhandangky.php?rds=<?php echo $randomString; ?>&idpdk=<?php echo $idphieudangky;?>&idmh=<?php echo $idMonHoc; ?>&idcd=<?php echo $idCapDo; ?>&idlh=<?php echo $idLichHoc; ?>&idgv=<?php echo $idGiaoVien; ?>*/

   if(!$insertPHK){
     header("location: xacnhandangky.php?fail&rds=$xnrds&idpdk=$xnidpdk&idmh=$xnidmh&idcd=$xnidcd&idlh=$xnidlh&idgv=$xnidgv");
   }
   else {
     header("location: xacnhandangky.php?inserted&rds=$xnrds&idpdk=$xnidpdk&idmh=$xnidmh&idcd=$xnidcd&idlh=$xnidlh&idgv=$xnidgv");
   }
 }
  ?>

<?php include_once("header.php") ?>

<?php

  $aLopHoc = LopHoc::Get_A_Lop($xnidmh, $xnidcd, $xnidlh, $xnidgv);
  $aHocVien = HocVien::Get_A_HV_By_PDK($xnidpdk);
?>

<div class="right_col" role="main">
  <div class="">

    <div class="page-title">
      <div class="title_left">
        <ol class="breadcrumb" >
          <li><a href="index.php"><strong>Trang chủ</strong></a></li>
          <li class="active">Xác nhận đăng ký</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <!--<div class="col-md-6 col-xs-12 "> </div>-->
        <div class="x_panel">
          <div class="x_title">
            <h2>XÁC NHẬN ĐĂNG KÝ</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <?php
              if (isset($_GET["inserted"])){
                echo "<h2>Đăng ký thành công</h2>";
              }
              if(isset($_GET["fail"])) {
                echo "<h2>Học viên này đã đăng ký lớp này, và đang đọc</h2>";
              }
            ?>

            <div class="row">
              <?php foreach ($aLopHoc as $key => $itemGiaoVien){ ?>
                <?php
                //Giáo viên
                  $hoTenGiaoVien = $itemGiaoVien['HoTenGV'];
                  $hinhAnhGiaoVien = $itemGiaoVien['HinhAnhGV'];
                  $bangcap = $itemGiaoVien['BangCap'];
                  $sdt = $itemGiaoVien['SDT'];
                  $email = $itemGiaoVien['Email'];

                  //Mon hoc
                  $tenMonHoc = $itemGiaoVien['TenMonHoc'];
                  $vietTacMonHoc = $itemGiaoVien['VietTac'];
                  $hinhAnhMonHoc = $itemGiaoVien['HinhAnh'];
                  $tenCapDo = $itemGiaoVien['TenCapDo'];
                  $buoiHoc = $itemGiaoVien['BuoiTrongNgay'];
                  $ngayHoc = $itemGiaoVien['NgayTrongTuan'];
                  $hocPhi = $itemGiaoVien['HocPhi'];
                ?>
                <!--Hoc vien-->
                <div class="col-xs-6 col-sm-4">
                  <h2>HỌC VIÊN</h2>
                  <?php foreach ($aHocVien as $key => $itemHocVien){ ?>
                    <?php
                      $hoTenHocVien = $itemHocVien['HoTenHocVien'];
                      $diaChiHocVien = $itemHocVien['NoiOHienTai'];
                      $hinhAnhHocVien = $itemHocVien['HinhAnhHV'];
                      $soDienThoaiHocVien = $itemHocVien['SDT'];
                    ?>
                    <div class="col-sm-12">
                      <h4 class="brief"><i><?php echo $hoTenHocVien; ?></i></h4>
                      <div class="left col-xs-7">
                        <h2></h2>
                        <p><strong>Thành tích: </strong> Học bổng toàn phần trong các khóa. </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Địa chỉ: <?php echo $diaChiHocVien; ?></li>
                          <li><i class="fa fa-phone"></i> SDT: <?php echo $soDienThoaiHocVien; ?></li>
                        </ul>
                      </div>
                      <div class="right col-xs-5 text-center">
                        <img src="<?php echo $hinhAnhHocVien; ?>" alt="" class="img-circle img-responsive">
                      </div>
                    </div>
                  <?php }?>
                </div>
                <!--Giao vien-->
                <div class="col-xs-6 col-sm-4">
                  <h2>GIÁO VIÊN</h2>
                  <div class="col-sm-12">
                    <h4 class="brief"><i><?php echo $hoTenGiaoVien; ?></i></h4>
                    <div class="left col-xs-7">
                      <h2></h2>
                      <p><strong>Bằng cấp: </strong> <?php echo $bangcap; ?> </p>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-building"></i> email: <?php echo $email; ?></li>
                        <li><i class="fa fa-phone"></i> SDT: <?php echo $sdt; ?></li>
                      </ul>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <img src="public\images\GiaoVien\<?php echo $hinhAnhGiaoVien; ?>" alt="" class="img-circle img-responsive">
                    </div>
                  </div>
                </div>

                <div class="clearfix visible-xs-block"></div>
                <!--Lop hoc-->
                <div class="col-xs-6 col-sm-4">
                  <h2>LỚP HỌC</h2>
                  <div class="">
                    <div class="pricing">
                      <div class="title" style="height: 200px;">
                        <img style="width: 100%; height: 100%; display: block;" src="public/images/VatLieu/<?php echo $vietTacMonHoc; ?>/<?php echo $hinhAnhMonHoc; ?>" alt="image" />
                      </div>
                      <div class="x_content">
                        <div class="">
                          <div class="pricing_features">
                            <ul class="list-unstyled text-left">
                              <li><i class="fa fa-check text-success"></i> <strong>Môn học: </strong><?php echo $tenMonHoc; ?></li>
                              <li><i class="fa fa-check text-success"></i> <strong>Cấp độ: </strong><?php echo $tenCapDo; ?></li>
                              <li><i class="fa fa-check text-success"></i> <strong>Buổi học: </strong><?php echo $buoiHoc; ?></li>
                              <li><i class="fa fa-check text-success"></i> <strong>Ngày học: </strong><?php echo $ngayHoc; ?></li>
                              <li><i class="fa fa-check text-success"></i> <strong>Giáo viên </strong><?php echo $hoTenGiaoVien; ?></li>
                              <li><i class="fa fa-check text-success"></i> <strong>Học phí: </strong><?php echo $hocPhi; ?> (VND)</li>
                            </ul>
                          </div>
                        </div>
                        <div class="pricing_footer">
                          <form class="form-horizontal form-label-left"  method="post">
                            <?php $idlop = $itemGiaoVien['IDLopHoc']; ?>
                            <input type="hidden" name="txtidLop" value="<?php echo $idlop; ?>" >
                            <button type="submit" class="btn btn-success" name="btnSubmit">Đăng ký</button>
                          </form> 
                          <!--
                          <a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Đăng ký</a>
                          <p>
                            <a href="javascript:void(0);">Sign up</a>
                          </p>-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <br/>
            <hr/>
            <hr/>
            <h2>random url: <?php echo $xnrds; ?></h2>
            <h2>random trước : <?php echo $sessionRandom; ?></h2>
            <h2>id phieu dang ky : <?php echo $xnidpdk ?> </h2>
            <h2>id mon hoc: <?php echo $xnidmh ?> </h2>
            <h2>id cap do: <?php echo $xnidcd ?> </h2>
            <h2>id lich hoc: <?php echo $xnidlh ?> </h2>
            <h2>id giao vien: <?php echo $xnidgv ?> </h2>
          </div>
        </div>
      </div>
  </div>
</div>
</div>

<?php include_once("footer.php"); ?>
