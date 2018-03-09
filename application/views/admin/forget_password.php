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
                        <img src="<?=$base_url?>assets/images/pathshala-logo.png" alt="Chain Logo" >
                    </div>
                    <br/>
                    
                    <form action="<?=$base_url?>login/password_request" method="post">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="email"  name="email" class="form-control" placeholder="Type your Email">
                        </div>
                                                
                        <div class="clearfix">                            
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">Reset <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>   
                        <br/>                        
                        
                        <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-danger"><?=$this->session->flashdata('msg')?></div>
                        <?php } ?>
                    </form>                    
                </div>
            </div>            
        </section>
    </body>
</html>
