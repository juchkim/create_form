<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('FormDataModel');
    }

    private function loginConfirm()
    {
        return isset($_SESSION['id']) && $_SESSION['id']=='admin';
    }

    public function loginPage()
    {
        $res = $this->loginConfirm();
        if($res){
            header('Location:'.base_url().'App');
        }
        $this->load->view('common/header');
        $this->load->view('page/loginPage');
    }

    public function index()
    {
        $res = $this->loginConfirm();
        if(!$res){
            header('Location:'.base_url().'App/loginPage');
        }
        $this->load->view('common/header');
        $this->navTag();
        $res = $this->FormDataModel->select_all_table();
        $index_param = array("list"=>$res['list']);
        $this->load->view('page/index', $index_param);
        $this->load->view('common/footer');
    }

    public function form()
    {
        $res = $this->loginConfirm();
        if(!$res){
            header('Location:'.base_url().'App/loginPage');
        }
        $idx = $this->input->get('idx');
        $res = $this->FormDataModel->select_one_table($idx);
        $src_arr = array();
        if(isset($res['src'])){
            $src_obj_arr = json_decode($res['src']);
            for($i=1;$i<count($src_obj_arr); $i++){
                array_push($src_arr, (array)$src_obj_arr[$i]);
            }
        }
        $form_param = array("row"=>$res, 'src_arr'=>$src_arr, 'idx'=>$idx);

        $this->load->view('common/header');
        $this->navTag();

        $this->load->view('page/form', $form_param);
        $this->load->view('common/footer');
    }

    public function preview()
    {
        $res = $this->loginConfirm();
        if(!$res){
            header('Location:'.base_url().'App/loginPage');
        }
        $this->load->view('common/header');
        $this->navTag();

        $idx = $this->input->get('idx');
        $res = $this->FormDataModel->select_one_table($idx);
        $src_obj_arr = json_decode($res['src']);
        $src_arr = array();
        for($i=1;$i<count($src_obj_arr); $i++){
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
        for($i=1;$i<count($src_obj_arr); $i++){
            array_push($src_arr, (array)$src_obj_arr[$i]);
        }
        $preview_param = array("row"=>$res, 'src_arr'=>$src_arr, 'idx'=>$idx);
        $this->load->view('common/header');
        $this->load->view('page/view',$preview_param);
    }

    public function finish()
    {
        $idx = $this->input->get('idx');
        $this->load->view('common/header');
        $finishParam = array("idx" => $idx);
        $this->load->view('page/finish', $finishParam); 
    }

    public function data_view()
    {
        $res = $this->loginConfirm();
        if(!$res){
            header('Location:'.base_url().'App/loginPage');
        }

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
        $this->navTag();
        $this->load->view('page/data_view', $data_param);
        $this->load->view('common/footer');
    }

    private function navTag()
    {
        $res = $this->FormDataModel->select_all_table();
        $nav_param = array("list"=>$res['list']);
        $this->load->view('common/nav', $nav_param);
    }
}