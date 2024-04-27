<div class="card-body">
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
                    <center><h4>Bạn muốn xóa bình luận này không?</h4></center>
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
<script src="<?=_WEB_PUBLIC?>/admin/js/comment.ajax.js"></script>