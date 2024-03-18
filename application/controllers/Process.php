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
			$thumnail = $this->input->post('thumnail');
			$sql = "";
			$param = array();
			if($idx==null){
				$sql = "INSERT INTO  create_tb(title, src, thumnail) values(?,?, ?)";
				$param = array($title, $src, $thumnail);
			}else{
				$sql = "update create_tb set title=?, src=?, thumnail=? where idx=?";
				$param = array($title, $src, $thumnail, $idx);
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

	public function login()
	{
		$id = $this->input->post('id');
		$encrpt_id = $this->hash_password($id);
		$pwd = $this->input->post('pwd');
		$encrpt_pwd = $this->hash_password($pwd);
		if(
			$encrpt_id == "Sod5VRUQWQALR2rj8SNwloRQ1UaehIpYLcUoIpQmIWNmULysNtaKZjbopmnpuu9w0rab2jNMMCcsMYxFcZ65pQ==" 
		&&
			$encrpt_pwd == "s/DRVKVzrEJWv1rTGsd/b243u6XTFOWdeZ0rfgNXUkvCHZ+q906NI83OOf1K5QMdWflFLe20U5KuGwZ2okuy9A==" 
		){
			$_SESSION['id']=$id;
			echo "<script>location.href=`".base_url()."App`</script>";
		}
	}

	public function logout()
	{
		session_destroy();
    echo "<script>location.href=`".base_url()."App`</script>";
	}

	private function hash_password($password){
		$hashed = base64_encode(hash('sha256', $password, true));
		$encrpt = base64_encode(hash('sha512', $hashed, true));
		return $encrpt;
	}

	public function file_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name']=true;
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload('uploadFile'))
		{
			echo json_encode(array('res'=>false));
		}	
		else
		{
			$data = $this->upload->data();
			echo json_encode(array('res'=>true, 'file_name'=>$data['file_name']));
		}
	}
}
