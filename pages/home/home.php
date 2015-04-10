<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UI v.1.0</title>
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
    <aside class="left-panel">
       <?php
            if(isset($_SESSION('username')))
        ?>
        <nav class="navigation">
            <ul class="list-unstyled">
                <li><a class="open-modal" data-target="#loginModal" href="signin.html"><i class="fa fa-sign-in"></i><span class="nav-label">Đăng nhập</span></a>
                </li>
                <li><a class="open-modal" data-target="#registerModal" href="signup.html"><i class="fa fa-user-plus"></i><span class="nav-label">Đăng ký</span></a>
                </li>
                <li><a href="faq.html"><i class="fa fa-question-circle"></i><span class="nav-label">FaQ</span></a>
                </li>
            </ul>
        </nav>
    </aside>
    <section class="content">
        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">LOGO</a>
            <a href="home1.html" class="btn btn-success navbar-btn pull-right"><i class="fa fa-hand-o-right"></i></a>
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
            <!-- Register Modal -->
            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form role="form">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="registerModalLabel">Đăng ký thành viên</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Tên hiển thị">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="location form-group row">
                                    <div class="col-xs-6">
                                        <select class="form-control chosen-select prov-select" data-placeholder="Chọn tỉnh thành">
                                            <option></option>
                                            <option value="p1">Province #1</option>
                                            <option value="p2">Province #2</option>
                                            <option value="p3">Province #3</option>
                                            <option value="p4">Province #4</option>
                                            <option value="p5">Province #5</option>
                                            <option value="p6">Province #6</option>
                                            <option value="p7">Province #7</option>
                                            <option value="p8">Province #8</option>
                                            <option value="p9">Province #9</option>
                                            <option value="p10">Province #10</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <select class="form-control chosen-select school-select" data-placeholder="Chọn trường">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" placeholder="Mật khẩu">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" placeholder="Xác nhận mật khẩu">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Login Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form role="form" id="loginForm">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="loginModalLabel">Đăng nhập</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" placeholder="Mật khẩu" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="pull-left">
                                    <label class="cr-styled">
                                        <input type="checkbox" name="remember">
                                        <i class="fa"></i>
                                    </label>
                                    Ghi nhớ?
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--- end loginModal -->
        </div>
        <footer class="container-fluid footer">
            Copyright &copy; 2015 <a href="#">ABCDEF</a>
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