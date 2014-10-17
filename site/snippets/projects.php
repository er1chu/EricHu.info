<section id="projects">

	<?php foreach($data->children()->visible() as $project): ?>

		<div class="project-wrapper" data-link="<?php echo trimmed($project->title()); ?>">

			<span class="title"><?php echo html($project->title()) ?></span> 
			<span class="description"><?php echo html($project->text()) ?></span><span class="postscript">Share</span>

			<div class="media">
				<?php if ($project->type() == "embed") { // If Embed ?>

					<div class="media">

				 		<?php echo ($project->embed()); ?>

					</div>

				<?php } else { ?>

					<?php $n=0; foreach($project->images() as $image): $n++; //loop image ?>
						<img data-original="<?php echo $image->url() ?>" alt="<?php echo $image->name() ?>" class="lazy center" width="<?php echo $image->width() ?>px" height="<?php echo $image->height() ?>px">		
					<?php endforeach ?>
				
				<?php } ?>
			
			</div>
		</div>

	<?php endforeach ?>
</section>
