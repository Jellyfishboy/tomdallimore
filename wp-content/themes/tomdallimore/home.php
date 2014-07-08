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
    			<p>Armed with the latest technologies and best practises in the industry, I can turn your designs into web reality. I specialise in Ruby on Rails for web applications and HAML, SASS with Compass and Coffeescript for <br/>front-end development.</p>
    		</div>
    		<div class="fourcol">
    			<div></div>
    			<h1>What I love</h1>
    			<p>I am obsessed with UI design and innovative technologies. I strive to make everyday user experiences as intuitive and efficient as possible, which prove to be both functional and visually stunning.</p>
    		</div>
    		<div class="fourcol last">
    			<div></div>
    			<h1>Where I reside</h1>
    			<p>I work as a web developer for Dyson in the Wiltshire area, however I normally take residence in the lively city of Bristol. When I’m not hammering at the keyboard, I like to explore various music genres and <br/>catch some rays.</p>
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
                <a href="http://www.dyson.co.uk" target="_blank">
                    <div data-toggle="tooltip" data-placement="bottom" data-original-title="Dyson UK" class="recent"></div>
                </a>
            </div>
            <div class="fourcol">
                <a href="http://soca.tomdallimore.com" target="_blank">
                    <div data-toggle="tooltip" data-placement="bottom" data-original-title="Gimson Robotics" class="recent"></div>
                </a>
            </div>
            <div class="fourcol last">
                <a href="http://content.dyson.de/costcal/" target="_blank">
                    <div data-toggle="tooltip" data-placement="bottom" data-original-title="Dyson CN" class="recent"></div>
                </a>
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
                        <i class="icon-star"></i><p>6</p><i class="icon-flow-branch"></i><p>1</p>
                    </span>
                </div>
                <div>
                    <span>
                        <a href="https://github.com/Jellyfishboy/soca" target="_blank"><h2>soca</h2></a>
                        <p>Responsive administration template.</p>
                    </span>
                    <span>
                        <i class="icon-star"></i><p>1</p><i class="icon-flow-branch"></i><p>0</p>
                    </span>
                </div>
                <div>
                    <span>
                        <a href="https://github.com/Jellyfishboy/releasr" target="_blank"><h2>releasr</h2></a>
                        <p>Simple release notes application, with a custom design.</p>
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