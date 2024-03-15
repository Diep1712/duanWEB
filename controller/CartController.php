<?php

class CartController extends BaseController
{

    public function cart_page()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'cart'
            );
        } else $this->render_error('400');
    }

    public function data_cart()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $userModel = $this->get_model('customer');
                $user = $userModel->get_by_userName($_SESSION['user']);
                $id = $user['customer_id'];
                $cartModel = $this->get_model('cart');
                $data =  $cartModel->get_data('where customer_id=' . $id);
                if ($data != null) {
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "giỏ hàng", "thành công.");
                } else {
                    $responseCode = ResponseCode::DATA_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::DATA_EMPTY_MESSAGE, "giỏ hàng");
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


    public function add_product_cart()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cartModel = $this->get_model('cart');
                $userModel = $this->get_model('customer');
                $user = $userModel->get_by_userName($_SESSION['user']);
                $idcmt = $user['customer_id'];
                if (isset($_POST['product_id']) && $_POST['product_id'] != '' && isset($_POST['quantity']) && $_POST['quantity'] != '') {
                    $check = $cartModel->check_product_cart($_POST['product_id'], $idcmt);
                    if ($check == null) {
                        $data = [
                            'customer_id' => $idcmt,
                            'product_id' => $_POST['product_id'],
                            'quantity' => $_POST['quantity']
                        ];
                        if ($cartModel->save_data($data)) {
                            $responseCode = ResponseCode::SUCCESS;
                            $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "giỏ hàng", "thành công");
                        } else {
                            $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, "giỏ hàng", "thất bại");
                        }
                    } else {
                        $quantity = $cartModel->get_quantity($_POST['product_id'], $idcmt);
                        $quantity_get = (int)$quantity[0]['quantity'];
                        $quantity_end = $_POST['quantity'] + $quantity_get;

                        $data = [
                            'quantity' => $quantity_end
                        ];
                        $idC = $cartModel->get_id($_POST['product_id'], $idcmt);
                        $idC = (int)$quantity[0]['cart_id'];
                        if ($cartModel->update_data($data, $idC)) {
                            $responseCode = ResponseCode::SUCCESS;
                            $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "giỏ hàng", "thành công");
                        } else {
                            $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "giỏ hàng", "thất bại");
                        }
                    }
                } else {
                    $responseCode = ResponseCode::DATA_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::DATA_EMPTY_MESSAGE, "giỏ hàng");
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

    public function dele_product_cart()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cartModel = $this->get_model('cart');
                $userModel = $this->get_model('customer');
                $user = $userModel->get_by_userName($_SESSION['user']);
                $idcmt = $user['customer_id'];
                $idC = $cartModel->get_id($_POST['product_id_dele'], $idcmt);
                $cartC = $cartModel->get_quantity($_POST['product_id_dele'], $idcmt);
                $idC = (int)$cartC[0]['cart_id'];
                if ($cartModel->deleted($idC)) {
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::DELETE_MESSAGE, "giỏ hàng", "thành công");
                } else {
                    $message = "SERV: " . sprintf(ResponseMessage::DELETE_MESSAGE, "giỏ hàng", "thất bại");
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





    public function update_product_cart()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cartModel = $this->get_model('cart');
                $userModel = $this->get_model('customer');
                $user = $userModel->get_by_userName($_SESSION['user']);
                $idcmt = $user['customer_id'];
                $q =  $_POST['quantity'];
                $idProduct = $_POST['product_id'];

                $data = [
                    'quantity' => $q
                ];
                $idCart = $cartModel->get_id($idProduct, $idcmt);
                $idC = (int)$idCart[0]['cart_id'];
                if ($cartModel->update_data($data, $idC)) {
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "giỏ hàng", "thành công");
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



    public function save_session_cart()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $checkedValuesJSON = json_decode(file_get_contents("php://input"), true);

                if ($checkedValuesJSON !== null) {
                    // Lặp qua các phần tử và lưu vào session
                    foreach ($checkedValuesJSON as $key => $value) {
                        $_SESSION['gio_hang'][$key] = $value;
                    }
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "giỏ hàng", "thành công");
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
