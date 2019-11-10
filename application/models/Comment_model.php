<?php
    
    class Comment_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }
        
        public function createComment($postId)
        {
            $data = array(
                'post_id' => $postId,
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'comment' => $this->input->post('comment'),
                
            );
            
            return $this->db->insert('comments', $data);
        }
        
        public function getComments($postId)
        {
            $query = $this->db->get_where('comments', array( 'post_id' => $postId));
            
            return $query->result_array();
        }
    }

?>