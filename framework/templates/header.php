<!DOCTYPE html>
<html lang="de" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <title>
        <?php if(isset($app)) { echo $app->getTitle(); } else { echo defaultTitleTag; } ?>
    </title>
    <?php
    global $enqueuedStyles;
    foreach ($enqueuedStyles as $style) {
        echo '<link href="'.$style.'" rel="stylesheet">';
    } ?>
    <link rel="icon" type="image/png" href="/img/icons/favicon.ico">
    <link rel=apple-touch-icon href=/img/icons/apple-touch-icon.png>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Start Website Tutor Cookie Plugin -->
    <script type="text/javascript">
        window.cookieconsent_options = {
            message: 'Diese Website nutzt Cookies, um bestmögliche Funktionalität bieten zu können.',
            dismiss: 'Ok, verstanden',
            learnMore: 'Mehr Infos',
            link: '/datenschutz',
            theme: 'light-floating'
        };
    </script>
    <script type="text/javascript" src="//valao.de/cookieplugin/script.js"></script>
    <!-- Ende Website Tutor Cookie Plugin -->
</head>
<body class="<?php the_body_class(); ?>">