<!--Developed by Mahin, for more info visit www.mahin.info-->

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>User Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        
        <link href="<?=$base_url?>assets/css/style.default.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="signin">
        <section>   
            <br/><br/><br/><br/><br/>
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="<?=$base_url?>assets/images/ictp-logo.png" alt="Chain Logo" >
                    </div>
                    <br/>
                    <div class="col-md-4 col-md-offset-4">

                        <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-danger"><?=$this->session->flashdata('msg')?></div>
                        <?php } ?>

                        <form action="<?=$base_url?>login/check_login" method="post">
                            <div class="input-group mb15">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" required name="user_name" class="form-control" placeholder="Username or Email">
                            </div><br/>

                            <div class="input-group mb15">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" required name="password" class="form-control" placeholder="Password">
                            </div>

                            <br/>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <button type="submit" class="btn btn-success">Login <i class="fa fa-angle-right ml5"></i></button>
                                </div>
                            </div>
                            <br/>
                        </form>
                    </div>
                </div>
            </div>            
        </section>
    </body>
</html>
