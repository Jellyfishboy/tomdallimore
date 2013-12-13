<?php get_header(); ?>
<?php
$s_query = get_search_query(); ?>
<section class="content">
    <div class="container blog_search" id="blog">
        <div class="row">
            <div class="threecol last sidebar_content" id="sidebar">
                <?php include (TEMPLATEPATH . '/searchform.php'); ?>
                <h3>Topics</h3>
                <?php $args = array( 'title_li' => __( '' ),
                                     'exclude'  => '30,3'); ?>
                <ul>
                    <?php wp_list_categories( $args ); ?> 
                </ul>
            </div>
            <div class="ninecol type_header">
                <h1 id="post_type">Search results for: <?php echo $s_query ?></h1>
            </div>
            <?php if ( have_posts() ) : ?>
                <?php $wp_query = new WP_Query();
                $wp_query->query('&s='.$s_query.'&category_name=development,article,link');
                while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <article class="ninecol">
                    <div class="row">
                        <div class="twocol">
                            <a href="<?php the_permalink() ?>"><h2 class="<?php $category = get_the_category(); echo $category[0]->slug; ?>"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h2></a>
                        </div>
                        <div class="tencol last">
                            <a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
                            <p><?php the_content(); ?></p>
                            <p><?php the_time('dS F Y') ?></p>
                            <div class="tags">
                                <?php $before = ''; the_tags($before, $separator, $after); ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php endwhile;?>
            <?php else : ?>
                <div class="ninecol">
                    <p id="no_results">Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
                </div>
            <?php endif; ?>
        </div>
<?php get_footer('no-sidebar'); ?>