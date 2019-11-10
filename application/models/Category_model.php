<?php   
    
    class Category_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }
        
        public function getCategories()
        {
            $query = $this->db->get('categories');
            return $query->result_array();
        }
        
        //get posts suggestion by title or catagory or authorname
        public function getCategoriesJson($keyword)
        {
            $this->db->select('title');
            $this->db->from('posts');
//            $this->db->join('users', 'users.id = posts.user_id');
//            $this->db->join('categories', 'categories.id = posts.cat_id');
            $this->db->like('title', $keyword);
//            $this->db->or_like('cat_name', $keyword);
//            $this->db->or_like('username', $keyword);
            $this->db->where('published =', '1');


            // $this->db->select('cat_name');
            // $this->db->from('categories');
            // $this->db->like('cat_name', $keyword);
            
            $data = $this->db->get()->result_array();
            
            $output = array();
            
            if($data)
            {
                foreach($data as $d)
                {
                    array_push($output, ['label' => $d['title']]);
                }
            }
            
            echo json_encode($output);
        }
        
        public function getCategory($catId)
        {
            $query = $this->db->get_where('categories', array('id' => $catId));
            
            return $query->row();
        }
        
        public function createCategory()
        {
            $data = array(
                
                'cat_name' => $this->input->post('cat_name')
            );
            
            return $this->db->insert('categories', $data);
        }
    }
    
?>