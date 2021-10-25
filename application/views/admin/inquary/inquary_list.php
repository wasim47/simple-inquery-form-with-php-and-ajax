<script type="text/JavaScript">
function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>admin/deleteData/'+tablename+'/'+colid,
			   data: "deleteId="+pid,
			   success: function() {
				  alert("Successfully saved");
				  window.location.reload(true);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
	else{
	 return;
	}
	 
}


checked = false;
function checkedAll() {
if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('form_check').elements.length; i++){
	  document.getElementById('form_check').elements[i].checked = checked;
	}
}


function deletedata(tablename){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
		var b = window.confirm('Are you sure, you want to delete this ?');
		if(b==true){
			var hrefdata ='<?php echo base_url()?>admin/deleteAllData/'+tablename+'/std_id/'+data;
			window.location.href=hrefdata;
			}
			else{
			 return;
			 }
	}
	
}
</script>
<div class="right_col" role="main">
      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 style="float:left">Total enquery (<?php echo $inquery_list->num_rows();?>)</h2>
                                    <h2 style="float:right"><input type="button" class="btn btn-danger btn-sm" onclick="deletedata('enquery');" value="Delete" /></h2>
                                    <div class="clearfix"></div>
                                   
                                </div>
                                <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                <div class="container">
                                	 <?php echo form_open('', 'name="formUserSearch" id="form_check"');?>
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th>SI</th>
                                        <th width="5%"><input name="checkbox" onclick='checkedAll();' type="checkbox" disabled="disabled" readonly="readonly" /></th>
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
										foreach($inquery_list->result() as $inquaryData):
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
										$created_at=$inquaryData->created_at;
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code<?php echo $i; ?>" value="<?php echo $id;?>" /></td>
                                        <td><?php echo $clientname; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $contactno; ?></td>
                                        <td>
                                             <a href="javascript:void();" class="btn btn-warning btn-xs" data-target="#mymodal<?php echo $id;?>" data-toggle="modal">
          										<span class="fa fa-eye"></span> View Details </a>
                                            
                                            
                                                        <div id="mymodal<?php echo $id;?>" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <button type="button" class="btn btn-danger pull-right" title="Close" data-dismiss="modal">&times; </button>
                                                                        <h4 class="modal-title">View Details</h4>
                                                                    </div>
                                                                      <div class="modal-body">
                                                                        <table class="table table-striped" width="100%">
<thead>
                                                          <tr>
                                                          	<th width="30%" align="left">Client Name</th>
                                                            <td width="70%" align="left"><?php echo $clientname; ?></td>
    </tr>
                                                          <tr>
                                                          	<th width="30%" align="left">Phone</th>
                                                            <td align="left"><?php echo $contactno; ?></td>
                                                          </tr>
                                                          <tr>
                                                          	<th width="30%" align="left">Email</th>
                                                            <td align="left"><?php echo $email; ?></td>
                                                          </tr>
                                                          
                                                          <tr>
                                                          	<th width="30%" align="left">Package</th>
                                                            <td align="left"><?php echo $package; ?></td>
                                                          </tr>
                                                          <tr>
                                                          	<th width="30%" align="left">Hosting</th>
                                                            <td align="left"><?php echo $hosting; ?></td>
                                                          </tr>
                                                         
                                                          <tr>
                                                          	<th width="30%" align="left">Domain</th>
                                                            <td align="left"><?php echo $domain; ?></td>
                                                          </tr>
                                                          <tr>
                                                          	<th width="30%" align="left">No. of Domain</th>
                                                            <td align="left"><?php echo $domainno; ?></td>
                                                          </tr>
                                                          <tr>
                                                          	<th width="30%" align="left">Domain Price</th>
                                                            <td align="left"><?php echo $domainprice; ?></td>
                                                          </tr>
                                                          <tr>
                                                          	<th width="30%" align="left">Approved By</th>
                                                            <td align="left"><?php echo $approvedby; ?></td>
                                                          </tr>
                                                          <tr>
                                                          	<th width="30%" align="left">Status</th>
                                                            <td align="left"><?php echo $status; ?></td>
                                                          </tr>
                                                          <tr>
                                                          	<th width="30%" align="left">Remarks</th>
                                                            <td align="left"><?php echo $remarks; ?></td>
                                                          </tr>
                                                          <tr>
                                                          	<th width="30%" align="left">Submit Date</th>
                                                            <td align="left"><?php echo date('l d F, Y', strtotime($created_at)); ?></td>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                        </table>
                                                                      </div>
                                                                      
                                                                      
                                                                    </div>
                                                                </div>
                                                        </div>
                                                       <a href="javascript:void();" onclick="openPage1('<?php echo $id;?>','inquery','id');" class="btn btn-danger btn-xs">
          										<span class="glyphicon glyphicon-remove-circle"></span> Remove
                                            </a>   
                                                  
                                        </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
                                  <?php echo form_close();?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>