		</div>
	</section>
	<footer role="contentinfo">
		<div class="container">
			<div class="row">
				<span>
					<a class="twitter_link" href="http://www.twitter.com/billy_dallimore" alt="Twitter" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"></a>
					<a class="facebook_link" href="http://www.facebook.com/tomdallimoredev" alt="Facebook" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"></a>
					<a class="github_link" href="http://www.github.com/jellyfishboy" alt="Github" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Github"></a>
					<a class="linkedin_link" href="http://uk.linkedin.com/in/tomdallimore" alt="LinkedIn" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="LinkedIn"></a>
					<a class="stackoverflow_link" href="http://stackoverflow.com/users/1459787/jellyfishboy" alt="StackOverflow" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="StackOverflow"></a>
				</span>	
			</div>
			<div class="row">
				<div class="twelvecol">
					<div id="development_timer">
						<p>Time spent designing and developing since 2006: </p>
						<script>
						    TargetDate = "01/01/2006 6:00 AM GMT+0100";
						    BackColor = "";
						    ForeColor = "#B3B3B3";
						    CountActive = true;
						    CountStepper = +1;
						    LeadingZero = true;
						    DisplayFormat = "%%D%% Days, %%M%% Minutes, %%S%% Seconds.";
						    FinishMessage = "It is finally here!";
						    // use server time
						    var dnow = new Date("<?php echo date('D M d G:i:s Y'); ?>");
						</script>
						<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/assets/js/countup.js"></script>
					</div>
					<p>Copyright © 2013, Tom Dallimore. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/assets/js/application.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
<script src="http://localhost:8888/wp-content/plugins/new-royalslider/lib/royalslider/jquery.royalslider.min.js"></script>
<?php wp_footer(); ?>
<?php if ( is_singular() ) wp_print_scripts( 'comment-reply' ); ?>
</body>
</html>