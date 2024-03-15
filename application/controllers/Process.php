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
			$tb_name = $it_data[1]['value'];
			var_dump($form_data);
			$src = $form_data;
			$sql = "INSERT INTO  create_tb(tb_name, title, src) values(?,?,?)";
			$param = array($title, $tb_name, $src);
			$this->db->query($sql,$param);
			echo "<script>alert('등록이 되었습니다');location.href=`".base_url()."App`</script>";
		} catch (Exception $e) {
			echo "<script>alert('서버에 오류가 발생 되었습니다.');location.href=`".base_url()."App`</script>";
		}
	}
}
