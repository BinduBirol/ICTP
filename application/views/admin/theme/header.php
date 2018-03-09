<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?=$title?></title>

        <link href="<?=$admin?>css/style.default.css" rel="stylesheet">
        <link href="<?=$admin?>css/morris.css" rel="stylesheet">
        <link href="<?=$admin?>css/select2.css" rel="stylesheet" />
        
        <!--<script src="<?=$admin?>js/jquery-1.11.1.min.js"></script>-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?=$admin?>js/html5shiv.js"></script>
        <script src="<?=$admin?>js/respond.min.js"></script>
        <![endif]-->
        
        <!--Grocery-->
        <?php foreach($css_files as $file):?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach;?>        
        
        <?php foreach($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>        
        
    </head>

    <body>
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="<?=$base_url?>admin" class="logo">
                        <img src="<?=$base_url?>assets/images/pathshala-logo.png" width="40px" alt="" />
                    </a>
                    <div class="pull-right">
                        <a href="#" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>

                <div class="header-right">
                    <div class="pull-right">

                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <strong>User Profile</strong> <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="<?=$base_url?>admin/users/edit/<?=$this->session->userdata('user_id') ?>"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                                <li><a href="<?=$base_url?>login/logout"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>