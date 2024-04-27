<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->view('blocks/source') ?>
    <title><?php echo ucwords($title); ?></title>
    <link rel="stylesheet" href="<?php echo _WEB_PUBLIC;?>/clients/css/style.css">
</head>
<body> 
    <?php $this->view('blocks/header', $data['header']) ?>
    <?php $this->view($page, $data['body']) ?>
    <?php $this->view('blocks/footer') ?>
    <script src="<?php echo _WEB_PUBLIC;?>/clients/js/main.js"></script>
    <script src="<?php echo _WEB_PUBLIC;?>/clients/js/ajax.js"></script>
</body>
</html>