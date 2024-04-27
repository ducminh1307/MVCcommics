<section class="history">
    <div class="container">
        <div class="row">
            <?php if(is_array($tr_h)): ?>
                <?php foreach($tr_h as $truyen): ?>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="manga">
                        <a href="<?=_WEB_ROOT."/truyen-tranh/".$truyen['slugtruyen']."-".$truyen['idtruyen']?>" title="">
                            <div class="img">
                                <img src="<?=_WEB_PUBLIC?>/clients/images/truyen/<?=$truyen['anhbia']?>" style="width:100%" alt="">
                            </div>
                            <div class="name text-capitalize"><?=$truyen['tentruyen']?></div>
                        </a>
                        <?php if(!isset($truyen['luotxem'])): ?>
                            <a href="<?=_WEB_ROOT."/truyen-tranh/".$truyen['slugtruyen']."/".$truyen['slugchuong']?>" class="chap text-capitalize"><?=$truyen['tenchuong']?></a>
                        <?php else: ?>
                            <div class="chap text-capitalize"><i class="fa fa-eye"></i> <?=$truyen['luotxem']?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?=$tr_h?>
            <?php endif; ?>
        </div>
    </div>
</section>