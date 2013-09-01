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

            $emailTo = 'tom.alan.dallimore@googlemail.com';
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
                <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                    <div class="row">
                        <div class="sixcol">
                            <label for="contactName">First name</label>
                            <input type="text" tabindex="1" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField <?php if($nameError != '') { ?>inputError<?php } ?>" />
                                <?php if($nameError != '') { ?>
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
            </div>
    	</div>


<?php get_footer('no-sidebar'); ?>