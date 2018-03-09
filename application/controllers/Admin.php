<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
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
        $this->load->model(array('news_model', 'user_model'));
    }

    function index()
    {

        redirect('admin/news');
        $data['admin'] = base_url()."assets/admin/";
        $data['content'] = 'admin/about';
        $this->load->view('admin/theme/layout', $data);
    }

    function menu()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_subject('Menu');
        $crud->set_table(TBL_CATEGORY);

        $menu_list = $this->db->select('*')->from(TBL_CATEGORY)->where('parent_id', 0)->get();

        $menu_item = array();
        foreach($menu_list->result() as $mn)
        {
            $menu_item[$mn->category_id] = $mn->bn_name.' - '.$mn->en_name ;
        }

        $crud->columns('bn_name', 'en_name', 'parent_id',  'menu_order');
        $crud->add_fields('bn_name', 'en_name', 'parent_id', 'is_menu', 'menu_order', 'created','updated');
        $crud->edit_fields('bn_name', 'en_name', 'parent_id', 'is_menu', 'menu_order', 'updated');

        $crud->field_type('parent_id','dropdown',$menu_item);
        $crud->field_type('menu_order','dropdown',range(0, 100, 1));
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));

        $crud->where('is_menu', 'Yes');
        $crud->unset_add();
        $crud->display_as('parent_id', 'parent');

        $crud->display_as('en_name', 'English Name');
        $crud->display_as('bn_name', 'Bangla Name');

        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "Menu";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = "admin/users";

        $this->load->view('admin/theme/grocery-layout',$output);
    }

    function category()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table(TBL_CATEGORY);
        $crud->set_subject('Category');

        $crud->columns('bn_name', 'menu_order', 'status','created');
        $crud->add_fields('bn_name', 'en_name', 'is_menu', 'status', 'menu_order', 'created', 'updated');
        $crud->edit_fields('bn_name', 'en_name', 'is_menu','status', 'menu_order', 'created', 'updated');

        $crud->display_as('bn_category_name', "Category Name Bangla");
        $crud->display_as('en_category_name', "Category Name English");
        $crud->display_as('menu_order', "Order");
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));

        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "News";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = 'admin/users';
        $this->load->view('admin/theme/grocery-layout',$output);
    }
    
    function photo_gallery()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table( TBL_GALLERY );
        $crud->set_subject('Photo Gallery');
        
        $crud->columns( 'photo_title','bn_photo_title', 'image','created','updated');
        $crud->add_fields('bn_photo_title','photo_title', 'image','created', 'updated');
        $crud->edit_fields('bn_photo_title','photo_title', 'image','updated');
        
        $crud->where('type', 'photo');
        $crud->set_field_upload('image','assets/upload/photo_gallery');
        $crud->change_field_type('type', 'hidden', 'photo');
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));
        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "Photo Gallery";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = 'admin/users';
        $this->load->view('admin/theme/grocery-layout',$output);
    }
    
    function video_gallery()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table( TBL_GALLERY );
        $crud->set_subject('Video Gallery');
        
        $crud->columns( 'bn_photo_title', 'url','created','updated');
        $crud->add_fields('bn_photo_title', 'url', 'type', 'created', 'updated');
        $crud->edit_fields('bn_photo_title','url', 'type', 'updated');        
        
        $crud->callback_column('url',array($this,'_callback_webpage_url'));
        
        $crud->where('type', 'video');
        $crud->display_as('bn_photo_title', 'Title');
        $crud->display_as('url', 'YouTube Link');
        $crud->change_field_type('type', 'hidden', 'video');
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));
        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "Video Gallery";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = 'admin/users';
        $this->load->view('admin/theme/grocery-layout',$output);
    }
    
    public function _callback_webpage_url($value, $row)
    {
        $link = ltrim($row->url,"https://www.youtube.com/watch?v");
        ltrim($link, "=");        
        return '<iframe width="150" height="100" src="https://www.youtube.com/embed/'.ltrim($link, "=").'" frameborder="0" allowfullscreen></iframe>';
    }
    
    
    function news()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table(TBL_NEWS);
        $crud->set_subject('News');

        $crud->set_relation('category_id', TBL_CATEGORY,'bn_name');

        $crud->add_action('Send Push', '', 'sms/push_notification','fa fa-pencil');
        $crud->columns('bn_title', 'bn_description', 'category_id', 'image', 'status','created');
        $crud->add_fields('bn_title', 'bn_description', 'en_title', 'en_description', 'user_id', 'category_id', 'slider', 'scroller', 'feature', 'status', 'image', 'created', 'updated');
        $crud->edit_fields('bn_title', 'bn_description', 'en_title', 'en_description', 'user_id', 'category_id', 'slider', 'scroller', 'feature', 'status', 'image', 'updated');

        $crud->change_field_type('slider','true_false');
        $crud->change_field_type('scroller','true_false');
        $crud->change_field_type('feature','true_false');

        $crud->display_as('image', "Feature Image");
        $crud->display_as('category_id', "Category Name");
        $crud->display_as('bn_title', "Bangla Title");
        $crud->display_as('bn_description', "Bangla Description");
        $crud->display_as('en_title', "English Title");
        $crud->display_as('en_description', "English Description");

        $crud->change_field_type('user_id', 'hidden');
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));

        $crud->order_by('created','desc');

        $this->load->config('grocery_crud');
        $this->config->set_item('grocery_crud_file_upload_allow_file_types','jpeg|jpg|png');
        $crud->callback_after_upload(array($this,'resize_image'));
        $crud->set_field_upload('image','assets/upload/news');

        $crud->callback_before_insert(array($this,'created_by'));
        $crud->callback_before_update(array($this,'created_by'));

        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "News";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = 'admin/users';
        $this->load->view('admin/theme/grocery-layout',$output);
    }

    function created_by($post_array)
    {
        $post_array['user_id'] = 3;
        return $post_array;
    }

    function resize_image($uploader_response,$field_info, $files_to_upload)
    {
        $this->load->library('image_moo');

        $file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name;
        $this->image_moo
            ->load($file_uploaded)
            ->resize(400,280)
            ->save($file_uploaded,true)
            ->resize(800,600)
            ->save($field_info->upload_path."/gallery/".$uploader_response[0]->name);

        return true;
    }

    function category_block()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_subject('Menu');
        $crud->set_table(TBL_HOME_CATEGORY);

        $crud->set_relation('category_id', TBL_CATEGORY,'bn_name');

