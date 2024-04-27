<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script src="<?=_WEB_PUBLIC?>/admin/vendors/choices.js/choices.min.js"></script>
<div class="card-body">
    <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#addcomic"><i class="bi bi-plus-circle-fill"></i> Thêm menu</button>
    <div class="modal fade text-left" id="addcomic" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-success">THÊM TRUYỆN</h4>
                </div>
                <form id="add_form">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Tên truyện: </label></div>
                            <div class="col-9"><input type="text" name="ten" placeholder="Tên truyện" class="form-control text" required></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Slug truyện: </label></div>
                            <div class="col-9"><input type="text" name="slug" placeholder="Slug truyện" class="form-control slug" readonly></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Tác giả: </label></div>
                            <div class="col-9"><input type="text" name="tacgia" placeholder="Tác giả" class="form-control" required></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Tóm tắt: </label></div>
                            <div class="col-9"><textarea type="text" name="tomtat" id="editor" placeholder="Tóm tắt truyện" class="form-control" style="height:100px"></textarea></div>
                        </div>
                        <div class="form-group row mt-3">
                            <p>Chọn ảnh có định dạng .jpg .jepg .png</p>
                            <div class="col-3"><label class="mt-2">Ảnh bìa: </label></div>
                            <fieldset class="col-9">
                                <div class="input-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="anhbia"><i class="bi bi-upload"></i></label>
                                        <input type="file" name="anhbia" class="form-control" id="anhbia" placeholder="Chọn ảnh bìa cho truyện" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="text-danger"></div>
                        <div class="form-group">
                            <select class="choices form-select multiple-remove" id="theloai" multiple="multiple">
                                <option value="" disabled hidden>Chọn thể loại truyện</option>
                                <?php foreach($theloai as $tl): ?>
                                    <option value="<?=$tl['idtheloai']?>"><?=$tl['tentheloai']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-success ml-1" id="inserttruyen">
                            <span class="block">Thêm</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive truyen">
        <table class="table table-hover" id="table1"></table>
    </div>
    <ul class="pagination pagination-danger"></ul>
    <div class="modal fade text-left" id="edittruyen" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">SỬA TRUYỆN</h4>
                </div>
                <form action="#" id="edit_form">
                    <div class="modal-body">
                        <input type="hidden" name="up_id" id="id">
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Tên truyện: </label></div>
                            <div class="col-9"><input type="text" name="up_ten" id="ten" placeholder="Tên truyện" class="form-control text" required></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Slug truyện: </label></div>
                            <div class="col-9"><input type="text" name="up_slug" id="slug" placeholder="Slug truyện" class="form-control slug" readonly></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Tác giả: </label></div>
                            <div class="col-9"><input type="text" name="up_tacgia" id="tacgia" placeholder="Tác giả" class="form-control" required></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Tóm tắt: </label></div>
                            <div class="col-9"><textarea type="text" name="up_tomtat" id="editorEdit" placeholder="Tóm tắt truyện" class="form-control" style="height:100px"></textarea></div>
                        </div>
                        <div class="form-group row mt-3">
                            <p>Chọn ảnh có định dạng .jpg .jepg .png</p>
                            <div class="col-3"><label class="mt-2">Ảnh bìa: </label></div>
                            <fieldset class="col-9">
                                <div class="input-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="anhbia"><i class="bi bi-upload"></i></label>
                                        <input type="file" name="up_anhbia" class="form-control" id="anhbia">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="text-danger"></div>
                        <div class="form-group" id="select">
                            <select id="up_theloai" multiple="multiple"></select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="submit" id="update" class="btn btn-primary ml-1">
                            <span class="block">Sửa</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="deletetruyen" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-danger">XÓA TRUYỆN</h4>
                </div>
                <form action="#">
                    <input type="hidden" id="del_id">
                    <div class="model-body">
                        <center><h3>Bạn có muốn xóa truyện này không?</h3></center>
                    </div>
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
    <div class="modal fade text-left" id="chuong" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-success">DANH SÁCH CHƯƠNG</h4>
                </div>
                <div class="modal-body">
                    <div id="listchuong"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                        <span class="block">Đóng</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="addchuongModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-success">THÊM CHƯƠNG</h4>
                </div>
                <form action="#" id="addchuong_form">
                    <div class="modal-body">
                        <input type="hidden" id="idtruyen">
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Tên chương: </label></div>
                            <div class="col-9"><input type="text" id="tench" placeholder="Tên chương" class="form-control text" required></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Slug chương: </label></div>
                            <div class="col-9"><input type="text" id="slugch" placeholder="Slug chương" class="form-control slug" readonly></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Hình ảnh: </label></div>
                            <div class="col-9">
                                <textarea class="form-control" id="hinhanh" placeholder="Nhập link hình ảnh cách nhau bằng #" style="height:150px" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="submit" id="update" class="btn btn-success ml-1">
                            <span class="block">Thêm</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="editchuongModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">SỬA CHƯƠNG</h4>
                </div>
                <form action="#" id="editchuong_form">
                    <div class="modal-body">
                        <input type="hidden" id="up_idch">
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Tên chương: </label></div>
                            <div class="col-9"><input type="text" id="up_tench" placeholder="Tên chương" class="form-control text" required></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Slug chương: </label></div>
                            <div class="col-9"><input type="text" id="up_slugch" placeholder="Slug chương" class="form-control slug" readonly></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label class="mt-2">Hình ảnh: </label></div>
                            <div class="col-9">
                                <textarea class="form-control" id="up_hinhanh" placeholder="Nhập link hình ảnh cách nhau bằng #" style="height:150px" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="submit" id="updatech" class="btn btn-primary ml-1">
                            <span class="block">Sửa</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="deletechuongModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-danger">XÓA CHƯƠNG</h4>
                </div>
                <form action="#">
                    <input type="hidden" id="del_idch">
                    <div class="model-body">
                        <center class="mt-1"><h3>Bạn có muốn xóa chương này không?</h3></center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
                            <span class="block">Đóng</span>
                        </button>
                        <button type="button" id="removech" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                            <span class="block">Xóa</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let choices = document.querySelectorAll('.choices');
    let initChoice;
    for(let i=0; i<choices.length;i++) {
        if (choices[i].classList.contains("multiple-remove")) {
            initChoice = new Choices(choices[i],
            {
                delimiter: ',',
                editItems: true,
                maxItemCount: -1,
                removeItemButton: true,
            });
        }else{
            initChoice = new Choices(choices[i]);
        }
    }
</script>
<script src="<?=_WEB_PUBLIC?>/admin/js/comic.ajax.js"></script>