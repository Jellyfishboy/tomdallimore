	</div>
</section>
<footer role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="sixcol">
				<h3>Get in touch</h3>
				<p>You can <a href="/contact/">contact</a> or follow me on the networking sites below.</p>
				<a class="social" href="http://www.twitter.com/billy_dallimore" target="_blank" alt="Twitter">
					<div id="twitter" ></div>
				</a>
				<a class="social" href="http://www.facebook.com/ruckusmedia" target="_blank" alt="Facebook">
					<div id="facebook"></div>
				</a>
				<a class="social" href="https://plus.google.com/114286922039852423816" target="_blank" alt="Google+">
					<div id="googleplus"></div>
				</a>
			</div>
			<div class="sixcol last tweeters">
				<h3>Latest tweets</h3>
				<div id="twitter_div"><ul id="twitter_update_list"><li>&nbsp;</li></ul></div>
				<img id="tweeting" src="<?php echo bloginfo('template_directory'); ?>/assets/images/tweeting.png"/>
			</div>
		</div>
		<div class="row">
			<div class="fourcol last">
				<p>Copyright © 2013, Tom Dallimore</p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/jquery-1.9.0.js"%3E%3C/script%3E'))</script>
<script src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/application.js"></script>
<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/billy_dallimore.json?callback=twitterCallback2&count=3&include_rts=true"></script>
<?php if ( is_singular() ) wp_print_scripts( 'comment-reply' ); ?>
</body>
</html>