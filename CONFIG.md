# Spamty standalone - configuration

Edit the `email.php` file with a text editor to adjust the following settings.

## information to protect

First you will have to set the information that should be protected against spam bots.
You can enter your email address and/or any other text (for example a phone number or your postal address).
You can use HTML in the second field.

example 1:
```
// your email address:
$SPAMTY_EMAIL_ADDRESS = "name@example.com";
// any other information to protect:
$SPAMTY_OTHER_INFO = "";
```

example 2:
```
// your email address:
$SPAMTY_EMAIL_ADDRESS = "name@example.com";
// any other information to protect:
$SPAMTY_OTHER_INFO = "You can call me<br />My phone number is <b>+1 234 567890</b>";
```



## Captcha service

Choose a captcha service that you want to use. There are multiple options:

 * `hcaptcha` for hCaptcha (free and recommended); you will need to create an account at <https://www.hcaptcha.com/> and set your site key and private key.
 * `recaptcha` for Google ReCaptcha; you will need to sign up at <https://google.com/recaptcha> and set your site key and private key.
 * `html` for simple checkbox; this is the default value but it is very unsecure and should not be used.
 * `php` for your local version of Securimage; you will need to install the software from <https://www.phpcaptcha.org/>.

For hcaptcha and recaptcha you also have to enter your valid site key and secret key that can be obtained after you signed up.

example:
```
$CAPTCHA_SERVICE = "hcaptcha";
$CAPTCHA_SITEKEY = "1234abcd-567-8910-abcde-123456abcdef";
$CAPTCHA_PRIVKEY = "0xABCDEF1234567VWXYZ890";
```



## text / translation

You can adjust/translate the text that will be displayed on the website:

```
$text_pre_captcha = "Please solve the captcha below to see the requested information:";
$text_after_captcha = "Here is the information you wanted to see:";
$text_wrong_captcha = "We couldn't verify that you are a human.";
$text_captcha_button = "Show me!";
$text_title = "My contact information";
```

A backlink to Spamty.eu is appreciated but you are free to remove it:

```
$text_footer = "";
```
