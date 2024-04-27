<div class="card-body">
    <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#addtype"><i class="bi bi-plus-circle-fill"></i> Thêm thể loại</button>
    <div class="modal fade text-left" id="addtype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-success">THÊM THỂ LOẠI</h4>
                </div>
                <form action="a">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Tên thể loại: </label></div>
                            <div class="col-8"><input type="text" id="typename" placeholder="Tên thể loại" class="form-control text"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Slug thể loại: </label></div>
                            <div class="col-8"><input type="text" id="typeslug" placeholder="Slug thể loại" class="form-control slug" disabled></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-success ml-1" data-bs-dismiss="modal" id="inserttype">
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
    <ul class="pagination pagination-danger"></ul>
    <div class="modal fade text-left" id="edittype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">SỬA THỂ LOẠI</h4>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <input type="hidden" id="up_id">
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Tên thể loại: </label></div>
                            <div class="col-8"><input type="text" id="up_name" placeholder="Tên thể loại" class="form-control text"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4"><label class="mt-2">Slug thể loại: </label></div>
                            <div class="col-8"><input type="text" id="up_slug" placeholder="Slug thể loại" class="form-control slug" disabled></div>
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
    <div class="modal fade text-left" id="deletetype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-danger">XÓA THỂ LOẠI</h4>
                </div>
                <div class="modal-body">
                    <center><h4>Bạn có muốn xóa không?</h4></center>
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
<script src="<?=_WEB_PUBLIC?>/admin/js/type.ajax.js"></script>