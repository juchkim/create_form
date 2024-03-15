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
        $preview_param = array("row"=>$res, 'src_arr'=>$src_arr, 'idx'=>$idx);
        $this->load->view('page/preview',$preview_param);
        $this->load->view('common/footer');
    }

    public function page()
    {
        $idx = $this->input->get('idx');
        $res = $this->FormDataModel->select_one_table($idx);
        $src_obj_arr = json_decode($res['src']);
        $src_arr = array();
        for($i=2;$i<count($src_obj_arr); $i++){
            array_push($src_arr, (array)$src_obj_arr[$i]);
        }
        $preview_param = array("row"=>$res, 'src_arr'=>$src_arr, 'idx'=>$idx);
        $this->load->view('common/header');
        $this->load->view('page/view',$preview_param);
    }

    public function data_view()
    {
        $idx = $this->input->get('idx');
        $table_res = $this->FormDataModel->select_one_table($idx);
        $title = $table_res['title'];

        $res = $this->FormDataModel->select_data_one_table($idx);
        $list = $res['list'];
        $data_arr = array();
        foreach($list as $key => $row){
            $list_data = json_decode($row['data_str']);
            $temp_arr = array();
            foreach ($list_data as $key => $item) {
                array_push($temp_arr, (array)$item);
            }
            array_push($data_arr, $temp_arr);
        }
        $data_param = array("list"=>$data_arr,'title'=>$title,'idx'=>$idx);
        $this->load->view('common/header');
        $this->load->view('common/nav');

        $this->load->view('page/data_view', $data_param);
        $this->load->view('common/footer');
    }
}