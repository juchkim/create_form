<?php
class FormDataModel extends CI_Model {
  public function __construct()
  {
      parent::__construct();
  }

  public function select_all_table()
  {
    $sql = "select * from create_tb";
    $list = $this->db->query($sql)->result_array();
    $result = array("list"=>$list);
    return $result;
  }

  
	public function select_one_table(){
    $idx = $this->input->get('idx');
    $sql = "select * from create_tb where idx =?";
    $param = array($idx);
    $res = $this->db->query($sql,$param)->row_array();
    return $res;
	}

}
?>