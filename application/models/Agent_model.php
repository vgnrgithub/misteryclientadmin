<?php
class Agent_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function login_agent()
    {
        $this->load->helper('url');

        $emailagent = $this->input->post('email');
        $pwdagent = $this->input->post('password');

        $query = $this->db->get_where('agent', array('email' => $emailagent,'password' => $pwdagent));
        return $query->row_array();
    }
}