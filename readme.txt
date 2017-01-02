=== JSM's Force SSL / HTTPS ===
Plugin Name: JSM's Force SSL / HTTPS
Plugin Slug: jsm-force-ssl
Text Domain: jsm-force-ssl
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Donate Link: https://www.paypal.me/jsmoriss
Assets URI: https://jsmoriss.github.io/jsm-force-ssl/assets/
Tags: force, ssl, https, permament, redirect, force_ssl
Contributors: jsmoriss
Requires At Least: 3.7
Tested Up To: 4.7
Stable Tag: 1.0.1-1

A quick and easy way to force all HTTP URLS to HTTPS with a permanent redirect.

== Description ==

**An effective way to make sure that all HTTP URLs on your website get redirected to HTTPS.**

The plugin defines the FORCE_SSL, FORCE_SSL_ADMIN, and FORCE_SSL_LOGIN constants, then makes sure that all front-end HTTP requests are redirected to their HTTPS equivalent. The plugin also hooks the WordPress 'upload_dir' filter to make sure URLs are HTTPS when the webpage URL is HTTPS.

<blockquote>
<p>There are no plugin settings &mdash; simply install and activate the plugin.</p>
</blockquote>

**Requirements**

* Your web server must configured with an SSL certificate and able to handle HTTPS request.

== Installation ==

= Automated Install =

1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. In the *Search* box, enter the plugin name.
1. Click the *Search Plugins* button.
1. Click the *Install Now* link for the plugin.
1. Click the *Activate Plugin* link.

= Semi-Automated Install =

1. Download the plugin archive file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the zip file you downloaded previously.
1. Click on the *Install Now* button.
1. Click the *Activate Plugin* link.

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

== Screenshots ==

== Changelog ==

= Repositories =

* [GitHub](https://github.com/jsmoriss/jsm-force-ssl)
* [WordPress.org](https://wordpress.org/plugins/jsm-force-ssl/developers/)

= Version Numbering Scheme =

Version components: `{major}.{minor}.{bugfix}-{stage}{level}`

* {major} = Major code changes / re-writes or significant feature changes.
* {minor} = New features / options were added or improved.
* {bugfix} = Bugfixes or minor improvements.
* {stage}{level} = dev &lt; a (alpha) &lt; b (beta) &lt; rc (release candidate) &lt; # (production).

Note that the production stage level can be incremented on occasion for simple text revisions and/or translation updates. See [PHP's version_compare()](http://php.net/manual/en/function.version-compare.php) documentation for additional information on "PHP-standardized" version numbering.

= Changelog / Release Notes =

**Version 1.0.1-1 (2017/01/03)**

* *New Features*
	* None
* *Improvements*
	* Added a filter for 'upload_dir' to change HTTP URLs to HTTPS.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

== Upgrade Notice ==

= 1.0.1-1 =

(2017/01/03) Added a filter for 'upload_dir' to change HTTP URLs to HTTPS.

