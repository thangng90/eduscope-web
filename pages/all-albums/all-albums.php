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
            <a class="navbar-brand" href="#">LOGO</a><a href="upload.html" class="btn btn-primary navbar-btn pull-right"><i class="fa fa-upload"></i></a>
        </header>
        <!-- /header -->
        <div class="warper container-fluid">
            <div class="page-header">
                <h1>TITLE</h1>
            </div>
            <div class="filter-bar row">
                <form action="#search.php">
                    <div class="col-sm-4 col-md-3">
                        <select class="form-control chosen-select prov-select" data-placeholder="Chọn tỉnh thành">
                           <option>Tất cả</option>
                           <?php 
                                $model = new UsersModel();
                                $listProvince = $model->getListProvince();
                                if($listProvince != null) {
                                    foreach($listProvince as $province) {
                                        echo "<option value=" . $province->id . ">" . $province->name . "</option>";
                                    }
                                }
                            ?>
                            <!--<option value="p1">Province #1</option>
                            <option value="p2">Province #2</option>
                            <option value="p3">Province #3</option>
                            <option value="p4">Province #4</option>-->
                        </select>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <select class="form-control chosen-select school-select" data-placeholder="Chọn trường">
                            <option></option>
                        </select>
                    </div>
                    <!-- 
                    <div class="col-sm-4 col-md-6">
                        <div class="btn-group pull-right">
                            <label for="ty-album" type="button" class="btn btn-default">
                                <i class="fa fa-book"></i>
                                <input type="radio" name="type" id="ty-album" checked>
                            </label>
                            <label type="button" class="btn btn-default">
                                <i class="fa fa-photo"></i>
                                <input type="radio" name="type" id="ty-photo">
                            </label>
                        </div>
                    </div>
-->
                </form>
            </div>
            <div class="row album-grid">
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                    <div class="item-wrapper transit">
                        <a class="photo-link" href="#">
                            <figure class="transit">
                                <img src="http://placehold.it/640x480" alt="">
                                <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                            </figure>
                        </a>
                        <div class="photo-info">
                            <div class="author">
                                <a href="user1.html"><img src="assets/images/avtar/user.png" alt="" class="avatar"> Việt</a>
                                <time><i class="fa fa-calendar"></i> 09/09/2015</time>
                            </div>
                            <div class="extras">
                                <h2 class="album-name">Album XYZ</h2>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
            
            <div class="text-center show-more" data-limit="20" data-more="album"><i class="fa fa-spinner fa-spin fa-3x"></i></div>
            
            <?php 
                if(!isset($_SESSION['user'])) {
                    include "common/dialogs/login.php";
                    include "common/dialogs/register.php";
                }
            ?>
            
        </div>
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
    <!-- Chosen -->
    <script src="assets/js/plugins/bootstrap-chosen/chosen.jquery.min.js"></script>
    
    
    <!-- Custom JQuery -->
    <script src="assets/js/app/custom.js" type="text/javascript"></script>
    <script src="assets/js/json2html/json2html.min.js"></script>
    <script src="assets/js/app/ajax.js"></script>
</body>

</html>