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
    			<p>I work as a UX developer for Dyson in the somerset area, however I normally take residence in the lively city of Bristol. When I’m not hammering at the keyboard, I like to explore various music genres and catch some rays.</p>
    		</div>
    	</div>
        <div class="row">
            <div class="fourcol">
                <span></span>
            </div>
            <div class="fourcol">
                <h1>Recent work</h1>
            </div>
            <div class="fourcol last">
                <span></span>
            </div>
        </div>
        <div class="row">
            <div class="fourcol">
                <div></div>
            </div>
            <div class="fourcol">
                <div></div>
            </div>
            <div class="fourcol last">
                <div></div>
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
                        <a href="https://github.com/SNGTRKR/sngtrkr" target="_blank"><h2>Sngtrkr</h2></a>
                        <p>The official SNGTRKR.com repo.</p>
                    </span>
                    <span>
                        <i class="icon-star"></i><p>3</p><i class="icon-code-fork"></i><p>0</p>
                    </span>
                </div>
                <div>
                    <span>
                        <a href="https://github.com/Jellyfishboy/tomdallimore" target="_blank"><h2>tomdallimore</h2></a>
                        <p>Official Tom Dallimore portfolio &amp; blog.</p>
                    </span>
                    <span>
                        <i class="icon-star"></i><p>0</p><i class="icon-code-fork"></i><p>0</p>
                    </span>
                </div>
                <div>
                    <span>
                        <a href="https://github.com/Jellyfishboy/pretty_sub_nav" target="_blank"><h2>pretty_sub_nav</h2></a>
                        <p>Bespoke sub navigation created for the Dyson web family.</p>
                    </span>
                    <span>
                        <i class="icon-star"></i><p>0</p><i class="icon-code-fork"></i><p>0</p>
                    </span>
                </div>
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