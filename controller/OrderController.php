<?php
class OrderController extends BaseController
{
    public function order_backlog()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'order-backlog'
            );
        } else $this->render_error('400');
    }
    public function order_page_ad()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'order-admin'
            );
        } else $this->render_error('400');
    }
    public function bill_page_ad()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'bill'
            );
        } else $this->render_error('400');
    }
    public function checkout_cmt_page()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'checkout'
            );
        } else $this->render_error('400');
    }
    public function data_UI()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                // $productID = $_SESSION['gio_hang'];
                $userModel = $this->get_model('customer');
                $user = $userModel->get_by_userName($_SESSION['user']);
                $idcmt = $user['customer_id'];
                $cartModel = $this->get_model('cart');
                $test = 0;

                foreach ($_SESSION['gio_hang'] as $id) {

                    $idCart = $cartModel->get_id($id, $idcmt);
                    $idC = (int)$idCart[0]['cart_id'];
                    $temp = $cartModel->get_by_id($idC);
                    $data1[] = $temp;
                }
                $data = $data1;
                if ($data != null) {
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: $test" . sprintf(ResponseMessage::UPDATE_MESSAGE, "giỏ hàng", "thành công");
                } else {
                    $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "giỏ hàng", "thất bại");
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


    public function add_Order()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['order_name']; // tên 
                $number = $_POST['order_number']; // số diện thoại
                $address = $_POST['order_address']; //địa chỉ nhận hàng
                $order_status_price = $_POST['$order_status_price']; // trạng thái đã trả hay chưa
                $userModel = $this->get_model('customer');
                $user = $userModel->get_by_userName($_SESSION['user']);
                $idcmt = $user['customer_id']; // id người dùng
                $cartModel = $this->get_model('cart');
                $productModel = $this->get_model('product');
                $sum_value = 0; // tổng tiền
                foreach ($_SESSION['gio_hang'] as $id) {
                    $product = $productModel->get_by_id($id);
                    $price_product = $product['price']; // lấy giá sản phẩm                    
                    $idCart = $cartModel->get_id($id, $idcmt);
                    $idC = (int)$idCart[0]['cart_id'];
                    $temp = $cartModel->get_by_id($idC);
                    $quantity_cart = $temp['cart_quantity'];
                    $sum_value += $price_product * $quantity_cart;
                }
                $data = [
                    'customer_id' => $idcmt,
                    'full_name' => $name,
                    'phone_number' => $number,
                    'address' => $address,
                    'value_order' => $sum_value,
                    'order_status_price' => $order_status_price,
                ];
                $order_model = $this->get_model('order');
                if ($order_model->save_data($data)) {
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "đơn hàng phẩm", "thành công");
                    // xử lý phẩn thêm chi tiết đơn hàng

                    $coutID = $order_model->count_data1();
                    $orderDetailModel = $this->get_model('OrderDetail');
                    // $product_updateModel=$this->get_model('product');
                    foreach ($_SESSION['gio_hang'] as $id) {
                        $product = $productModel->get_by_id($id);
                        $price_product = $product['price']; // lấy giá sản phẩm                    
                        $idCart = $cartModel->get_id($id, $idcmt);
                        $idC = (int)$idCart[0]['cart_id'];
                        $temp = $cartModel->get_by_id($idC);
                        $quantity_cart = $temp['cart_quantity'];
                        $data_ins = [
                            'order_id' => $coutID,
                            'product_id' => $id,
                            'price' => $price_product,
                            'quantity' => $quantity_cart,
                            'value' => $price_product * $quantity_cart,
                        ];
                        if ($orderDetailModel->save_data($data_ins)) {
                            if ($cartModel->deleted($idC)) {
                                $responseCode = ResponseCode::SUCCESS;
                                $message = "SERV: " . sprintf(ResponseMessage::DELETE_MESSAGE, "giỏ hàng", "thành công");
                            } else {
                                $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "giỏ hàng", "thất bại");
                            }
                            $responseCode = ResponseCode::SUCCESS;
                            $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "chi tiết đơn hàng", "thành công");
                        } else {
                            $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "chi tiết đơn hàng", "thất bại");
                        }
                    }
                    if (isset($_SESSION['gio_hang'])) {

                        unset($_SESSION['gio_hang']);
                    }
                } else {
                    $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "đơn hàng", "thất bại");
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


    public function up_Order_status()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $orderModel = $this->get_model('order');
                $order_id = $_POST['id_order_up'];
                $data = [
                    'order_status' => '1',
                ];
                if ($orderModel->update_data($data, $order_id)) {
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "đơn hàng", "thành công");
                } else {
                    $message = "SERV: " . sprintf(ResponseMessage::DELETE_MESSAGE, "đơn hàng", "thất bại");
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


    public function data_order_cf()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $key = '';
                $limit = 0;
                $offset = 0;
                $orderModel = $this->get_model('order');
                $count = $orderModel->count_data(" where order_status='0'");

                if ($count > 0) {
                    if (isset($_GET['limit']) and $_GET['limit'] != '') {
                        $key .= " order by order_id DESC ";
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
                    $order = $orderModel->get_data(" where order_status='0'");
                    if ($order != null) {
                        $responseCode = ResponseCode::SUCCESS;
                        $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "đơn hàng", "thành công.");
                        $data = [
                            'order' => $order,
                            'count' => $count
                        ];
                    } else {
                        $responseCode = ResponseCode::DATA_EMPTY;
                        $message = "SERV: " . sprintf(ResponseMessage::DATA_EMPTY_MESSAGE, "đơn hàng");
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



    public function data_bill_cf()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $key = '';
                $limit = 0;
                $offset = 0;
                $orderModel = $this->get_model('order');
                $count = $orderModel->count_data(" where order_status='1'");
                if ($count > 0) {
                    if (isset($_GET['limit']) and $_GET['limit'] != '') {
                        $key .= " order by order_id DESC ";
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
                    $order = $orderModel->get_data(" where order_status='1'");
                    if ($order != null) {
                        $responseCode = ResponseCode::SUCCESS;
                        $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "đơn hàng", "thành công.");
                        $data = [
                            'order' => $order,
                            'count' => $count
                        ];
                    } else {
                        $responseCode = ResponseCode::DATA_EMPTY;
                        $message = "SERV: " . sprintf(ResponseMessage::DATA_EMPTY_MESSAGE, "đơn hàng");
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

    function dele_order()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $orderModel=$this->get_model('order');
                $idOder=$_POST['id_order'];
                if($orderModel->delete_data($idOder)){
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::DELETE_MESSAGE, "hủy đơn hàng", "thành công.");
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
}
