<?php
    
    class Categories extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in'))
            {
                //set message
                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
                redirect('users/login');
            }
            
            
            $data['title'] = "All Categories";
            $data['categories'] = $this->Category_model->getCategories();
                        
            
            $this->load->view('categories/index', $data);
           
        }
        
        public function getCatJson()
        {
//            echo $this->input->get('query');
             $this->Category_model->getCategoriesJson($this->input->post('query'));
        }
        
        public function create()
        {
            if(!$this->session->userdata('logged_in'))
            {
                //set message
                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
                redirect('users/login');
            }
            
            
            $data['title'] = "Create Category";
            
            $this->form_validation->set_rules('cat_name', 'Category Name', 'required');
            
            if($this->form_validation->run() == FALSE)
            {
                
                $this->load->view('categories/create', $data);
                
            }
            else
            {
                $this->Category_model->createCategory();
                
                //set message
                $this->session->set_flashdata('category_created', 'Category has been created successfully!');
                redirect('categories');
            }
        }
        
        public function posts($catId)
        {
            if(!$this->session->userdata('logged_in'))
            {
                //set message
                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
                redirect('users/login');
            }
            
//            //Pagination config
//            $config['base_url'] = base_url().'posts/index';
//            $config['total_rows'] = $this->db->count_all('posts');
//            $config['per_page'] = 3;
//            $config['uri_segment'] = 3;
//            
//            //pagination init
//            $this->pagination->initialize($config);
            
            
            $data['title'] = $this->Category_model->getCategory($catId)->cat_name;
            
            $data['posts'] = $this->Post_model->getPostsByCategory($catId);
            
            
            $this->load->view('posts/index', $data);
            
            
            
        }
    }
?>