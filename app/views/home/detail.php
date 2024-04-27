<section class="detail">
    <div class="container">
        <div class="manga-detail">
            <div class="bread-crumb">
                <a href="<?=_WEB_ROOT ?>/trang-chu" class="bread-crumb-item">Trang chủ</a>
                <i class="fas fa-chevron-double-right"></i>
                <div class="bread-crumb-item text-capitalize"><?=$truyen['tentruyen'] ?></div>
            </div>
            <h1 class="name text-center text-uppercase"><?=$truyen['tentruyen'] ?></h1>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="imgs text-center">
                        <img src="<?=_WEB_PUBLIC.'/clients/images/truyen/'.$truyen['anhbia']?>" alt="anh-bia">
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="info">
                        <div class="row author">
                            <div class="col-5 col-sm-4"><i class="fas fa-feather-alt"></i> Tác giả</div>
                            <div class="col-7 col-sm-8"><?=$truyen['tacgia'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4 mt-2"><i class="fas fa-rss"></i> Tình trạng</div>
                            <div class="col-7 col-sm-8 mt-2"><?=($truyen['trangthai']==0)?'Đang cập nhật':'Hoàn thành'; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4 mt-2"><i class="fa fa-eye"></i> Lượt xem</div>
                            <div class="col-7 col-sm-8 mt-2"><?=$truyen['luotxem'] ?> lượt xem</div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <?php foreach($the_loai as $tl) {
                                    echo '<a href="'._WEB_ROOT.'/the-loai/'.$tl['slugtheloai'].'" class="theloai">'.$tl["tentheloai"].'</a>';
                                } ?>
                            </div>
                        </div>
                        <div class="row pl-3 pr-3">
                            <div class="theodoi"></div>
                            <a href="<?=_WEB_ROOT.'/truyen-tranh/'.$truyen['slugtruyen'].'/'.$chuongdau['slugchuong'].'/'.$chuongdau['idchuong'] ?>" class="chucnang mt-2"><i class="far fa-book-open"></i> Đọc từ đầu</a>
                            <input type="hidden" id="idtr" value="<?=$truyen['idtruyen']?>">
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 mt-2">
                                <div class="tieude">
                                    <i class="far fa-file-alt"></i>
                                    <h5 class="m-0">Nội dung</h5>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="noidung" id="noidung">
                                    <?=$truyen['tomtat'] ?>
                                </div>
                                <div class="read" id="readmore">Đọc thêm <i class="fas fa-angle-down"></i></div>
                                <div class="read" id="readless">Thu gọn <i class="fas fa-angle-up"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mt-3">
                    <div class="tieude">
                        <i class="fas fa-list"></i> <h5 class="m-0">Danh sách chương</h5>
                    </div>
                    <div class="chuong mt-2">
                        <div class="row sticky-top top">
                            <div class="col-4">Số chương</div>
                            <div class="col-4">Cập nhật</div>
                            <div class="col-4">Lượt xem</div>
                        </div>
                        <?php if(is_array($chuong)): ?>
                            <?php foreach ($chuong as $ch): ?>
                                <div class="row">
                                    <div class="col-4"><a href="<?=_WEB_ROOT."/truyen-tranh/".$truyen['slugtruyen']."/".$ch['slugchuong']?>" class="chap"><?=$ch['tenchuong'] ?></a></div>
                                    <div class="col-4"><span class="tg"><?php time_stamp($ch['ngaydang']); ?></span></div>
                                    <div class="col-4"><i class="fa fa-eye"></i> <?=$ch['luotxem'] ?></div>
                                </div>
                            <?php endforeach ?>
                        <?php else: ?>
                            <?='Không có chương nào, hãy đợi web up thêm nha'; ?>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-3">
                    <div class="tieude">
                        <i class="fas fa-comment"></i> <h5 class="m-0">Bình luận</h5>
                    </div>
                    <div class="binhluan mt-2">
                        <?php if(!empty($bl)){ ?>
                            <?php foreach ($bl as $binhluan):?>
                            <div class="binhluan-item mb-1">
                                <div class="user-icon">
                                    <img src="<?=_WEB_PUBLIC.'/clients/images/logo/'.$binhluan['anhhienthi'] ?>" alt="" style="width:100%">
                                </div>
                                <div class="binhluan-content">
                                    <div class="content-top">
                                        <span class="user"><?=$binhluan['tenhienthi'] ?></span>
                                         - <span class="text-capitalize"><?=$binhluan['tenchuong'] ?></span>
                                        <span class="tg"><?php time_stamp($binhluan['ngaydang']) ?></span>
                                    </div>
                                    <div class="content-bottom">
                                        <?=$binhluan['noidung'] ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        <?php } else { ?>
                            <?='Không có bình luận'; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?=_WEB_PUBLIC.'/clients/js/ajax.detail.js' ?>"></script>