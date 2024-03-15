<?php
class BaseModel
{
    protected $table;
    protected $view;
    protected $insert;
    protected $viewJoin;
    protected $update;
    protected $idTable; 
    protected $fieldTable;
    protected function get_connection() // kết nối csdl
    {
        $HOSTNAME = 'localhost';
        $USERNAME = 'root';
        $PASSWORD = '123456789';
        $DATABASE = 'team_2_shop';
        $PORT = '3306';

        try {
            $conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }
            return $conn;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
    protected function find_all($key)
    {
        $response = null;
        $conn = $this->get_connection();
        try {
            $stm = $conn->prepare("SELECT * FROM  {$this->viewJoin} {$key}");
            $test="SELECT * FROM  {$this->viewJoin} {$key}";
            if ($stm->execute() && !$stm->errno) {
                $result = $stm->get_result();
                $data = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                    $response = $data;
                    $stm->close();
                    $conn->close();
                    return $response;
                }
            } else {
                throw new mysqli_sql_exception("Statement error: " . $stm->error);
            }
        } catch (mysqli_sql_exception $e) {
            echo ("Error: test $test" . $e->getMessage());
        }
        $stm->close();
        $conn->close();
        return $response;
    }

    protected function find_by_id($id)
    {
        $response = null;
        $conn = $this->get_connection();
        try {
            $stm = $conn->prepare("SELECT * FROM  {$this->viewJoin} WHERE {$this->idTable} = ?");
            $stm->bind_param('i', $id);
            if ($stm->execute() && !$stm->errno) {
                $result = $stm->get_result();
                if ($result->num_rows > 0) {
                    $response = $result->fetch_assoc();
                    $stm->close();
                    $conn->close();
                    return $response;
                };
            } else {
                throw new mysqli_sql_exception("Statement error: " . $stm->error);
            }
        } catch (mysqli_sql_exception $e) {
            echo ("Error: " . $e->getMessage());
        }
        $stm->close();
        $conn->close();
        return $response;
    }

    protected function save($data)
    {
        $conn = $this->get_connection();
        try {
            $stm = $conn->prepare("Insert into $this->table (" . implode(",", $this->insert) . ") values ( {$data} )");
            $test="Insert into $this->table (" . implode(",", $this->insert) . ") values ( {$data} )";
            if (!$stm->execute() || $stm->errno) {
                throw new mysqli_sql_exception("Statement error: " . $stm->error);
            } else {
                $stm->close();
                $conn->close();
                return true;
            }
        } catch (mysqli_sql_exception $e) {
            echo ("Error: loi gi". var_dump($test) . $e->getMessage());
            $stm->close();
            $conn->close();
            return true;
        }
    }

    protected function delete($id)
    {
        $conn = $this->get_connection();
        try {
            $stm = $conn->prepare("Delete from $this->table where $this->idTable = ?");
            $stm->bind_param('i', $id);
            if (!$stm->execute() || $stm->errno) {
                throw new mysqli_sql_exception("Statement error: " . $stm->error);
            } else {
                $stm->close();
                $conn->close();
                return true;
            }
        } catch (mysqli_sql_exception $e) {
            echo ("Error: " . $e->getMessage());
            $stm->close();
            $conn->close();
            return false;
        }
    }

    protected function delete_soft($id)
    {
        $conn = $this->get_connection();
        try {
            $stm = $conn->prepare("update $this->table set is_deleted = true where $this->idTable = ?");
            $stm->bind_param('i', $id);
            if (!$stm->execute() || $stm->errno) {
                throw new mysqli_sql_exception("Statement error: " . $stm->error);
            } else {
                $stm->close();
                $conn->close();
                return true;
            }
        } catch (mysqli_sql_exception $e) {
            echo ("Error: " . $e->getMessage());
            $stm->close();
            $conn->close();
            return false;
        }
    }

    protected function update($data, $id)
    {
        $conn = $this->get_connection();
        try {
            $strSet = 'set ';
            foreach ($data as $key => $value) {
                if (is_string($value)) {
                    $strSet .= $key . "='" . $value . "',";
                } else 
                $strSet .= $key . "=" . $value . ",";
            }
       
            $strSet = rtrim($strSet, ",");
            $stm = $conn->prepare("update $this->table {$strSet} where $this->idTable = ?");
            $stm->bind_param('i', $id);
            if (!$stm->execute() || $stm->errno) {
                throw new mysqli_sql_exception("Statement error: " . $stm->error);
            } else {
                $stm->close();
                $conn->close();
                return true;
            }
        } catch (mysqli_sql_exception $e) {
            echo ("Error: " . $e->getMessage());
            $stm->close();
            $conn->close();
            return false;
        }
    }

    public function navtive_query($query)
    {
        $response = null;
        $conn = $this->get_connection();
        try {
            $stm = $conn->prepare("{$query}");
            if ($stm->execute() && !$stm->errno) {
                $result = $stm->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                    $response = $data;
                    $stm->close();
                    $conn->close();
                    return $response;
                }
            } else {
                throw new mysqli_sql_exception("Statement error: " . $stm->error);
            }
        } catch (mysqli_sql_exception $e) {
            echo ("Error: ne $query" . $e->getMessage());
        }
        $stm->close();
        $conn->close();
        return $response;
    }

    

}
