<?php 
// include("BaseModel.php");
class ProductModel extends BaseModel{
    var $table = 'product';
    var $idTable='product_id';
    var $viewJoin='view_product';
    var $insert=['name','description','img','price','quantity'];


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
    public function get_by_id($id)
    {
        return $this->find_by_id($id);
    }

    public function save_data($data)
    {
        $value = "'" . $data['name'] . "','" . $data['description'] . "','" . $data['img'] . "'," . $data['price'] . "," . $data['quantity'];
        return $this->save($value);
    }



    public function update_data($data, $id)
    {
        return $this->update($data, $id);
    }
    public function delete_data($id) {
        return $this->delete_soft($id);
    }
    public function get_quantity($product_id)
    {
        return $this->navtive_query("SELECT * FROM `product` WHERE `product_id` = $product_id AND `is_deleted`=false");
    }

}
