<?php

class Response extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('response_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }
    public function edit($audit_id = FALSE)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Question_model', 'question');
        $this->load->model('Audit_model', 'audit');

        $data['agent'] = $_SESSION['agent_data_session'];
        $data['audit'] = $this->audit->get_audit($audit_id);
        $data['questions'] = $this->question->get_questions($data['audit']['category_id'],$audit_id);

        $this->load->view('templates/headerlogin');
        $this->load->view('response/edit',$data);
        $this->load->view('templates/footerlogin');

    }
    public function update()
    {
        $data['form_data'] = $this->input->post();
        $auditoriaId = $data['form_data']['auditoriaid'];
        $dataNumRows = count($data['form_data']) - 1;
        for($i=0;$i<$dataNumRows;$i++){
            if(!empty($data['form_data']['responseid'][$i])){
                $dataUpdate = array(
                    'audit_id' => $data['form_data']['auditoriaid'],
                    'question_id' => $data['form_data']['questionid'][$i],
                    'response' => $data['form_data']['response'][$i]
                );
                $this->response_model->update_responses($dataUpdate,$data['form_data']['responseid'][$i]);
            }else{
                $dataInsert = array(
                    'audit_id' => $data['form_data']['auditoriaid'],
                    'question_id' => $data['form_data']['questionid'][$i],
                    'response' => $data['form_data']['response'][$i]
                );
                $this->response_model->insert_responses($dataInsert);
            }
        }
        $this->checkStatusAudit($auditoriaId);
        $this->load->view('templates/headerlogin');
        $this->load->view('response/update',$data);
        $this->load->view('templates/footerlogin');
        redirect(base_url('index.php'));
    }
    public function checkStatusAudit($auditoriaId = FALSE)
    {
        $data['responses'] = $this->response_model->getResponses($auditoriaId);
        $completeAudit = TRUE;
        foreach ($data['responses'] as $respuesta)
        {
            if(empty($respuesta['response'])){
                $completeAudit = FALSE;
            }
        }
        $this->load->model('Audit_model', 'audit');
        if($completeAudit)
        {
            $this->audit->updateStatus($auditoriaId,'Completada');
        }else{
            $this->audit->updateStatus($auditoriaId,'En proceso');
        }
    }
}