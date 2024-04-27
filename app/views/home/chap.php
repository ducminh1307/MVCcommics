<?php 
    $prev = "";
    $next = "";
    for($i=0; $i < count($list); $i++){
        if($list[$i]['slugchuong']==$slugch){
            if($i > 0){
                $prev = _WEB_ROOT.'/truyen-tranh/'.$list[$i-1]['slugtruyen'].'/'.$list[$i-1]['slugchuong'];
            }
            if($i < count($list)-1) {
                $next = _WEB_ROOT.'/truyen-tranh/'.$list[$i+1]['slugtruyen'].'/'.$list[$i+1]['slugchuong'];
            }
            break;
        }
    }
?>
<div class="chap">
    <div class="container">
        <div class="chap-content">
            <div class="bread-crumb">
                <a href="<?=_WEB_ROOT ?>/trang-chu" class="bread-crumb-item">Trang chủ</a>
                <i class="fas fa-chevron-double-right"></i>
                <a href="<?=_WEB_ROOT ?>/truyen-tranh/<?=$chap['slugtruyen']?>-<?=$chap['idtruyen']?>" class="bread-crumb-item text-capitalize"><?=$chap['tentruyen'] ?></a>
                <i class="fas fa-chevron-double-right"></i>
                <span class="bread-crumb-item text-capitalize"><?=$chap['tenchuong'] ?></span>
            </div>
            <div class="name text-capitalize"><?=$chap['tentruyen']?> <span>(Cập nhật: <?php time_stamp($chap['ngaycapnhat']) ?>)</span></div>
            <div class="alert alert-primary tutorial">Nhấn (&#8592;) và (&#8594;) để chuyển chương!</div>
            <div class="choose-chap text-center mb-4">
                <?php if(!empty($prev)):?>
                    <a href="<?=$prev?>"><i class="fa fa-arrow-left"></i></a>
                <?php else: ?>
                    <a href="#" class="disabled"><i class="fa fa-arrow-left"></i></a>
                <?php endif; ?>
                <select class="text-capitalize">
                    <?php foreach($list as $list_chap): ?>
                        <option value="<?=_WEB_ROOT.'/truyen-tranh/'.$list_chap['slugtruyen'].'/'.$list_chap['slugchuong']?>" <?=($list_chap['slugchuong']==$slugch)?'selected':''?>><?=$list_chap['tenchuong']?></option>
                    <?php endforeach; ?>
                </select>
                <?php if(!empty($next)):?>
                    <a href="<?=$next?>"><i class="fa fa-arrow-right"></i></a>
                <?php else: ?>
                    <a href="#" class="disabled"><i class="fa fa-arrow-right"></i></a>
                <?php endif; ?>
            </div>
            <div class="chap-images">
                <?php foreach (chap($chap['hinhanh']) as $img):?>
                    <img src="<?php echo $img ?>" alt="anh-<?=$chap['slugtruyen']?>">
                <?php endforeach; ?>
            </div>
            <div class="choose-chap text-center mt-3">
                <?php if(!empty($prev)):?>
                    <a href="<?=$prev?>"><i class="fa fa-arrow-left"></i></a>
                <?php else: ?>
                    <a href="#" class="disabled"><i class="fa fa-arrow-left"></i></a>
                <?php endif; ?>
                <select class="text-capitalize">
                    <?php foreach($list as $list_chap): ?>
                        <option value="<?=_WEB_ROOT.'/truyen-tranh/'.$list_chap['slugtruyen'].'/'.$list_chap['slugchuong']?>" <?=($list_chap['slugchuong']==$slugch)?'selected':''?>><?=$list_chap['tenchuong']?></option>
                    <?php endforeach; ?>
                </select>
                <?php if(!empty($next)):?>
                    <a href="<?=$next?>"><i class="fa fa-arrow-right"></i></a>
                <?php else: ?>
                    <a href="#" class="disabled"><i class="fa fa-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="comment">
            <div class="title"><i class="fas fa-comment-dots"></i> Bình luận</div>
            <div class="box-comment">
                <textarea id="comment" placeholder="Nhập bình luận của bạn nào ..."></textarea>
                <button id="cmt" data-idch="<?=$chap['idchuong']?>" data-user="<?=(isset($_SESSION['acc'])?$_SESSION['acc']['tendangnhap']:"")?>"><i class="fas fa-paper-plane"></i></button>
            </div>
            <div class="comment-body"></div>
        </div>
    </div>
</div>
<script>
    $("select").on('change', function() {
        var url = $(this).val();
        location.href = url;
    });
</script>
<?php if(!empty($prev)): ?>
    <script>
        $( document ).keydown(function(e) {
            if(e.keyCode == 37) {
                location.href = "<?=$prev?>";
            }
        });
    </script>
<?php endif ?>
<?php if(!empty($next)): ?>
    <script>
        $( document ).keydown(function(e) {
            if(e.keyCode == 39) {
                location.href = "<?=$next?>";
            }
        });
    </script>
<?php endif ?>
<script src="<?=_WEB_PUBLIC?>/clients/js/ajax.chap.js"></script>