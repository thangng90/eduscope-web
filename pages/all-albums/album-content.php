        <!-- above is header -->
        <?php $model = new UsersModel() ?>
        <div class="warper container-fluid">
            <div class="page-header">
                <h1><?php echo $model->getAlbumName($albumId); ?></h1>
            </div>
            <div class="row photo-grid">
<!--                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                            <div class="item-wrapper">
                                <a class="photo-link" href="?action=view-photo&photoId=2222">
                                    <figure class="transit">
                                        <img src="http://placehold.it/640x480" alt="">
                                        <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                                    </figure>
                                </a>
                                <div class="album-info">
                                    <div class="photo-name">
                                        Photo GHJ
                                    </div>
                                    <div class="extras">
                                        <div class="location"><i class="fa fa-map-marker"></i> HCMc</div>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <small>(22)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                            <div class="item-wrapper">
                                <a class="photo-link" href="?action=view-photo&photoId=2222">
                                    <figure class="transit">
                                        <img src="http://placehold.it/640x480" alt="">
                                        <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                                    </figure>
                                </a>
                                <div class="album-info">
                                    <div class="photo-name">
                                        Photo GHJ
                                    </div>
                                    <div class="extras">
                                        <div class="location"><i class="fa fa-map-marker"></i> HCMc</div>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <small>(22)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                            <div class="item-wrapper">
                                <a class="photo-link" href="?action=view-photo&photoId=2222">
                                    <figure class="transit">
                                        <img src="http://placehold.it/640x480" alt="">
                                        <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                                    </figure>
                                </a>
                                <div class="album-info">
                                    <div class="photo-name">
                                        Photo GHJ
                                    </div>
                                    <div class="extras">
                                        <div class="location"><i class="fa fa-map-marker"></i> HCMc</div>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <small>(22)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                            <div class="item-wrapper">
                                <a class="photo-link" href="?action=view-photo&photoId=2222">
                                    <figure class="transit">
                                        <img src="http://placehold.it/640x480" alt="">
                                        <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                                    </figure>
                                </a>
                                <div class="album-info">
                                    <div class="photo-name">
                                        Photo GHJ
                                    </div>
                                    <div class="extras">
                                        <div class="location"><i class="fa fa-map-marker"></i> HCMc</div>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <small>(22)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </article>
                <article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
                            <div class="item-wrapper">
                                <a class="photo-link" href="?action=view-photo&photoId=2222">
                                    <figure class="transit">
                                        <img src="http://placehold.it/640x480" alt="">
                                        <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, itaque.</figcaption>
                                    </figure>
                                </a>
                                <div class="album-info">
                                    <div class="photo-name">
                                        Photo GHJ
                                    </div>
                                    <div class="extras">
                                        <div class="location"><i class="fa fa-map-marker"></i> HCMc</div>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <small>(22)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </article>-->
            </div>

            <?php 
                if(!isset($_SESSION['user'])) {
                    include "common/dialogs/login.php";
                    include "common/dialogs/register.php";
                }
            ?>
            
            <div class="text-center show-more" data-limit="20" data-more="photo"><i class="fa fa-spinner fa-spin fa-3x"></i></div>
            <!--<nav class="text-center">
                <ul class="pagination">
                    <li class="disabled">
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a>
                    </li>
                    <li><a href="#">2</a>
                    </li>
                    <li><a href="#">3</a>
                    </li>
                    <li><a href="#">4</a>
                    </li>
                    <li><a href="#">5</a>
                    </li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>-->

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
    
    
    <!-- Custom JQuery -->
    <script src="assets/js/app/custom.js" type="text/javascript"></script>
    <script src="assets/js/json2html/json2html.min.js"></script>
    <script src="assets/js/app/ajax.js" type="text/javascript"></script>
    <script>
        setGetType("albumId");
        setStyle('all');
        setParam(<?php echo $albumId; ?>);
        loadFirstPhotoPage();
    </script>
</body>

</html>