<div class="threecol last sidebar_content" id="sidebar">
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
    <h3>Topics</h3>
    <?php $args = array( 'title_li' => __( '' ),
                         'exclude'  => '5,20'); ?>
    <ul>
        <?php wp_list_categories( $args ); ?> 
    </ul>
</div>