<?php

class Question extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }
}