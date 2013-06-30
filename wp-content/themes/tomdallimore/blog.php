<?php 
/* 
Template Name: BlogTemp
*/ 
?>
<?php get_header(); ?>
<div id="content_divider"></div>
<section class="content">
    <div class="container" id="blog">
    	<div class="row">
			<?php $wp_query = new WP_Query();
			$wp_query->query('&showposts=5&cat=12,13,14'.'&paged='.$paged);
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<article class="ninecol">
				<div class="row">
					<div class="twocol">
						<a href="<?php the_permalink() ?>"><h2 class="<?php $category = get_the_category(); echo $category[0]->slug; ?>"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h2></a>
					</div>
					<div class="tencol last">
						<a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
						<p><?php the_excerpt(); ?></p>
						<p><?php the_time('dS F Y') ?></p>
						<div class="tags">
							<?php $before = ''; the_tags($before, $separator, $after); ?>
						</div>
					</div>
				</div>
			</article>
<?php endwhile;?>
		<div class="threecol last">

		</div>
<?php get_footer('no-sidebar'); ?>