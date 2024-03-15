<?php
class NewsController extends BaseController{
    public function news_page() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
           
                $this->render_view(
                    'news'
                );
           
        } else $this->render_error('400');
    }
}
 