//        $menu_list = $this->db->select('*')->from(TBL_MENU)->where('status', 'Active')->get();
//        $menu_item = array();
//        foreach($menu_list->result() as $mn)
//        {
//            $menu_item[$mn->menu_id] = $mn->bn_name.' '.$mn->en_name ;
//        }


        $crud->columns('category_id', 'category_order', 'created');
//        $crud->add_fields('bn_name', 'en_name', 'parent_id', 'status', 'menu_order', 'created','updated');
//        $crud->edit_fields('bn_name', 'en_name', 'parent_id', 'status', 'menu_order', 'updated');

//        $crud->field_type('category_id','dropdown',$menu_item);
        $crud->field_type('category_order','dropdown',range(1, 100, 1));

        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));

//        $crud->display_as('en_name', 'English Name');
//        $crud->display_as('bn_name', 'Bangla Name');

        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "Home Category List";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = "admin/users";

        $this->load->view('admin/theme/grocery-layout',$output);
    }

    function horoscope()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table(TBL_HOROSCOPE);
        $crud->set_subject('Horoscope');

        $crud->columns('bn_name', 'bn_description', 'bn_date', 'created');
        $crud->add_fields('bn_name', 'bn_description', 'en_name', 'en_description', 'bn_date', 'en_date', 'created', 'updated');
        $crud->edit_fields('bn_name', 'bn_description', 'en_name', 'en_description', 'bn_date', 'en_date', 'updated');

//        $crud->display_as('bn_category_name', "Category Name Bangla");
//        $crud->display_as('en_category_name', "Category Name English");
//        $crud->display_as('menu_order', "Order");
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));

        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "News";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = 'admin/users';
        $this->load->view('admin/theme/grocery-layout',$output);
    }

    function vote()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table(TBL_VOTE_QS);
        $crud->set_subject('Vote');

        $crud->columns('bn_qs', 'en_qs', 'created');
        $crud->add_fields('bn_qs', 'en_qs', 'created', 'updated');
        $crud->edit_fields('bn_qs', 'en_qs', 'updated');

//        $crud->display_as('bn_category_name', "Category Name Bangla");
//        $crud->display_as('en_category_name', "Category Name English");
//        $crud->display_as('menu_order', "Order");
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));

        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "News";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = 'admin/users';
        $this->load->view('admin/theme/grocery-layout',$output);
    }

    function users()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table(TBL_USERS);
        $crud->set_subject('Users');

//        $crud->set_relation('shift_id', TBL_WORK_SHIFTS,'shift_name');
        $crud->required_fields(array('name', 'user_name','email', 'user_status', 'user_type'));

        $crud->columns('name', 'user_name','email', 'user_status', 'user_type', 'image_url');
        $crud->add_fields('name', 'user_name','email','password','user_type', 'user_status', 'image_url', 'created', 'updated');
        $crud->edit_fields('name', 'user_name','email','password','user_type', 'user_status', 'image_url', 'updated');

//        $crud->set_rules("user_name", "User Name", "trim|xss_clean|callback___checkUserName");
//        $crud->set_rules("email", "Email", "trim|xss_clean|callback___checkEmail");
        $crud->callback_before_insert(array($this,'convertPassword'));
        $crud->callback_before_update(array($this,'convertPasswordForEdit'));
        $crud->callback_edit_field('password',array($this,'callback_edit_password_field'));

        $crud->display_as('image_url', "Picture");
        $crud->change_field_type('created', 'hidden', date('Y-m-d H:i:s'));
        $crud->change_field_type('updated', 'hidden', date('Y-m-d H:i:s'));

        $crud->set_field_upload('image_url','assets/upload/users');

        $output = $crud->render();
        $output->base_url = base_url();
        $output->title = "Users";
        $output->base_url = base_url();
        $output->admin = base_url()."assets/admin/";
        $output->content = 'admin/users';
        $this->load->view('admin/theme/grocery-layout',$output);
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
    
    function test()
    {
        $sql = "
            SELECT V.news_id, V.category_id
            FROM news V
            JOIN(
              SELECT *  
              FROM(
                SELECT news_id , category_id ,COUNT(1) cnt
                FROM news
                GROUP BY category_id
              )V
              ORDER BY cnt DESC
              LIMIT 5
            ) C
            ON V.category_id = C.category_id 
            ORDER BY V.category_id";

            $query = $this->db->query($sql);
            $data = $query->row();
            
            
            echo "<pre>";
            echo $this->db->last_query();
            print_r($data);
            exit();
    }
}

