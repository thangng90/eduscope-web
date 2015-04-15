        <!-- above is header -->
        <div class="warper container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="select-alb-container">
                        <input type="text" name="name" class="form-control alb-name" placeholder="Chọn album hoặc nhập tên để tạo mới">
                        <select name="album" class="form-control chosen-select alb-select" data-placeholder="Chọn Alb">
                            <option></option>
                            <?php 
                                $model = new UsersModel();
                                $listAlbum = $model->getListAlbum($_SESSION['user']->idUser);
                                if($listAlbum != null) {
                                    foreach($listAlbum as $album) {
                                        echo "<option value=" . $album->id . ">" . $album->albumName . "</option>";
                                    }
                                }
                            ?>
                            <!--<option value="p1">A #1</option>
                            <option value="p2">A #2</option>
                            <option value="p3">A #3</option>
                            <option value="p4">A #4</option>-->
                        </select>
                    </div>
                </div>
            </div>
            <div class="files" id="previews">
                <div class="row">
                    <div id="template" class="col-sm-6 col-md-3 upload-item">
                        <div class="preview">
                            <img data-dz-thumbnail class="img-thumbnail" src="http://placehold.it/400x300">
                            <button data-dz-remove class="btn btn-danger btn-circle delete">
                                <i class="fa fa-trash"></i>
                            </button>
                            <div class="progress progress-xxs progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                            </div>
                            <div class="up-message overlay">
                                <strong class="middle-center error text-danger" data-dz-errormessage></strong>
                                <i class="middle-center fa fa-check success text-success"></i>
                            </div>
                        </div>
                        <div class="extras">
                            <textarea placeholder="Mô tả ảnh" class="description form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="dz-message middle">
                    Kéo thả file vào vùng này để upload.
                </div>
            </div>
            <!--  / Dropzone box -->
            <div id="actions" class="row">
                <div class="col-md-5 padd-b-sm">
                    <button type="button" class="btn btn-success add-file"><i class="fa fa-plus"></i> Thêm file</button>
                    <button type="submit" class="btn btn-primary start"><i class="fa fa-upload"></i> Upload</button>
                    <button type="reset" class="btn btn-warning cancel"><i class="fa fa-ban"></i> Hủy</button>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-info" style="width:0%;" data-dz-uploadprogress></div>
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
    <!-- DropzoneJS -->
    <script src="assets/js/dropzone/dropzone2.js"></script>
    <script src="assets/js/app/upload.js"></script>
    <!-- Custom JQuery -->
    <script src="assets/js/app/custom.js" type="text/javascript"></script>
</body>

</html>