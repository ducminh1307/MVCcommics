<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=_WEB_PUBLIC?>/admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?=_WEB_PUBLIC?>/admin/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?=_WEB_PUBLIC?>/admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=_WEB_PUBLIC?>/admin/vendors/choices.js/choices.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.0/font/bootstrap-icons.min.css" integrity="sha512-yLNTU6YQWEtsM/WVkUqd2jRzzq5hmfFUMVvziVlkgC0R9HTElDtyF4DiWiBeMS36npvN+NWwrr764A4AWGcmQQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.min.css" integrity="sha512-pi7KSLdGMxSE62WWJ62B1R5/H7WNnIsj2f51MikplRt31K0uCZ1lfPSw/0Jb1flSz6Ed2YLSlox6Uulf7CaFiA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=_WEB_PUBLIC?>/admin/css/app.css">
    <link rel="shortcut icon" href="<?=_WEB_PUBLIC?>/clients/images/favicon.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div id="app">
        <?php $this->view('blocks/admin/sidebar') ?>
        <div id="main">
            <?php $this->view('blocks/admin/header') ?>
            <input type="hidden" value="<?=_WEB_ROOT?>" id="url">
            <div class="page-heading">
                <h3><?=$page_header?></h3>
            </div>
            
            <?php $this->view($page,$body) ?>

            <?php $this->view('blocks/admin/footer') ?>
        </div>
    </div>

    <script src="<?=_WEB_PUBLIC?>/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=_WEB_PUBLIC?>/admin/js/bootstrap.bundle.min.js"></script>
    <script src="<?=_WEB_PUBLIC?>/admin/js/mazer.js"></script>
    <script src="<?=_WEB_PUBLIC?>/admin/js/admin.js"></script>
</body>

</html>