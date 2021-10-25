 <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
   <style>
    
 .table_header{
	color:#fff;
	background:#000c10;
	padding:5px;
}
.trTitle{
	color:#fff;
	background:#000c10;
}

.trCont{
	padding:10px;
}
   </style>
  <?php
   if($invoicelist->num_rows() > 0){
	  foreach($invoicelist->result() as $inquaryData);
	  	$id=$inquaryData->id;
		$clientname=$inquaryData->clientname;
		$email=$inquaryData->email;
		$contactno=$inquaryData->contactno;
		$package=$inquaryData->package;
		$hosting=$inquaryData->hosting;
		$domain=$inquaryData->domain;
		$domainno=$inquaryData->domainno;
		$domainprice=$inquaryData->domainprice;
		$approvedby=$inquaryData->approvedby;
		$status=$inquaryData->status;
		$remarks=$inquaryData->remarks;
		
		$hostingWque = $this->db->query("SELECT * FROM hostingpkg WHERE id = '".$hosting."'");
		$rowVal = $hostingWque->row_array();
		$hostingPack = $rowVal['package'];
		$hostingPrice = $rowVal['price'];
  }
 
?>
<script type="text/javascript">
//window.onload=print();
</script>


<style>
	body {
	  background: rgb(204,204,204); 
	}
	page {
	  background: white;
	  display: block;
	  margin: 0 auto;
	  margin-bottom: 0.5cm;
	  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
	}
	page[size="A4"] {  
	  width: 21cm;
	  min-height: 29.7cm; 
	  height: auto;
	}
	page[size="A4"][layout="portrait"] {
	  width: 29.7cm;
	   min-height: 29.7cm; 
	   height: auto; 
	}
	page[size="A3"] {
	  width: 29.7cm;
	  height: 42cm;
	}
	page[size="A3"][layout="portrait"] {
	  width: 42cm;
	  height: 29.7cm;  
	}
	page[size="A5"] {
	  width: 14.8cm;
	  height: 21cm;
	}
	page[size="A5"][layout="portrait"] {
	  width: 21cm;
	  height: 14.8cm;  
	}
	@media print {
	  body, page {
		margin: 0;
		box-shadow: 0;
	  }
	}
	
	
	.printfontsize{
		font-size:18px;
		border-color:#000;
	}
</style>
<page size="A4" layout="portrait">
<div style="padding:1cm;">
  <div style="width:100%; float:left">
       <div class="row">
                                <div class="col-sm-12">
                                	<div class="col-sm-2" style="width:20%; float:left">
                                    <img src="<?php echo base_url('asset/images/logo.png');?>" style="width:200px; height:auto" /></div>
                                    <div style="width:80%; float:left">
                                    	<address class="printfontsize">
                                            <h3>K R C International</h3>                                            
                                            Hardware Goods Importers & Suppliers <br />
                                            Shope-51, 16/17 Nurani Center <br />
                                            Imamgonj, Dhaka<br />
                                            Phone: 01785859495, 01785859495<br />
                                            <br />
    
                                        </address>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-12">
                                	<div class="row" style="font-size:18px; border-bottom:1px solid #333; text-align:center">Bill/Invoice</div>
                                    <div class="col-sm-6">
                                    	<h4 class="text-left printfontsize">Invoice No. <?php echo '0001';?></h4>
                                    </div>
                                     
                                     <div class="col-sm-6">
                                    	<h4 class="text-right printfontsize">Date. <?php echo date('Y-m-d');?></h4>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-6" style="margin-top:20px;">
                                        <table width="100%" height="91" border="0" cellpadding="1" cellspacing="1" class="printfontsize">
                                          <tr>
                                            <td width="22%" height="29">Client Name</td>
                                            <td width="3%" align="center">:</td>
                                            <td width="75%"><?php echo $clientname;?></td>
                                          </tr>
                                          <tr>
                                            <td height="28">Email</td>
                                            <td align="center">:</td>
                                            <td><?php echo $email;?></td>
                                          </tr>
                                          <tr>
                                            <td>Contact</td>
                                            <td align="center">:</td>
                                            <td><?php echo $contactno;?></td>
                                          </tr>                                         
                                        </table>
                                  </div>
                                     
                                </div>
                              	
                                
                                <div class="col-sm-12" style="margin-top:30px;">
                               	 <table width="100%" cellpadding="2" cellspacing="1" class="printfontsize" border="1" 
                                 style="border-collapse:collapse; border-color:#000;">
          
                                  <tr  class="table_header">
                                    <td width="35" height="34" align="center"><span class="style2">SI</span></td>
                                    <td width="285" align="center" class="printfontsize">Package</td>
                                    <td width="207" align="center"class="printfontsize">Hosting</td>
                                    <td width="177" align="center"class="printfontsize">Hosting Price</td>
                                    <td width="159" align="center"class="printfontsize"> No of Domain</td>
                                    <td width="149" align="center"class="printfontsize">Domain Price</td>
                                  </tr>
                                 
                                 
                                 <tr>
                                    <td width="35" height="34" align="center"><span class="style2"> 1 </span></td>
                                    <td width="285" align="center"><?php echo $package;?></td>
                                    <td width="207" align="center"><?php echo $hostingPack;?></td>
                                    <td width="177" align="center"><?php echo $hostingPrice;?></td>
                                    <td width="159" align="center"> <?php echo $domainno;?></td>
                                    <td width="149" align="center"><?php echo $domainprice;?></td>
                                  </tr>
                                  
                                 
                                 
                          		<?php /*?><tr><td height="36" colspan="9" align="center">&nbsp;</td></tr>
                                <tr>
                                   <td height="44" colspan="6" align="center">&nbsp;</td>
                                   <td align="center">Total Amount</td>
                                   <td align="center">TK&nbsp;&nbsp;<?php echo number_format($grand_total);?></td>
                                </tr>
                                <tr>
                                   <td height="44" colspan="6" align="center">&nbsp;</td>
                                   <td align="center">Paid Amount</td>
                                   <td align="center">TK&nbsp;&nbsp;<?php echo number_format($paid_amount);?></td>
                                </tr>
                                <tr>
                                   <td height="44" colspan="6" align="center">&nbsp;</td>
                                   <td align="center">Due Amount</td>
                                   <td align="center">TK&nbsp;&nbsp;<?php echo number_format($due_amount);?></td>
                                </tr><?php */?>
                                </table>
                                </div>
                                
                                
                                
                                
                                
                                </div>                         
  </div>
 </page>              