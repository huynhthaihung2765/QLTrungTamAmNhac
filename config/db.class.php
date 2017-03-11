<?php
  /**
  *Lớp xử lý kết nối và truy vấn cớ sở dữ liệu
  */
  class Db
  {
    //Biến kết nối cớ sở dữ liệu
    protected static $connection;
    //Hàm khởi tạo kết nối
    public function connect(){
      //Kiểm tra kết nối tơi CSDL trong trường hợp kết nối chawu dc khởi tạo.
      if (!isset(self::$connection)) {
        //Lấy thông tin kết nối từ tập tin
        $config = parse_ini_file("config.ini");
        self::$connection = new mysqli("localhost", $config["user"], $config["pass"], $config["dbname"]);
      }
      //Xử lý lỗi nếu không kết nối được tới CSDL
      if (self::$connection == false) {
        return false;
      }
      return self::$connection;
    }

    //Hàm thự hiện xử lý câu lệnh truy vấn
    public function query_execute($queryString){
      //Khởi tạo kết nối
      $connection = $this->connect();

      //Set utf8
      $connection->query("SET NAMES utf8");
      //Thực hiện execute truy vấn
      $result = $connection->query($queryString);
      //$connection->close();
      return $result;
    }

    //Hàm trả về một mảng danh sách kết quả
    public function select_to_array($queryString){
      $rows = array();
      $result = $this->query_execute($queryString);
      if ($result == false) {
        return  false;
      }
      //Duyệt mỗi dòng trong kết quả, Lưu vào mảng
      while ($item = $result->fetch_assoc()) {
        $rows[] = $item;
      }
      return $rows;
    }
  }
?>
