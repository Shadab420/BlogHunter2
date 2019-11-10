<?php

    class Users extends CI_Controller
    {
        public function register()
        {
            
            $data['title'] = 'Sign Up';
            
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            $this->form_validation->set_rules('confirmpass', 'Confirm Password', 'matches[password]');
            
            if($this->form_validation->run() === FALSE)
            {
                
                $this->load->view('users/register', $data);
                
            }
            else
            {
                //Image upload
                $config['upload_path'] = './assets/img/users';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload())
                {
                    $errors = array('error' => $this->upload->display_errors());
                    echo $errors['error'];
                    $propic = 'no_image.jpg';
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $propic = $_FILES['userfile']['name'];
                }
                
                //Encrypt password
                $encryptedPass = md5($this->input->post('password'));
                
                $username = $this->input->post('username');
                $this->User_model->register($encryptedPass, $propic);
                
                //set message
                $this->session->set_flashdata('user_registered', 'Hello '.$username.'! You are now registered! You can log in!');
                
                redirect('users/login');
            }
        }
        
        //check if username exists
        function check_username_exists($username)
        {
            $this->form_validation->set_message('check_username_exists', '<p class="alert alert-danger">This username is already taken! Please choose another.</p>');
            
            return $this->User_model->check_username_exists($username);
            
        }
        
        //check if email exists
        function check_email_exists($email)
        {
            $this->form_validation->set_message('check_email_exists', '<p class="alert alert-danger">This email is already taken! Please choose another.</p>');
            
            return $this->User_model->check_email_exists($email); 
        }
        
        
        //login user
        
        public function login()
        {
            $data['title'] = 'Login';
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            
            
            $this->form_validation->set_rules('password', 'Password', 'required');
        
            
            if($this->form_validation->run() === FALSE)
            {
                
                $this->load->view('users/login', $data);
                
            }
            else
            {
                //get username
                $username = $this->input->post('username');
                
                //Encrypt password
                $encryptedPass = md5($this->input->post('password'));
                                
                //login user
                
                $user = $this->User_model->login($username, $encryptedPass);
                
                if($user)
                {
                    //create session
                                        
                    $userData = array(
                        'user_id' => $user->id,
                        'username' => $username,
                        'email' => $user->email,
                        'logged_in' => true
                    );
                    
                    $this->session->set_userdata($userData);
                    //set message
                    $this->session->set_flashdata('user_loggedin', 'Welcome '.$username.'!');
                    redirect('/posts');
                }
                else
                {
                    //set message
                    $this->session->set_flashdata('login_failed', 'Invalid username or password!');

                    redirect('users/login');
                    
                }
                
                
            }
        }
        
        public function logout()
        {
            $username = $this->session->userdata('username');
            //unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('email');
            
            //set message
            $this->session->set_flashdata('user_loggedout', 'Hello '. $username.'! You have successfully logged out! Come back soon!');

            redirect('users/login');
        }
        
        public function profile($username)
        {
            $data['user'] = $this->User_model->getUser($username);
            $this->load->view('users/profile',$data);
        }
        
        public function posts($userId)
        {
//            if(!$this->session->userdata('logged_in'))
//            {
//                //set message
//                $this->session->set_flashdata('not_loggedin', 'You are not authorized user! Please login first!');
//                redirect('users/login');
//            }
            
//            //Pagination config
//            $config['base_url'] = base_url().'posts/index';
//            $config['total_rows'] = $this->db->count_all('posts');
//            $config['per_page'] = 3;
//            $config['uri_segment'] = 3;
//            
//            //pagination init
//            $this->pagination->initialize($config);
            
            
            $data['title'] = $this->User_model->getUsername($userId)->username."'s Posts";
            
            $data['posts'] = $this->Post_model->getPostsByUser($userId);
            
            
            $this->load->view('posts/index', $data);
            
            
            
        }
        
    }

?>