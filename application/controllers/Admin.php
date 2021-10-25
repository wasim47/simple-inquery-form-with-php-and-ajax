<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		//if(!$this->session->userdata('userAccessMail')) redirect("admin");
	}
	function index()
	{
		//if($this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$data['title']="CMSN Networks | World Popular University Admission and Latest Education News";
        $this->load->view('admin/index',$data);
	}

/////////////////////// Admin Part ////////////////////////////////	 
	
	function dashboard()
	{
		//if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Dashboard CMSN Networks | Bangladesh Latest Educational daily";
		$data['main_content']="admin/dashboard";
        $this->load->view('admin_template',$data);
	}
	public function userLogin()
     {
          $username = $this->input->post("username");
  		  $password = $this->input->post("password");
          $this->form_validation->set_rules("username", "Email", "trim|required|min_length[6]|valid_email");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
              redirect('admin');
          }
          else
          {
                    $usr_result = $this->AdminModel->get_userLogin($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
					  $sessiondata = array(
						'userAccessMail'=>$username,
						'userAccessName'=> $usr_result['username'],
						'userAccessId' => $usr_result['id'],
						'password' => TRUE
					   );
						$this->session->set_userdata($sessiondata);
						redirect("admin/dashboard/");
                    }
                    else
                    {
                     $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">Invalid Email and password!</div>');
                     redirect('admin');
                    }
          }
     }
	 
    function logout()
  	{
	  $sessiondata = array(
				'userAccessMail'=>'',
				'userAccessName'=> '',
				'userAccessId' => '',
				'password' => FALSE
		 );
	$this->session->unset_userdata($sessiondata);
	$this->session->sess_destroy();
    redirect('admin', 'refresh');
  }
  	
	
	
	function inquary_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Enquery List | CMSN Networks";
		$data['inquery_list'] = $this->AdminModel->getTable('inquary','id','desc');
		$data['main_content']="admin/inquary/inquary_list";
        $this->load->view('admin_template',$data);
	} 
	
	function inquary_registration()
	{
		
		$artiId=$this->uri->segment(3);
		
		$data['inquaryUpdate'] = $this->AdminModel->getAllItemTable('inquary','id',$artiId,'','','id','desc');
		$data['hostingPackage'] = $this->AdminModel->getAllItemTable('hostingpkg','','','','','id','asc');
        $data['title']="inquary Update | CMSN Networks";
        $this->form_validation->set_rules('clientname', 'Email', 'trim|required');
        $this->form_validation->set_rules('contactno', 'Contact', 'trim|required');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				$save['package'] = addslashes($this->input->post('inquary_pkg'));
				
				
				$save['clientname'] = $this->input->post('clientname');
				$save['email'] = $this->input->post('email');
				$save['contactno'] = $this->input->post('contactno');
				$save['package'] = $this->input->post('package');
				$save['hosting'] = $this->input->post('hosting');
				$save['domain'] = $this->input->post('domain');
				$save['domainno'] = $this->input->post('domainno');
				$save['domainprice'] = $this->input->post('domainprice');
				$save['approvedby'] = $this->input->post('approvedby');
				$save['status'] = $this->input->post('status');
				$save['remarks'] = $this->input->post('remarks');
				
				if($this->input->post('id')!=""){
					$id=$this->input->post('id');
					$this->AdminModel->update_table('inquary','id',$id,$save);
					$s='Updated';
				}
				else{
					$query = $this->AdminModel->inertTable('inquary', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/inquary_list', 'refresh');
			}
			else{
				$data['main_content']="admin/inquary/inquary_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/inquary/inquary_action";
        $this->load->view('admin_template', $data);
	}
	
	/////////////////////// hosting ////////////////////////////////	 
	function hosting_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("administrator");
		$data['title']="Usefull link List | CMSN Networks";
		$data['hosting_list'] = $this->AdminModel->getTable('hostingpkg','id','desc');
		$data['main_content']="admin/hosting/hosting_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function hosting_registration()
	{
		
		$artiId=$this->uri->segment(3);
		
		$data['hostingUpdate'] = $this->AdminModel->getAllItemTable('hostingpkg','id',$artiId,'','','id','desc');
		if(!$artiId){
			$data['title']="hosting Registration | CMSN Networks";
			$this->form_validation->set_rules('hosting_pkg', 'Hosting Packege', 'trim|required|is_unique[hostingpkg.package]');
			$this->form_validation->set_rules('hosting_price', 'Hosting Price', 'trim|required|is_unique[hostingpkg.price]');
		}
		else{
			$data['title']="hosting Update | CMSN Networks";
			$this->form_validation->set_rules('hosting_pkg', 'Link Title', 'trim|required');
			$this->form_validation->set_rules('hosting_price', 'Link URL', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				$save['package']	    = addslashes($this->input->post('hosting_pkg'));
				$save['price']	    = addslashes($this->input->post('hosting_price'));
				$save['created_at']	    = date('Y-m-d H:i:s');
				
				if($this->input->post('id')!=""){
					$id=$this->input->post('id');
					$this->AdminModel->update_table('hostingpkg','id',$id,$save);
					$s='Updated';
				}
				else{
					$query = $this->AdminModel->inertTable('hostingpkg', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/hosting_list', 'refresh');
			}
			else{
				$data['main_content']="admin/hosting/hosting_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/hosting/hosting_action";
        $this->load->view('admin_template', $data);
	}
	
	

	 
}

?>