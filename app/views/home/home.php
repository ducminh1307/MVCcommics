<section class="home">
    <div class="container">
        <div class="row">
            <section class="regular slider">
                <?php foreach($tr_moi as $chmoi): ?>
                    <div class="silde-item">
                        <div class="card-manga">
                            <div class="img">
                                <img src="<?=_WEB_PUBLIC?>/clients/images/truyen/<?=$chmoi['anhbia']?>" alt="">
                            </div>
                            <div class="content-manga">
                                <div class="name">
                                    <a href="<?=_WEB_ROOT.'/truyen-tranh/'.$chmoi['slugtruyen'].'-'.$chmoi['idtruyen'] ?>" class="text-uppercase text-center"><?=$chmoi['tentruyen']?></a>
                                </div>
                                <div class="des"><?=$chmoi['tomtat']?></div>
                                <div class="update">Ngày đăng: <?php time_stamp($chmoi['ngaydang']) ?></div>
                                <div class="bottom text-center">
                                    <a href="<?=_WEB_ROOT.'/truyen-tranh/'.$chmoi['slugtruyen'].'/'.$chmoi['slugchuong']?>">Đọc <?=$chmoi['tenchuong']?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </section>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="manga__new">
                    <div class="title">
                        <h2 class="text-uppercase">Manga</h2>
                    </div>
                    <div class="row">
                        <?php foreach($tr_manga as $chmanga): ?>
                            <div class="col-6 col-md-4">
                                <div class="manga">
                                    <div class="front">
                                        <div class="manga-new">Mới</div>
                                        <div class="img">
                                            <img src="<?=_WEB_PUBLIC.'/clients/images/truyen/'.$chmanga['anhbia'] ?>" alt="">
                                        </div>
                                        <div class="manga-chap"><?=$chmanga['tenchuong'] ?></div>
                                        <h5 class="manga-name text-capitalize text-center"><?=$chmanga['tentruyen'] ?></h5>
                                    </div>
                                    <div class="back">
                                        <a href="<?=_WEB_ROOT.'/truyen-tranh/'.$chmanga['slugtruyen'].'-'.$chmanga['idtruyen'] ?>"><h5 class="manga-name text-capitalize text-center"><?=$chmanga['tentruyen'] ?></h5></a>
                                        <div class="manga-description">
                                            <?=$chmanga['tomtat'] ?>
                                        </div>
                                        <div class="manga-update">
                                            <b>Thời gian: </b><?php time_stamp($chmanga['ngaydang']) ?>
                                        </div>
                                        <div class="manga-chap">
                                            <a href="<?=_WEB_ROOT.'/truyen-tranh/'.$chmanga['slugtruyen'].'/'.$chmanga['slugchuong'] ?>">
                                                <span>Đọc <?=$chmanga['tenchuong'] ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="manga__full">
                    <div class="title">
                        <h2 class="text-uppercase">Manhua</h2>
                    </div>
                    <div class="row">
                        <?php foreach($tr_manhua as $chmanhua): ?>
                            <div class="col-6 col-md-4">
                                <div class="manga">
                                    <div class="front">
                                        <div class="manga-new">Mới</div>
                                        <div class="img">
                                            <img src="<?=_WEB_PUBLIC.'/clients/images/truyen/'.$chmanhua['anhbia'] ?>" alt="">
                                        </div>
                                        <div class="manga-chap"><?=$chmanhua['tenchuong'] ?></div>
                                        <h5 class="manga-name text-capitalize text-center"><?=$chmanhua['tentruyen'] ?></h5>
                                    </div>
                                    <div class="back">
                                        <a href="<?=_WEB_ROOT.'/truyen-tranh/'.$chmanhua['slugtruyen'].'-'.$chmanhua['idtruyen'] ?>"><h5 class="manga-name text-capitalize text-center"><?=$chmanhua['tentruyen'] ?></h5></a>
                                        <div class="manga-description">
                                            <?=$chmanhua['tomtat'] ?>
                                        </div>
                                        <div class="manga-update">
                                            <b>Thời gian: </b><?php time_stamp($chmanhua['ngaydang']) ?>
                                        </div>
                                        <div class="manga-chap">
                                            <a href="<?=_WEB_ROOT.'/truyen-tranh/'.$chmanhua['slugtruyen'].'/'.$chmanhua['slugchuong'] ?>">
                                                <span>Đọc <?=$chmanhua['tenchuong'] ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="manga__hot">
                            <div class="title"><h2>Truyện hot</h2></div>
                            <?php for($i=0; $i<count($tr_hot); $i++): ?>
                                <div class="manga-item">
                                    <div class="stt"><?=$i+1; ?></div>
                                    <div class="truyen">
                                        <div class="img" >
                                            <img src="<?=_WEB_PUBLIC.'/clients/images/truyen/'.$tr_hot[$i]['anhbia'] ?>" alt="">
                                        </div>
                                        <div class="thongtin">
                                            <a href="<?=_WEB_ROOT.'/truyen-tranh/'.$tr_hot[$i]['slugtruyen'].'-'.$tr_hot[$i]['idtruyen']; ?>" class="ten text-uppercase">
                                                <?=$tr_hot[$i]['tentruyen'] ?>
                                            </a>
                                            <div class="luotxem">Lượt xem: <?='<i class="fad fa-eye"></i> '.$tr_hot[$i]['luotxem'] ?></div>
                                            <div class="ngay">Ngày đăng: <?=format_day($tr_hot[$i]['ngaydang']) ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="manga__chat">
                            <div class="title">
                                <h2>Tán gẫu</h2>
                            </div>
                            <div class="chat">
                                <div class="chat-body" id="body"></div>
                                <div class="scroll-bottom" id="down"><i class="fad fa-caret-circle-down"></i></div>
                                <div class="chat-box">
                                    <input type="text" placeholder="Nhập nội dung ..." id="chat">
                                    <button id="chat-button"><i class="fad fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $(".regular").slick({
            dots: false,
            prevArrow: '<button class="prev slick-arrow"><i class="fas fa-chevron-left"></i></button>',
            nextArrow:'<button class="next slick-arrow"><i class="fas fa-chevron-right"></i></button>',
            loop: true,
            infinite: true,
            slidesToShow: 4,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                { breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                }, { breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
        });
    });
