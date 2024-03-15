<?php
class CustomerController extends BaseController
{

    public function customer_info()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          
                $this->render_view(
                    'info-ctm'
                );
            
        } else $this->render_error('400');
    }
    public function register_page()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          
                $this->render_view(
                    'register'
                );
          
        } else $this->render_error('400');
    }


    public function customer_page_ad()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {          
                $this->render_view(
                    'customer-ad'
                );           
        } else $this->render_error('400');
    }


    public function register()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $customerModel = $this->get_model('customer');
                if (isset($_POST['rgName']) && $_POST['rgName'] != '' && isset($_POST['rgPhone']) && $_POST['rgPhone'] != '' && isset($_POST['full_name']) && $_POST['full_name'] != '' && isset($_POST['rgPassword']) && $_POST['rgPassword'] != '' && isset($_POST['rgGender']) && $_POST['rgGender'] != '') {
                    $customerInfo = $_POST;
                    if (strlen($customerInfo['rgName']) >= 2) {
                        if (strlen($customerInfo['rgPhone']) >= 10 && strlen($customerInfo['rgPhone']) <= 13 && !preg_match($this->specialChars, $customerInfo['rgPhone']) && !preg_match($this->upperChars, $customerInfo['rgPhone']) && !preg_match($this->lowerChars, $customerInfo['rgPhone'])) {
                            if (strlen($customerInfo['rgPassword']) >= 8 && preg_match($this->number, $customerInfo['rgPassword']) && preg_match($this->lowerChars, $customerInfo['rgPassword']) && preg_match($this->upperChars, $customerInfo['rgPassword']) && preg_match($this->specialChars, $customerInfo['rgPassword'])) {
                                $cus0 = $customerModel->get_by_userName($customerInfo['rgName']);
                                
                                if ($cus0 == null ) {
                                    $data[] = 1;
                                    $dataRegister = [
                                        'full_name' => trim($customerInfo['full_name']),
                                        'user_name'=>trim($customerInfo['rgName']),
                                        
                                        'phone_number' => trim($customerInfo['rgPhone']),
                                        'gender' => $customerInfo['rgGender'],
                                        'password' => md5($customerInfo['rgPassword']),
                                        
                                    ];
                                    if ($customerModel->save_data($dataRegister)) {
                                        $responseCode = ResponseCode::SUCCESS;
                                        $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, 'người dùng', 'thành công');
                                    } else {
                                        $responseCode = ResponseCode::FAIL;
                                        $message = "SERV: " . sprintf(ResponseMessage::INSERT_MESSAGE, 'người dùng', 'thất bại');
                                    }
                                } 
                            } else {
                                $responseCode = ResponseCode::INPUT_INVALID_TYPE;
                                $message = "SERV: " . "Mật khẩu phải bao gồm chữ cái hoa-thường-số, ít nhất 1 ký tự đặc biệt và độ dài tối thiểu 8 ký tự.";
                            }
                        } else {
                            $responseCode = ResponseCode::INPUT_INVALID_TYPE;
                            $message = "SERV: " . sprintf(ResponseMessage::INPUT_INVALID_TYPE_MESSAGE, 'số điện thoại');
                        } 
                    } else {
                        $responseCode = ResponseCode::INPUT_INVALID_TYPE;
                        $message = "SERV: " . "Tên người dùng tối thiểu 2 ký tự.";
                    }
                } else {
                    $responseCode = ResponseCode::INPUT_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::INPUT_EMPTY_MESSAGE, 'đăng ký');
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



    function data_customer() {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $userModel = $this->get_model('customer');
                $user = $userModel->get_by_userName($_SESSION['user']);
                $id = $user['customer_id'];
                $cartModel = $this->get_model('cart');
                $data =  $userModel->get_by_id($id);
                if ($data != null) {
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "người dùng", "thành công.");
                } else {
                    $responseCode = ResponseCode::DATA_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::DATA_EMPTY_MESSAGE, "người dùng");
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
    function update_info()  {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $userModel = $this->get_model('customer');
                $user = $userModel->get_by_userName($_SESSION['user']);
                $id = $user['customer_id'];
                $name=$_POST['full_name'];
                $phone=$_POST['phone'];
                $add=$_POST['add'];

                $data=[
                    'full_name'=>$name, 
                    'phone_number'=>$phone,
                    'address'=>$add,

                ];
                $cmtUp =  $userModel->update_data($data,$id);
                if ($cmtUp) {
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "người dùng", "thành công.");
                } else {
                    $responseCode = ResponseCode::DATA_EMPTY;
                    $message = "SERV: " . sprintf(ResponseMessage::UPDATE_MESSAGE, "người dùng");
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
