<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EduScope Network</title>
    <link rel="shortcut icon" href="assets/images/logo/eduscope-48.png" />

    <meta name="description" content="">
    <meta name="author" content="Ideas and Solutions">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
    
    
   
    <link rel="stylesheet" href="assets/css/app/app.v1.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Preloader -->
    <div class="loading-container">
        <div class="loading">
            <div class="l1">
                <div></div>
            </div>
            <div class="l2">
                <div></div>
            </div>
            <div class="l3">
                <div></div>
            </div>
            <div class="l4">
                <div></div>
            </div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- User left panel -->
    <?php include "common/drawer.php"; ?>

    <section class="content some-class">

        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">LOGO</a>
            <a href="upload.html" class="btn btn-primary navbar-btn pull-right"><i class="fa fa-upload"></i></a>

        </header>
        <!-- /header -->

        <div class="warper container-fluid">
            <div class="row middle">
                <div class="col-sm-6 padd-xlg">
                    <a href="?action=all-albums" class="stack link-box"><img src="http://placehold.it/640x480/00acde/fff&text=ALBUM" alt="" class="img-responsive"></a>
                </div>
                <div class="col-sm-6 padd-xlg">
                    <a href="?action=all-photos" class="link-box"><img src="http://placehold.it/640x480/00aced/fff&text=ALL" alt="" class="img-responsive"></a>
                </div>
            </div>
        </div>
        
        <!-- include login and register dialogs if needed -->
        <?php 
            if(!isset($_SESSION['user'])) {
                include "common/dialogs/login.php";
                include "common/dialogs/register.php";
            }
        ?>

        <footer class="container-fluid footer">
            Copyright &copy; 2015 <a href="#">Lawrence S.Ting Fund | IS Technology Co., Ltd.</a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
    </section>
    <!-- /footer - begin scripts-->

    <!-- JQuery -->
    <script src="assets/js/jquery/jquery.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    
    
    <!-- NanoScroll -->
    <script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- Custom JQuery -->
    <script src="assets/js/app/custom.js" type="text/javascript"></script>
</body>

</html>