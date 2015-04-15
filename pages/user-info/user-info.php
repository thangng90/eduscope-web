        <!-- above is header -->
        <div class="warper container-fluid">
            <div class="page-header">
                <h2><?php echo $_SESSION['user']->fullName; ?></h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="edit-avatar text-center">
                        <img src="assets/images/avtar/avatar.jpg" alt="" class="img-thumbnail">
                        <div class="padd-sm user-stats">
                            <p><b>120</b> albums</p>
                            <p><b>921</b> ảnh</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#info" role="tab" data-toggle="tab">Thông tin</a>
                        </li>
                        <li class=""><a href="#albums" role="tab" data-toggle="tab">Ảnh của <b><?php echo $_SESSION['user']->username; ?></b></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="panel panel-default tab-pane tabs-up active" id="info">
                            <div class="panel-body">
                                <dl class="data user-data">
                                    <dt><i class="fa fa-university"></i> Trường</dt>
                                    <dd><?php echo $_SESSION['user']->schoolName; ?></dd>
                                    <dt><i class="fa fa-calendar"></i> Ngày đăng ký</dt>
                                    <dd><?php echo $_SESSION['user']->registrationDate; ?></dd>
                                    <dt><i class="fa fa-photo"></i> </dt>
                                </dl>
                            </div>
                        </div>
                        <div class="panel panel-default tab-pane tabs-up album-grid" id="albums">
                            <div class="panel-body">
                                <div class="row">
                                    <article class="col-sm-4 col-lg-3 photo-item">
                                        <div class="item-wrapper transit">
                                            <a class="photo-link" href="#">
                                                <figure class="transit">
                                                    <img src="http://placehold.it/640x480" alt="">
                                                    <figcaption><i class="fa fa-link"></i></figcaption>
                                                </figure>
                                            </a>
                                            <div class="photo-info">
                                                <div class="extras">
                                                    <h2 class="album-name">Album XYZ</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="col-sm-4 col-lg-3 photo-item">
                                        <div class="item-wrapper transit">
                                            <a class="photo-link" href="#">
                                                <figure class="transit">
                                                    <img src="http://placehold.it/640x480" alt="">
                                                    <figcaption><i class="fa fa-link"></i></figcaption>
                                                </figure>
                                            </a>
                                            <div class="photo-info">
                                                <div class="extras">
                                                    <h2 class="album-name">Album XYZ</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="col-sm-4 col-lg-3 photo-item">
                                        <div class="item-wrapper transit">
                                            <a class="photo-link" href="#">
                                                <figure class="transit">
                                                    <img src="http://placehold.it/640x480" alt="">
                                                    <figcaption><i class="fa fa-link"></i></figcaption>
                                                </figure>
                                            </a>
                                            <div class="photo-info">
                                                <div class="extras">
                                                    <h2 class="album-name">Album XYZ</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="col-sm-4 col-lg-3 photo-item">
                                        <div class="item-wrapper transit">
                                            <a class="photo-link" href="#">
                                                <figure class="transit">
                                                    <img src="http://placehold.it/640x480" alt="">
                                                    <figcaption><i class="fa fa-link"></i></figcaption>
                                                </figure>
                                            </a>
                                            <div class="photo-info">
                                                <div class="extras">
                                                    <h2 class="album-name">Album XYZ</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid footer">
            Copyright &copy; 2015 <a href="#">Lawrence S.Ting Fund | IS Technology Co., Ltd.</a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
    </section>
    <!-- /footer - begin scripts-->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    
    
    <!-- NanoScroll -->
    <script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- Chosen -->
    <script src="assets/js/plugins/bootstrap-chosen/chosen.jquery.min.js"></script>
    <!-- Custom JQuery -->
    <script src="assets/js/app/custom.js" type="text/javascript"></script>
    <!-- Chosen Select  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-chosen/chosen.css" />
</body>
</html>