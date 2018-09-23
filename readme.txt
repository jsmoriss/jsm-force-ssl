=== JSM's Force SSL / HTTPS -- Simple, Fast and Effective ===
Plugin Name: JSM's Force SSL / HTTPS
Plugin Slug: jsm-force-ssl
Text Domain: jsm-force-ssl
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/jsm-force-ssl/assets/
Tags: redirect, force, ssl, https, upload, force_ssl, force_ssl_admin, force_ssl_login, upload_dir, proxy, load balancing, permanent
Contributors: jsmoriss
Requires PHP: 5.4
Requires At Least: 3.8
Tested Up To: 4.9.8
Stable Tag: 1.2.1

Simple, fast and effective &mdash; force HTTP URLs to HTTPS using WordPress filters and permanent redirects.

== Description ==

**A simple, fast and effective way to make sure that all HTTP URLs get rewritten / redirected to HTTPS** &mdash; including the WordPress upload folder and plugin url paths. Simply activate the plugin and you're done. ;-)

**This plugin is significantly different than most other plugins of its type (in a good way)** &mdash; other plugins generally create an output filter using [PHP's output buffer](https://secure.php.net/manual/en/function.ob-start.php) to search / replace URLs within the webpage document. Using an output filter is much slower (and error prone) than hooking WordPress filters and using permanent (301) redirects ([which is considered best practive when moving from HTTP to HTTPS](https://en.wikipedia.org/wiki/HTTP_301)).

The plugin defines the following constants (if not already defined), then makes sure that all HTTP requests are rewritten / redirected to their HTTPS equivalent:

* FORCE_SSL
* FORCE_SSL_ADMIN
* FORCE_SSL_LOGIN

The plugin also hooks the WordPress 'upload_dir' and 'plugins_url' filters to make sure that all URLs match the appropriate protocol.

The plugin checks and honors the following proxy / load-balancing web server variables:

* HTTP_X_FORWARDED_PROTO
* HTTP_X_FORWARDED_SSL

There are no plugin settings &mdash; simply *install* and *activate* the plugin.

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

== Screenshots ==

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/jsm-force-ssl/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/jsm-force-ssl/)

<h3>Changelog / Release Notes</h3>

**Version 1.2.1 (2018/05/12)**

* *New Features*
	* None.
* *Improvements*
	* None.
* *Bugfixes*
	* None.
* *Developer Notes*
	* Maintenance release.

== Upgrade Notice ==

= 1.2.1 =

(2018/05/12) Maintenance release.

