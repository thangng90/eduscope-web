            <!-- Register Dialog -->
            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form role="form" id="registerForm" action="javascript:">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="registerModalLabel">Đăng ký thành viên</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control username" placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control fullname" placeholder="Tên hiển thị">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="location form-group row">
                                    <div class="col-xs-6">
                                        <select class="form-control chosen-select prov-select" data-placeholder="Chọn tỉnh thành">
                                           <option></option>
                                           <?php 
                                                $model = new UsersModel();
                                                $listProvince = $model->getListProvince();
                                                if($listProvince != null) {
                                                    foreach($listProvince as $province) {
                                                        echo "<option value=" . $province->id . ">" . $province->name . "</option>";
                                                    }
                                                }
                                            ?>
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
                                    <input type="password" class="form-control password" placeholder="Mật khẩu">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control confirm-password" placeholder="Xác nhận mật khẩu">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>