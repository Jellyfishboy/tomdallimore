<?php get_header(); ?>
<?php
$cate = single_cat_title('', false); ?>
<section class="content">
    <div class="container blog_category" id="blog">
        <div class="row">
            <div class="threecol last sidebar_content" id="sidebar">
                <?php include (TEMPLATEPATH . '/searchform.php'); ?>
                <h3>Topics</h3>
                <?php $args = array( 'title_li' => __( '' )); ?>
                <ul>
                    <?php wp_list_categories( $args ); ?> 
                </ul>
            </div>
            <div class="ninecol type_header">
                <h1 id="post_type">Category: <?php echo $cate ?></h1>
            </div>
            <?php $wp_query = new WP_Query();
            $wp_query->query('&showposts=5&category_name='.$cate.''.'&paged='.$paged);
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
        </div>
<?php get_footer('no-sidebar'); ?>