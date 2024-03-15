<?php
// include("BaseModel.php");

class OrderDetailModel extends BaseModel
{


    var $table = '`order_detail`';
    var $idTable = 'order_detail_id';
    var $viewJoin = 'view_order_detail';
    var $insert = ['order_id', 'product_id', 'price', 'quantity', 'value'];
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
    public function get_by_id($id)
    {
        return $this->find_by_id($id);
    }

    public function save_data($data)
    {
        $value = $data['order_id'] . "," . $data['product_id'] . "," . $data['price'] . "," . $data['quantity'] . "," . $data['value'] ;
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
// $t=new OrderDetailModel();
// echo json_encode($t->get_data(''));