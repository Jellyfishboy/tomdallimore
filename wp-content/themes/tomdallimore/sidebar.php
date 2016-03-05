<div class="threecol last sidebar_content" id="sidebar">
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    <h3>Topics</h3>
    <?php $args = array( 'title_li' => __( '' ),
                         'exclude'  => '5,20,30,28,31,32'); ?>
    <ul>
        <?php wp_list_categories( $args ); ?> 
    </ul>
    <h3>Coming soon</h3>
    <a href="http://www.trado.io/?utm_source=tomdallimore&utm_medium=website&utm_content=blog-sidebar&utm_campaign=trado" target="_blank">
        <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/cropped-small.png" />
    </a>
    <p>Trado is a lightweight, easy to use e-commerce platform designed for sole traders and SME businesses.</p>
</div>