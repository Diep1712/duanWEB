<?php

class HomeController extends BaseController{


    public function index()
    {
        $this->render_view(
            'index'
        );
    }

    public function index_admin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($this->check_admin()) {
                $this->render_view(
                    'index'        
                );
            } else $this->render_error('403');
        } else $this->render_error('400');
    }


    public function error_page()
    {
        if (isset($_GET['error']) && $_GET['error'] != null && $_GET['error'] != '') {
            $this->render_error($_GET['error']);
        } else $this->render_error('404');
    }

    public function login_page()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] == Enum::ROLE_CUSTOMER) {
                $this->redirect('home', 'index');
            } else if ($_SESSION['login'] == Enum::ADMIN){
                $this->redirect('home', 'index_admin');
            }
        } else {
            $this->render_view('login');
        }
    }


    public function logout()
    {
        session_destroy();
        $this->response(ResponseCode::SUCCESS, "SERV: " . ResponseMessage::SUCCESS_MESSAGE, null);
    }

    public function login_action()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $requestLogin = $_POST;
              
                if (trim($requestLogin['lgUsername']) != '' && $requestLogin['lgPassword'] != '') {
                    $adminModel = $this->get_model('admin');
                    $admin = $adminModel->get_by_username(htmlspecialchars(trim($requestLogin['lgUsername'])));
                    // $admin=null;
                    if ($admin == null) {
                        $customerModel = $this->get_model('customer');
                        $customer = $customerModel->get_by_userName(htmlspecialchars(trim($requestLogin['lgUsername'])));
                     
                        if ($customer == null) {
                            $responseCode = ResponseCode::DATA_DOES_NOT_MATCH;
                            $message = "SERV: " . sprintf(ResponseMessage::OBJECT_DOES_NOT_EXIST_MESSAGE, "Người dùng");
                        } else {
                            if ($customer['password'] == md5($requestLogin['lgPassword'])) {
                                $_SESSION['login'] = Enum::ROLE_CUSTOMER;
                                $_SESSION['user']=$requestLogin['lgUsername'];
                                $responseCode = ResponseCode::SUCCESS;
                                $message = "SERV: " . ResponseMessage::SUCCESS_MESSAGE;
                                $data = [
                                  
                                    "typeAccount" => "customer",
                                ];
                            } else {
                                $responseCode = ResponseCode::DATA_DOES_NOT_MATCH;
                                $message = "SERV: " . sprintf(ResponseMessage::DATA_DOES_NOT_MATCH_MESSAGE, "mật khẩu");
                            }
                        }
                    } else {
                        if (md5($requestLogin['lgPassword']) == $admin['password']) {
                            $_SESSION['login'] = Enum::ADMIN;
                            $role = $admin['role'];
                            $_SESSION["ad".$role] = true;
                          
                            $responseCode = ResponseCode::SUCCESS;
                            $message = "SERV: " . ResponseMessage::SUCCESS_MESSAGE;
                            $data = [
                             
                                "typeAccount" => "admin",
                            ];
                        } else {
                            $responseCode = ResponseCode::DATA_DOES_NOT_MATCH;
                            $message = "SERV: " . sprintf(ResponseMessage::DATA_DOES_NOT_MATCH_MESSAGE, "mật khẩu");
                        }
                    }
                } else {
                    $responseCode = ResponseCode::INPUT_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::INPUT_EMPTY_MESSAGE, "người dùng");
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