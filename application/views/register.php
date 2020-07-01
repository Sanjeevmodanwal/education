
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fixed Admin - Bootstrap Admin Dashboard Template</title>

        <!-- Common Plugins -->
        <link href="" rel="stylesheet">

        <link href="<?= base_url('assets/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- Custom Css-->

        <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

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
                        <div class="col-4">
                            <div class="misc-header text-center">
<!--                                <img src="assets/img/logo-dark.png" alt="">-->
                            </div>
                            <div class="misc-box">   
                                <h3 class="text-center"><small>Sign up to get instant access.</small></h3>
                                <form role="form">

                                    <div class="form-group">
                                        <label for="eampleuser1">Username</label>
                                        <div class="group-icon">
                                            <input id="eampleuser1" type="text" name="username" placeholder="Enter Email" class="form-control" required="">
                                            <span class="icon-envelope text-muted icon-input"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="eampleuser1">Email Id</label>
                                        <div class="group-icon">
                                            <input id="eampleuser1" type="email" name="email" placeholder="Enter Email" class="form-control" required="">
                                            <span class="icon-envelope text-muted icon-input"></span>
                                        </div>
                                    </div>

                                    <div class="form-group group-icon">
                                        <label for="exampleInputPassword1">Password</label>
                                        <div class="group-icon">
                                            <input id="exampleInputPassword1" type="password" name="password" placeholder="Password" class="form-control">
                                            <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                    </div>

                                    <div class="form-group group-icon">
                                        <label for="exampleInputPassword1">Select</label>
                                        <div class="group-icon">
                                            <select name="role" class="form-control m-b location">
                                                <option value="1">Student</option>
                                                <option value="2">Teacher</option>
                                                <option value="3">Parent</option>          
                                            </select>
                                        </div>
                                    </div>

                                    <!--                                    <div class="clearfix">
                                                                            <div class="pull-left">
                                                                                <div class="checkbox checkbox-primary margin-r-5">
                                                                                    <input id="checkbox2" type="checkbox" checked="">
                                                                                    <label for="checkbox2"> I Agree with Terms <a href="#">Terms</a> </label>
                                                                                </div> 
                                                                            </div>
                                                                        </div>-->
                                    <button type="submit" class="btn btn-block btn-primary mt-10">Register Now</button>
                                    <hr>

                                    <p class=" text-center">Have an account?</p>
                                    <a href="page-login.html" class="btn btn-block btn-success">Login</a>
                                </form>
                            </div>
                            <div class="text-center">
                                <p>Copyright &copy; 2017 Fixed Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Common Plugins -->
        <script src="assets/lib/jquery/dist/jquery.min.js"></script>

</html>
