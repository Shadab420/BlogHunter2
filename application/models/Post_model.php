<?php
    class Post_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }
        
        public function getPosts($slug = FALSE, $limit = FALSE, $offset = FALSE)
        {
            
            if($limit)
            {
                $this->db->limit($limit, $offset);
            }
            
            if(!$slug)
            {
                $this->db->order_by('posts.id', 'DESC');
                $this->db->join('users', 'users.id = posts.user_id');
                $this->db->join('categories', 'categories.id = posts.cat_id');
                $this->db->where('published =', '1');
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('posts', array('slug' => $slug));
            
            return $query->row_array();
        }
        
        public function createPost($postImage)
        {
            $slug = url_title($this->input->post('title'));
            
            $data = array(
                
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'cat_id' => $this->input->post('cat_id'),
                'user_id' => $this->session->userdata('user_id'),
                'post_image' => $postImage,
            );
            
           if($this->db->insert('posts', $data))
           {
               return $data['slug'];
           }
           else
           {
                return false;    
           }
            
        }
        
        public function deletePost($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }
        
        public function updatePost()
        {
            $slug = url_title($this->input->post('title'));
            
            $data = array(
                
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'cat_id' => $this->input->post('cat_id')
            );
            
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }
        
        public function getCategories()
        {
            $this->db->order_by('categories.cat_name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }
        
        public function getPostsByCategory($catId)
        {
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.cat_id');
            $this->db->join('users', 'users.id = posts.user_id');
            $this->db->where('published = ', '1');
            $query = $this->db->get_where('posts', array('cat_id' => $catId));
            
            return $query->result_array();
        }
        
        public function getAuthor($authorId)
        {
            $query = $this->db->get_where('users', array( 'id' => $authorId));
            return $query->result_array(0);
        }
        
        public function getPostsByUser($userId)
        {
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('users', 'users.id = posts.user_id');
            $this->db->join('categories', 'categories.id = posts.cat_id');
            
        
            $query = $this->db->get_where('posts', array('user_id' => $userId));
            
            return $query->result_array();
        }
        
        public function getPostsByTitle($title)
        {
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('users', 'users.id = posts.user_id');
            $this->db->join('categories', 'categories.id = posts.cat_id');
            
        
            $query = $this->db->get_where('posts', array('title' => $title));
            
            $result = $query->result_array();
            
            
//            foreach($result as $post)
//            {
//                echo $post['username'];
//            }
            
            return $result;
        }
        
        public function publishPost($postId, $userId)
        {
            $this->db->where('id', $postId);
            $this->db->where('user_id', $userId);
            $this->db->set('published', '1', false);
            $this->db->update('posts');
        }
        
        public function hidePost($postId, $userId)
        {
            $this->db->where('id', $postId);
            $this->db->where('user_id', $userId);
            $this->db->set('published', '0', false);
            $this->db->update('posts');
        }
    }
?>