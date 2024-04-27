<header>
    <div class="header-lap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-xl-3">
                    <div class="header-lap__logo">
                        <a href="<?= _WEB_ROOT.'/'; ?>" class="logo">
                            <img src="<?=_WEB_PUBLIC?>/clients/images/truyentranhlogo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="header-lap__menu">
                        <div class="menu-item">
                            <button class="menu-item-button">Danh mục</button>
                            <div class="menu-drop">
                                <?php foreach ($menu as $mn):?>
                                    <a href="<?= _WEB_ROOT.'/'.$mn['slugmenu'] ?>" class="drop-item"><?= $mn['tenmenu'] ?></a>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="menu-item">
                            <button class="menu-item-button">Thể loại</button>
                            <div class="menu-drop type">
                                <?php foreach($theloai as $tl): ?>
                                    <a href="<?= _WEB_ROOT.'/the-loai/'.$tl['slugtheloai'] ?>" class="drop-item col-2"><?= $tl['tentheloai']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="header-lap__search">
                        <form action="<?=_WEB_ROOT?>/xu-ly-tim-kiem" method="post">
                            <input type="text" name="search" placeholder="Nhập tên truyện để tìm kiếm" id="search">
                            <button class="button" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <div class="manga-search"></div>
                    </div>
                </div>
                <div class="col-lg-1 col-xl-2">
                    <div class="header-lap__user">
                        <div class="user-menu">
                            <?php if(isset($_SESSION['acc'])): ?>
                                <button class="icon"><img src="<?= _WEB_PUBLIC.'/clients/images/logo/'.$_SESSION['acc']['anhhienthi'] ?>" alt=""></button>
                            <?php else: ?>
                                <button class="icon"><i class="fa fa-user-circle"></i></button>
                            <?php endif ?>
                            <div class="menu-drop">
                                <?php if(!isset($_SESSION['acc'])): ?>
                                    <a href="<?= _WEB_ROOT.'/dang-nhap'; ?>" class="drop-item"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                                    <a href="<?= _WEB_ROOT.'/dang-ky' ?>" class="drop-item"><i class="fas fa-user-plus"></i> Đăng ký</a>
                                <?php else: ?>
                                    <a href="<?=_WEB_ROOT."/theo-doi"?>" class="drop-item"><i class="fa fa-heart"></i> Truyện theo dõi</a>
                                    <a href="<?=_WEB_ROOT?>/lich-su-doc" class="drop-item"><i class="fas fa-history"></i> Lịch sử đọc</a>
                                    <?php if($_SESSION['acc']['qtc']==1): ?>
                                        <a href="<?=_WEB_ROOT?>/quan-tri" class="drop-item"><i class="fas fa-user-cog"></i> Quản trị</a>
                                    <?php endif ?>
                                    <a href="<?=_WEB_ROOT?>/thong-tin-tai-khoan" class="drop-item"><i class="fa fa-user"></i> Thông tin tài khoản</a>
                                    <a href="<?= _WEB_ROOT.'/dang-xuat'; ?>" class="drop-item"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="header-mobile__bars">
            <div class="burger" id="burger">
                <i class="fa fa-bars"></i>
            </div>
            <div class="main-menu">
                <div class="menu-item"><i class="fa fa-times" id="close"></i></div>
                <div class="menu-item">
                    <form action="<?=_WEB_ROOT?>/xu-ly-tim-kiem" method="post">
                        <input type="text" name="search" placeholder="Nhập tên truyện để tìm kiếm">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="menu-item" id="menu-button">
                    <button>Danh mục <i class="fas fa-angle-down"></i></button>
                </div>
                <div class="menu-drop" id="menu">
                    <?php foreach ($menu as $mmn):?>
                        <a href="<?= _WEB_ROOT.'/'.$mmn['slugmenu']?>" class="drop-item"><?= $mmn['tenmenu'] ?></a>
                    <?php endforeach ?>
                </div>
                <div class="menu-item" id="type-button">
                    <button>Thể loại <i class="fas fa-angle-down"></i></button>
                </div>
                <div class="menu-drop" id="type">
                    <?php foreach ($theloai as $mtl):?>
                        <a href="<?= _WEB_ROOT.'/the-loai/'.$mtl['slugtheloai'] ?>" class="drop-item col-6"><?= $mtl['tentheloai'] ?></a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="header-mobile__logo">
            <a href="<?= _WEB_ROOT.'/'; ?>" class="logo">
                <img src="<?=_WEB_PUBLIC?>/clients/images/truyentranhlogo.png" alt="" style="width:150px">
            </a>
        </div>
        <div class="header-mobile__user">
            <div class="user" id="user-button">
            <?php if(isset($_SESSION['acc'])): ?>
                <button class="icon"><img src="<?= _WEB_PUBLIC.'/clients/images/logo/'.$_SESSION['acc']['anhhienthi'] ?>" alt=""></button>
            <?php else: ?>
                <button class="icon"><i class="fa fa-user-circle"></i></button>
            <?php endif ?>
            </div>
            <div class="user-menu" id="user-menu">
                <div class="menu-item"><i class="fa fa-times" id="close-user"></i></div>
                <?php if(!isset($_SESSION['acc'])){ ?>
                    <a href="<?= _WEB_ROOT.'/dang-nhap'; ?>" class="menu-item"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                    <a href="<?= _WEB_ROOT.'/dang-ky' ?>" class="menu-item"><i class="fas fa-user-plus"></i> Đăng ký</a>
                <?php } else { ?>
                    <a href="<?=_WEB_ROOT?>/theo-doi" class="menu-item"><i class="fa fa-heart"></i> Truyện đã theo dõi</a>
                    <a href="<?=_WEB_ROOT?>/lich-su-đọc" class="menu-item"><i class="fas fa-history"></i> Lịch sử</a>
                    <?php if($_SESSION['acc']['qtc']==1) { ?>
                        <a href="<?=_WEB_ROOT?>/quan-tri" class="menu-item"><i class="fas fa-user-cog"></i> Quản trị</a>
                    <?php } ?>
                    <a href="<?=_WEB_ROOT?>/thong-tin-tai-khoan" class="menu-item"><i class="fa fa-user"></i> Thông tin tài khoản</a>
                    <a href="<?= _WEB_ROOT.'/dang-xuat'; ?>" class="menu-item"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a>
                <?php } ?>
            </div>
        </div>
    </div>
</header>
<div class="hide-screen"></div>
<input type="hidden" id="url" value="<?= _WEB_ROOT ?>">
<input type="hidden" id="username" <?php if(isset($_SESSION['acc'])) echo 'value="'.$_SESSION['acc']['tendangnhap'].'"' ?>>