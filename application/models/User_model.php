<?php 

class User_model extends CI_Model
{
    public function register($encriptedPass, $propic)
    {
        //user data array
        $data = array(
            
            'fullname' => $this->input->post('fullname'),
            'username' => $this->input->post('username'),
            'gender' => $this->input->post('gender'),
            'propic' => $propic,
            'occupation' => $this->input->post('occupation'),
            'zipcode' => $this->input->post('zipcode'),
            'email' => $this->input->post('email'),
            'password' => $encriptedPass
        );
        
        //insert user
        
        return $this->db->insert('users', $data);
    }
     
    //check if username exists
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        
        if(empty($query->row_array()))
        {
            return true;
        }
        return false;
    }
    
    //check if email exists
    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        
        if(empty($query->row_array()))
        {
            return true;
        }
        return false;
    }
    
    public function getUsername($userId)
    {
        $query = $this->db->get_where('users', array('id' => $userId));
            
        return $query->row();
    }
    
    public function getUser($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
            
        return $query->row();
    }
    
    //login user
    
    public function login($username, $encryptedPass)
    {
        //validate
        $this->db->where('username', $username);
        $this->db->where('password', $encryptedPass);
        
        $result = $this->db->get('users');
        
        if($result->num_rows()==1)
        {
            return $result->row(0);
        }
        return false;
    }
    
    public function increaseNumOfPosts($userId)
    {
        $this->db->where('id', $userId);
        $this->db->set('total_posts', 'total_posts + 1', false);
        $this->db->update('users');
    }
    
    public function decreaseNumOfPosts($userId)
    {
        $this->db->where('id', $userId);
        $this->db->set('total_posts', 'total_posts - 1', false);
        $this->db->update('users');
    }
}

?>