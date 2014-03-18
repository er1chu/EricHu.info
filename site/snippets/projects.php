<section id="projects">
  <div class="col_8">
    <h1><?php echo html($data->title()) ?></h1>
    <?php echo kirbytext($data->text()) ?>
  </div>


  <?php foreach($data->children()->visible() as $project): ?>

    <span class="title">
      <?php echo kirbytext($project->title()) ?></span> 
      <span class="description"><?php echo kirbytext($project->text()) ?></span>
      <div class="media">
      <?php if ($project->type() == "embed") { // If Embed ?>
       <?php echo ($project->embed()); ?>
     </div>
      
      <?php } if ($project->type() == "straight") { ?>
        <?php $n=0; foreach($project->images() as $image): $n++; //loop image ?>
        <img src="<?php echo $image->url() ?>" alt="<?php echo $image->name() ?>" class="center"/></a>
        <?php endforeach ?>
      </div>

      <?php } if ($project->type() == "carousel") { ?>

        <div id="<?php echo $project->slug()?>-slide" class="carousel">
          <div class="carousel-inner">
            <?php $n=0; foreach($project->images() as $image): $n++; //loop image ?>
            <div class="item<?php if($n==1) echo ' active' // echo active if it's the first image ?>">
              <a href="#<?php echo $project->slug()?>-slide" data-slide="next"><img src="<?php echo $image->url() ?>" alt="<?php echo $image->name() ?>" class="center"/></a>
            </div>
            <?php endforeach ?>
          </div>
          
      </div>

      <script type="text/javascript">



      </script> 
      <?php } //End Carousel Conditional?>
    </div>
  <?php endforeach ?>

</section>
</div>
</div>