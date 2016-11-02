<?php
class Audit_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_audits($idCompany = FALSE)
    {
        $query = $this->db->get_where('audit', array('company_id' => $idCompany));
        return $query->result_array();
    }
    public function get_audit($idAudit = FALSE)
    {
        $query = $this->db->get_where('audit', array('id' => $idAudit));
        return $query->row_array();
    }
    public function create($companyid = FALSE,$companyinfo = FALSE)
    {
        $this->load->helper('url');

        $dateNow = date("mdyHis");
        $hoy = date("Y-m-d H:i:s");
        $originCreated = "Agente";

        $data = array(
            'company_id' => $companyid,
            'name' => $companyinfo['name'].$dateNow,
            'category_id' => 3,
            'state' => 'En proceso',
            'origin' => $originCreated,
            'created' => $hoy
        );

        return $this->db->insert('audit', $data);
    }
    public function updateStatus($auditid = FALSE, $status)
    {
        $data = array(
            'state' => $status
        );
        $this->load->helper('url');
        $this->db->where('id', $auditid);
        return $this->db->update('audit', $data);
    }
}