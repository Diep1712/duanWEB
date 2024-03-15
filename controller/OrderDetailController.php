<?php
class OrderDetailController extends BaseController
{

    public function bill_detail_page_ad()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'bill-detail-ad'
            );
        } else $this->render_error('400');
    }
    public function bill_detail_page_ad_bill()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'bill-detail-ad-bill'
            );
        } else $this->render_error('400');
    }
    public function bill_detail_page_cmt()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'bill-detail-cmt'
            );
        } else $this->render_error('400');
    }

    public function data_order_back_log()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $userModel = $this->get_model('customer');
                $user = $userModel->get_by_userName($_SESSION['user']);
                $idcmt = $user['customer_id'];
                $orderdetailModel = $this->get_model('order');
                $or=$orderdetailModel->get_data(' where customer_id='.$idcmt );
                if ($or!=null) {
                    $data=[
                        'order_detail'=>$or
                    ];
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "đơn hàng của khách", "thành công");
                }else{
                    $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "đơn hàng", "thất bại");
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
    public function data_order_detail_id()
    {
        $responseCode = ResponseCode::FAIL;
        $message = "SERV: " . sprintf(ResponseMessage::UNKNOWN_ERROR_MESSAGE, "");
        $data[] = null;
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id=$_POST['id_order'];
                // $userModel = $this->get_model('customer');
                // $user = $userModel->get_by_userName($_SESSION['user']);
                // $idcmt = $user['customer_id'];
                $orderdetailModel = $this->get_model('orderdetail');
                $or=$orderdetailModel->get_data(' where order_id='. $id);
                $OrderModel=$this->get_model('order');
                $tt=$OrderModel->get_by_id($id);
                if ($or!=null&&$tt!=null) {
                    $data=[
                        'order_detail'=>$or,
                        'order'=>$tt,
                    ];
                    $responseCode = ResponseCode::SUCCESS;
                    $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "đơn hàng của khách", "thành công");
                }else{
                    $message = "SERV: " . sprintf(ResponseMessage::SELECT_MESSAGE, "đơn hàng", "thất bại");
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
