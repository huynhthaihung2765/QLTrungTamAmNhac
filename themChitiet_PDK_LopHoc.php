<?php include_once("entities/hocvien.class.php"); ?>
<?php include_once("entities/monhoc.class.php"); ?>
<?php include_once("entities/capdo.class.php"); ?>
<?php include_once("entities/lichhoc.class.php"); ?>
<?php include_once("entities/giaovien.class.php"); ?>
<?php
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} ?>
<?php
  if(!isset($_GET["idpdk"]))
  {
     header("Location: 404.php");
  }else {
    $idphieudangky = $_GET["idpdk"];
    session_start();
    //Lấy 1 chuỗi ký tự bất kỳ 20 phần tử
    $randomString = generateRandomString(20);
    //Tạo 1 biến session chứa random string khi trang này dc gọi
    $_SESSION['random'] = $randomString;
  }
 ?>
<?php include_once("header.php") ?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <ol class="breadcrumb" >
          <li><a href="index.php"><strong>Trang chủ</strong></a></li>
          <li class="active">Danh sách lớp học</li>
        </ol>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Tìm kiếm...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Tìm!</button>
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
            <h2>Trung tâm hiện đang còn trống các lớp:</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php $allMonHocHasInLopHoc = MonHoc::Get_All_MonHoc_HasIn_LopHoc(); ?>
            <?php foreach ($allMonHocHasInLopHoc as $key => $itemMonHoc){ ?>
              <div class="row">
                <h4><strong>Lớp học: <?php echo $itemMonHoc['TenMonHoc']; ?></strong></h4>
                <?php $idMonHoc = $itemMonHoc['IDMonHoc']; ?>
                <?php $vietTacMonHoc = $itemMonHoc['VietTac']; ?>
                <?php $hinhAnhMonHoc = $itemMonHoc['HinhAnh']; ?>
                <?php $allCapDoHasInLopHoc = CapDo::Get_All_Capo_HasIn_LopHoc($idMonHoc); ?>

                <?php foreach ($allCapDoHasInLopHoc as $key => $itemCapDo){?>
                  <?php $idCapDo = $itemCapDo['IDCapDo']; ?>
                  <!--Them button load Model-->
                  <div class="col-md-55">
                    <div class="thumbnail">
                      <div class="image view view-first">
                        <img style="width: 100%; display: block;" src="public/images/VatLieu/<?php echo $vietTacMonHoc; ?>/<?php echo $hinhAnhMonHoc; ?>" alt="image" />
                        <div class="mask">
                          <p>Your Text</p>
                          <div class="tools tools-bottom">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $idMonHoc.$idCapDo; ?>"><i class="fa fa-link"></i></button>
                            <a href="#"><i class="fa fa-pencil"></i></a>
                            <a href="#"><i class="fa fa-times"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="caption">
                        <p>Môn học: <?php echo $itemMonHoc['TenMonHoc']; ?></p>
                        <p>Cấp độ: <?php echo $itemCapDo['TenCapDo']; ?></p>
                      </div>
                    </div>
                  </div>
                  <!--Them button load Model-->
                  <div class="modal fade" id="<?php echo $idMonHoc.$idCapDo; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog " role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Lớp <?php echo $itemMonHoc['TenMonHoc']; ?>: <?php echo $itemCapDo['TenCapDo']; ?></h4>
                        </div>
                        <div class="modal-body">

                          <?php $allLichHocHasInLopHoc = LichHoc::Get_All_BuoiHoc_HasIn_LopHoc($idMonHoc, $idCapDo); ?>
                          <!--Loc theo Lich-->
                          <?php foreach ($allLichHocHasInLopHoc as $key => $itemLichHoc){ ?>
                            <?php $idLichHoc = $itemLichHoc['IDLichHoc']; ?>
                            <div class="x_panel">
                              <div class="x_title">
                                <h2><?php echo $itemLichHoc['BuoiTrongNgay']; ?></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">

                                <?php $allGiaoVienHasInLopHoc = GiaoVien::Get_All_GiaoVien_HasIn_LopHoc($idMonHoc, $idCapDo, $idLichHoc);?>
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>STT</th>
                                        <th style="width: 55%;">Giáo viên</th>
                                        <th>Lịch trong tuần</th>
                                        <th>Đăng ký</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $soluong = 0; ?>
                                      <?php foreach ($allGiaoVienHasInLopHoc as $key => $itemGiaoVien){ ?>
                                        <?php $idGiaoVien = $itemGiaoVien['IDGiaoVien']; ?>
                                        <?php $hinhAnhGiaoVien = $itemGiaoVien['HinhAnhGV']; ?>
                                        <?php $soluong++; ?>
                                        <tr>
                                          <td><?php echo $soluong; ?></td>
                                          <td>
                                            <ul class="list-unstyled msg_list">
                                              <li>
                                                <a>
                                                  <span class="image">
                                                    <img src="public/images/GiaoVien/<?php echo $hinhAnhGiaoVien; ?>" alt="<?php echo $hinhAnhGiaoVien; ?>" />
                                                  </span>
                                                  <span>
                                                    <span><?php echo $itemGiaoVien['HoTenGV'] ; ?></span>
                                                  </span>
                                                  <span class="message">
                                                    Bằng cấp: <?php echo $itemGiaoVien['BangCap'] ; ?>.<br />
                                                    SDT: <?php echo $itemGiaoVien['SDT'] ; ?>.
                                                    id: <?php echo $idGiaoVien; ?>
                                                  </span>
                                                </a>
                                              </li>
                                            </ul>
                                          </td>
                                          <td><?php echo $itemLichHoc['NgayTrongTuan'] ; ?></td>
                                          <td>
                                            <a class="btn btn-primary btn-xs" href="xacnhandangky.php?rds=<?php echo $randomString; ?>&idpdk=<?php echo $idphieudangky;?>&idmh=<?php echo $idMonHoc; ?>&idcd=<?php echo $idCapDo; ?>&idlh=<?php echo $idLichHoc; ?>&idgv=<?php echo $idGiaoVien; ?>"><i class="fa fa-user"> </i> Xem thông tin</a>
                                          </td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                  </table>
                                </div>

                              </div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-primary">Đóng</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("footer.php") ?>
