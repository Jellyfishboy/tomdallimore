<?php 
/* 
Template Name: AboutTemp
*/ 
?>
<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

        //Check to make sure that the name field is not empty
        if(trim($_POST['contactName']) === '') {
            $nameError = 'You forgot to enter your first name.';
            $hasError = true;
        } else {
            $name = trim($_POST['contactName']);
        }
        if(trim($_POST['lastName']) === '') {
            $lastnameError = 'You forgot to enter your last name.';
            $hasError = true;
        } else {
            $lastname = trim($_POST['lastName']);
        }
        //Telephone variable
        $telephone = trim($_POST['telephone']);
        //Check to make sure sure that a valid email address is submitted
        if(trim($_POST['email']) === '')  {
            $emailError = 'You forgot to enter your email address.';
            $hasError = true;
        } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
            $emailError = 'You entered an invalid email address.';
            $hasError = true;
        } else {
            $email = trim($_POST['email']);
        }
            
        //Check to make sure comments were entered  
        if(trim($_POST['comments']) === '') {
            $commentError = 'You forgot to enter your message.';
            $hasError = true;
        } else {
            if(function_exists('stripslashes')) {
                $comments = stripslashes(trim($_POST['comments']));
            } else {
                $comments = trim($_POST['comments']);
            }
        }
            
        //If there is no error, send the email
        if(!isset($hasError)) {

            $emailTo = 'me@tomdallimore.com';
            $subject = 'Enquiry from '.$name.' '.$lastname;
            $body = "Name: $name $lastname \n\nTelephone: $telephone \n\nEmail: $email \n\nMessage:\n $comments";
            $headers = 'From: '.$name.' '.$lastname.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
            
            mail($emailTo, $subject, $body, $headers);

            $emailSent = true;

        }
} ?>
<?php get_header(); ?>
<div id="about_focus" class="focus_content">
    <div class="row">
        <div class="onecol"></div>
        <div class="fourcol">
            <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/me.png"/>
        </div>
        <div class="sixcol">
            <span></span>
            <h1>Hi there, my name is Tom</h1>
            <p>I was born and raised in the renowned city of Bristol. Since growing up within the industry of my father’s Graphic Design company, I have developed a professional career focused around Ruby on Rails and front-end development.</p>
            <p>My primary specialisation is e-commerce software development, whereby I have supported and grown client companies while also building custom, open source projects such as the <a href="http://trado.io/?utm_source=tomdallimore&utm_medium=website&utm_content=about&utm_campaign=trado" target="_blank">Trado</a> e-commerce platform and <a href="http://redlight.tomdallimore.com/?utm_source=tomdallimore&utm_medium=website&utm_content=about&utm_campaign=redlight" target="_blank">Redlight</a>, an e-commerce HTML template.</p>
            <p>I now currently live in South East Asia, working as a remote freelance developer. In the past I have worked for some exciting companies such as Dyson, Cancer Research UK, Give4Sure and Future PLC.</p>
        </div>
        <div class="onecol last"></div>
    </div>
</div>
<section class="content">
    <div class="container" id="about">
        <?php if (have_posts()) : ?>
        
        <?php while (have_posts()) : the_post(); ?>
    	<div class="row">
    		<div class="fourcol">
    			<h1>Go on, be social</h1>
    			<p>Feel free to get in contact with any enquiries with the online form, like on <a href="http://www.facebook.com/tomdallimoredev" target="_blank">Facebook</a> or follow my witty remarks and ramblings on <a href="http://www.twitter.com/tom_dallimore" target="_blank">Twitter</a>.</p>
    		</div>
            <div class="eightcol last">
                <?php if(isset($emailSent) && $emailSent == true) { ?>
                    <h2>Thanks, <?=$name;?></h2>
                    <p>Your enquiry was successfully sent. I will be in touch within 48 hours.</p>
                <?php } else { ?>
                    <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                        <div class="row">
                            <div class="sixcol">
                                <label for="contactName">First name</label>
                                <input type="text" tabindex="1" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField <?php if($nameError != '') { ?>inputError<?php } ?>" />
                                    <?php if(!isset($nameError) && $nameError != '') { ?>
                                        <span class="error"><?=$nameError;?></span> 
                                    <?php } ?>
                                <label for="telephone">Telephone</label>
                                <input type="text" tabindex="3" name="telephone" id="telephone" value="<?php if(isset($_POST['telephone'])) echo $_POST['telephone'];?>" />
                            </div>
                            <div class="sixcol last">
                                <label for="lastName">Last name</label>
                                <input type="text" tabindex="2" name="lastName" id="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName'];?>" class="requiredField <?php if($lastnameError != '') { ?>inputError<?php } ?>" />
                                    <?php if($lastnameError != '') { ?>
                                        <span class="error"><?=$lastnameError;?></span> 
                                    <?php } ?>
                                <label for="email">Email</label>
                                <input type="text" tabindex="4" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email <?php if($emailError != '') { ?>inputError<?php } ?>" />
                                <?php if($emailError != '') { ?>
                                    <span class="error"><?=$emailError;?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="twelvecol">
                                <label for="commentsText">Message</label>
                                    <textarea tabindex="5"name="comments" id="commentsText" rows="10" class="requiredField <?php if($commentError != '') { ?>inputError<?php } ?>"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                                    <?php if($commentError != '') { ?>
                                        <span class="error"><?=$commentError;?></span> 
                                    <?php } ?>
                            </div>
                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                <input tabindex="6" type="submit" value="Send" class="btn btn-success">
                        </div>
                    </form>
                <?php } ?>
            </div>
    	</div>
        <?php endwhile; ?>
        <?php endif; ?>
<?php get_footer('no-sidebar'); ?>