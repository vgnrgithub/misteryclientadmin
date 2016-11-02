<?php
class Question_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    public function get_questions($category_id = FALSE,$audit_id = FALSE)
    {
        $this->db->select('responses.id as response_id, responses.response as response, question.id as question_id, question.text as text, question.explication as explication');
        $this->db->from('question');
        $this->db->where('question.category_id <= ', $category_id);
        $this->db->join('responses', 'responses.question_id = question.id and responses.audit_id = '.$audit_id.' ', 'left');
        $this->db->order_by('question.id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}