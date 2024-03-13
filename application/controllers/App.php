<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');
        $this->load->view('page/index');
        $this->load->view('common/footer');
    }

    public function form()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');
        $this->load->view('page/form');
        $this->load->view('common/footer');
    }
}