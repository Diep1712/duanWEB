<?php 
class AdminController extends BaseController{


    public function admin_page()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($this->check_admin() && $this->check_admin_role(Enum::ROLE_MANAGER)) {
                $this->render_view(
                    'admin'
                );
            } else $this->render_error('403');
        } else $this->render_error('400');
    }
    

}