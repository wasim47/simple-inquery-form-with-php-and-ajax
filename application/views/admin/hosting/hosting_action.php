<?php
if($hostingUpdate->num_rows()>0){
	foreach($hostingUpdate->result() as $hostingData);
	$id=$hostingData->id;
	$package=$hostingData->package;
	$link_url=$hostingData->price;
}
else{
	$id='';
	$package=set_value('hosting_pkg');
	$hosting_price=set_value('hosting_price');
	}
?>

<div class="right_col" role="main">
                <div class="">

                    
                    <div class="clearfix"></div>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Hosting Registraion Form</h2>
                                    
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
                                                   Hosting Information </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        	<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">
                                            Hosting Package<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="hosting_pkg" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Package Name' value="<?php echo $package; ?>"  onFocus="this.placeholder=''"
                                                 onBlur="this.placeholder='package Name'">
                                             <?php echo form_error('hosting_pkg', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Price<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="hosting_price" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Price' value="<?php echo $hosting_price; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Price'">
                                             <?php echo form_error('hosting_price', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
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
               