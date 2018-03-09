<?php

class User_model  extends CI_Model  {

    function __construct()
    {
        parent::__construct();
    }
    
    function getAllUsers($params)
    {
        $this->db->select('*')
                ->from('users_mollick');
        
        if(isset($params['user_id']))
        {
            $this->db->where('user_id', $params['user_id']);
        }
        
        if(isset($params['email']))
        {
            $this->db->where('email', $params['email']);
        }
        
        if(isset($params['user_status']))
        {
            $this->db->where('user_status', $params['user_status']);
        }
        
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result : false;        
    }
    
    function checkUniqueUserNEmail($params)
    {
        $this->db->select('*')
                ->from(TBL_USERS)
                ->where("(user_name = '".$params['user_name']."' OR email = '".$params['email']."')");
        
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result : FALSE;
    }
            
    function loginCheck($params)
    {
        $this->db->select('*')
                ->from('bd_users')
                ->where('password', md5($params['password']))
                ->where('user_status', 'Active');
        
        if(isset($params['user_name']))
        {
            $this->db->where("(user_name = '".$params['user_name']."' OR email = '".$params['user_name']."')");
        }
        
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result : FALSE;
    }
    
    function saveUser($params)
    {
        $this->db->insert('users_mollick', $params);
        return $this->db->insert_id();
    }
    
    function updateUser($params)
    {
        $this->db->where('user_id', $params['user_id']);
        $this->db->update('users_mollick', $params);
    }

}
    