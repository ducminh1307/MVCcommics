<div class="card-body">
    <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#addmenu"><i class="bi bi-plus-circle-fill"></i> Thêm menu</button>
    <div class="modal fade text-left" id="addmenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-success">THÊM DANH MỤC</h4>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Tên danh mục: </label></div>
                            <div class="col-8"><input type="text" id="menuname" placeholder="Tên danh mục" class="form-control text"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Slug danh mục: </label></div>
                            <div class="col-8"><input type="text" id="menuslug" placeholder="Slug danh mục" class="form-control slug" disabled></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-success ml-1" data-bs-dismiss="modal" id="insertmenu">
                            <span class="block">Thêm</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="table1"></table>
    </div>
    <div class="modal fade text-left" id="editmenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">SỬA DANH MỤC</h4>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <input type="hidden" id="up_id">
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Tên danh mục: </label></div>
                            <div class="col-8"><input type="text" id="up_name" placeholder="Tên danh mục" class="form-control text"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Slug danh mục: </label></div>
                            <div class="col-8"><input type="text" id="up_slug" placeholder="Slug danh mục" class="form-control slug" disabled></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="button" id="update" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <span class="block">Sửa</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="deletemenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-danger">XÓA DANH MỤC</h4>
                </div>
                <form action="#">
                    <input type="hidden" id="del_id">
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
<script src="<?=_WEB_PUBLIC?>/admin/js/menu.ajax.js"></script>