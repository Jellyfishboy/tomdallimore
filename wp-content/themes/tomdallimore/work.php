<?php 
/* 
Template Name: WorkTemp
*/ 
?>
<?php get_header(); ?>
<div id="work_focus" class="focus_content">
	<div class="row">
		<img src="<?php echo bloginfo('template_directory'); ?>/assets/img/hero_work.png" />
		<span></span>
		<h1>SNGTRKR</h1>
		<p>“Inspired by the passion and appreciation that we have for music and artists alike, we built SNGTRKR - a webapp to enable other music lovers to easily track artists, so that they never miss another music release.</p>
		<p>We wanted to make it simple for you to find out when your favourite artists are releasing new content, by removing the hassle of looking through social media sites, subscribing to mailing lists, or repeatedly checking artists' websites.”</p>
		<p>A new online music service founded by Tom Dallimore and Matt Bessey.</p>
	</div>
</div>
<div id="content_divider"></div>
<section class="content">
    <div class="container" id="work">
			<?php $wp_query = new WP_Query();
			$wp_query->query('&showposts=5&category_name=work'.'&paged='.$paged);
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div class="row">
				<div class="fourcol">
					<h1><?php the_title(); ?></h1>
					<p><?php the_excerpt(); ?></p>
				</div>
				<div class="eightcol last">
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<div style="background-image:url('<?php echo $image[0]; ?>');"></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile;?>
<?php get_footer('no-sidebar'); ?>