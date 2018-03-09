<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    private $user_id ;

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
        $this->user_id = $this->session->userdata('user_id');

        $this->load->library('grocery_CRUD');
        $this->load->model(array('user_model'));
    }
    
    public function index()
    {
        redirect('home/users');
    }
    
    public function content()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_subject('Content');
        $crud->set_table(TBL_CONTENT);

        $crud->columns('title', 'description', 'category', 'created','updated');
        $crud->add_fields('title', 'category', 'description', 'status', 'created','updated');
        $crud->edit_fields('title', 'category', 'description', 'status', 'updated');
        
        $crud->change_field_type('category', 'hidden', $this->uri->segment(3));
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));
        $crud->where('category', $this->uri->segment(3));
        
        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = $this->uri->segment(3);
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = "admin/common";

        $this->load->view('admin/layout',$output);
    }
    
    function users()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table(TBL_USERS);
        $crud->set_subject('Users');

//        $crud->set_relation('shift_id', TBL_WORK_SHIFTS,'shift_name');
        $crud->required_fields(array('name', 'user_name','email', 'user_status', 'user_type'));

        $crud->columns('name', 'user_name','email', 'user_status', 'user_type');
        $crud->add_fields('name', 'user_name','email','password','user_type', 'user_status', 'created', 'updated');
        $crud->edit_fields('name', 'user_name','email','password','user_type', 'user_status', 'updated');

//        $crud->set_rules("user_name", "User Name", "trim|xss_clean|callback___checkUserName");
//        $crud->set_rules("email", "Email", "trim|xss_clean|callback___checkEmail");
        $crud->callback_before_insert(array($this,'convertPassword'));
        $crud->callback_before_update(array($this,'convertPasswordForEdit'));
        $crud->callback_edit_field('password',array($this,'callback_edit_password_field'));

//        $crud->display_as('image_url', "Picture");
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));

//        $crud->set_field_upload('image_url','assets/upload/users');

        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "Users";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = "admin/common";

        $this->load->view('admin/layout',$output);
    }

    function __checkUserName($userName)
    {
        $this->db->where("user_name",$userName);
        if((int)$this->uri->segment(4) > 0):
            $this->db->where("user_id <>",(int)$this->uri->segment(4));
        endif;
        $result = $this->db->get(TBL_USERS);

        if($result->num_rows() > 0):
            $this->form_validation->set_message("__checkUserName","This User Name is already exist.");
            return false;
        endif;
        return true;
    }

    function __checkEmail($userName)
    {
        $this->db->where("email",$userName);
        if((int)$this->uri->segment(4) > 0):
            $this->db->where("user_id <>",(int)$this->uri->segment(4));
        endif;
        $result = $this->db->get(TBL_USERS);

        if($result->num_rows() > 0):
            $this->form_validation->set_message("__checkEmail","This E-mail is already exist.");
            return false;
        endif;
        return true;
    }

    function callback_edit_password_field()
    {
        return '<input type="text" class="form-control" value="" name="password"> ';
    }

    function convertPassword($post_array)
    {
        $post_array['password'] = md5(trim($post_array['password']));
        return $post_array;
    }

    function convertPasswordForEdit($post_array)
    {
        $post_array['password'] = trim($post_array['password']);
        if($post_array['password'] == "" || empty($post_array['password'])):
            unset($post_array['password']);
            return $post_array;
        endif;

        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }
}
