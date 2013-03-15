<section id="projects">
 <h1><?php echo html($data->title()) ?></h1>
 <?php echo kirbytext($data->text()) ?>


  <?php foreach($data->children()->visible() as $project): ?>
  <?php echo kirbytext($project->text()) ?>
  <div id="<?php echo $project->slug()?>_slide">

<a href="#" class="prev">Prev</a> — <a href="#" class="next">Next</a>
 <?php foreach($project->images() as $image): ?>
<div class="file"><img src="<?php echo $image->url() ?>" width="<?php echo $image->width() ?>" height="<?php echo $image->height() ?>" alt="<?php echo $image->name() ?>" /></div>
  <?php endforeach ?>
</div>
<script type="text/javascript">

$('#<?php echo $project->slug()?>_slide').cycle({ 
 fx:     'fade', 
    speed:  'fast', 
    timeout: 0, 
    next:   '#<?php echo $project->slug()?>_slide .next', '#<?php echo $project->slug()?>_slide .file', 
    prev:   '#<?php echo $project->slug()?>_slide .prev', '#<?php echo $project->slug()?>_slide .file',
    containerResize: 1,
});



</script>
  <?php endforeach ?>

</section>

<section id="projects">
 <h1><?php echo html($data->title()) ?></h1>
 <?php echo kirbytext($data->text()) ?>


  <?php foreach($data->children()->visible() as $project): ?>
  <?php echo kirbytext($project->text()) ?>
  <div id="<?php echo $project->slug()?>-slide" class="carousel">
    <div class="carousel-inner">
      <?php $n=0; foreach($project->images() as $image): $n++; ?>
      <div class="item<?php if($n==1) echo ' active' ?>">
        <img src="<?php echo $image->url() ?>" width="<?php echo $image->width() ?>" height="<?php echo $image->height() ?>" alt="<?php echo $image->name() ?>" />
      </div>
      <?php endforeach ?>
       <a class="carousel-control left" href="#<?php echo $project->slug()?>-slide" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#<?php echo $project->slug()?>-slide" data-slide="next">&rsaquo;</a>
    </div>
</div>
<script>

$(function() {
  $('#<?php echo $project->slug()?>-slide').carousel('pause');
});

</script>
  <?php endforeach ?>

</section>