<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('FormDataModel');
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');
        $res = $this->FormDataModel->select_all_table();
        $index_param = array("list"=>$res['list']);
        $this->load->view('page/index', $index_param);
        $this->load->view('common/footer');
    }

    public function form()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');
        $this->load->view('page/form');
        $this->load->view('common/footer');
    }

    public function preview()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');
        $idx = $this->input->get('idx');
        $res = $this->FormDataModel->select_one_table($idx);
        $src_obj_arr = json_decode($res['src']);
        $src_arr = array();
        for($i=2;$i<count($src_obj_arr); $i++){
            array_push($src_arr, (array)$src_obj_arr[$i]);
        }
        $preview_param = array("row"=>$res, 'src_arr'=>$src_arr);
        $this->load->view('page/preview',$preview_param);
        $this->load->view('common/footer');
    }
}