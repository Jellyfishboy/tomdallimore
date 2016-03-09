<?php while ( have_posts() ) : the_post(); ?>
    <div class="row" id="post-<?php the_ID(); ?>">
        <div class="fourcol">
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
            <?php 
                $website_url = get_post_meta($post->ID, 'website_url', true);
                $github_url = get_post_meta($post->ID, 'github_url', true);
                $demo_url = get_post_meta($post->ID, 'demo_url', true);
            ?>
            <?php if (!$website_url == '') {
                echo '<a href="'. $website_url . '" target="_blank" class="btn btn-success">Website</a>';
            }
            ?>
            <?php if (!$github_url == '') {
                echo '<a href="'. $github_url . '" target="_blank" class="btn btn-default">Github</a>';
            }
            ?>
            <?php if (!$demo_url == '') {
                echo '<a href="'. $demo_url . '" target="_blank" class="btn btn-primary">Demo</a>';
            }
            ?>
        </div>
        <div class="eightcol last">

            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <img src="<?php echo $image[0]; ?>" />
            <?php endif; ?>
        </div>
    </div>
<?php endwhile; ?>