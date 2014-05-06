<?php 
/* 
Template Name: WorkTemp
*/ 
?>
<?php get_header(); ?>
<div id="work_focus" class="focus_content">
	<?php $wp_query = new WP_Query();
			$wp_query->query('&category_name=featured');
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<div class="row">
			<div class="sixcol screenshot">
				<h1><?php the_title(); ?></h1>
				<ul class="skills">
					<?php
						$posttags = get_the_tags();
						if ($posttags) {
						  foreach($posttags as $tag) {
						    echo '<li class="' . $tag->name . '" data-toggle="tooltip" data-placement="bottom" data-original-title="' . $tag->name . '"></li>'; 
						  }
						}
					?>
				</ul>
				<a href="http://soca.tomdallimore.com" target="_blank" class="btn btn-success btn-large"><i class="icon-earth"></i>Website</a>
				<a href="https://github.com/Jellyfishboy/soca" target="_blank" class="btn btn-black btn-large"><i class="icon-github"></i>Repository</a>
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<img src="<?php echo $image[0]; ?>" />
				<?php endif; ?>
			</div>
			<div class="sixcol last">
				<h1><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
				<ul class="skills">
					<?php
						$posttags = get_the_tags();
						if ($posttags) {
						  foreach($posttags as $tag) {
						    echo '<li class="' . $tag->name . '" data-toggle="tooltip" data-placement="bottom" data-original-title="' . $tag->name . '"></li>'; 
						  }
						}
					?>
				</ul>
				<a href="http://soca.tomdallimore.com" target="_blank" class="btn btn-success btn-large"><i class="icon-earth"></i>Website</a>
				<a href="https://github.com/Jellyfishboy/soca" target="_blank" class="btn btn-black btn-large"><i class="icon-github"></i>Repository</a>
			</div>
		</div>
	<?php endwhile;?>
</div>
<section class="content">
    <div class="container" id="work">
			<?php $wp_query = new WP_Query();
			$wp_query->query('&category_name=work'.'&paged='.$paged);
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div class="row">
				<div class="fourcol">
					<h1><?php the_title(); ?></h1>
					<p><?php the_excerpt(); ?></p>
					<ul class="skills">
						<?php
							$posttags = get_the_tags();
							if ($posttags) {
							  foreach($posttags as $tag) {
							    echo '<li class="' . $tag->name . '" data-toggle="tooltip" data-placement="bottom" data-original-title="' . $tag->name . '"></li>'; 
							  }
							}
						?>
					</ul>
				</div>
				<div class="eightcol last">

					<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<img src="<?php echo $image[0]; ?>" />
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile;?>
<?php get_footer('no-sidebar'); ?>