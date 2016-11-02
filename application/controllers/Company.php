<?php
class Company extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index()
    {
        $data['companies'] = $this->company_model->get_companies();
        $data['title'] = 'Companies archiveeefew';

        $this->load->view('templates/header', $data);
        $this->load->view('company/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = NULL)
    {
        $data['company'] = $this->company_model->get_companies($id);

        if (empty($data['company']))
        {
            show_404();
        }

        $data['title'] = $data['company']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('company/view', $data);
        $this->load->view('templates/footer');
    }
    public function listAudit($id = NULL)
    {
        $this->load->model('Audit_model', 'audit');

        $data['agent'] = $_SESSION['agent_data_session'];
        $data['audits'] = $this->audit->get_audits($id);
        $data['companyid'] = $id;

        $this->load->view('templates/headerlogin');
        $this->load->view('company/audits',$data);
        $this->load->view('templates/footerlogin');
    }
    public function create( $agent_id = FALSE )
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a new company';
        $data['agent_id'] = $agent_id;
        $data['agent'] = $_SESSION['agent_data_session'];

        $this->form_validation->set_rules('client', 'Name', 'required');
        $this->form_validation->set_rules('clientemail', 'Email', 'required');
        $this->form_validation->set_rules('clientrequester', 'Requester', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/headerlogin');
            $this->load->view('company/create',$data);
            $this->load->view('templates/footerlogin');

        }
        else
        {
            $this->company_model->set_company();
            redirect(base_url('index.php/agent/login'));
            $this->load->view('templates/headerlogin');
            $this->load->view('agent/login');
            $this->load->view('templates/footerlogin');
        }
    }
}