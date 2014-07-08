<?php get_header(); ?>
<section class="content">
    <div class="container single_post" id="blog">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="row">
            <?php get_sidebar(); ?>
            <article class="ninecol">
                <div class="row">
                    <div class="twocol">
                        <h2 class="<?php $category = get_the_category(); echo $category[0]->slug; ?>"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h2>
                        <?php include (TEMPLATEPATH . '/socialtools.php'); ?>
                    </div>
                    <div class="tencol last">
                        <h1><?php the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                        <p><?php the_time('dS F Y') ?></p>
                        <div class="tags">
                            <?php $before = ''; the_tags($before, $separator, $after); ?>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <!-- Comments -->
        <div class="row">
            <section role="navigation" class="ninecol">
                <div class="row">
                    <div class="twocol"></div>
                    <div class="tencol last">
                        <div class="pre_nex">
                            <?php previous_post_link('%link', '<i class="fa-chevron-left"></i><div>Previous post</div><span>%title</span>', true, '3'); ?> 
                            <?php next_post_link('%link', '<i class="fa-chevron-right"></i><div>Next post</div><span>%title</span>', true, '3'); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="row">
            <section role="comments" class="ninecol">
                <div class="row">
                    <?php comments_template(); ?>
                </div>
            </section>    
        </div>

    <?php endwhile; // end of the loop. ?>

    
<?php get_footer('no-sidebar'); ?>