=== JSM's Force SSL / HTTPS ===
Plugin Name: JSM's Force SSL / HTTPS
Plugin Slug: jsm-force-ssl
Text Domain: jsm-force-ssl
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/jsm-force-ssl/assets/
Tags: redirect, force, ssl, https, upload, force_ssl, force_ssl_admin, force_ssl_login, upload_dir, proxy, load balancing, permanent
Contributors: jsmoriss
Requires At Least: 3.7
Tested Up To: 4.8.2
Requires PHP: 5.3
Stable Tag: 1.2.0

Safe, amazingly fast, simple and effective &mdash; force HTTP URLs to HTTPS using WordPress filters and permanent redirects.

== Description ==

**A safe, amazingly fast, simple and effective way to make sure that all HTTP URLs get rewritten / redirected to HTTPS, including the WordPress upload folder and plugin url paths.**

**This plugin is significantly different than most other plugins of its type (in a good way)** &mdash; other plugins generally create an output filter using [PHP's output buffering](http://php.net/manual/en/function.ob-start.php) to search / replace URLs within the webpage document. This is much slower (and error prone) than hooking WordPress filters and using permanent (301) redirects ([which is considered best practive when moving from HTTP to HTTPS](https://en.wikipedia.org/wiki/HTTP_301)).

The plugin defines the following constants (if not already defined), then makes sure that all HTTP requests are rewritten / redirected to their HTTPS equivalent:

* FORCE_SSL
* FORCE_SSL_ADMIN
* FORCE_SSL_LOGIN

The plugin also hooks the WordPress 'upload_dir' and 'plugins_url' filters to make sure that all URLs match the appropriate protocol.

The plugin checks and honors the following proxy / load-balancing web server variables:

* HTTP_X_FORWARDED_PROTO
* HTTP_X_FORWARDED_SSL

<blockquote>
<p>There are no plugin settings &mdash; simply install and activate the plugin.</p>
</blockquote>

**Requirements**

Your web server must be configured with an SSL certificate and able to handle HTTPS request. ;-)

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

1. Download the plugin ZIP file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the ZIP file you downloaded previously.
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

* [GitHub](https://jsmoriss.github.io/jsm-force-ssl/)
* [WordPress.org](https://wordpress.org/plugins/jsm-force-ssl/developers/)

= Version Numbering =

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

= Changelog / Release Notes =

**Version 1.2.0 (2017/09/22)**

* *New Features*
	* None
* *Improvements*
	* Added checks to leave relative urls unchanged.
	* Added a filter for the WordPress plugins_url() function.
* *Bugfixes*
	* None
* *Developer Notes*
	* Refactored several class methods that check and update url strings.

== Upgrade Notice ==

= 1.2.0 =

(2017/09/22) Added checks to leave relative urls unchanged. Added a filter for the WordPress plugins_url() function. Refactored several class methods.

