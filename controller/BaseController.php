<?php
class BaseController
{
    public function __construct()
    {
        session_start();
    }

    public function render_view($viewName)
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] == Enum::ADMIN)
            $view = "admin";
        else
            $view = "site";
        $path = "view/$view/";
        include($path . $viewName . '.php');
    }

    public function render_error($errorCode)
    {
        $path = 'view/error/error-';
        include($path . $errorCode . '.php');
    }

    public function get_model($model)
    {
        include('model/' . $model . 'Model.php');
        $model .= 'Model';
        $modelObj = new $model();
        return $modelObj;
    }
    public function redirect($controller, $action)
    {
        header("Location: ?controller=" . $controller . "&action=" . $action);
    }

    public function check_login()
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] == Enum::ROLE_CUSTOMER) {
            return true;
        } else
            return false;
    }

    public function check_admin()
    {
        if (isset($_SESSION['login']) && ($_SESSION['login'] == Enum::ADMIN)) {
            return true;
        } else
            return false;
    }

    public function check_admin_role($role)
    {
        if (isset($_SESSION["ad" . $role]) && $_SESSION["ad" . $role]) {
            return true;
        } else
            return false;
    }





    public function response($responseCode, $message, $data)
    {
        $result = [
            'responseCode' => $responseCode,
            'message' => $message,
            'data' => $data
        ];
       echo json_encode($result);
    }

    public $number = '/[0-9]/';
    public $lowerChars = '/[a-z]/';
    public $upperChars = '/[A-Z]/';
    public $specialChars = '/[\.!\'^£$%&*()}{@#~?><,|=_+¬-]/';
    //preg_match($number, $input);

    public function save_img($path, $file)
    {
        $target_dir = $path;
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        if (file_exists($target_file)) {
            return false;
        }


        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            return false;
        }

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return true;
        } else {
            return false;
        }
    }
}
