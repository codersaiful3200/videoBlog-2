<?php
include 'cms/lib/Session.php';
Session::init();
Session::checklogin();
include 'cms/constants/constants.php';
include 'cms/lib/Database.php';
include 'cms/lib/User.php';
$user = new User();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Vizew - Blog &amp; Magazine HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/img/core-img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css"
          type="text/css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <style>
        .body {
            background-image: url('https://media.giphy.com/media/lKKXOCVviOAXS/giphy.gif');
            background-repeat: no-repeat;
            width: 480px;
        }

        .vizew-btn:hover {
            background: #244ec9 !important;
            transition: transform 0.3s;
            transform-style: preserve-3d;
            transform-origin: 0 50%;
            -webkit-transition: -webkit-transform 0.3s;
            -moz-transition: -moz-transform 0.3s;
            -webkit-transform-origin: 50% 0;
            -moz-transform-origin: 50% 0;
            -webkit-transform-style: preserve-3d;
        }
    </style>
</head>

<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>


<?php include 'inc/navigation.php'; ?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="vizew-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Login Area Start ##### -->
<div class="vizew-login-area section-padding-80 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 ">
                <div class="login-content body">
                    <!-- Section Title -->
                    <div class="vizew-btn w-100 mb-5">

                        <a href="cms/register.php" style="font-size: 26px; color: #fff !important;"><span
                                    data-hover="No Account ? Please Register here">No Account ? Please Register here</span></a>
                        <div class="line"></div>
                    </div>
                    <div class="section-heading">
                        <h4 class="bg-info offset-2 col-8 font-italic ">Great to have you back!</h4>
                        <div class="line"></div>
                    </div>
                    <?php
                    if (isset($_REQUEST['submit'])) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            echo $user->userLogin($_POST);
                        } else { ?>
                            <div class="alert alert-danger">Request Method Invalid!</div>
                        <?php }
                    } ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                   placeholder="Email or User Name">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label text-dark" for="customControlAutosizing">Remember
                                    me</label>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="login"
                               class="btn vizew-btn w-100 mt-30">
                        <!--<button type="submit" name="submit" class="btn vizew-btn w-100 mt-30">Login</button>-->
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ##### Login Area End ##### -->

<?php include 'inc/footer.php'; ?>

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="assets/js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="assets/js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="assets/js/active.js"></script>
</body>

</html>