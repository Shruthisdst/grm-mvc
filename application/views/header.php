<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title><?php if($pageTitle) echo $pageTitle . ' | '; ?>ವಿವಿಧ ಸಂಗ್ರಹ</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,700' rel='stylesheet' type='text/css'> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,300,600" rel="stylesheet" type="text/css"> -->

    <!-- Javascript calls
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script type="text/javascript" src="<?=PUBLIC_URL?>js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="<?=PUBLIC_URL?>js/jquery.viewport.js"></script>
    <script type="text/javascript" src="<?=PUBLIC_URL?>js/bootstrap-3.3.7/js/bootstrap.min.js"> </script>
    <script type="text/javascript" src="<?=PUBLIC_URL?>js/common.js"></script>
    <script type="text/javascript" src="<?=PUBLIC_URL?>js/treeview.js"></script>
    <script type="text/javascript">var base_url = "<?= BASE_URL?>";</script>
    
    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/normalize.css">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/font-awesome-4.6.3/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?=PUBLIC_URL?>js/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/style.css?version=1.0">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/fonts.css?version=1.0">
    <!-- <link rel="stylesheet" href="<?=PUBLIC_URL?>css/navbar.css"> -->
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/sidebar.css?version=1.0">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/carousel.css?version=1.0">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/page.css?version=1.0">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/archive.css?version=1.0">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/general.css?version=1.0">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/flat.css?version=1.1">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/form.css?version=1.0">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/aux.css?version=1.0">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/social.css?version=1.0">

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="<?=PUBLIC_URL?>images/favicon.png">
</head>
<body class="home">
    <header id="header">

<!-- Display shankara mast head only for the home page -->
<?php if(preg_match('/flat\/ಮುಖಪುಟ/u', $path)) { ?>
        <!-- Shankara mast head -->
        <div id="head" class="parallax" parallax-speed="4">
            <!-- <img class="img-circle" src="<?=PUBLIC_URL?>images/logo-circle.png" alt=""> -->
            <h1 id="logo" class="text-center">
                <span class="title">ವಿವಿಧ ಸಂಗ್ರಹ</span><br /><br /><br /><br />
                <span class="tagline"></span>
            </h1>
        </div>
<?php } ?>
        <!-- Navigation
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <nav class="navbar navbar-default navbar-sticky">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>

                <div id="myNavbar" class="navbar-collapse collapse">
                    <?=$this->printNavigation($navigation)?>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <!-- End Navigation
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </header>
