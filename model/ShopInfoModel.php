<?php
class ShopController extends BaseController
{

    public function about_page()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
                'about'
            );
        } else $this->render_error('400');
    }

    public function contact_page()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render_view(
            'contact'
            );
        } else $this->render_error('400');
    }

    public function shop_page_ad()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($this->check_admin() && $this->check_admin_role(Enum::ROLE_MANAGER)) {
                $this->render_view(
                    'shop'
                );
            } else $this->render_error('403');
        } else $this->render_error('400');
    }
}