<?php
class Company_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_companies($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('company');
            return $query->result_array();
        }

        $query = $this->db->get_where('company', array('id' => $id));
        return $query->row_array();
    }
    public function get_companies_agent($agent_id = FALSE)
    {
        $query = $this->db->get_where('company', array('agent_id' => $agent_id));
        return $query->result_array();
    }
    public function set_company()
    {
        $this->load->helper('url');

        $data = array(
            'name' => $this->input->post('client'),
            'email' => $this->input->post('clientemail'),
            'name_request' => $this->input->post('clientrequester'),
            'agent_id' => $this->input->post('agentid')
        );

        return $this->db->insert('company', $data);
    }
}