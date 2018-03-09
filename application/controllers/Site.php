<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    /**
     * Author Mahin
     */
    
    public function __construct()
    {
        parent::__construct();        
        $this->load->model('site_model');
    }
    
    public function index()
    {
        $data['title'] = 'Home';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'home';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }            
        
        $data['info'] = $info->row();
        $this->load->view('site/theme/layout', $data);
    }
    
    public function scope()
    {
        $data['title'] = 'Scope';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'scope';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function importent_dates()
    {
        $data['title'] = 'importent_dates';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'importent_dates';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function accepted_papers()
    {
        $data['title'] = 'Accepted Papers';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'accepted_papers';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function paper_submission()
    {
        $data['title'] = 'Paper Submission';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'paper_submission';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function tutorial1()
    {
        $data['title'] = 'Tutorial 1';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'tutorial1';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function tutorial2()
    {
        $data['title'] = 'Paper Submission';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'tutorial2';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function tutorial3()
    {
        $data['title'] = 'Paper Submission';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'tutorial3';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function tutorial4()
    {
        $data['title'] = 'Tutorial 4';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'tutorial4';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function preparation_guidelines()
    {
        $data['title'] = 'Preparation Guidelines';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'preparation_guidelin';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function registration()
    {
        $data['title'] = 'registration';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'registration';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function tutorial_registration()
    {
        $data['title'] = 'Tutorial Registration';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'tutorial_registratio';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function venue()
    {
        $data['title'] = 'venue';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/venue";
        
        $params['category'] = 'venue';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function conference_committees()
    {
        $data['title'] = 'Conference Committees';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'conference_committee';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }   
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function program()
    {
        $data['title'] = 'program';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'program';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function plenary()
    {
        $data['title'] = 'plenary';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'plenary';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function keynote_speech()
    {
        $data['title'] = 'keynote_speech1';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'keynote_speech';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function keynote_speech2()
    {
        $data['title'] = 'keynote_speech2';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'keynote_speech2';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function keynote_speech3()
    {
        $data['title'] = 'keynote_speech3';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'keynote_speech3';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function keynote_speech4()
    {
        $data['title'] = 'keynote_speech 4';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'keynote_speech4';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function invited_speech()
    {
        $data['title'] = 'invited_speech';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'invited_speech';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function travel_info()
    {
        $data['title'] = 'travel_info';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'travel_info';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function awards()
    {
        $data['title'] = 'awards';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'awards';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }
    
    public function contact()
    {
        $data['title'] = 'contact';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/home";
        
        $params['category'] = 'contact';
        $info = $this->site_model->getAllContent($params);
        if($info == false)
        {
            die('site under construction');
        }
        $data['info'] = $info->row();
        
        $this->load->view('site/theme/layout', $data);
    }    
    
    
    
    public function contact1()
    {
        $data['title'] = 'contact';
        $data['base_url'] = base_url();
        $data['assets'] = base_url()."assets/";
        $data['content'] = "site/contact";
        
        $this->load->view('site/theme/layout', $data);
    }  
    
    
}
