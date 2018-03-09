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
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet" />

        <style>.form-inline .form-control{width: 400px;}</style>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?=$admin?>js/html5shiv.js"></script>
        <script src="<?=$admin?>js/respond.min.js"></script>
        <![endif]-->        
    </head>

    <body>
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="<?=$base_url?>admin" class="logo">
                        <img src="<?=$admin?>images/logo.png" alt="" />
                    </a>
                    <div class="pull-right">
                        <a href="#" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>

                <div class="header-right">
                    <div class="pull-right">
                        <form class="form form-search" action="http://themepixels.com/demo/webpage/chain/search-results.html">
                            <input type="search" class="form-control" placeholder="Search" />
                        </form>

                        <div class="btn-group btn-group-list btn-group-notification">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge">5</span>
                            </button>
                            
                            <div class="dropdown-menu pull-right">
                                <a href="#" class="link-right"><i class="fa fa-search"></i></a>
                                <h5>Notification</h5>
                                <ul class="media-list dropdown-list">
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="<?=$admin?>images/photos/user1.png" alt="">
                                        <div class="media-body">
                                            <strong>Nusja Nawancali</strong> likes a photo of you
                                            <small class="date"><i class="fa fa-thumbs-up"></i> 15 minutes ago</small>
                                        </div>
                                    </li>
                                </ul>
                                <div class="dropdown-footer text-center">
                                    <a href="#" class="link">See All Notifications</a>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group btn-group-list btn-group-messages">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge">2</span>
                            </button>
                            
                            <div class="dropdown-menu pull-right">
                                <a href="#" class="link-right"><i class="fa fa-plus"></i></a>
                                <h5>New Messages</h5>
                                <ul class="media-list dropdown-list">
                                    <li class="media">
                                        <span class="badge badge-success">New</span>
                                        <img class="img-circle pull-left noti-thumb" src="<?=$admin?>images/photos/user1.png" alt="">
                                        <div class="media-body">
                                            <strong>Nusja Nawancali</strong>
                                            <p>Hi! How are you?...</p>
                                            <small class="date"><i class="fa fa-clock-o"></i> 15 minutes ago</small>
                                        </div>
                                    </li>
                                </ul>
                                <div class="dropdown-footer text-center">
                                    <a href="#" class="link">See All Messages</a>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-star"></i> Activity Log</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        
        <?php $this->load->view('admin/theme/admin_menu'); ?>

        <div class="mainpanel">
            <div class="pageheader">
                <div class="media">
                    <div class="pageicon pull-left">
                        <i class="fa fa-hand-o-up"></i>
                    </div>
                    <div class="media-body">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><?=$title?></li>
                        </ul>
                        <h4><?=$title?></h4>
                    </div>
                </div>
            </div>

            <div class="contentpanel">                
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Image Uploads
                    </div>
                    <div class="panel-body">

                        <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-danger">
                                <?=$this->session->flashdata('msg'); ?>
                            </div>
                        <?php } ?>

                        <form action="<?=$base_url?>admin/save_image" method="POST" enctype="multipart/form-data" >

                            <div class="form-group">
                                <table class="table">
<!--                                    <tr>
                                        <td colspan="4">
                                            <select name="image_type" class="form-control" style="width: 280px;">
                                                <option value="post">Post</option>
                                                <option value="drik_image">Drik Image</option>
                                                <option value="event">Event Management</option>
                                            </select>
                                        </td>
                                    </tr>-->
                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>

                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>

                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>

                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>

                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>

                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>

                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>

                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>

                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>

                                    <tr>
                                        <td><input type="name" name="title[]" class="form-control" placeholder="Title"/></td>                                                            
                                        <td><input type="name" style="width: 400px" name="description[]" class="form-control" placeholder="Description"/></td>                                                            
                                        <td><input type="file" name="userfile[]" class="form-group"/></td>                                                            
                                    </tr>
                                </table>

                                <input type="submit" value="Upload" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
               </div>
                
            </div>
        </div>
    </div>
</section>
    

        <script src="<?=$admin?>js/jquery-1.11.1.min.js"></script>
        <!--<script src="<?=$admin?>js/jquery-migrate-1.2.1.min.js"></script>-->
        <script src="<?=$admin?>js/bootstrap.min.js"></script>
        <!--<script src="<?=$admin?>js/modernizr.min.js"></script>-->
        <!--<script src="<?=$admin?>js/pace.min.js"></script>-->
        <!--<script src="<?=$admin?>js/retina.min.js"></script>-->
        <!--<script src="<?=$admin?>js/jquery.cookies.js"></script>-->

        <!--<script src="<?=$admin?>js/flot/jquery.flot.min.js"></script>-->
        <!--<script src="<?=$admin?>js/flot/jquery.flot.resize.min.js"></script>-->
        <!--<script src="<?=$admin?>js/flot/jquery.flot.spline.min.js"></script>-->
        <!--<script src="<?=$admin?>js/jquery.sparkline.min.js"></script>-->
        <!--<script src="<?=$admin?>js/morris.min.js"></script>-->
        <!--<script src="<?=$admin?>js/raphael-2.1.0.min.js"></script>-->
        <!--<script src="<?=$admin?>js/bootstrap-wizard.min.js"></script>-->
        <!--<script src="<?=$admin?>js/select2.min.js"></script>-->
        <script src="<?=$admin?>js/custom.js"></script>
        <!--<script src="<?=$admin?>js/dashboard.js"></script>-->
        
        
        
        <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
        
        <script language="JavaScript">
            
            
            $(document).ready(function() {
                $('#example').DataTable();
            } );
            
            var copy = function(domId)
            {
                copyToClipboard(document.getElementById(domId));
                return false;
            };

            function copyToClipboard(elem) {
                
                var targetId = "_hiddenCopyText_";
                var target = document.getElementById(targetId);
                if (!target) {
                    target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }

                // get desired content into hidden element
                if (elem.tagName === "INPUT" || elem.tagName === "TEXTAREA") {
                    target.textContent = elem.value;
                } else {
                    target.textContent = elem.textContent;
                }
                // select the content
                target.focus();
                target.setSelectionRange(0, target.value.length);

                // copy the selection
                var succeed;
                try {
                      succeed = document.execCommand("copy");
                } catch(e) {
                    succeed = false;
                }
                // clear content
                target.textContent = "";
                return succeed;
            }

        </script> 
        
        
        
        
    </body>
</html>
