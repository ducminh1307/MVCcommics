<?php
    define('_DIR_ROOT', __DIR__);

    if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on'){
        $web_root = 'https://'.$_SERVER['HTTP_HOST'];
    } else { 
        $web_root = 'http://'.$_SERVER['HTTP_HOST'];
    }

    $dir = str_replace('\\','/', _DIR_ROOT);
    $folder = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dir);
    define('_WEB_ROOT', $web_root.$folder);
    define('_WEB_PUBLIC', _WEB_ROOT.'/public/assets');

    require_once './configs/routes.php';
    require_once './configs/app.php';
    require_once './core/route.php';
    require_once './app/App.php';
    require_once './core/controller.php';
    require_once './core/DB.php';
    require_once './core/request.php';
    require_once './core/response.php';
    require_once './core/session.php';
    $allHelpers = scandir('./app/helpers');
    if(!empty($allHelpers)){
        foreach($allHelpers as $item){
            if($item != '.' && $item != '..' && file_exists('./app/helpers/'.$item)){
                require_once('./app/helpers/'.$item);
            }
        }
    }
?>