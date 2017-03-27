
<?php include_once("entities/hocvien.class.php"); ?>
<?php include_once("entities/phieudangky.class.php"); ?>
<?php include_once("entities/chitiet_PDK_LopHoc.class.php"); ?>
<?php include_once("entities/lophoc.class.php"); ?>
<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>

<?php
function stripUnicode($str){
if(!$str) return false;
 $unicode = array(
    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
    'd'=>'đ',
    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
    'i'=>'í|ì|ỉ|ĩ|ị',
    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
    'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 );
foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
return $str;
}
 ?>

<?php

if(!isset($_GET["idhv"])){
  header('location: 404.php');
} else {
  $idHocVien = $_GET["idhv"];
  $hv = Hocvien::Get_A_HV($idHocVien);
  $phieuDangKy = PhieuDangKy::Get_A_PDK($idHocVien);
  $lichSuHocCuaHocVien = PhieuDangKy::Get_HistoryLearn_ByIDHocVien($idHocVien);
}
$hoTenHocVien = "";
foreach ($hv as $r) {
  $hoTenHocVien = $r['HoTenHocVien'];
  $hoTenHocVien = stripUnicode($hoTenHocVien);
  $hoTenHocVien = str_replace(" ","",$hoTenHocVien);
}
$datenow = date('Y-m-d');
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data23.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<meta charset="utf-8" />
<table>
    <thead>
        <tr>
          <th>STT</th>
          <th>Tên lớp</th>
          <th>Cấp độ</th>
          <th>Giáo viên</th>
          <th>Ngày bắt đầu</th>
          <th>Ngày kết thúc</th>
          <th>Trạng thái học</th>
        </tr>
    </thead>
    <tbody>
      <?php $stt = 0; ?>
        <?php foreach ($lichSuHocCuaHocVien as $row):?>
          <?php
            $stt++;
            $trangThaiHoc = $row['TrangThaiHoc'];
            $stringTrangThaiHoc = "";
            if ($trangThaiHoc == "true"){
              $stringTrangThaiHoc = "Đang học";
            }
            else {
              $stringTrangThaiHoc = "Nghỉ học";
            }
            ?>
        <tr>
            <td><?php echo $stt; ?></td>
            <td><?php echo $row['TenMonHoc']?></td>
            <td><?php echo $row['TenCapDo']?></td>
            <td><?php echo $row['HoTenGV']?></td>
            <td><?php echo $row['NgayBatDauKhoaHoc']?></td>
            <td><?php echo $row['NgayKetThucKhoaHoc']?></td>
            <td><?php echo $stringTrangThaiHoc?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
