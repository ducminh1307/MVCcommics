<?php
    $config['app'] = [
        'routeMiddleware'=>[
            'thong-tin-tai-khoan'=> authMiddleware::class,
            'thay-doi-mat-khau'=> authMiddleware::class,
            'quan-tri'=> authMiddleware::class
        ] 
    ];
?>