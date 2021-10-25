<?php
if($inquaryUpdate->num_rows()>0){
	foreach($inquaryUpdate->result() as $inquaryData);
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
}
else{
	$id='';
	$clientname=set_value('clientname');
	$email=set_value('email');
	$contactno=set_value('contactno');
	$package=set_value('package');
	$hosting=set_value('hosting');
	$domain=set_value('domain');
	$domainno=set_value('domainno');
	$domainprice=set_value('domainprice');
	$approvedby=set_value('approvedby');
	$status=set_value('status');
	$remarks=set_value('remarks');
}
?>
<script>
function domainCheck(){
	var isdomain = document.getElementById("isdomain");
	if(isdomain.checked){
		document.getElementById("domainInfo").style.display = 'inline';
	}
	else{
		document.getElementById("domainInfo").style.display = 'none';
	}
}

function domainValue(dprice){
	document.getElementById("domainprice").value = dprice;
}
</script>

<div class="right_col" role="main">
                <div class="">

                    
                    <div class="clearfix"></div>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>inquary Registraion Form</h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title">
                                                   inquary Information </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        	<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">
                                            Client Name<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="clientname" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Client Name' value="<?php echo $clientname; ?>"  onFocus="this.placeholder=''"
                                                 onBlur="this.placeholder='Client Name'">
                                             <?php echo form_error('clientname', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="email" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Email' value="<?php echo $email; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Email'">
                                             <?php echo form_error('email', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>
                                            
                                           
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="contactno" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Contact' value="<?php echo $contactno; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Contact'">
                                             <?php echo form_error('contactno', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Package<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                               <select name="package" class="form-control">
                                               		<option value="website">Website</option>
                                                    <option value="ecommerce">Ecommerce</option>
                                               </select>
                                             <?php echo form_error('package', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hosting<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                               <select name="hosting" class="form-control">
                                               	<?php foreach($hostingPackage->result() as $hostp):?>
                                               		<option value="<?php echo $hostp->price;?>"><?php echo $hostp->package;?></option>
                                                   <?php endforeach;?>
                                               </select>
                                             <?php echo form_error('hosting', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Domain</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <div class="col-sm-1">
                                                <input type="checkbox" name="domain" id="isdomain" required value="1" onclick="domainCheck()"></div>
                                                <div class="col-sm-11" id="domainInfo" style="display:none">
                                                    <div class="col-sm-3">
                                                        <select name="domainno" class="form-control" onchange="domainValue(this.value)">
                                                            <?php 
															  for($i=1;$i<=30;$i++):
                                                                echo '<option value="'.$i.'000">'.$i.'</option>';
                                                                endfor;
                                                            ?>
                                                            
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-5">
                                                    <input type="text" name="domainprice" id="domainprice" readonly="readonly" class="form-control" value="1000">
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Approved By<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="approvedby" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Approved By' value="<?php echo $approvedby; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Approved By'">
                                             <?php echo form_error('approvedby', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="status" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Status' value="<?php echo $status; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Status'">
                                             <?php echo form_error('status', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Remarks</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="email" required class="form-control"><?php echo $remarks; ?></textarea>
                                            </div>
                                            </div>
                                            
                                        
                                    	  
                                            </div>
                                            
                                        </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
               