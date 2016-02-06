<?php 
/* 
Template Name: HomeTemp
*/ 
?>
<?php get_header(); ?>
<div id="home_focus" class="focus_content">
<?php echo get_new_royalslider(1); ?>
</div>
<section class="content">
    <div class="container" id="home">
    	<div class="row">
    		<div class="fourcol">
    			<div></div>
    			<h1>What I do</h1>
    			<p>Armed with the latest technologies and best practises in the industry, I can turn your designs into web reality. I specialise in Ruby on Rails for web applications and HAML, SASS with Compass and Coffeescript for front-end development.</p>
    		</div>
    		<div class="fourcol">
    			<div></div>
    			<h1>What I love</h1>
    			<p>I am obsessed with UI design and innovative technologies. I strive to make everyday user experiences as intuitive and efficient as possible, which prove to be both functional and visually stunning.</p>
    		</div>
    		<div class="fourcol last">
    			<div></div>
    			<h1>Where I reside</h1>
    			<p>I'm currently travelling, exploring and living in SEA; working as a freelance Ruby engineer for some exciting companies including Give4Sure, Cancer Research UK and Equinix.</p>
    		</div>
    	</div>
        <div class="row custom-header">
            <div class="fourcol">
                <span></span>
            </div>
            <div class="fourcol">
                <h1>Projects</h1>
            </div>
            <div class="fourcol last">
                <span></span>
            </div>
        </div>
        <div class="row" id="projects">
            <div class="fourcol">
                <a href="http://www.trado.io" target="_blank">
                    <span></span>
                </a>
                <a href="http://www.trado.io" target="_blank">
                    <h3>Trado - E-Commerce platform</h3>
                </a>
            </div>
            <div class="fourcol">
                <a href="http://redlight.tomdallimore.com" target="_blank">
                    <span></span>
                </a>
                <a href="http://redlight.tomdallimore.com" target="_blank">
                    <h3>Redlight - Store template</h3>
                </a>
            </div>
            <div class="fourcol last">
                <a href="http://soca.tomdallimore.com" target="_blank">
                    <span></span>
                </a>
                <a href="http://soca.tomdallimore.com" target="_blank">
                    <h3>Soca - Admin template</h3>
                </a>
            </div>
        </div>
        <div class="row custom-header">
            <div class="fourcol">
                <span></span>
            </div>
            <div class="fourcol">
                <h1>Clients</h1>
            </div>
            <div class="fourcol last">
                <span></span>
            </div>
        </div>
        <div class="row" id="clients">
            <div class="threecol">
                <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/clients/cruk.png"/>
            </div>
            <div class="threecol">
                <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/clients/fplc.png"/>
            </div>
            <div class="threecol">
                <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/clients/dyson.png"/>
            </div>
            <div class="threecol last">
                <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/clients/equinix.png"/>
            </div>
        </div>
        <div class="row">
            <div class="twelvecol">
                <div></div>
            </div>
        </div>    
        <div class="row">
            <div class="sixcol">
                <i class="icon-github"></i>
                <h1>Github repos</h1>
                <span class="divider"></span>
                <div>
                    <span>
                        <a href="https://github.com/Jellyfishboy/trado" target="_blank"><h2>trado</h2></a>
                        <p>Lightweight, easy to use e-commerce platform.</p>
                    </span>
                    <span>
                        <i class="icon-star"></i><p>42</p><i class="icon-flow-branch"></i><p>7</p>
                    </span>
                </div>
                <div>
                    <span>
                        <a href="https://github.com/Jellyfishboy/soca" target="_blank"><h2>soca</h2></a>
                        <p>Responsive administration template.</p>
                    </span>
                    <span>
                        <i class="icon-star"></i><p>3</p><i class="icon-flow-branch"></i><p>0</p>
                    </span>
                </div>
                <div>
                    <span>
                        <a href="https://github.com/Jellyfishboy/redlight" target="_blank"><h2>redlight</h2></a>
                        <p>Responsive store template.</p>
                    </span>
                    <span>
                        <i class="icon-star"></i><p>0</p><i class="icon-flow-branch"></i><p>0</p>
                    </span>
                </div>
            </div>
            <div class="sixcol hori_divider">
                <div></div>
            </div>
            <div class="sixcol last">
                <i class="icon-twitter"></i>
                <h1>Latest tweets</h1>
                <ul>
                    <?php include 'twitter.php'; ?>
                </ul>
            </div>
        </div>

<?php get_footer('no-sidebar'); ?>