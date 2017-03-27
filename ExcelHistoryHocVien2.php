
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



//luu cac thong tin vao file excel
require_once 'entities/PHPExcel.php';
$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Tên')
->setCellValue('B1', 'Email')
->setCellValue('C1', 'Số điện thoại');

//set gia tri cho cac cot du lieu
$i = 2;
foreach ($lichSuHocCuaHocVien as $row)
{
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$i, $row['TenMonHoc'])
->setCellValue('B'.$i, $row['TenCapDo'])
->setCellValue('C'.$i, $row['HoTenGV']);
$i++;
}
//ghi du lieu vao file,định dạng file excel 2007
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = 'data.xls';//duong dan file
$objWriter->save($full_path);
 ?>
