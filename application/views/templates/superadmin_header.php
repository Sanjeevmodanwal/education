<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>House Plan Dashboard</title>
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icon.png">

      
        
        <link href="<?=base_url('assets/lib/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

        <!-- DataTables -->
<!--        <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/buttons.dataTables.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/toast/jquery.toast.min.css" rel="stylesheet">-->
        <!-- Custom Css-->
        
        <link href="<?=base_url('assets/lib/toast/jquery.toast.min.css');?>" rel="stylesheet">

        <link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet">
        <script src="<?= base_url('assets/lib/jquery/dist/jquery.min.js'); ?>"></script>

    </head>
    <body>

        <!-- ============================================================== -->
        <!-- 						Topbar Start 							-->
        <!-- ============================================================== -->
        <div class="top-bar primary-top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <a class="admin-logo" href="/">
                            <h1>
                                  <div class="card-block border-bottom text-center nav-profile">
                            <img alt="profile" src="<?php echo base_url('assets/img/new-logo.png');?>" width="80">
                            </div>
                            </h1>
                        </a>
                        <div class="left-nav-toggle" >
                            <a  href="#" class="nav-collapse"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="left-nav-collapsed" >
                            <a  href="#" class="nav-collapsed"><i class="fa fa-bars"></i></a>
                        </div>

<!--                        <div class="search-form hidden-xs">
                            <form>
                                <input class="form-control" placeholder="Search for..." type="text"> <button class="btn-search" type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div>-->
                    </div>
                    <div class="col">
                        <ul class="list-inline top-right-nav">
                           <!-- <li class="dropdown icon-dropdown d-none-m">
                                <a class="dropdown-toggle " data-toggle="dropdown" href="#"><i class="fa fa-envelope"></i> <span class="badge badge-warning">2</span></a>
                                <ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
                                    <li>
                                        <div class="dropdown-header">
                                            <a class="pull-right text-muted" href="#"><small>View All</small></a> Messages
                                        </div>

                                        <div class="scrollDiv">
                                            <div class="notification-list">
                                                <a class="clearfix" href="javascript:%20void(0);">
                                                    <span class="notification-icon">
                                                        <img alt="" class="rounded-circle" src="assets/img/avtar-2.jpg" width="50">
                                                    </span> 
                                                    <span class="notification-title">
                                                        John Doe 
                                                        <label class="label label-warning pull-right">Support</label>
                                                    </span> 
                                                    <span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span> 
                                                    <span class="notification-time">15 minutes ago</span>
                                                </a>

                                                <a class="clearfix" href="javascript:%20void(0);">
                                                    <span class="notification-icon">
                                                        <img alt="" class="rounded-circle" src="assets/img/avtar-3.jpg" width="50">
                                                    </span> 
                                                    <span class="notification-title">
                                                        Govindo Doe 
                                                        <label class="label label-warning pull-right">Support</label>
                                                    </span> 
                                                    <span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span> 
                                                    <span class="notification-time">15 minutes ago</span>
                                                </a> 

                                              

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown icon-dropdown d-none-m">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell"></i> <span class="badge badge-danger">2</span></a>
                                <ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
                                    <li>
                                        <div class="dropdown-header">
                                            <a class="pull-right text-muted" href="#"><small>View All</small></a> Notifications
                                        </div>
                                        <div class="scrollDiv">
                                            <div class="notification-list">

                                                <a class="clearfix" href="javascript:%20void(0);">
                                                    <span class="notification-icon">
                                                        <i class="icon-cloud-upload text-primary"></i>
                                                    </span>
                                                    <span class="notification-title">Upload Complete</span> 
                                                    <span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span>
                                                    <span class="notification-time">15 minutes ago</span>
                                                </a> 

                                               

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                           <li class="dropdown">
                                <a class="right-sidebar-toggle d-none-m" href="javascript:%20void(0);"><i class="fa fa-align-right"></i></a>
                            </li>
                            <li class="dropdown avtar-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <img alt="" class="rounded-circle" src="assets/img/avtar-2.jpg" width="30">
                                </a>
                                <ul class="dropdown-menu top-dropdown">
                               <li>
                                        <a class="dropdown-item" href="javascript:%20void(0);"><i class="icon-bell"></i> Activities</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:%20void(0);"><i class="icon-user"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:%20void(0);"><i class="icon-settings"></i> Settings</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    
                                </ul>
                            </li>-->
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url('Auth/logout/');?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!--                        Topbar End                              -->
        <!-- ============================================================== -->


    
        <div class="main-sidebar-nav default-navigation">
            <div class="nano">
                <div class="nano-content sidebar-nav">
                    <ul class="metisMenu nav flex-column" id="menu">
                        <div class="card-block border-bottom text-center nav-profile">
                             <!-- <img alt="profile" class="rounded-circle margin-b-10 circle-border " src="<?php echo base_url('assets/img/new-logo.png');?>" width="80">
                             <p class="lead margin-b-0 toggle-none">John Doe</p>
                            <p class="text-muted mv-0 toggle-none">Welcome</p>
                         <ul class="nav nav-pills toggle-none">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bell"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> <i class="icon-user"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> <i class="icon-settings"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-logout"></i></a>
                                </li>
                            </ul>-->
                        </div>

                       <!-- <li class="nav-heading"><span>Main</span></li>-->

                        <li class="nav-item active"><a class="nav-link" href="<?php echo base_url('dashboard_sadmin');?>"><i class="fa fa-home"></i> <span class="toggle-none">Dashboard </a></li>						
                       

                        <li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);" aria-expanded="true"><i class="fa fa-envelope-o"></i> <span class="toggle-none">Super-Admin<span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="true">
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('dashboard_sadmin/school');?>">Add New School</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('dashboard_sadmin/lists');?>">Total School</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('dashboard_sadmin/total_teacher');?>">Total Teacher</a></li>
                            </ul>
                        </li>
                      
                        
                    </ul>
                </div>
            </div>
        </div>
        
        <style>
            .dropdown-item:focus, .dropdown-item:hover {
    background-color: #5867dd;
}
.card-block.border-bottom.text-center.nav-profile {
    padding: 0px;

}
body.nav-collapsed .admin-logo img {
    padding-left: 0;
    width: 100%;
}
        </style>