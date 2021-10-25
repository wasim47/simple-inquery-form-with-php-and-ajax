<?php include('admin_tophead.php');?>
<body class="nav-md" ng-controller="ItemsController">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0; height:auto">
                        <a href="#"><img src="<?php echo base_url();?>asset/images/logo.png" style="text-align:center; margin:5%">
                       </a>
                    </div>
                    <div class="clearfix"></div>


                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo base_url();?>asset/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $this->session->userdata('userAccessName');?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                
                                <li><a><i class="fa fa-desktop"></i>Administration<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('admin/admin_list');?>">Admin List</a></li>
                                        <li><a href="<?php echo base_url('admin/admin_registration');?>">New Admin Registration</a></li>
                                    </ul>
                                </li>
                             
                               <li><a><i class="fa fa-desktop"></i>Enquery<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('admin/inquary_list');?>">Enquery List</a></li>
                                        <li><a href="<?php echo base_url('admin/inquary_registration');?>">New Enquery</a></li>
                                    </ul>
                                </li>
                                
                                
                                 <li><a><i class="fa fa-desktop"></i>Hosting Package<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('admin/hosting_list');?>">Package List</a></li>
                                        <li><a href="<?php echo base_url('admin/hosting_registration');?>">New Package</a></li>
                                    </ul>
                                </li>
                            </ul>
                      </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('admin/logout');?>">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url();?>asset/images/img.jpg" alt=""><?php echo $this->session->userdata('userAccessName');?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    
                                    <li><a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>