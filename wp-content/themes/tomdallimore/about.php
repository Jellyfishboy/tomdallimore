<?php 
/* 
Template Name: AboutTemp
*/ 
?>
<?php get_header(); ?>
<div id="about_focus" class="focus_content">
    <div class="row">
        <div class="onecol"></div>
        <div class="fourcol">
            <!-- <div style="<?php echo bloginfo('template_directory'); ?>/assets/img/me.png"></div> -->
            <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/me.png"/>
        </div>
        <div class="sixcol">
            <span></span>
            <h1>Hi there, my name is Tom</h1>
            <p>I was born and raised in the infamous city known as Bristol. Since growing up within the industry of my father’s Graphic Design company, I have developed an unhealthy obsession to all things related to technology and the web.</p>
            <p>I decided to channel this passion by learning UI design and web development. Refining my skills over the course of six years, I have flourished into an ambitious, business driven individual.</p>
            <p>I have spent the past few years freelancing and contracting for some exciting companies including Dyson, Blak Pearl and Future PLC.</p>  
            <button type="button" href="http://www.tomdallimore.com/" class="btn btn-primary">View my CV</button>
        </div>
        <div class="onecol last"></div>
    </div>
</div>
<div id="content_divider"></div>
<section class="content">
    <div class="container" id="about">
    	<div class="row">
    		<div class="fourcol">
    			<h1>Go on, be social</h1>
    			<p>Feel free to get in contact with any enquiries with the online form, subscribe on <a href="http://www.facebook.com" target="_blank">Facebook</a> or follow my witty remarks and ramblings on <a href="http://www.twitter.com/billy_dallimore" target="_blank">Twitter</a>.</p>
    		</div>
    		<div class="eightcol last">
    			<form>
    				<div class="row">
    					<div class="sixcol">
		    				<label>First name</label>
		    				<input type="text" tabindex="1"/>
		    				<label>Telephone</label>
		    				<input type="text" tabindex="3"/>
		    			</div>
		    			<div class="sixcol last">
		    				<label>Last name</label>
		    				<input type="text" tabindex="2"/>
		    				<label>Email address</label>
		    				<input type="text" tabindex="4"/>
		    			</div>
		    		</div>
		    		<div class="row">
		    			<div class="twelvecol">
		    				<label>Message</label>
		    				<textarea rows="10" tabindex="5"></textarea>
		    			</div>
		    			<input type="submit" value="Send" class="btn btn-success"/>
		    		</div>
    			</form>
    		</div>
    	</div>


<?php get_footer('no-sidebar'); ?>