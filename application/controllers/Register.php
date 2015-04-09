<?php

class Register extends CI_Controller {
 
public function index()
{
	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
	$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
	$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|callback_password_check');
	$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('nation', 'nation', 'required');
	if($this->form_validation->run() == FALSE)
		{
  		//$this->load->helper('url');
   			$this->load->view('register');
		}
  		else
		{
   			$this->load->model('register_model','register');
   			$this->register->insert($_POST);
		}
}
public function username_check($str)
{
	if (0)
	{
		$this->form_validation->set_message('username_check', 'The %s field can not be ...');
		return FALSE;
	}
	else
	{
	return TRUE;
	}
}
public function password_check($str)
	{
	if (0)
	{
		$this->form_validation->set_message('username_check', 'The %s field can not be ...');
		return FALSE;
	}
	else
	{
		return TRUE;
	}
}
 public function checkUnique(){
 	//$student_id=$this->input->post('student_id');
 	//$this->load->model('register_model','register');
 	//echo $this->register->ajxCheck($student_id);
 	echo 0;
 }

 public function setSession(){
 	$this->load->library('session');
 	$user='qltf8';
 	$this->session->set_userdata('user',$user);
 }

 public function showSession(){
 	$this->load->library('session');
 	$arr=$this->session->all_userdata();
 	print_r($arr);
 }

}
?>