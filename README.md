# Spamty standalone

[![GitHub release (latest)](https://img.shields.io/github/v/release/spamty/standalone)](https://github.com/spamty/standalone/releases/latest)
[![License](https://img.shields.io/badge/license-GNU_GPL-blue.png)](https://github.com/spamty/standalone/blob/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/spamty/standalone)](https://github.com/spamty/standalone/issues)
[![GitHub pull requests](https://img.shields.io/github/issues-pr/spamty/standalone)](https://github.com/spamty/standalone/pulls)

[![Twitter Follow](https://img.shields.io/twitter/follow/spamty?style=social)](https://twitter.com/Spamty)
[![Mastodon Follow](https://img.shields.io/static/v1?label=@spamty@fosstodon.org&message=%20&style=social&logo=mastodon)](https://fosstodon.org/@spamty)
[![GitHub](https://img.shields.io/github/followers/spamty?label=GitHub&style=social)](https://github.com/spamty/)

Selfhosted standalone version of "Spamty" to protect your email against spam bots.

Instead of writing your email address publicly on your website just create a link to the `spamty.php` file on your webserver.
If someone clicks on this link they have to solve a captcha before they can view your email address.
Spam bots have no chance to crawl your email address.

## Usage

 1. Download the [latest release](https://github.com/spamty/standalone/releases/latest) of the `spamty.php` file.
 2. Upload the `spamty.php` file to your web server.
 3. Open the `spamty.php` file with a text editor [to configure it](https://github.com/spamty/standalone/blob/master/CONFIG.md).
 4. Link to the `spamty.php` file instead of showing your email address on the website.

Link with pop up window:

    <a href="http://example.com/spamty.php" onclick="mailhidepopup=window.open('http://example.com/spamty.php','mailhidepopup','width=580,height=450'); return false;">My email address</a>

iframe:

    <iframe src="http://example.com/spamty.php" width="580" height="450" style="border:none;"></iframe>

You can instead use the service [Spamty.eu](https://spamty.eu/) if you do not want to selfhost it.

## Demo

TBD

## Spamty.eu

This script is based on [Spamty.eu](https://spamty.eu/). A service to protect your email address against spam bots.
You can instead use the webservice if you do not want to selfhost this PHP script.

[Get started](https://spamty.eu/) |
[Donate](https://spamty.eu/donate.php) |
[FAQ](https://spamty.eu/faq.php) |
[Contact](https://spamty.eu/contact.php)
