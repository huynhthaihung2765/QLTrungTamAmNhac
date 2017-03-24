<?php require_once 'config/db.class.php';
/**
* 
*/
class User 
{
	public $userID;
	public $userName;
	public $passWord;
	
	public function __construct($userName, $passWord)
	{
		# code...
		$this->userName = $userName;
		$this->passWord = $passWord;
	}

	public function inserUser ()
	{
		$db = new Db();
		$sql = "INSERT INTO taikhoan (TenTaiKhoan, MatKhau) VALUES ('".mysqli_real_escape_string($db->connect(), 
			$this->userName)."','".md5(mysqli_real_escape_string($db->connect(), 
			$this->passWord))."')";
		$result = $db->query_execute($sql);
		return $result;
	}
	public function checkLogin($username, $password)
	{
		$password = md5($password);
		$db = new Db();
		$sql = "SELECT * FROM taikhoan WHERE TenTaiKhoan='$username' AND MatKhau='$password'";
		$result = $db->query_execute($sql);
		return $result;	
	}
}

 ?>