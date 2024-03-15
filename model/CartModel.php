<?php
// include("BaseModel.php");
class CartModel extends BaseModel
{

    var $table = 'cart';
    var $idTable = 'cart_id';
    var $viewJoin = 'view_shopping_cart';
    var $insert = ['customer_id', 'product_id', 'quantity'];

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
        $value =  $data['customer_id'] . "," . $data['product_id'] . "," . $data['quantity'];
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
    public function deleted($id)
    {
        return $this->delete($id);
    }
    public function check_product_cart($product_id, $customer_id)
    {
        return $this->navtive_query("SELECT * FROM `cart` WHERE `product_id` = $product_id AND `customer_id` = $customer_id");
    }
    public function get_quantity($product_id, $customer_id)
    {
        return $this->navtive_query("SELECT * FROM `cart` WHERE `product_id` = $product_id AND `customer_id` = $customer_id and `is_deleted`=false");
    }
    public function get_id($product_id, $customer_id)
    {
        return $this->navtive_query("SELECT * FROM `cart` WHERE `product_id` = $product_id AND `customer_id` = $customer_id and `is_deleted`=false");
    }
}
// $t=new CartModel();
// $qun= (($t->get_quantity(1,1)));
// echo '<pre>';
// print_r($qun);
// echo '</pre>';
