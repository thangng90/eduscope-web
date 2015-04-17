        <!-- above is header -->
        <?php $model = new UsersModel() ?>
        <div class="warper container-fluid">
            <div class="page-header">
                <h1><?php echo $model->getAlbumName($albumId); ?></h1>
            </div>
            <div class="row photo-grid">
            </div>
            
            <div class="text-center show-more" data-limit="20" data-more="photo"><i class="fa fa-spinner fa-spin fa-3x"></i></div>

        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="quickEditModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form role="form" action="#edit-photo">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="quickEditLabel">Sửa thông tin Ảnh</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input name="name" type="text" class="photo-name form-control" placeholder="Tên ảnh" required>
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="description form-control" placeholder="Mô tả" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" class="photo-id">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--- end EditModal -->

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
        setStyle('mine');
        setParam(<?php echo $albumId; ?>);
        loadFirstPhotoPage();
    </script>
    <script>
        $(".edit-photo").click(function() {
            var photoE = $(this).closest(".photo-item"),
                modal = $("#quickEditModal");
            modal.find("[name=id]").val(photoE.data('id'));
            modal.find("[name=name]").val(photoE.find(".photo-name").text().trim());
            modal.find("[name=description]").val(photoE.find("figcaption").text().trim());
            modal.modal('show');
        });
    </script>
</body>

</html>