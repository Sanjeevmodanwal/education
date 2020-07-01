
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fixed Admin - Bootstrap Admin Dashboard Template</title>

        <!-- Common Plugins -->
        <link href="" rel="stylesheet">
        
        <link href="<?=base_url('assets/lib/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

        <!-- Custom Css-->
     
         <link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet">
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            html,body{
                height: 100%;
            }
        </style>
    </head>
    <body class="bg-light">

        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="misc-header text-center">
<!--                                <img src="assets/img/logo-dark.png" alt="">-->
                            </div>
                            <div class="misc-box">   
<!--                                <form role="form">-->
                                    <div class="form-group">                                      
                                        <label  for="exampleuser1">Email</label>
                                        <div class="group-icon">
                                        <input id="exampleemail" type="email" placeholder="Email" class="form-control" required="">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" type="password" placeholder="Password" class="form-control">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                           <div class="checkbox checkbox-primary margin-r-5">
												<input id="checkbox2" type="checkbox" checked="">
												<label for="checkbox2"> Remember Me </label>
											</div>
                                        </div>
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-block btn-primary Login">Login</button>
                                        </div>
                                    </div>
<!--                                    <hr>-->
<!--                                    <p class="text-center">Need to Signup?</p>
                                    <a href="page-register.html" class="btn btn-block btn-success">Register Now</a>-->
<!--                                </form>-->
                            </div>
                            <div class="text-center misc-footer">
<!--                               <p>Copyright &copy; 2017 Fixed Admin</p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Common Plugins -->
        <script src="assets/lib/jquery/dist/jquery.min.js"></script>
      
        
        <script>
            $('.Login').on("click",function(){
               var email=$('#exampleemail').val();
               var pass=$('#exampleInputPassword1').val();
               $.post("<?php echo base_url('auth/login');?>",{"email":email,"password":pass},function(d){
                  if(d.status==200){
                      window.location.href="<?php echo base_url('/dashboard/');?>";
                  }else if(d.status==500){
                      alert("me");
                  }
               }, "json");
            });
        </script>
		
    </body>
</html>
