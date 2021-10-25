<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquary extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('InquaryModel','model');
		$this->load->model('AdminModel');
	}

	function index(){
		$data['invoicelist']	= $this->AdminModel->getAllItemTable('inquary','','','','','id','desc');
		$this->load->view("invoice",$data);
	}
	
	
	function invoice()
	{
		$data['title']="Member Registration | CMSN Networks";
		
		/*$name	    = $this->input->get('name');
		$email	    = $this->input->get('email');
		$phone   = $this->input->get('phone');
		$message	    = $this->input->get('message');
		

		$tomaila=$this->input->get('email');
		$frommaila="geebangladesh@gmail.com";
		$subjecta="Thank you for enquery with GEE Bangladesh";
		$config = array (
					  'mailtype' => 'html',
					  'charset'  => 'utf-8',
					  'priority' => '1'
					   );
		$this->email->initialize($config);
		$this->email->set_newline('\r\n');
		$email_bodya ="
		<table width='100%' border='0' cellpadding='0' align='center' cellspacing='0' style='border:3px solid #28AC5B; border-radius:13px; background:#f5f5f5'>
		<tr style='background-color:#fff'>
		<th width='17%' height='137' align='center'> 
		  <img src='http://geebangladesh.com/asset/images/logo.png' /><br>
		  <h3 style='padding:0; margin:0'>GEE Bangladesh</h3>
		<th width='83%' colspan='2' align='left'></th>
		</tr>
    		<tr>
                <td width='26%' height='48' colspan='2' align='left' style='margin:5px; padding:5px; font-weight:bold; font-size:20px'>New Conact Information :</td>
</tr>
		<tr>
		<td height='164' colspan='3' align='left' 
			style='font-size:16px; color:#333; text-decoration:none; background:#D2E7E4; font-weight:normal; padding:10px;' valign='top'>
   	    	
            <table width='100%' border='0' cellpadding='0' align='center' cellspacing='0' style='background-color:#fff'>
                <tr>
                    <td width='26%' align='left' style='margin:5px; padding:5px; font-weight:bold;'>User Name :</td>
                    <td width='74%' align='left'>$name</td>
                </tr>
                <tr>
                    <td width='26%' align='left' style='margin:5px; padding:5px; font-weight:bold;'>Email :</td>
                    <td width='74%' align='left'>$email</td>
                </tr>
               
                <tr>
                    <td width='26%' align='left' style='margin:5px; padding:5px; font-weight:bold;'>Phone :</td>
                    <td width='74%' align='left'>$phone</td>
                </tr>
                <tr>
                    <td width='26%' align='left' style='margin:5px; padding:5px; font-weight:bold;'>Message :</td>
                    <td width='74%' align='left'>$message</td>
                </tr>
			</table>
          </td>
		</tr>
		</table>";
	
		$this->email->from($frommaila, 'CMSN Networks');
		$this->email->to($tomaila);
		$this->email->cc('info@cmsnbd.com');
		$this->email->subject($subjecta);
		$this->email->message($email_bodya);
		$this->email->send();
		$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully sent Message</h2>');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');*/
	}
}

?>