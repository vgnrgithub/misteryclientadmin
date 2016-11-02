<?php
class Audit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('audit_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }
    public function edit($id = FALSE)
    {
        $data['agent'] = $_SESSION['agent_data_session'];

        $this->load->view('templates/headerlogin');
        $this->load->view('audit/edit',$data);
        $this->load->view('templates/footerlogin');
    }
    public function create($companyid = FALSE)
    {
        $data['agent'] = $_SESSION['agent_data_session'];
        $data['companyid'] = $companyid;

        $this->load->model('Company_model', 'company');

        $companyName = $this->company->get_companies($companyid);

        $this->audit_model->create($companyid,$companyName);
        redirect(base_url('index.php/company/listAudit/'.$companyid));
        $this->load->view('templates/headerlogin');
        $this->load->view('company/listAudit',$data);
        $this->load->view('templates/footerlogin');
    }
    public function pdf($auditid = FALSE)
    {
        $this->load->model('Question_model', 'question');
        $this->load->model('Audit_model', 'audit');
        $data['audit'] = $this->audit->get_audit($auditid);
        $data['results'] = $this->question->get_questions($data['audit']['category_id'],$auditid);

        $this->load->library('fpdf');
        $this->load->library('PDF');
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',12);
        $numberQuestions = count($data['results']);
        for($i=0;$i<$numberQuestions;$i++){
            $pdf->Cell(0,10,$data['results'][$i]['text'],0,1);
            $pdf->Cell(0,10,$data['results'][$i]['response'],0,1);
        }
        $pdf->Output();
    }
}