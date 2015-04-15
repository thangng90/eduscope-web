        <!-- above is header -->
        <div class="warper container-fluid">
            <div class="page-header text-center">
                <h2>Thay đổi thông tin</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="edit-avatar text-center">
                        <label for="file-avatar">
                            <img src="assets/images/avtar/avatar.jpg" alt="" class="img-thumbnail">
                        </label>
                        <div class="padd-sm">
                            <input type="file" id="file-avatar" name="file-avatar">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="inputEmail" value="<?php echo $_SESSION['user']->email; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputFullName" class="col-sm-3 control-label">Tên hiển thị</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="inputFullName" value="<?php echo $_SESSION['user']->fullName; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9 col-sm-push-3">
                                <div class="location form-group row">
                                    <div class="col-xs-6">
                                        <select class="form-control chosen-select prov-select">
                                            <?php 
                                                $model = new UsersModel();
                                                $listProvince = $model->getListProvince();
                                                if($listProvince != null) {
                                                    foreach($listProvince as $province) {
                                                        if($_SESSION['user']->provinceName == $province->name)
                                                            echo "<option value=" . $province->id . " selected>" . $province->name . "</option>";
                                                        else
                                                            echo "<option value=" . $province->id . ">" . $province->name . "</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <select class="form-control chosen-select school-select" data-placeholder="Chọn trường">
                                            <option value="s1">My Schools</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9 col-sm-push-3">
                                <hr>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Mật khẩu cũ</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" id="oldPassword" placeholder="Nhập mật khẩu cũ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Mật khẩu</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputRePassword" class="col-sm-3 control-label">Xác nhận mật khẩu</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" id="inputRePassword">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                    </form>
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
</body>

</html>