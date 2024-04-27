<section class="search">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(isset($search)): ?>
                    <div class="title"><h2>Tìm kiếm: <?=$search?></h2></div>
                <?php endif; ?>
                <?php if(isset($type)): ?>
                    <div class="title"><h2>Thể loại: <?=$type_name[0]?></h2></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <?php if(is_array($tr_s)): ?>
                <?php foreach($tr_s as $truyen): ?>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="manga">
                        <a href="<?=_WEB_ROOT."/truyen-tranh/".$truyen['slugtruyen']."-".$truyen['idtruyen']?>" title="">
                            <div class="img">
                                <img src="<?=_WEB_PUBLIC?>/clients/images/truyen/<?=$truyen['anhbia']?>" style="width:100%" alt="">
                            </div>
                            <div class="name text-capitalize"><?=$truyen['tentruyen']?></div>
                        </a>
                        <a href="<?=_WEB_ROOT."/truyen-tranh/"?>" class="chap text-capitalize"><?=$truyen['tenchuong']?></a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?=$tr_s?>
            <?php endif; ?>
        </div>
        <?php if($pages > 1): ?>
        <div class="d-flex justify-content-center mb-3">
            <div class="page d-flex">
                <?php
                    if(isset($search)){
                        $data = '/tim-kiem/'.$search;
                    } else {
                        $data = '/the-loai/'.$type;
                    }
                ?>
                <?php if($page > 3): ?>
                    <a href="<?=_WEB_ROOT.$data.'/trang-1'?>"><i class="fas fa-angle-double-left"></i></a>
                    <a href="<?=_WEB_ROOT.$data.'/trang-'.($page-1)?>"><i class="fas fa-angle-left"></i></a>
                <?php endif; ?>
                <?php for($i=1; $i<=$pages; $i++): ?>
                    <?php if($i > $page -3 && $i < $page + 3):?>
                        <a href="<?=_WEB_ROOT.$data.'/trang-'.$i?>" class="<?=($i==$page)?"active":"";?>"><?=$i?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if($page <= $pages-3): ?>
                    <a href="<?=_WEB_ROOT.$data.'/trang-'.($page+1)?>"><i class="fas fa-angle-right"></i></a>
                    <a href="<?=_WEB_ROOT.$data.'/trang-'.$pages?>" clas="disabled"><i class="fas fa-angle-double-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>