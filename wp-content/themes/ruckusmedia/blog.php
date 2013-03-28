<?php 
/* 
Template Name: BlogTemp
*/ 
?>
<?php get_header(); ?>
<?php $wp_query = new WP_Query();
$wp_query->query('&showposts=5&cat=12,13,14'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<div class="row blog_posts post_border">
	<div class="twocol post_info">
		<a href="<?php the_permalink() ?>"><h4 class="<?php $category = get_the_category(); echo $category[0]->slug; ?>"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h4></a>
		<i class="icon-calendar"></i>
		<p><?php the_time('dS F Y') ?></p>
		<i class="icon-comments-alt"></i>
		<p><?php comments_number(); ?></p>
	</div>
	<div class="eightcol post_content">
		<div class="header2"><img class="star" src="<?php echo bloginfo('template_directory'); ?>/assets/images/star.png"/><a href="<?php the_permalink() ?>"><h2><?php the_title(); ?></h2></a></div>
		<p><?php the_excerpt(); ?></p>
	</div>
	<div class="twocol last tags">
		<?php $before = ''; the_tags($before, $separator, $after); ?>
	</div>
</div>
<?php endwhile;?>
<?php get_footer('no-sidebar'); ?>