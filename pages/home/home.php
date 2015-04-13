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


    <!-- Chosen Select  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-chosen/chosen.css" />

    <link rel="stylesheet" href="assets/css/app/app.v1.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="home">
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
    
    <section class="content">
        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">EduScope Network</a>
            <a href="?action=step" class="btn btn-success navbar-btn pull-right"><i class="fa fa-hand-o-right"></i></a>
        </header>
        <!-- /header -->
        <div class="warper container-fluid">
            <!-- Carousel -->
            <div id="home-slider" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="assets/images/intro/slide1.jpg" alt="" />
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Slide 1</h1>
                                <p class="lead">Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <img src="assets/images/intro/slide2.jpg" alt="" />
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Slide 2</h1>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <img src="assets/images/intro/slide3.jpg" alt="" />
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Slide 2</h1>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <img src="assets/images/intro/slide4.jpg" alt="" />
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Slide 2</h1>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <img src="assets/images/intro/slide5.jpg" alt="" />
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Slide 2</h1>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#home-slider" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#home-slider" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
            <!-- /end slider -->
            <!-- include login, register and activation dialogs if needed -->
            <?php 
                if(!isset($_SESSION['user'])) {
                    include "common/dialogs/login.php";
                    include "common/dialogs/register.php";
                    include "common/dialogs/activation.php";
                    include "common/dialogs/register-notification.php";
                }

                //include activation dialog if needed
                /*if(isset($_GET['action'])) {
                    if($_GET['action'] == "activate")
                        include "common/dialogs/activation.php";
                }*/    
            ?>

        </div>
        <footer class="container-fluid footer">
            Copyright &copy; 2015 <a href="#">Lawrence S.Ting Fund | IS Technology Co., Ltd.</a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
    </section>
    <!-- /footer - begin scripts-->
    <!-- JQuery -->
    <!--<script src="assets/js/jquery/jquery.min.js" type="text/javascript"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>


    <!-- NanoScroll -->
    <script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- Chosen -->
    <script src="assets/js/plugins/bootstrap-chosen/chosen.jquery.min.js"></script>
    <!-- Custom JQuery -->
    <script src="assets/js/app/custom.js" type="text/javascript"></script>
    <!-- Crypto -->
	<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha1.js"></script>
	

    <script>
        $('#home-slider').addClass("full").carousel({ interval: 5000 });
        $('#home-slider .item img').each(function(){
            var img = $(this);
            img.parent().css('background-image', 'url('+img.attr('src')+')');
            img.remove();
        });
    </script>
</body>

</html>