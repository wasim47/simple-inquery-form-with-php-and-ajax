<link type="text/css" rel="stylesheet" href="<?php echo base_url('asset/css/front/');?>/easy-responsive-tabs.css" />
<script src="<?php echo base_url('asset/js/front/');?>/easyResponsiveTabs.js" type="text/javascript"></script>
<!-- <script src="<?php echo base_url('asset/js/front/captcha.js');?>" type="text/javascript"></script> -->
<script type="text/javascript">
	function captcha(){
	//alert("dkjfhdjfh");
	var fval = document.getElementById('fval').innerHTML;
	var sval = document.getElementById('sval').innerHTML;
	var result = parseInt(fval) + parseInt(sval);
	document.getElementById('result').value = result;
	var resval = document.getElementById('result').value;
	var captchaInput = document.getElementById('captchaInput').value;
	
	var comment = document.getElementById('comment').value;
	var fullname = document.getElementById('fullname').value;
	var contact = document.getElementById('contact').value;
	var remail = document.getElementById('email').value;
	var location = document.getElementById('location').value;
	//var re = /\S+@\S+\.\S+/;
	var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if(comment==''){
		alert('Please Type your comment here!');	
		document.getElementById('comment').focus();
	}
	else if(fullname==''){
		alert('Please Enter Your Name!');	
		document.getElementById('fullname').focus();
	}
	else if(!re.test(remail)){
			 alert('Please Enter Valid Email!');
			 document.getElementById('email').focus();	
	}
	else if(contact==''){
		alert('Please Enter Contact Number!');	
		document.getElementById('contact').focus();
	}
	else if(location==''){
		alert('Please Enter Location!');	
		document.getElementById('location').focus();
	}
	else if(captchaInput==''){
		alert('Please Enter Captcha Result!');	
		document.getElementById('captchaInput').focus();
	}
	else{
		if(resval==captchaInput){
			window.location.href='<?php echo base_url('index/querySignUp');?>?comment='+comment+'&email='+remail+'&fullname='+fullname+'&contact='+contact+'&location='+location;
		}
		else{
			alert('Wrong Captcha');	
			return false;
		}
	}
}


function checkEmail() {

    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
}


function loadContent(id)
{
    //alert(ordtime);
    $("#orderlight").show('slow');
    $("#fade").show('slow');
    var excimg = $('#imgsrc'+id).attr('src');
    var imgalt = $('#imgsrc'+id).attr('alt');
    //alert(excimg);
    $('#bigimg').attr('src',excimg);
    $('#bigimg').attr('alt',imgalt);
    $('#bigimg').attr('title',imgalt);

    //Facebook
    $('#fb').attr('href','https://www.facebook.com/sharer/sharer.php?u='+excimg);
    //Twitter
    $('#tw').attr('href','https://twitter.com/home?status='+excimg);
    //google Plus
    $('#gp').attr('href','https://plus.google.com/share?url='+excimg);
    //google Plus
   $('#link').attr('href','https://www.linkedin.com/shareArticle?mini=true&url='+excimg+'&title='+imgalt+'&summary='+imgalt);



}

function closeButton()
{
  $("#orderlight").hide('medium');
  $("#fade").hide('medium');
}

