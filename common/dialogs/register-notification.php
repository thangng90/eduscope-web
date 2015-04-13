<!-- Login Modal -->
            <div class="modal fade" id="regNotificationModal" tabindex="-1" role="dialog" aria-labelledby="activationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form role="form" id="regNotificationForm" action="javascript:">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="activationModalLabel">Đăng kí thành công</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group input-group">
                                    <!--<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" required>-->
                                    <h6 id="informText"></h5>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="closeModal();">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--- end loginModal -->