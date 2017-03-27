<?php include_once("entities/hocvien.class.php");
if($_POST)
{
  $q=$_POST['search'];
  if ($q != ""){
    $allHVSign = HocVien::Get_A_HV_Sign_ByName($q);
    foreach ($allHVSign as $key => $row) {
      # code...

      $idhocvien = $row['IDHocVien'];
      $username=$row['HoTenHocVien'];
      $email=$row['SDT'];
      $b_username='<strong>'.$q.'</strong>';
      $b_email='<strong>'.$q.'</strong>';
      $final_username = str_ireplace($q, $b_username, $username);
      $final_email = str_ireplace($q, $b_email, $email);
    ?>
      <div class="show" align="left">
        <img src="<?php echo $row['HinhAnhHV']; ?>" style="width:50px; height:50px; float:left; margin-right:6px;" />
        <a href="#<?php echo $idhocvien; ?>"><span class="name"><?php echo $final_username; ?></span></a>&nbsp;<br/>
        <?php echo $final_email; ?>
        <br/>
      </div>
    <?php
    }
  }
  else {
    ?>
    <p>chưa nhập ký tự để tìm...</p>
    <?php
  }
}
?>
