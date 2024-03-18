<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{

	}

	public function send_form_data()
	{
		try {
			$form_data = $this->input->post('form_data');
			$json_data = json_decode($form_data);
			$it_data = array();
			for($i=0; $i<count($json_data); $i++){
				array_push($it_data, (array)$json_data[$i]);
			}
			$title = $it_data[0]['value'];
			// $tb_name = $it_data[1]['value'];
			$src = $form_data;
			$idx = $this->input->post('idx');
			$sql = "";
			$param = array();
			if($idx==null){
				$sql = "INSERT INTO  create_tb(title, src) values(?,?)";
				$param = array($title, $src);
			}else{
				$sql = "update create_tb set title=?, src=? where idx=?";
				$param = array($title, $src,$idx);
			}
			$this->db->query($sql,$param);
			echo "<script>alert('등록이 되었습니다');location.href=`".base_url()."App`</script>";
		} catch (Exception $e) {
			echo "<script>alert('서버에 오류가 발생 되었습니다.');location.href=`".base_url()."App`</script>";
		}
	}

	public function save_data()
	{
		try {
			$form_data = $this->input->post('form_data');
			$idx = $this->input->post('idx');
			$src = $form_data;
			$sql = "INSERT INTO data_tb(tb_idx, data_str) values(?,?)";
			$param = array($idx, $src);
			$this->db->query($sql,$param);
			echo "<script>location.href=`".base_url()."App/finish?idx=$idx`</script>";
		} catch (Exception $e) {
			echo "<script>alert('서버에 오류가 발생 되었습니다.');location.href=`".base_url()."App`</script>";
		}
	}

	public function deleteForm()
	{
		try {
			$idx = $this->input->get('idx');
			$sql = "update create_tb set is_deleted='y' where idx=?";
			$param = array($idx);
			$this->db->query($sql,$param);
			echo "<script>alert('삭제가 되었습니다');location.href=`".base_url()."App`</script>";
		} catch (Exception $e) {
			echo "<script>alert('서버에 오류가 발생 되었습니다.');location.href=`".base_url()."App`</script>";
		}
	}
}
