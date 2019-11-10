<?php
    class Posts extends CI_Controller
    {
        public function index($offset = 0)
        {
//            if(!$this->session->userdata('logged_in'))
//            {
//                //set message
//                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
//                redirect('users/login');
//            }
            
            //Pagination config
            $config['base_url'] = base_url().'posts/index';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;
            
            //pagination init
            $this->pagination->initialize($config);
            
            $data['title'] = "All Posts";
            $data['posts'] = $this->Post_model->getPosts(false, $config['per_page'], $offset);   
            
            $this->load->view('posts/index', $data);
            
           
        }
        
        public function view($slug = null)
        {
//            if(!$this->session->userdata('logged_in'))
//            {
//                //set message
//                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
//                redirect('users/login');
//            }
            
            $data['post'] = $this->Post_model->getPosts($slug);
            
            $data['author'] = $this->Post_model->getAuthor($data['post']['user_id']);
            
            $postId = $data['post']['id'];
            
            $data['comments'] = $this->Comment_model->getComments($postId);
            
            if(empty($data['post'])){
                show_404();
            }
            
            $data['title'] = $data['post']['title'];
            
            $this->load->view('partial-views/header');
            $this->load->view('partial-views/navbar');
            $this->load->view('posts/view', $data);
            $this->load->view('partial-views/scriptLinks');
            $this->load->view('partial-views/footer');
            
        }
        
        public function create()
        {
            if(!$this->session->userdata('logged_in'))
            {
                //set message
                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
                redirect('users/login');
            }
            
            
            $data['title'] = "Create Post";
            
            $data['categories'] = $this->Post_model->getCategories();
            
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            
            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('partial-views/header');
                $this->load->view('partial-views/navbar');
                $this->load->view('posts/create', $data);
                $this->load->view('partial-views/scriptLinks');
                $this->load->view('partial-views/footer');
            }
            else
            {
                //Image upload
                $config['upload_path'] = './assets/img/posts';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                
                $this->load->library('upload', $config);
                
                if(!$this->upload->do_upload())
                {
                    $errors = array('error' => $this->upload->display_errors());
                    echo $errors['error'];
                    $postImage = 'no_image.jpg';
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $postImage = $_FILES['userfile']['name'];
                }
                
                $postSlug = $this->Post_model->createPost($postImage);
                
                if($postSlug)
                {
                    //set message
                    $this->session->set_flashdata('post_created_now_publish', 'Your post has been created successfully! Now You have to publish it. You can do it later.');
                    redirect('posts/view/'.$postSlug);
                }
                else
                {
                    //set message
                    $this->session->set_flashdata('post_creation_failed', 'Post creation failed! Please try again later.');
                    
                    redirect('posts');
                }
                
                
            }
            
        }
        
        public function getPostsByTitle()
        {
            $data['title'] = 'Search results for: '.$this->input->post('search');
            $data['posts'] = $this->Post_model->getPostsByTitle($this->input->post('search'));
            $this->load->view('posts/index', $data);
            
        }
        
        public function publish($postId)
        {
            if(!$this->session->userdata('logged_in'))
            {
                //set message
                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
                redirect('users/login');
            }
            
            $this->Post_model->publishPost($postId, $this->session->userdata('user_id'));
            $this->User_model->increaseNumOfPosts($this->session->userdata['user_id']);
            
            //set message
            $this->session->set_flashdata('post_published', 'You have published your post!');
            redirect('/posts');
            
        }
        
        public function hide($postId)
        {
            if(!$this->session->userdata('logged_in'))
            {
                //set message
                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
                redirect('users/login');
            }
            
            $this->Post_model->hidePost($postId, $this->session->userdata('user_id'));
            $this->User_model->decreaseNumOfPosts($this->session->userdata['user_id']);
            
            //set message
            $this->session->set_flashdata('post_hided', 'Your post is now hidden!');
            redirect('/posts');
            
        }
        
        public function delete($id)
        {
            if(!$this->session->userdata('logged_in'))
            {
                //set message
                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
                redirect('users/login');
            }
            
            
            $this->Post_model->deletePost($id);
            
            //set message
            $this->session->set_flashdata('post_deleted', 'Your post has been deleted successfully!');
            redirect('posts');
        }
        
        public function edit($slug)
        {
            if(!$this->session->userdata('logged_in'))
            {
                //set message
                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
                redirect('users/login');
            }
            
            
            $data['post'] = $this->Post_model->getPosts($slug);
            
            $data['categories'] = $this->Post_model->getCategories();
            
            if(empty($data['post'])){
                show_404();
            }
            
            //check if current user is the actual author
            if($this->session->userdata('user_id') != $data['post']['user_id'])
            {
                //set message
                $this->session->set_flashdata('access_denied', 'You can\'t edit others post!');
                redirect('users/login');
            }
            
            $data['title'] = "Edit Post";
            
            $this->load->view('partial-views/header');
            $this->load->view('partial-views/navbar');
            $this->load->view('posts/edit', $data);
            $this->load->view('partial-views/scriptLinks');
            $this->load->view('partial-views/footer');
        }
        
        public function update()
        {
            if(!$this->session->userdata('logged_in'))
            {
                //set message
                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
                redirect('users/login');
            }
            
            
            $this->Post_model->updatePost();
            //set message
            $this->session->set_flashdata('post_updated', 'Your post has been updated successfully!');
            redirect('posts');
        }
        
        
    }

?>