<?php ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie ie7"> <![endif]--> 
<!--[if IE 8 ]>    <html lang="en" class="ie ie8"> <![endif]--> 
<!--[if IE 9 ]>    <html lang="en" class="ie ie9"> <![endif]--> 
<!--[if (gt IE 9)|!(IE)]><!--> <html l<?php language_attributes(); ?>> <!--<![endif]-->
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# tomdallimore: http://ogp.me/ns/fb/tomdallimore#">
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
	?>
</title>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '498341413692005');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=498341413692005&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Open graph meta data -->
<meta property="fb:app_id" content="342151029254103"/>
<meta property="og:url" content="<?php
global $wp;
$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
echo $current_url;
?>"/>
<meta property="og:title" content="<?php
    global $page, $paged;
    wp_title( '|', true, 'right' );
        bloginfo( 'name' );
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
    ?>"/>
<meta property="og:description" content="<?php if ( is_single() ) {
    single_post_title('', true); 
    } else {
    bloginfo('name'); echo " - "; bloginfo('description');
    }
?>"/>
<meta property="og:image" content="http://www.tomdallimore.com/wp-content/themes/tomdallimore/favicon.png"/>
<meta property="og:type" content="tomdallimore:website"/>
<meta name="description" content="<?php if ( is_single() ) {
	single_post_title('', true); 
	} else {
	bloginfo('name'); echo " - "; bloginfo('description');
	}
?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<!-- The little things -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.png">
    <link rel="author" type="text/plain" href="<?php echo bloginfo('template_directory'); ?>/humans.txt" />  
<!-- The little things -->

<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/assets/css/application.css" />
<!-- Stylesheets -->
	
    <?php wp_head(); ?>
<!-- Javascripts -->
	<script src="<?php echo bloginfo('template_directory'); ?>/assets/js/modernizr-2.6.2.js"></script>     
    <!--[if (lt IE 9) & (!IEMobile)]>
        <script src="<?php echo bloginfo('template_directory'); ?>/assets/js/selectivizr.js"></script>
    <![endif]-->
<!-- Javascripts -->
</head>
<body class="<?php if (is_page( array( 'Home', 'About', 'Portfolio' ))) { echo 'dark'; } else if (is_page( array( 'Photography' ))) { echo 'rough'; } else { echo 'light'; } ?> <?php if ( is_single() ) { echo 'single-post'; } ?>" id="top">
    <div role="main">
        <header class="<?php if(is_front_page()) echo 'hero'; ?>" role="banner">
        	<div class="container">
        		<div class="row">
        			<div class="fourcol">
                        <a href="/" title="Bristol based RoR &amp; Front-end Developer.">
                            <h1>tom</h1> <h1>dallimore</h1>
                        </a>
        			</div>
        			<div class="fourcol">
        			</div>
    			    <div class="fourcol last">
    			    	<nav role="navigation" class="desktop <?php
        if(in_category('12')) echo 'post_highlight';
        if(in_category('13')) echo 'post_highlight';
        if(in_category('14')) echo 'post-highlight';
     ?>">
                            <?php $args = array( 'menu' => 'mainnav', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?>
    			        </nav>
                        <div id="menu" class="mobile">
                            <i class="icon-ellipsis"></i>
                        </div>
    			    </div>
    			</div>			
    		</div>
        </header>
        <div id="dropdown" class="mobile">
            <!-- <?php include (TEMPLATEPATH . '/searchform-mobile.php'); ?> -->
            <?php $args = array( 'menu' => 'mainnav', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?>
        </div>