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
$SPAMTY_EMAIL_ADDRESS = "email@example.com";
// any other information to protect:
$SPAMTY_OTHER_INFO = "phone: +1 234 567890";


// Choose a captcha service that you want to use. There are multiple options:
//  * `hcaptcha` for hCaptcha (free and recommended); you will need to create an account at <https://www.hcaptcha.com/> and set your site key and private key.
//  * `recaptcha` for Google ReCaptcha; you will need to sign up at <https://google.com/recaptcha> and set your site key and private key.
//  * `html` for simple checkbox with HTML and Javascript; this is the default value but it is very unsecure and should not be used.
//  * `php` for your local version of Securimage; you will need to install the software from <https://www.phpcaptcha.org/> in `./vendor/dapphp/securimage/`.
$CAPTCHA_SERVICE = "html";
// Only for hcaptcha or recaptcha  enter your valid site key:
$CAPTCHA_SITEKEY = "XXXXXXXXXX";
// Only for hcaptcha or recaptcha  enter your valid secret key:
$CAPTCHA_PRIVKEY = "XXXXXXXXXX";



// You can adjust the text that will be displayed on the website:
$text_pre_captcha = "Please solve the captcha below to see the requested information:";
$text_captcha_hint = "Please click this box and verify that you are a human.";
$text_after_captcha = "Here is the information you wanted to see:";
$text_wrong_captcha = "We couldn't verify that you are a human.";
$text_captcha_button = "Show me!";
$text_title = "My contact information";
// A backlink to Spamty.eu is appreciated but you are free to remove it:
$text_footer = "Powered by <a href='https://spamty.eu/standalone.php'>Spamty standalone</a>";





session_start();
/* ******* Do not change anything below this line! ******* */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="generator" content="Spamty standalone v0.1" />
	<meta name="robots" content="noindex, nofollow" />
	<title><?php echo $text_title; ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
</head>



<body>

<div class="container"><!-- container -->

<?php if(!isset($_GET['iframe'])){ ?>
	<header>
		<div class="header row">
			<div class="col-md">
    		<h3 class="text-muted"><?php echo $text_title; ?></h3>
			</div>
		</div>
	</header>
<?php } ?>


<main>


<?php
// show the password/captcha form
if( empty($_POST['submit']) ){
?>

	<div>
		<p class="lead"><?php echo $text_pre_captcha; ?></p>
		<form role="form" method="post" action="">
  	<div class="form-group">
			<?php // select the captcha
			if($CAPTCHA_SERVICE == "hcaptcha"){ ?>
				<script src="https://hcaptcha.com/1/api.js" async defer></script>
				<div class="h-captcha" data-sitekey="<?php echo $CAPTCHA_SITEKEY; ?>"></div>
				<small id="captcha_codeHelp" class="form-text text-muted"><?php echo $text_captcha_hint; ?></small>
			<?php }
			elseif($CAPTCHA_SERVICE == "recaptcha"){ ?>
      	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
      	<div class="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITEKEY; ?>"></div>
				<small id="captcha_codeHelp" class="form-text text-muted"><?php echo $text_captcha_hint; ?></small>
			<?php }
			elseif($CAPTCHA_SERVICE == "php"){ ?>
      	<span class="help-block">
        	<img id="captcha" src="vendor/dapphp/securimage/securimage_show.php" alt="CAPTCHA Image" />
        	<object type="application/x-shockwave-flash" data="vendor/dapphp/securimage/securimage_play.swf?audio_file=vendor/dapphp/securimage/securimage_play.php&amp;bgColor1=%23fff&amp;bgColor2=%23fff&amp;iconColor=%23777&amp;borderWidth=1&amp;borderColor=%23000" width="19" height="19">
						<param name="movie" value="vendor/dapphp/securimage/securimage_play.swf?audio_file=vendor/dapphp/securimage/securimage_play.php&amp;bgColor1=%23fff&amp;bgColor2=%23fff&amp;iconColor=%23777&amp;borderWidth=1&amp;borderColor=%23000" />
					</object>
      	</span>
      	<input type="text" class="form-control" id="captcha_code" name="captcha_code" required />
      	<small id="captcha_codeHelp" class="form-text text-muted"><?php echo $text_captcha_hint; ?></small>
			<?php }
			else{ ?>
				<input type="checkbox" name="spam_checkbox" id="spam_checkbox" value="yes" />
				<label for="spam_checkbox"><?php echo $text_captcha_hint; ?></label>
				<!-- javascript ... -->
			<?php } ?>
  	</div>

  	<div class="form-group">
    	<input type="email" name="Email" id="Email" placeholder="Do not fill out this one." style="display:none;" />
    	<input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo $text_captcha_button; ?>" />
  	</div>
	</form>
	</div>



<?php
// if captcha was submitted
}else{

	// validate the captcha
  $captchaCheckIs = false;
  if($CAPTCHA_SERVICE == "hcaptcha"){
		// hcaptcha
		$data = array(
		  'secret' => $CAPTCHA_PRIVKEY,
		  'response' => $_POST['h-captcha-response']
		);
		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($verify);
		$responseData = json_decode($response);
    if($responseData->success) {
      $captchaCheckIs = true;
    }
  }
	elseif($CAPTCHA_SERVICE == "recaptcha"){
		// recaptcha
		$data = array(
		  'secret' => $CAPTCHA_PRIVKEY,
		  'response' => $_POST['g-recaptcha-response']
		);
		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($verify);
		$responseData = json_decode($response);
    if($responseData->success) {
      $captchaCheckIs = true;
    }
  }
	elseif($CAPTCHA_SERVICE == "php"){
		// securimage
    include_once 'vendor/dapphp/securimage/securimage.php';
  	$securimage = new Securimage();
  	if ($securimage->check($_POST['captcha_code'])) {
			$captchaCheckIs = true;
		}
  }
	else{
		// HTML captcha
		if($_POST['spam_checkbox'] == "yes"){
			$captchaCheckIs = true;
		}
	}



	// incorrect Captcha:
  if(!$captchaCheckIs){ ?>
		<div class="alert alert-danger">
			<a href="<?php echo $_SERVER["REQUEST_URI"]; ?>" class="alert-link">&#128260; <?php echo $text_wrong_captcha; ?></a>
		</div>
	<?php }

	// success
	else{ ?>
		<p class="lead"><?php echo $text_after_captcha; ?></p>
		<?php if(!empty($SPAMTY_EMAIL_ADDRESS)){ ?>
			<p><em><a href='mailto:<?php echo $SPAMTY_EMAIL_ADDRESS; ?>'><?php echo $SPAMTY_EMAIL_ADDRESS; ?></a></em></p>
		<?php }
		if(!empty($SPAMTY_OTHER_INFO)){ ?>
			<p><?php echo $SPAMTY_OTHER_INFO; ?></p>
		<?php }


	}


// end if submit
}
?>
</main>

<?php if(!isset($_GET['iframe'])){ ?>
	<div class="footer">
		<footer>
			<hr />
			<p class="text-center"><small><?php echo $text_footer; ?></small></p>
		</footer>
	</div>
<?php } ?>

</div><!-- /container -->

</body>
</html>
