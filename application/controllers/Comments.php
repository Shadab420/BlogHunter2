<?php
    
    class Comments extends CI_Controller
    {
        public function create($postId)
        {
            $slug = $this->input->post('slug');
            $data['post'] = $this->Post_model->getPosts($slug);
            
            $this->form_validation->set_rules('username', 'User Name', 'required');
            
            $this->form_validation->set_rules('email', 'Email', 'required | valid_email');
            
            $this->form_validation->set_rules('comment', 'Comment', 'required');
            
            if($this->form_validation->run() === false)
            {
                $this->load->view('partial-views/header');
                $this->load->view('partial-views/navbar');
                $this->load->view('posts/view', $data);
                $this->load->view('partial-views/scriptLinks');
                $this->load->view('partial-views/footer');
            }
            else
            {
                $this->Comment_model->createComment($postId);
                redirect('posts/view/'.$slug);
            }
        }
    }

?>