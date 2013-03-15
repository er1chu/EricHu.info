<section id="projects">
  <div class="col_8">
    <h1><?php echo html($data->title()) ?></h1>
    <?php echo kirbytext($data->text()) ?>
  </div>


  <?php foreach($data->children()->visible() as $project): ?>

    <div class="col_8">
      <h1><?php echo kirbytext($project->title()) ?></h1>
      <?php if ($project->type() == "embed") { // If Embed ?>
       <div class="col_7"><?php echo kirbytext($project->text()) ?></div>
       <div class="col_8">
       <?php echo ($project->embed()); ?>
     </div>
      
      <?php } if ($project->type() == "straight") { ?>
      <div class="col_7"> <?php echo kirbytext($project->text()) ?></div>
      <div class="col_8">
        <?php $n=0; foreach($project->images() as $image): $n++; //loop image ?>
        <img src="<?php echo $image->url() ?>" alt="<?php echo $image->name() ?>" class="center"/></a>
        <?php endforeach ?>
      </div>

      <?php } if ($project->type() == "carousel") { ?>
       <div class="col_7"> <?php echo kirbytext($project->text()) ?></div>

        <div id="<?php echo $project->slug()?>-slide" class="carousel">
          <a href="#<?php echo $project->slug()?>-slide" data-slide="prev">&larr;</a> &nbsp;
          <a href="#<?php echo $project->slug()?>-slide" data-slide="next">&rarr;</a>
          <div class="carousel-inner">
            <?php $n=0; foreach($project->images() as $image): $n++; //loop image ?>
            <div class="item<?php if($n==1) echo ' active' // echo active if it's the first image ?>">
              <a href="#<?php echo $project->slug()?>-slide" data-slide="next"><img <?php if($n>1) echo 'lazy-'?>src="<?php echo $image->url() ?>" alt="<?php echo $image->name() ?>" class="center"/></a>
              <div class="loading hide"></div>
            </div>
            <?php endforeach ?>
          </div>
          
      </div>

      <script type="text/javascript">

      $(function() {
        $('#<?php echo $project->slug()?>-slide').carousel('pause', {interval:false});
      });

      </script> 
      <?php } //End Carousel Conditional?>
    </div>
  <?php endforeach ?>

</section>
</div>
</div>