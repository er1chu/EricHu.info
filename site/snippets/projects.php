<section id="projects">
<div class="col_8">
  <h1><?php echo html($data->title()) ?></h1>
  <?php echo kirbytext($data->text()) ?>
</div>


  <?php foreach($data->children()->visible() as $project): ?>

  <?php
  
 /* $rando_off = array('0','0');
  $rando_offs = $rando_off[array_rand($rando_off)]; */

?>

  <div class="col_8">
    <h1><?php echo kirbytext($project->title()) ?></h1>
     <div class="col_7"> <?php echo kirbytext($project->text()) ?></div>
     
     <?php if ($project->type() == "carousel") { // If Project Type is a slideshow ?>

      <div id="<?php echo $project->slug()?>-slide" class="carousel">
<a href="#<?php echo $project->slug()?>-slide" data-slide="prev">&larr;</a> &nbsp;
          <a href="#<?php echo $project->slug()?>-slide" data-slide="next">&rarr;</a>
        <div class="carousel-inner">
          <?php $n=0; foreach($project->images() as $image): $n++; //loop image ?>
          <div class="item<?php if($n==1) echo ' active' // echo active if it's the first image ?>">
            <a href="#<?php echo $project->slug()?>-slide" data-slide="next"><img <?php if($n>1) echo 'lazy-'?>src="<?php echo $image->url() ?>" width="<?php //echo $image->width() ?>" height="<?php //echo $image->height() ?>" alt="<?php echo $image->name() ?>" class="center"/></a>
          </div>

          <?php endforeach ?>
          <?php } ?>
        </div>
        
    </div>

    <script type="text/javascript">

    $(function() {
      $('#<?php echo $project->slug()?>-slide').carousel('pause');
    });

    </script>
  </div>
  <?php endforeach ?>

</section>
</div>
</div>