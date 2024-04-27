<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?=_WEB_ROOT?>/"><img src="<?=_WEB_PUBLIC?>/clients/images/truyentranhlogo.png" alt="Logo" srcset="" style="height:60px"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item <?=($_SERVER['PATH_INFO']=='/quan-tri')?'active':''?>">
                    <a href="<?=_WEB_ROOT?>/quan-tri" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Thống kê</span>
                    </a>
                </li>

                <li class="sidebar-item <?=($_SERVER['PATH_INFO']=='/quan-tri/quan-ly-menu')?'active':''?>">
                    <a href="<?=_WEB_ROOT?>/quan-tri/quan-ly-menu" class='sidebar-link'>
                        <i class="bi bi-menu-app-fill"></i>
                        <span>Menu</span>
                    </a>
                </li>

                <li class="sidebar-item <?=($_SERVER['PATH_INFO']=='/quan-tri/quan-ly-the-loai')?'active':''?>">
                    <a href="<?=_WEB_ROOT?>/quan-tri/quan-ly-the-loai" class='sidebar-link'>
                        <i class="icon dripicons-list mt-1"></i>
                        <span>Thể loại</span>
                    </a>
                </li>

                <li class="sidebar-item <?=($_SERVER['PATH_INFO']=='/quan-tri/quan-ly-nguoi-dung')?'active':''?>">
                    <a href="<?=_WEB_ROOT?>/quan-tri/quan-ly-nguoi-dung" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Người dùng</span>
                    </a>
                </li>

                <li class="sidebar-item <?=($_SERVER['PATH_INFO']=='/quan-tri/quan-ly-truyen')?'active':''?>">
                    <a href="<?=_WEB_ROOT?>/quan-tri/quan-ly-truyen" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Truyện</span>
                    </a>
                </li>

                <li class="sidebar-item <?=($_SERVER['PATH_INFO']=='/quan-tri/quan-ly-binh-luan')?'active':''?>">
                    <a href="<?=_WEB_ROOT?>/quan-tri/quan-ly-binh-luan" class='sidebar-link'>
                        <i class="bi bi-chat-square-fill"></i>
                        <span>Bình luận</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>