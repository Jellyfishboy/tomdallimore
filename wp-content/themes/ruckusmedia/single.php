<?php get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="row blog_posts">
            <div class="twocol post_info">
                <a href="<?php the_permalink() ?>"><h4 class="<?php $category = get_the_category(); echo $category[0]->slug; ?>"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h4></a>
                <i class="icon-calendar"></i>
                <p><?php the_time('dS F Y') ?></p>
                <i class="icon-comments-alt"></i>
                <p><?php comments_number(); ?></p>
            </div>
            <div class="eightcol post_content">
                <div class="header2"><img class="star" src="<?php echo bloginfo('template_directory'); ?>/assets/images/star.png"/><a href="<?php the_permalink() ?>"><h2><?php the_title(); ?></h2></a></div>
                <p><?php the_content(); ?></p>
            </div>
            <div class="twocol last tags">
                <?php $before = ''; the_tags($before, $separator, $after); ?>
            </div>
        </div>
        <div class="row">
            <div class="twocol">
            </div>
            <div class="eightcol pre_nex">
                <?php previous_post_link('%link', '<i class="icon-chevron-left"></i><div>Previous post</div><span>%title</span>', FALSE, '3'); ?> 
                <?php next_post_link('%link', '<i class="icon-chevron-right"></i><div>Next post</div><span>%title</span>', FALSE, '3'); ?>
            </div>
        </div>

    <?php endwhile; // end of the loop. ?>


<?php get_footer('no-sidebar'); ?>