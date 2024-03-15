<?php
// include("BaseModel.php");
class OrderModel extends BaseModel
{
    var $table = '`order`';
    var $idTable = 'order_id';
    var $viewJoin = 'view_order';
    var $insert = ['customer_id', 'full_name', 'phone_number', 'address', 'value_order', 'order_status_price'];
    public function __construct()
    {
    }

    public function get_data($key)
    {
        $result = $this->find_all($key);
        return $result;
    }
    public function count_data($key)
    {
        return $this->get_data($key) != null ? count($this->get_data($key)) : 0;
    }
    public function count_data1()
    {
        return  count($this->navtive_query("select *from `order`"));
    }
    public function get_by_id($id)
    {
        return $this->find_by_id($id);
    }

    public function save_data($data)
    {
        $value = $data['customer_id'] . ",'" . $data['full_name'] . "','" . $data['phone_number'] . "','" . $data['address'] . "'," . $data['value_order'] . "," . $data['order_status_price'];
        return $this->save($value);
    }



    public function update_data($data, $id)
    {
        return $this->update($data, $id);
    }
    public function delete_data($id)
    {
        return $this->delete_soft($id);
    }
 
}
