
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


  <style type="text/css">
    .swipe {
    overflow: hidden;
    visibility: hidden;
    position: relative;
  }
  .swipe-wrap {
    overflow: hidden;
    position: relative;
  }
  .swipe-wrap > div {
    float:left;
    width:100%;
    position: relative;

  }
  .carousel .item a {
    cursor: url('../images/curses.gif') auto;
}
</style>

</head>

<body>
  <!--[if lt IE 7]>
      <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
  <![endif]-->

<!-- <div id="drawer" class="open">
</div> -->
  <div id="rapper">
    <section id="header">
      <span class="title">Eric Hu</span><div class="description"> ( &#9993; ) <p>is a New York-based art director and  working in branding, editorial and user interface. <span class="med more">( Read More... )</span>
      <span class="extended">
      He previously worked as the design lead at <abbr>OKF</abbr>ocus working for clients such as Nike, the Wolfsonian Museum, Phillips, Tumblr and Atlantic Records as well as in-house projects such as Newmoticons. Eric has shown work in the <abbr>ADC</abbr> Gallery and the Museum of Art and Design. In 2010 he was honored as an ADC Young Gun and in 2013 he became the recipient of the Bradbury Thompson Memorial Prize.</span> </p></div>
      <img src="/kirby/assets/images/swuigs.svg" id="swuigs">
    </section>