<?php
class Agent extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('agent_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index()
    {
        if(isset($_SESSION['agent_data_session']))
        {
            $this->load->model('Company_model', 'company');
            $data['agent'] = $_SESSION['agent_data_session'];
            $data['session'] = $_SESSION['agent_data_session'];
            $data['companies'] = $this->company->get_companies_agent($data['agent']['id']);
            redirect(base_url('index.php/agent/login'));
            $this->load->view('templates/headerlogin');
            $this->load->view('agent/login',$data);
            $this->load->view('templates/footerlogin');
        }else {
            $this->load->view('templates/header');
            $this->load->view('agent/index');
            $this->load->view('templates/footer');
        }
    }
    public function saveSessionData($data)
    {
        $this->session->set_userdata('agent_data_session', $data);
    }
    public function login()
    {
        $this->load->model('Company_model', 'company');

        if(isset($_SESSION['agent_data_session']))
        {
            $data['agent'] = $_SESSION['agent_data_session'];
            $data['session'] = $_SESSION['agent_data_session'];
            $data['companies'] = $this->company->get_companies_agent($data['agent']['id']);
            $this->load->view('templates/headerlogin');
            $this->load->view('agent/login',$data);
            $this->load->view('templates/footerlogin');
        }else
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('agent/index');
                $this->load->view('templates/footer');
            }
            else
            {
                $data['agent'] = $this->agent_model->login_agent();
                if(!empty($data['agent'])){
                    $this->saveSessionData($data['agent']);
                    $data['companies'] = $this->company->get_companies_agent($data['agent']['id']);
                    $data['session'] = $_SESSION['agent_data_session'];
                    $this->load->view('templates/headerlogin');
                    $this->load->view('agent/login',$data);
                    $this->load->view('templates/footerlogin');
                }else{
                    $this->form_validation->set_message('check_database', 'invalid username and password');
                    $this->load->view('templates/header');
                    $this->load->view('agent/index');
                    $this->load->view('templates/footer');
                }
            }
        }
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url('index.php'));
        $this->load->view('templates/header');
        $this->load->view('agent/index');
        $this->load->view('templates/footer');
    }
}