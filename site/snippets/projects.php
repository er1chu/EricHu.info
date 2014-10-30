<section id="projects">

	<?php foreach($data->children()->visible() as $project): ?>

		<div class="project-wrapper" data-link="<?php echo trimmed($project->title()); ?>">

			<span class="title"><?php echo html($project->title()) ?></span> 
			<span class="description"><?php echo html($project->text()) ?></span>
			
			<?php if ($project->credits() != "") { // If Embed ?>
				<span class="postscript">
					<?php echo ($project->credits()); ?>
				</span>
			<?php } ?>

			<div class="media">
				<?php if ($project->embed() != "") { // If Embed ?>
				 	<div class="embed">
				 		<?php echo ($project->embed()); ?>
				 	</div>
				<?php } ?>

				<?php if ($project->freeform() != 'true') { // If Embed ?>

					<?php $n=0; foreach($project->images() as $image): $n++; //loop image ?>
						<img data-src="<?php echo $image->url() ?>" alt="<?php echo $image->name() ?>" class="lazy center" width="<?php echo $image->width() ?>px" height="<?php echo $image->height() ?>px">		
					<?php endforeach ?>
				
				<?php } else { ?>
					<?php echo kirbytext($project->order()); ?>
				<?php } ?>
			</div>
		</div>

	<?php endforeach ?>
</section>
