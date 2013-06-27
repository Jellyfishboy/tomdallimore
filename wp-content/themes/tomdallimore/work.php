<?php 
/* 
Template Name: WorkTemp
*/ 
?>
<?php get_header(); ?>
<div id="focus_content">

</div>
<div id="content_divider"></div>
<section class="content">
    <div class="container" id="work">
			<?php $wp_query = new WP_Query();
			$wp_query->query('&showposts=5&cat=3'.'&paged='.$paged);
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div class="row">
				<div class="fourcol">
					<h1><?php the_title(); ?></h1>
					<p><?php the_excerpt(); ?></p>
				</div>
				<div class="eightcol last">
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<img src="<?php echo $image[0]; ?>"/>
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile;?>
<?php get_footer('no-sidebar'); ?>