<?php
include 'header.php';

include 'lib/Main.php';

$con = new Main();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include 'inc/Sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include 'inc/top_bar.php'; ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Update Category</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <hr/>
                <div class="row">
                    <div class="col-6 offset-3">
                        <?php
                        if (isset($_REQUEST['update'])) {
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                                <div class="alert alert-success"><?php echo $con->userUpdate($_POST); ?>
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                                </div>



                            <?php } else { ?>
                                <div class="alert alert-danger">Request Method Invalid!</div>
                            <?php }
                        }
                        if ($_REQUEST['id']) {
                            $id = $_REQUEST['id'];
                            $results = $con->getUserDataByid('users', $id);
                            foreach ($results as $result) {
                                ?>
                                <form class="user" action="" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <img src="<?php echo $result['photo']?>" alt="No image" style="width:128px;height:128px">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input  class="form-control" name="id"
                                                    hidden value="<?php echo $result['id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control" name="full_name"
                                                   id="exampleFirstName" value="<?php echo $result['full_name']?>"
                                                   placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control" name="username" value="<?php echo $result['username']?>" id="exampleusername"
                                                   placeholder="User Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="email" class="form-control" disabled value="<?php echo $result['email']?>" name="email" id="exampleusername"
                                                   placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="phone" class="form-control" value="<?php echo $result['phone']?>" name="phone" id="examplephone"
                                                   placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control" value="<?php echo  $result['password'] ?>" name="password" id="examplepassword"
                                                   placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control" value="<?php echo $result['address']?>" name="address" id="examplepassword"
                                                   placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <select class="form-control" name="gender"  id="">
                                                <option value="1"><?php echo ($result['gender'] == 1) ? 'Male' : 'Fe-male' ?></option>
                                                <option value="1">Male</option>
                                                <option value="0">Fe-male</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <select class="form-control"  name="status" id="">
                                                <option value=""><?php echo ($result['status'] == 1) ? 'Active' : 'De-Active' ?></option>
                                                <option value="1">Active</option>
                                                <option value="0">De-Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="file" class="" value="<?php /*echo $result['photo']*/?>" name="photo" id="examplephoto">
                                        </div>
                                    </div>-->
                                    <input type="submit" class="btn btn-primary btn-user" name="update"
                                           value="Update Users"/>
                                </form>
                            <?php }
                        } ?>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include 'inc/footer.php'; ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<!-- Bootstrap core JavaScript-->
<script src="assets/css/vendor/jquery/jquery.min.js"></script>
<script src="assets/css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/css/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/css/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
