<?php
namespace App\Models;
use PDO;
use PDOException;
class DatabaseModel{
  private $dbhost=DB_HOST;
  private $dbname=DB_NAME;
  private $dbuser=DB_USER;
  private $dbpass=DB_PASS;
 private $conn;
 
  private $stmt;
  function __construct(){
    try {
      $this->conn = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname, $this->dbuser, $this->dbpass);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1); 
    try{  // Mã cần thử nghiệm
        
        $this->stmt = $this->conn->prepare($sql); //chuẩn bị
        $this->stmt->execute($sql_args); //thực thi câu lệnh SQL
    }
    catch(PDOException $e){ // Xử lý nếu try sai 
        throw $e;
    }
    finally{ // Mã luôn được thực thi
        unset($conn); // đảm bảo rằng kết nối đến cơ sở dữ liệu sẽ được đóng, ngay cả khi có lỗi xảy ra.
    }
    /*
    func_get_args() để lấy danh sách tất cả các tham số được truyền vào hàm
    array_slice(..., 1) được sử dụng để tạo một mảng mới bắt đầu từ phần tử thứ hai của mảng trả về bởi func_get_args(). Nói cách khác, nó loại bỏ phần tử đầu tiên của mảng, tức là $sql, và giữ lại các phần tử còn lại.

    */
}
  function pdo_last_insert_id($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $this->stmt = $this->conn->prepare($sql); // Chuẩn bị câu lệnh SQL
        $this->stmt->execute($sql_args); // Thực thi câu lệnh SQL với các giá trị tham số
        return $this->conn->lastInsertId(); // Trả về ID của bản ghi vừa được chèn
    }
    catch(PDOException $e){ // Xử lý lỗi nếu có
        throw $e;
    }
    finally{ // Đảm bảo đóng kết nối sau khi thực hiện câu lệnh SQL
        unset($conn);
    }
}
  // Function huy ket noi
  // function __destruct(){
  //   unset($this->conn);
  // }
  function get_all($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $this->stmt = $this->conn->prepare($sql); // Chuẩn bị câu lệnh SQL
        $this->stmt->execute($sql_args); // Thực thi câu lệnh SQL với các giá trị tham số
        $rows = $this->stmt->fetchAll(); // Lấy tất cả các hàng kết quả và đặt chúng vào một mảng
        return $rows; // Trả về mảng chứa dữ liệu từ câu lệnh SQL
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

function pdo_insert($sql){
    $sql_args = array_slice(func_get_args(), 1);
    $this->stmt=$this->conn->prepare($sql);
    $this->stmt->execute($sql_args); 
}
  function get_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute($sql_args);
        $row = $this->stmt->fetch(PDO::FETCH_ASSOC); // Lấy một hàng kết quả và đặt chúng vào một mảng liên kết
        return $row; // Trả về mảng liên kết chứa dữ liệu từ câu lệnh SQL
            }
            catch(PDOException $e){
                throw $e;
            }
            finally{
                unset($conn);
            }
        }
        public function execute($sql, $params = []) {
          try {
              $stmt = $this->conn->prepare($sql);
              $stmt->execute($params); // Đảm bảo rằng $params là một mảng
              return $stmt;
          } catch (PDOException $e) {
              die("Error: " . $e->getMessage());
          }
      }
      

      
}


?>