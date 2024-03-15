<?php
//include("BaseModel.php");
class CustomerModel extends BaseModel
{

    private $connection;
    var $table = 'customer';
    var $idTable = 'customer_id';
    var $insert = ['full_name', 'user_name', 'phone_number', 'gender', 'password'];
    var $view = 'view_customer';
    var $viewJoin = 'view_customer';

    
    public function __construct()
    {
    
    }

    public function get_data($key)
    {
        $result = $this->find_all($key);
        return $result;
    }
    public function count_data($key){
        return $this->get_data($key) != null ? count($this->get_data($key)) : 0;
    }
    public function get_by_userName($userName)
    {
        $response = null;
        $conn = $this->get_connection();
        //echo $query;
        try {
            $stm = $conn->prepare("SELECT * FROM  {$this->table} WHERE user_name = ?");
            $stm->bind_param('s', $userName);
            if ($stm->execute() && !$stm->errno) {
                $result = $stm->get_result();
                if ($result->num_rows > 0) {
                    $response = $result->fetch_assoc();
                    $stm->close();
                    $conn->close();
                    return $response;
                }
            } else {
                throw new mysqli_sql_exception("Statement error: " . $stm->error);
            }
        } catch (mysqli_sql_exception $e) {
            echo ("Error: " . $e->getMessage());
            $stm->close();
            $conn->close();
            return $response;
        }
    }

    public function get_by_id($id)
    {
        return $this->find_by_id($id);
    }

    public function save_data($data)
    {
        $value = "'" . $data['full_name'] . "','" . $data['user_name'] . "','" . $data['phone_number'] . "','" . $data['gender'] . "','" . $data['password']."'";
        return $this->save($value);
    }

    public function update_data($data, $id)
    {
        return $this->update($data, $id);
    }
}
