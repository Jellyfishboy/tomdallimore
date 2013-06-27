<?php 
/* 
Template Name: AboutTemp
*/ 
?>
<?php get_header(); ?>
<div id="focus_content">

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
		    			<input type="submit" value="Send"/>
		    		</div>
    			</form>
    		</div>
    	</div>


<?php get_footer('no-sidebar'); ?>