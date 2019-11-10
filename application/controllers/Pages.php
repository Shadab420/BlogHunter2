<?php
    class Pages extends CI_Controller
    {
        public function view($page = 'home')
        {
            if(!file_exists(APPPATH.'views\\pages\\'.$page.'.php'))
            {
//                echo APPPATH.'views\\'.$page.'.php';
                show_404();
            }
            
//            echo APPPATH.'views\\'.$page.'.php';
            
            $data['title'] = ucfirst($page);
            
            
            $this->load->view('pages/'.$page, $data);
            
        }
    }

?>