</script>
<script>
    function load() {
        var url = $('#url').val() + '/ajax/loadChat';
        $.ajax({
            url: url,
            method: 'POST',
            success: function(data) {
                $('#body').html(data);
                $('#body').animate({scrollTop: $('#body')[0].scrollHeight});
            }
        });
    }
    function chat(){
        if($('#username').val()==''){
            $('.thongbao').html('Bạn chưa đăng nhập!');
            $('.thongbao').addClass('active');
            setTimeout(function(){ $('.thongbao').removeClass('active'); }, 3000);
        } else {
            var url = $('#url').val() + '/ajax/chat';
            var mess = $('#chat').val();
            var user = $('#username').val();
            if(mess == ''){
                $('.thongbao').html('Không được để trống tin nhắn!');
                $('.thongbao').addClass('active');
                setTimeout(function(){ $('.thongbao').removeClass('active'); }, 3000);
            } else {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {user: user, mess: mess},
                    success: function(data) {
                        load();
                        $('#chat').val('');
                        $('#body').animate({scrollTop: $('#body')[0].scrollHeight});
                    }
                });
            }
            
        }
        
    }
    load();
    $('#chat-button').on('click',function(){
        chat();
    });
    $('#chat').keydown(function(e){
        if (event.keyCode  == '13') chat();
    });
    setInterval(load, 1000);
</script>
<!--script>
    $img = "";
    $('.loaded').each(function(){ $img = $img + $(this).attr('src') + "#"})
    $img
</script-->
