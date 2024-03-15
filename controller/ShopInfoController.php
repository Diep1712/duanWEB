<?php
class ShopInfoController extends BaseController{
    public function shop_page()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {          
                $this->render_view(
                    'shop'
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
}