</script>

   <div class="container">
        <div class="row">
        <div><?php echo $this->session->flashdata('successMsg');?></div>
            <div class="col-md-8">
                <div class="main-slideshow">
                    <?php include("main_slider.php");?> 
                </div> <!-- /.main-slideshow -->
            </div> <!-- /.col-md-12 -->
            
            <div class="col-md-4">
            	<div style="background:#fff; border:2px solid #79A5FF; margin-top:11px; box-shadow:#ccc 0 0 4px 4px; padding:0 10px; width:100%; float:left; height:auto">
                        <?php //echo form_open('index/signUp', 'class="request-info clearfix"');?>
                     <div class="widget-main">       
                     	<h2 style="font-size:18px; padding:5px 0; margin:0; text-align:center">Inquiry Form</h2>
                            <div class="full-row" style="margin-bottom:5px">
                                <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control">
                            </div>
							<div class="full-row" style="margin-bottom:5px">
                                <input type="text" id="contact" name="contact" placeholder="Contact Number" class="form-control" required>
                            </div>
                            <div class="full-row" style="margin-bottom:5px">
                                <input type="email" id="email" name="email"  class="form-control" placeholder="Email Address">
                            </div>
                            <div class="full-row" style="margin-bottom:5px">
                                <input type="text" id="location" name="location"  class="form-control" placeholder="Location">
                            </div>
                            <div class="full-row" style="margin-bottom:5px; margin-top:5px">
                                <div class="input-select">
                                    <textarea class="form-control" name="comment" id="comment" placeholder="Write Your Inquiry"></textarea>
                                </div> <!-- /.input-select -->  
                            </div>
                            <div class="full-row" style="margin-bottom:5px">
                                  <label for="txtarea1" class="col-sm-3 control-label"><span id="fval">
								  <?php echo rand(5, 15);?></span> + <span id="sval"><?php echo rand(5, 15);?></span></label>
                                                <div class="col-sm-9 pull-right" style="float:right; margin:0; padding:0">
                                                  <input type="text" class="form-control" id="captchaInput" placeholder=" = ?" />
                            <input type="hidden" class="form-control" id="result" />
                                                </div>								
                            </div>
                            <div class="full-row" style="margin-bottom:5px">
                                <div class="submit_field">
                                    <span class="small-text pull-left"></span>
                                    <input type="button" id="submit" name="submit" onclick="captcha()"  style="margin:10px 0 3px 100px; float:right; text-align:right" class="btn btn-success pull-right" value="Submit"/>
                                </div> 
                            </div>
                    </div>
                        <?php //echo form_close();?>
                </div> 
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            
            <!-- Here begin Main Content -->
            <div class="col-md-8">
                <div class="row">
		<?php 
		   $count=0;
			foreach($newsdisplay->result() as $news)
			{
			$news_id=$news->news_id;
			$image=$news->image;
			$post=$news->post;
			$slug=$news->slug;
			$image_title=$news->news_title;
			$short_description=$news->short_description;
			$date_time=$news->date_time;
            $count++;
			?>
                    <div class="col-md-6 col-sm-6">
                        <div class="big_img" style="height:300px;">
                                <a href="<?php echo base_url('news/details/'.$slug);?>">
                                    <img src="<?php echo base_url('asset/uploads/news/'.$image);?>" alt="<?php echo $image_title;?>" title="<?php echo $image_title;?>" style="height:230px; width:100%">
                                </a>
                            <div class="big_caption">
                                <h4 class="blog-grid-title"><a href="<?php echo base_url('news/details/'.$slug);?>"><?php echo stripslashes($image_title);?></a>
                                <p class="blog-grid-meta small-text" style="text-align:center"><span><?php echo date('l , d F Y H:i:s',strtotime($date_time));?></span> 
                            </div> <!-- /.box-content-inner -->
                        </div> <!-- /.blog-grid-item -->
                    </div> <!-- /.col-md-6 -->
			<?php
            }
		   ?>
           
                </div> <!-- /.row -->
		<div class="container" style="background:#fff; padding:10px; margin-top:3px;">
			<h4 class="widget-title" style="text-align:right"><a href="<?php echo base_url('news');?>">See All News...</a></h4></div>
                <div class="row">
                    
                    <!-- Show Latest Blog News -->
                    <div class="col-md-6">
                        <?php include('latest_news.php');?>  <!-- /.widget-main -->
                    </div> <!-- /col-md-6 -->
                    
                    <!-- Show Latest Events List -->
                    <div class="col-md-6">
                         <?php include('events.php');?>   <!-- /.widget-main -->
                    </div> <!-- /.col-md-6 -->
                    
                </div> <!-- /.row -->
                
                <div class="row">
				<?php 
                   $count=0;
                    foreach($university->result() as $uni)
                    {
                    $uni_id=$uni->uni_id;
                    $uniname=$uni->name;
                    $logo=$uni->logo;
					$slug=$uni->slug;
                    $city=$uni->city;
                    $campus=$uni->campus;
                    $count++;
                    ?>
                            <div class="col-md-4 col-sm-4" style="padding:5px;">
                                <div class="big_img" style="height:250px;">
                                        <a href="<?php echo base_url('university/'.$slug);?>">
                                            <img src="<?php echo base_url('asset/uploads/university/'.$logo);?>" alt="<?php echo $uniname;?>" style="height:200px;">
                                        </a>
                                    <div class="big_caption">
                                        <h4 class="blog-grid-title"><a href="<?php echo base_url('university/'.$slug);?>"><?php echo $uniname;?></a></h4>
                                    </div> 
                                </div>
                            </div>
                    <?php
                    }
                   ?>

                </div>
                
            </div>
            
            <!-- Here begin Sidebar -->
            <div class="col-md-4">
			   
                <div class="big_img"><?php include('notice_board.php');?></div>
                <div class="big_img"><?php include('success_story.php');?> </div>
				<div class="big_img"><?php include('picture_gallery.php');?> </div>
				<div class="big_img"><?php include('videogalleryhome.php');?> </div>
                <div class="big_img"><?php include('usefull_link.php');?></div>
				<div class="big_img"><?php include('university_list.php');?></div>
                <div class="big_img"><?php include('medical_list.php');?></div>
               <div class="big_img"> <?php include('addisplayhome.php');?> </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>


<div id="fade" class="black_overlay"></div>        
        <div id="orderlight" class="white_content">
            <div><button type="button" onclick="closeButton()" style="width:30px; height:30px; float:left;background-color:#f00; border:none; padding:5px; border-radius:50%">X</button></div>
            <div class="row pull-right" style="border-bottom:1px solid #ccc; padding-bottom:5px; margin-right:20px;">
              <a id="fb" target="_blank" style="cursor:pointer"><img src="<?php echo base_url('asset/images/facebook.png');?>" alt="https://www.facebook.com/geebangladesh"></a>
              <a id="tw" target="_blank" style="cursor:pointer"><img src="<?php echo base_url('asset/images/twitter.png');?>" alt="https://twitter.com/geebangladesh"></a>
              <a id="gp" target="_blank" style="cursor:pointer"><img src="<?php echo base_url('asset/images/google.png');?>" alt="https://plus.google.com/+GEEBangladesh"></a>
              <a id="link" target="_blank" style="cursor:pointer"><img src="<?php echo base_url('asset/images/linked.png');?>" alt="https://www.linkedin.com/in/gee-bangladesh-30706a52?ppe=1"></a>
            </div>
              <img id="bigimg" alt="<?php echo $title;?>" title="<?php echo $title;?>" style="width: 100%; height: auto;"/>
</div>