<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Common 
{
    function json_output($success, $msg)
    {
        $json['success'] = $success;
        $json['msg'] = $msg;        
        echo json_encode($json);
        die();
    }
    
    function fine_url($string)
    {
        if($string == "")
        {
            $string = 'post';
        }
        $string = str_replace(' ', '-', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }
            
    function encrypted_data($string)
    {
        $suffix = mt_rand(10000000,99999999);
        $prefix = mt_rand(10000000,99999999);
         
        return $prefix.$string.$suffix;
         
    }
    
    function decrypted_data($encrypted_data)
    {
        if(strlen($encrypted_data) <= 16)
        {
            return false;
        }
        $remove_prefix =  substr($encrypted_data ,8);        
        return substr($remove_prefix ,0, -8);
    }
    
    function show404()
    {
        $CI =& get_instance();
        echo $CI->load->view('error404', "", true); 
        exit();
    }
    
    function plain_string($string)
    {
        $string2 = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string2); // Removes special chars.
    }
    
    function check_admin_session()
    {
        $CI =& get_instance();
        
        $user_id = $CI->session->userdata('user_id');        
        if((int)$user_id <= 0)
        {
            $this->show404();
        }
        
        if( $CI->session->userdata('user_type') != 1 )
        {
            $this->show404();
        }
    }
    
    function check_user_session()
    {
        $CI =& get_instance();
        
        $user_id = $CI->session->userdata('user_id');        
        if((int)$user_id <= 0)
        {
            $this->show404();
        }
        
        if( $CI->session->userdata('user_type') == 1 )
        {
            $this->show404();
        }
    }
    
    function getCountry()
    {
        $CI =& get_instance();
        $country = $CI->user_model->getAllCountry(array()); 
        if($country)
        {
            return $country->result();
        }
        return false;
    }
}

