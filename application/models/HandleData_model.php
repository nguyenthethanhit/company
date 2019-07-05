<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HandleData_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function CheckUser($username)
	{
		$this->db->select('id');
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		return $query->num_rows();
	}
	public function SignUp($username,$password,$ten,$sdt,$diachi,$email)
	{
		$info = array('username' =>$username , 'password' => $password, 'ten' => $ten, 'sdt' => $sdt, 'diachi' => $diachi, 'email' => $email );
		$this->db->insert('user', $info);
		return $this->db->insert_id();
	}
	public function CheckLogin($u,$p)
	{
		$this->db->select('id');
		$this->db->where(['username' => $u, 'password' => $p]);
		$query = $this->db->get('user');
		return $query->num_rows();
	}
	
	public function GetData()
	{
		
		//$count = $this->GetCount();
		$this->db->select('*');
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function GetDataUser($u)
	{
		$this->db->select('*');
		$this->db->where('username', $u);
		$data = $this->db->get('user');
		return $data->result_array();
	}
	public function DeleteData($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}
	public function UpdateData($id,$username,$ten,$sdt,$diachi,$email)
	{
		$data = array('username' => $username , 'ten' => $ten, 'sdt' => $sdt, 'diachi' => $diachi, 'email' => $email );
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}
	public function UpdatePass($u,$p)
	{
		$this->db->where('username', $u);
		$pass = array('password' => $p );
		return $this->db->update('user', $pass);
	}

}

/* End of file HandleData.php */
/* Location: ./application/models/HandleData.php */