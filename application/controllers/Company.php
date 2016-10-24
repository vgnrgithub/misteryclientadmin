<?php
/**
 * Created by PhpStorm.
 * User: vicgnadal
 * Date: 24/10/16
 * Time: 12:06
 */

class Company extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
        $this->load->helper('url_helper');
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
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a new company';

        $this->form_validation->set_rules('client', 'Name', 'required');
        $this->form_validation->set_rules('clientemail', 'Email', 'required');
        $this->form_validation->set_rules('clientrequester', 'Requester', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('company/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->company_model->set_company();
            $this->load->view('company/success');
        }
    }
}