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
Tested Up To: 4.7.5
Stable Tag: 1.1.3

A fast and effective plugin to force webpage and media library URLs from HTTP to HTTPS with a permanent redirect.

== Description ==

**An fast and effective way to make sure that all the HTTP URLs get redirected to HTTPS, including the WordPress upload folder for uploaded images and media.**

**This plugin is significantly different than most other plugins of its type** &mdash; other plugins generally create an output filter using [PHP's output buffering](http://php.net/manual/en/function.ob-start.php) to search / replace URLs within the webpage document. This is much slower (and error prone) than using the WordPress 'upload_dir' filter and permanent (301) redirects ([which is considered best practice when moving from HTTP to HTTPS](https://en.wikipedia.org/wiki/HTTP_301)).

The plugin defines the following constants (if not already defined), then makes sure that all front-end HTTP requests are redirected to their HTTPS equivalent:

* FORCE_SSL
* FORCE_SSL_ADMIN
* FORCE_SSL_LOGIN

The plugin also hooks the WordPress 'upload_dir' filter, to make sure that all upload directory URLs match the required protocol.

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

* [GitHub](https://jsmoriss.github.io/jsm-force-ssl/)
* [WordPress.org](https://wordpress.org/plugins/jsm-force-ssl/developers/)

= Version Numbering =

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

= Changelog / Release Notes =

**Version 1.1.3 (2017/04/08)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Maintenance release - update to version numbering scheme.
	* Dropped the package number from the production version string.

== Upgrade Notice ==

= 1.1.3 =

(2017/04/08) Maintenance release - update to version numbering scheme.

