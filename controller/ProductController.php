<?php
class ProductController extends BaseController
{

    const PATH_IMG_PRODUCT = 'view/upload/product/';
    public function product_page()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'product'
            );
        } else $this->render_error('400');
    }
    public function product_page_ad()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'product'
            );
        } else $this->render_error('400');
    }
    public function add_product_admin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'add-product-admin'
            );
        } else $this->render_error('400');
    }
    public function update_product_admin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'update-product-admin'
            );
        } else $this->render_error('400');
    }
    public function product_detail_page()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'product-detail'
            );
        } else $this->render_error('400');
    }



    public function data_product()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $key = '';
                $limit = 0;
                $offset = 0;
                $productModel = $this->get_model('product');
                if (isset($_GET['product_name']) and $_GET['product_name'] != '') {
                    $key .= "name like '%" . $_GET['product_name'] . "%'";
                }

                if (isset($_GET['categoryProduct']) and $_GET['categoryProduct'] != '') {
                    if ($key != '') {
                        $key .= ' and ';
                    }
                    $key .= " category_product_id = " . $_GET['categoryService'];
                }



                if ($key != '') $key = "where " . $key;

                $count = $productModel->count_data($key);
                if ($count > 0) {
                    if (isset($_GET['limit']) and $_GET['limit'] != '') {
                        $key .= " order by product_id DESC ";
                        $limit = $_GET['limit'];
                        if ($limit > 0) {
                            $key .= " limit " . $limit;
                            if (isset($_GET['index']) and $_GET['index'] != '') {
                                $index = $_GET['index'];
                                if ($index > 1) {
                                    $offset = ($index - 1) * $limit;
                                }
                                if ($offset > 0) {
                                    $key .= " offset " . $offset;
                                }
                            }
                        }
                    }
                    $product = $productModel->get_data($key);
                    if ($product != null) {
                        $responseCode = ResponseCode::SUCCESS;
                        $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "sản phẩm", "thành công.");
                        $data = [
                            'product' => $product,
                            'count' => $count
                        ];
                    } else {
                        $responseCode = ResponseCode::DATA_EMPTY;
                        $message = "SERV: " . sprintf(ResponseMessage::DATA_EMPTY_MESSAGE, "sản phẩm");
                    }
                } else {
                    $responseCode = ResponseCode::DATA_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::DATA_EMPTY_MESSAGE, "sản phẩm");
                }
            } else {
                $responseCode = ResponseCode::REQUEST_INVALID;
                $message = "SERV: " . sprintf(ResponseMessage::REQUEST_INVALID_MESSAGE);
            }
        } catch (Exception $e) {
            $responseCode = ResponseCode::UNKNOWN_ERROR;
            $message = "SERV: " . $e->getMessage();
        }
        $this->response($responseCode, $message, $data);
    }

    public function product_detail()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $productModel = $this->get_model('product');
                if (isset($_GET['id']) and $_GET['id'] != '') {
                   $product=$productModel->get_by_id($_GET['id']);
                   if($product!=null){
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "sản phẩm", "thành công.");
                    $data = [
                        'product' => $product,
                       
                    ];
                   }else{
                    $responseCode = ResponseCode::DATA_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::DATA_EMPTY_MESSAGE, "sản phẩm");
                   }
                }else{
                    $responseCode = ResponseCode::DATA_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::DATA_EMPTY_MESSAGE, "sản phẩm");
                }
                
            }else{
                $responseCode = ResponseCode::REQUEST_INVALID;
                $message = "SERV: " . sprintf(ResponseMessage::REQUEST_INVALID_MESSAGE);
            }
        } catch (Exception $e) {
            $responseCode = ResponseCode::UNKNOWN_ERROR;
            $message = "SERV: " . $e->getMessage();
        }
        $this->response($responseCode, $message, $data);
    }

    public function product_add()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $productModel = $this->get_model('product');
                if (isset($_POST['add-product-name']) && $_POST['add-product-name'] != '' && isset($_POST['add-product-description']) && $_POST['add-product-description'] != '' && isset($_POST['add-product-price']) && $_POST['add-product-price'] != '' && isset($_POST['add-product-quantity']) && $_POST['add-product-quantity'] != '' && isset($_FILES["add-product-img"]) && $_FILES["add-product-img"]["name"] != '') {
                    $img = $_FILES["add-product-img"];
                    if ($this->save_img(ProductController::PATH_IMG_PRODUCT, $img)) {
                        $dataProduct = [
                            'name' => htmlspecialchars($_POST['add-product-name']),
                            'description' => htmlspecialchars($_POST['add-product-description']),
                            'img' => ProductController::PATH_IMG_PRODUCT . $img['name'],
                            'price' => $_POST['add-product-price'],
                            
                            'quantity' => $_POST['add-product-quantity'],
                          
                        ];
                        if($productModel->save_data($dataProduct)){
                            $responseCode = ResponseCode::SUCCESS;
                            $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "sản phẩm", "thành công");
                        }else{
                            $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "sản phẩm", "thất bại");
                        }
                        
                    }else{
                        $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "ảnh sản phẩm", "thất bại");
                    }
                }else{
                    $responseCode = ResponseCode::INPUT_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::INPUT_EMPTY_MESSAGE, "sản phẩm");
                }
                
            }else{
                $responseCode = ResponseCode::REQUEST_INVALID;
                $message = "SERV: " . sprintf(ResponseMessage::REQUEST_INVALID_MESSAGE);
            }
        } catch (Exception $e) {
            $responseCode = ResponseCode::UNKNOWN_ERROR;
            $message = "SERV: " . $e->getMessage();
        }
        $this->response($responseCode, $message, $data);
    }

    public function product_update()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $productModel = $this->get_model('product');
                if (isset($_POST['update-product-name']) && $_POST['update-product-name'] != '' && isset($_POST['update-product-description']) && $_POST['update-product-description'] != '' && isset($_POST['update-product-price']) && $_POST['update-product-price'] != '' && isset($_POST['update-product-quantity']) && $_POST['update-product-quantity'] != '' && isset($_FILES["update-product-img"]) && $_FILES["update-product-img"]["name"] != '') {
                    $img = $_FILES["update-product-img"];
                    $id=$_POST['id'];
                    if ($this->save_img(ProductController::PATH_IMG_PRODUCT, $img)) {
                        $dataProduct = [
                            'name' => htmlspecialchars($_POST['update-product-name']),
                            'description' => htmlspecialchars($_POST['update-product-description']),
                            'img' => ProductController::PATH_IMG_PRODUCT . $img['name'],
                            'price' => $_POST['update-product-price'],                       
                            'quantity' => $_POST['update-product-quantity'],                         
                        ];
                        if($productModel->update_data($dataProduct,$id)){                           
                            $responseCode = ResponseCode::SUCCESS;
                            $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "sản phẩm", "thành công");
                        }else{
                            $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "sản phẩm", "thất bại");
                        }
                        
                    }else{
                        $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "ảnh sản phẩm", "thất bại");
                    }
                }else{
                    $responseCode = ResponseCode::INPUT_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::INPUT_EMPTY_MESSAGE, "sản phẩm");
                }
                
            }else{
                $responseCode = ResponseCode::REQUEST_INVALID;
                $message = "SERV: " . sprintf(ResponseMessage::REQUEST_INVALID_MESSAGE);
            }
        } catch (Exception $e) {
            $responseCode = ResponseCode::UNKNOWN_ERROR;
            $message = "SERV: " . $e->getMessage();
        }
        $this->response($responseCode, $message, $data);
    }
    public function delete_product(){
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['product_id']) && $_POST['product_id'] != '') {
                $productModel = $this->get_model('product');
                    $product = $productModel->get_by_id($_POST['product_id']);
                    if($product!=null){
                        if ($productModel->delete_data($_POST['product_id'])) {
                            $responseCode = ResponseCode::SUCCESS;
                            $message = "SERV: " . sprintf(ResponseMessage::DELETE_MESSAGE, "sản phẩm", "thành công");
                        } else {
                            $message = "SERV: " . sprintf(ResponseMessage::DELETE_MESSAGE, "sản phẩm", "thất bại");
                        }
                    }
                }else{
                    $responseCode = ResponseCode::INPUT_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::INPUT_EMPTY_MESSAGE, "sản phẩm");
                }
                
            }else{
                $responseCode = ResponseCode::REQUEST_INVALID;
                $message = "SERV: " . sprintf(ResponseMessage::REQUEST_INVALID_MESSAGE);
            }
        } catch (Exception $e) {
            $responseCode = ResponseCode::UNKNOWN_ERROR;
            $message = "SERV: " . $e->getMessage();
        }
        $this->response($responseCode, $message, $data);
    }
    
}
