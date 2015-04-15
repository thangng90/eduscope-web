        <!-- above is header -->
        <div class="warper container-fluid">
            <div class="page-header">
                <h1>Album</h1>
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
                <!--<article class="col-sm-6 col-md-4 col-lg-3 photo-item" data-id="01">
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
                </article>-->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

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
    <script>
        setGetType('all');
        loadFirstAlbumPage();
    </script>
</body>

</html>