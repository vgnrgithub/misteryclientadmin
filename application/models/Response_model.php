<?php
class Response_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->model('response_model');
    }
    public function save_data()
    {
        $this->load->helper('url');
        $data = array();
        for($i=0; $i<3; $i++) {
            $data[$i] = array(
                'audit_id' => 1,
                'question_id' => 4,
                'response' => 'response'
            );
        }
        return $this->db->insert_batch('responses', $data);
    }
    public function getResponses($auditid=FALSE)
    {
        $this->db->select('*');
        $this->db->from('responses');
        $this->db->where('responses.audit_id',$auditid);
        $this->db->join('question', 'responses.question_id = question.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_responses($data,$responseid)
    {
        $this->load->helper('url');
        $this->db->where('id', $responseid);
        return $this->db->update('responses', $data);
    }
    public function insert_responses($data)
    {
        $this->load->helper('url');
        return $this->db->insert('responses', $data);
    }

}