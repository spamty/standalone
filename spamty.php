<?php
/* ***************************************************************

	CONFIGURATION
	see <https://github.com/spamty/standalone/blob/master/CONFIG.md>

*************************************************************** */


// This is the information that should be protected against spam bots.
// You can enter your email address and/or any other text (for example
// a phone number or your postal address). You can use HTML in the
// second field.

// your email address:
$SPAMTY_EMAIL_ADDRESS = "";
// any other information to protect:
$SPAMTY_OTHER_INFO = "";


// Choose a captcha service that you want to use. There are multiple options:
//  * `hcaptcha` for hCaptcha (free and recommended); you will need to create an account at <https://www.hcaptcha.com/> and set your site key and private key.
//  * `recaptcha` for Google ReCaptcha; you will need to sign up at <https://google.com/recaptcha> and set your site key and private key.
//  * `html` for simple checkbox; this is the default value but it is very unsecure and should not be used.
//  * `php` for your local version of Securimage; you will need to install the software from <https://www.phpcaptcha.org/>.
$CAPTCHA_SERVICE = "html";
// Only for hcaptcha or recaptcha  enter your valid site key:
$CAPTCHA_SITEKEY = "XXXXXXXXXX";
// Only for hcaptcha or recaptcha  enter your valid secret key:
$CAPTCHA_PRIVKEY = "XXXXXXXXXX";



// You can adjust the text that will be displayed on the website:
$text_pre_captcha = "Please solve the captcha below to see the requested information:";
$text_after_captcha = "Here is the information you wanted to see:";
$text_wrong_captcha = "We couldn't verify that you are a human.";
$text_captcha_button = "Show me!";
$text_title = "My contact information";
// A backlink to Spamty.eu is appreciated but you are free to remove it:
$text_footer = "Powered by <a href='https://spamty.eu/standalone.php'>Spamty standalone</a>";


/* ******* Do not change anything below this line! ******* */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="generator" content="Spamty standalone v0.1" />
	<title><?php echo $text_title; ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
</head>



<body>

<div class="container"><!-- container -->

<header>
	<div class="header row">
		<div class="col-md">
    	<h3 class="text-muted"><?php echo $text_title; ?></h3>
		</div>
	</div>
</header>

<main>





<div>
<p class="lead"><?php echo _("Please solve the captcha below to see the requested information:"); ?></p>

<script src="https://hcaptcha.com/1/api.js" async defer></script>
<form role="form" method="post" action="">
  <div class="form-group">
		<div class="h-captcha" data-sitekey="xxxxxxxxxxxxxxxxxxxxxxxxxxxx"></div>
    <small id="captcha_code" class="form-text text-muted">
    	<?php echo _('Please click this box and follow possible instructions to verify that you are a human. '); ?>
    </small>
  </div>
  <div class="form-group">
    <input type="email" name="Email" id="Email" placeholder="Do not fill out this one please." style="display:none;" />
    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo _('Show me!'); ?>" />
  </div>
</form>



</div>

</main>


<div class="footer">
	<footer>
		<hr />
		<p class="text-center"><small><?php echo $text_footer; ?></small></p>
	</footer>
</div>

</div><!-- /container -->

</body>
</html>
