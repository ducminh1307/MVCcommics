<div class="follow">
    <div class="container">
        <div class="title"><h2>Theo dõi</h2></div>
        <?php if(!empty($mess)): ?>
            <?="<center><h2>$mess</h2></center>"?>
            <?php else: ?>
                <div class="row" id="follow">
                    <?php foreach ($truyen as $trtd) { ?>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="manga">
                                <a href="<?=_WEB_ROOT."/truyen-tranh/".$trtd['slugtruyen']."-".$trtd['idtruyen']?>" title="<?=ucFirst($trtd["tentruyen"])?>">
                                    <div class="img">
                                        <img src="<?=_WEB_PUBLIC?>/clients/images/truyen/<?=$trtd["anhbia"]?>" style="width:100%" alt="">
                                    </div>
                                    <div class="name text-capitalize"><?=$trtd["tentruyen"]?></div>
                                </a>
                                <form action="<?=_WEB_ROOT?>/xoa-theo-doi" method="post">
                                    <button class="unfollow" name="idtd" value="<?=$trtd['idtheodoi']?>" title="Hủy theo dõi"><i class="fa fa-times"></i></button>
                                </form>
                                <a href="<?=_WEB_ROOT."/truyen-tranh/".$trtd["slugtruyen"]."/".$trtd['slugchuong']?>" class="chap text-capitalize"><?=$trtd["tenchuong"]?></a>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
            <?php endif ?>
    </div>
</div>