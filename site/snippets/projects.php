<section id="projects">

	<?php foreach($data->children()->visible() as $project): ?>

		<div class="project-wrapper">

			<span class="title"><?php echo kirbytext($project->title()) ?></span> 
			<span class="description"><?php echo kirbytext($project->text()) ?></span>

			<div class="media">
				<?php if ($project->type() == "embed") { // If Embed ?>

					<div class="media">

				 		<?php echo ($project->embed()); ?>

					</div>

				<?php } else { ?>

					<?php $n=0; foreach($project->images() as $image): $n++; //loop image ?>
						<img data-original="<?php echo $image->url() ?>" alt="<?php echo $image->name() ?>" class="lazy center" width="<?php echo $image->width() ?>" height="<?php echo $image->height() ?>">		
					<?php endforeach ?>
				
				<?php } ?>
			
			</div>
		</div>

	<?php endforeach ?>
</section>
