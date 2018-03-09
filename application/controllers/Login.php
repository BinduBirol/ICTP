<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Author Mahin
     */
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('user_model');
    }
    
    function index()
    {
        $data['base_url'] = base_url();
        $data['admin'] = base_url()."assets/admin/";
        $this->load->view('admin/login', $data);
    }
    
    function check_login()
    {
        $data['user_name'] = $this->input->post('user_name');
        $data['password'] = $this->input->post('password');
        
        if($data['user_name'] == "" || $data['password'] == "")
        {
            $this->session->set_flashdata('msg', 'Wrong User Details.');
            redirect('login');
        }
        
        $user_check = $this->user_model->loginCheck($data);
        if($user_check)
        {
            $user_info = (array)$user_check->row();
            $this->session->set_userdata($user_info);
            redirect('home');
        }
        
        $this->session->set_flashdata('msg', 'Wrong User Details.');
        redirect('login');        
    }
            
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    
    function forget_password()
    {
        $data['base_url'] = base_url();
        $data['admin'] = base_url()."assets/admin/";
        $this->load->view('admin/forget_password', $data);
    }
    
    function password_request()
    {
        $email = $this->input->post('email');
        if($email == "")
        {
            $this->session->set_flashdata('msg', 'Please enter your E-mail.');
            redirect('login/forget_password');
        }
        
        $chk_email = $this->user_model->getAllUsers(array('email'=>$email));
        if(!$chk_email)
        {
            $this->session->set_flashdata('msg', 'Sorry, Our system doesn\'t recognize that E-mail.');
            redirect('login/forget_password');
        }
        $chk_email = $chk_email->row();
        
        $subject = "Forget Password";
        $body = "Plese click the link below to reset your password <br/><br/><br/>"
                . base_url()."login/password_reset/".$chk_email->user_name;

        $confirmation = $this->send_mail($email, $body, $subject);
        if($confirmation['success'])
        {
            $params['user_id'] = $chk_email->user_id;
            $params['user_status'] = 'Pending';
            $this->user_model->updateUser($params);
            
            $this->session->set_flashdata('msg', 'Plese check your E-mail to reset your password.');
            redirect('login/forget_password');
        }
        
        $this->session->set_flashdata('msg', 'There was a problem. <br/><br/>'.$confirmation['msg']);
        redirect('login/forget_password');
        
    }
    
    function send_mail($receiver, $body, $subject)
    {
        $this->load->library("phpmailer");
        $mailer = new PHPMailer(true);       
        
//        echo $receiver." ".$body." ".$subject;
//        exit();
        
        $mailer->IsHTML(true);            
        $mailer->IsSMTP();                    
        $mailer->SMTPDebug = 1;
        $mailer->SMTPAuth = true;
        $mailer->SMTPDebug  = 1;
        $mailer->Host = "smtp.gmail.com";
        $mailer->Port = 465;
        $mailer->Username = 'mahin.cse2004@gmail.com';
        $mailer->Password = '';
        
        $mailer->AddAddress($receiver);
//        $mailer->addCC('mahin.cse815@gmail.com');
        
        $mailer->AddReplyTo("maatrikgroup@gmail.com", "Pathsala");
        $mailer->From = "maatrikgroup@gmail.com";
        $mailer->FromName = "Pathsala.net";

        $mailer->Subject = $subject;
        $mailer->Body = $body;
        
        try 
        {
            $mailer->Send();
            return array(
                'msg' => 'send',
                'success' => TRUE
            );
        } 
        catch (Exception $ex) 
        {
            return array(
                'msg' => $ex,
                'success' => FALSE
            );
        }        
    }
}