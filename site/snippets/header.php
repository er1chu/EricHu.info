
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<html lang="en" class="no-js">
<head>
  
  <title><?php echo html($site->title()) ?> - <?php echo html($page->title()) ?></title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="<?php echo html($site->description()) ?>" />
  <meta name="keywords" content="<?php echo html($site->keywords()) ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="width=device-width">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <?php echo css('http://yui.yahooapis.com/3.8.0/build/cssreset/cssreset-min.css') ?>
  <?php echo css('assets/styles/app.css') ?>
  <?php echo css('assets/styles/min/carousel.min.css') ?>
  <?php echo js('http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js') ?>
  <?php echo js('assets/js/bootstrap-carousel.min.js') ?>

</head>

<body>
  <!--[if lt IE 7]>
      <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
  <![endif]-->

  <section id="header">
    <span class="title">Eric Hu</span><div class="description"> <p>is a New York-based artist and designer working in interaction and typography. <span class="med">(Read More...)</span></p></div>
  </section>