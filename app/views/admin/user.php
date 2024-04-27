<div class="card-body">
    <div class="modal fade text-left" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-primary">SỬA TÀI KHOẢN</h4>
                </div>
                <form action="a">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Tên đăng nhập: </label></div>
                            <div class="col-8"><input type="text" id="username" placeholder="Tên đăng nhập" class="form-control" readonly></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Tên hiển thị: </label></div>
                            <div class="col-8"><input type="text" id="name" placeholder="Tên hiển thị" class="form-control"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Email: </label></div>
                            <div class="col-8"><input type="text" id="email" placeholder="Email" class="form-control"></div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group d-flex justify-content-around">
                            <input type="radio" class="radio-img" id="image1" name="img" value="user-chat-1.png">
                            <label for="image1" class="logo-img"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-1.png" alt=""></label>
                            <input type="radio" class="radio-img" id="image2" name="img" value="user-chat-2.png">
                            <label for="image2" class="logo-img"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-2.png" alt=""></label>
                            <input type="radio" class="radio-img" id="image3" name="img" value="user-chat-3.png">
                            <label for="image3" class="logo-img"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-3.png" alt=""></label>
                            <input type="radio" class="radio-img" id="image4" name="img" value="user-chat-4.png">
                            <label for="image4" class="logo-img"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-4.png" alt=""></label>
                            <input type="radio" class="radio-img" id="image5" name="img" value="user-chat-5.png">
                            <label for="image5" class="logo-img"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-5.png" alt=""></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal" id="update">
                            <span class="block">Sửa</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="table1"></table>
    </div>
    <ul class="pagination pagination-danger"></ul>
    <div class="modal fade text-left" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-danger">XÓA DANH MỤC</h4>
                </div>
                <div class="modal-body">
                    <center><h4>Bạn muốn xóa tài khoản này không?</h4></center>
                </div>
                <form action="#">
                    <input type="hidden" id="del_user">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="button" id="remove" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                            <span class="block">Xóa</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?=_WEB_PUBLIC?>/admin/js/user.ajax.js"></script>