<?php 
// include("BaseModel.php");
class AdminModel extends BaseModel{
    var $idTable = 'admin_id';
    var $table='admin';
    public function get_data($key){
        return $this->find_all($key);
    }
    public function get_by_id($id)
    {
        return $this->find_by_id($id);
    }
    public function count_data($key){
        return $this->get_data($key) != null ? count($this->get_data($key)) : 0;
    }
    public function get_by_username($username){
        $response = null;
        $conn = $this->get_connection();
        
        try {
            $stm = $conn->prepare("SELECT * FROM  {$this->table} WHERE name = ?");
            $stm->bind_param('s', $username);
            if ($stm->execute() && !$stm->errno) {
                $result = $stm->get_result();
                if ($result->num_rows > 0) {
                    $response = $result->fetch_assoc();
                }
            } else {
                throw new mysqli_sql_exception("Statement error: " . $stm->error);
            }
        } catch (mysqli_sql_exception $e) {
            echo ("Error: " . $e->getMessage());
        }
        // $stm->close();
        $conn->close();
        return $response;
    }
}

