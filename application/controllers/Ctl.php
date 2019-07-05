<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		//$this->SignUp_view();
		$this->Admin_show();
		$this->Info_show();
		if($this->session->userdata('user')==""){
			$this->load->view('Login_view');
		}
		
		
	}
	public function SignUp_view()
	{
		$this->load->view('SignUp_view');
	}
	public function SignUp()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$ten = $this->input->post('ten');
		$sdt = $this->input->post('sdt');
		$diachi = $this->input->post('diachi');
		$email = $this->input->post('email');

		if($username ==""){
			redirect('ctl/signup_view','refresh');
		}
		
		$this->load->model('HandleData_model');
		$id = $this->HandleData_model->CheckUser($username);
		if($id){
			$this->session->set_flashdata('errSignUp', 'username đã tồn tại');
			redirect('ctl/signup_view','refresh');
		}
		else{
			$this->load->model('HandleData_model');
			$id2 = $this->HandleData_model->SignUp($username,$password,$ten,$sdt,$diachi,$email);
			if($id2)
			{
				echo "<script> alert('Đăng kí thành công');</script>";
				redirect('ctl/signup_view','refresh');
			}
			else
			{
				echo "that bai";
			}
		}
	}

	public function Login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username ==""){
			redirect('ctl','refresh');
		}
		$this->load->model('HandleData_model');
		$id = $this->HandleData_model->CheckLogin($username,$password);
		if($id)
		{
			$session_data  = array('user' => $username);
			$this->session->set_userdata($session_data);
			$this->Admin_show();
		    $this->Info_show();
		}
		else
		{
			$this->session->set_flashdata('error', 'username hoặc password không đúng');
			redirect('ctl','refresh');

		}
	}
	public function Admin_show()
	{
		if($this->session->has_userdata('user') && $this->session->userdata('user')=='thanhdeptrai')
		{
			$this->load->model('HandleData_model');
			$data = $this->HandleData_model->GetData();
			$data = array('dulieu' => $data );
			$this->load->view('Admin_view', $data, FALSE);
		}
		
	}
	public function Info_show()
	{
		if($this->session->has_userdata('user') && $this->session->userdata('user')!='thanhdeptrai')
		{
			$this->load->model('HandleData_model');
			$data = $this->HandleData_model->GetDataUser($this->session->userdata('user'));
			$data = array('dulieu' => $data );
			$this->load->view('Info_view', $data, FALSE);
		}
	}
	public function DeleteData($id)
	{
		if($this->session->userdata('user')=='thanhdeptrai')
		{
			$this->load->model('HandleData_model');
			if($this->HandleData_model->DeleteData($id))
			{
				redirect('ctl','refresh');
			}
		}
		else
		{
			echo "khong tim thay trang";
		}
		
	}
	public function ShowFormInfo($username)
	{
		if($this->session->userdata('user')=='thanhdeptrai')
		{
			$this->load->model('HandleData_model');
			$data = $this->HandleData_model->GetDataUser($username);
			$data = array('dulieu' => $data );
			$this->load->view('Edit_view', $data, FALSE);
		}
		else
			{
				echo "khong tim thay trang yeu cau";
			}
	}
	public function EditInfo_user()
	{
		if($this->session->has_userdata('user'))
		{
			$username = $this->session->userdata('user');
			$this->load->model('HandleData_model');
			$data = $this->HandleData_model->GetDataUser($username);
			$data = array('dulieu' => $data );
			$this->load->view('Edit_view', $data, FALSE);
		}
		else
		{
			redirect('ctl','refresh');
		}
	}
	public function UpdateInfo_admin()
	{
		$this->load->model('HandleData_model');
		if($this->session->userdata('user')=='thanhdeptrai')
		{
			$username = $this->input->post('username');
			$user = $this->input->post('user');
			$ten = $this->input->post('ten');
			$sdt = $this->input->post('sdt');
			$diachi = $this->input->post('diachi');
			$email = $this->input->post('email');
			$id = $this->input->post('id');
			$check = $this->HandleData_model->CheckUser($username);
			if($username == $user)
			{
				$this->load->model('HandleData_model');
				if($this->HandleData_model->UpdateData($id,$username,$ten,$sdt,$diachi,$email))
				{
					redirect('ctl','refresh');
				}
				else
				{
					echo "update that bai";
				}
			}

			elseif (($username != $user) && ($check ==1)) 
			{
				// $this->session->set_flashdata('errorUpdate', 'username đã tồn tại, update thất bại');
				echo "<script> alert('username đã tồn tại, update thất bại');</script>";
				redirect('ctl','refresh');
			}
			elseif (($username != $user) && ($check == 0)) 
			{
				$this->load->model('HandleData_model');
				if($this->HandleData_model->UpdateData($id,$username,$ten,$sdt,$diachi,$email))
				{
					redirect('ctl','refresh');
				}
				else
				{
					echo "update that bai";
				}
			}

		}
		else{
				$this->UpdateInfo_user();
			}
		
	}
	public function UpdateInfo_user()
	{
		$this->load->model('HandleData_model');
		if($this->session->has_userdata('user') && $this->session->userdata('user') != 'thanhdeptrai')
		{
			$username = $this->input->post('username');
			$user = $this->input->post('user');
			$ten = $this->input->post('ten');
			$sdt = $this->input->post('sdt');
			$diachi = $this->input->post('diachi');
			$email = $this->input->post('email');
			$id = $this->input->post('id');
			$check = $this->HandleData_model->CheckUser($username);
			if($username == $user)
			{
				$this->load->model('HandleData_model');
				if($this->HandleData_model->UpdateData($id,$username,$ten,$sdt,$diachi,$email))
				{
					redirect('ctl','refresh');
				}
				else
				{
					echo "update that bai";
				}
			}
			elseif (($username != $user) && ($check ==1)) 
			{
				// $this->session->set_flashdata('errorUpdate', 'username đã tồn tại, update thất bại');
				echo "<script> alert('username đã tồn tại, update thất bại');</script>";
				redirect('ctl','refresh');
			}
			elseif (($username != $user) && ($check == 0)) 
			{
				$this->load->model('HandleData_model');
				if($this->HandleData_model->UpdateData($id,$username,$ten,$sdt,$diachi,$email))
				{
					session_unset();
					$session = array('user' => $username );
					$this->session->set_userdata( $session );
					redirect('ctl','refresh');
				}
				else
				{
					echo "update that bai";
				}
			}

		}
		else
		{
			redirect('ctl','refresh');
		}
	}
	public function Logout()
	{
		session_unset();
		redirect('ctl','refresh');
	}
	public function ChangePass_view()
	{
		if($this->session->has_userdata('user'))
		{
			$this->load->view('ChangePass_view');
		}
		else
		{
			redirect('ctl','refresh');
		}
		
	}
	public function ChangePass()
	{
		$username = $this->session->userdata('user');
		$password = $this->input->post('oldpass2');
		$this->load->model('HandleData_model');
		$id = $this->HandleData_model->CheckLogin($username,$password);
		if($id)
		{
			$newpass = $this->input->post('newpass2');
			$this->load->model('HandleData_model');
			$id = $this->HandleData_model->UpdatePass($username,$newpass);
			if($id)
			{
				echo "doi mat khau thanh cong";
			}
			else
			{
				echo "doi mat khau that bai";
			}
		}

		else
		{
			$this->session->set_flashdata('err', 'password không đúng');
			redirect('ctl/ChangePass_view','refresh');
		}

	}
	public function Search()
	{
		$username = $this->input->post('search');
		$this->load->model('HandleData_model');
		$id = $this->HandleData_model->CheckUser($username);
		if($id)
		{
			$this->load->model('HandleData_model');
			$data = $this->HandleData_model->GetDataUser($username);
			$data = array('dulieu' => $data );
			$this->load->view('Admin_view', $data, FALSE);

		}
		else
		{
			$this->session->set_flashdata('errorSearch', 'username không tồn tại');
			redirect('ctl','refresh');
		}
	}

}

/* End of file Ctl.php */
/* Location: ./application/controllers/Ctl.php */