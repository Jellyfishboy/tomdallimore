<?php 
/* 
Template Name: WorkTemp
*/ 
?>
<?php get_header(); ?>
<?php $wp_query = new WP_Query();
$wp_query->query('&showposts=5&cat=3'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<div class="row work_post">
	<div class="threecol">
		<div class="header2"><img class="star" src="<?php echo bloginfo('template_directory'); ?>/assets/images/star.png"/><h2><?php the_title(); ?></h2></div>
		<p><?php the_excerpt(); ?>
	</div>
	<div class="ninecol last">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<img src="<?php echo $image[0]; ?>"/>
		<?php endif; ?>
	</div>
</div>
<?php endwhile;?>
<?php get_footer('no-sidebar'); ?>