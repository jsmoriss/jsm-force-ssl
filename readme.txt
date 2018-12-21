=== JSM's Force SSL / HTTPS - Simple, Fast, Effective, Good for SEO ===
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
Tested Up To: 5.0
Stable Tag: 2.1.0

No setup required - force HTTP URLs to HTTPS using WordPress filters, for speed and reliability, along with 301 redirects for good SEO.

== Description ==

**A simple, fast and effective way to make sure that HTTP URLs get rewritten and redirected to SSL / HTTPS.**

**Simply activate the plugin and you're done:**

There are no plugin settings to adjust and no changes made to your WordPress configuration.

**This plugin is significantly different than most plugins of this type** (*in a good way*):

Other plugins use [PHP's output buffer](https://secure.php.net/manual/en/function.ob-start.php) to search and replace URLs within the webpage document. *Using PHP's output filter is error prone and much slower* than hooking native WordPress filters in combination with permanent 301 redirects ([which are considered best for SEO when moving from HTTP to HTTPS](https://en.wikipedia.org/wiki/HTTP_301)).

**Also checks for and honors proxy / load-balancing variables:**

* HTTP_X_FORWARDED_PROTO
* HTTP_X_FORWARDED_SSL

**Requirements:**

Your web server must be configured with an SSL certificate and able to handle HTTPS request. ;-)

= Easily improve your social and search ranking! =

* The [WPSSO Core plugin](https://wordpress.org/plugins/wpsso/) makes sure your content looks great on all social and search sites - no matter how it's crawled, shared, re-shared, posted, or embedded!

* The [WPSSO Schema JSON-LD Markup add-on](https://wordpress.org/plugins/wpsso-schema-json-ld/) for WPSSO Core offers Schema JSON-LD / Google Rich Card markup for Articles, Events, Local Business, Products, Recipes, Reviews and many more.

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

**Version 2.1.0 (2018/11/25)**

* *New Features*
	* None.
* *Improvements*
	* Added a hook for the WordPress 'widget_text' filter.
	* Updated 'the_content' and 'widget_text' filters to replace all "home" HTTP URLs, not just the "upload folder" URLs.
* *Bugfixes*
	* None.
* *Developer Notes*
	* None.

**Version 2.0.0 (2018/10/10)**

* *New Features*
	* Added a hook for the WordPress 'the_content' filter to change pre-existing "upload folder" HTTP URLs in post object content.
* *Improvements*
	* None.
* *Bugfixes*
	* None.
* *Developer Notes*
	* None.

== Upgrade Notice ==

= 2.1.0 =

(2018/11/25) Added a hook for the WordPress 'widget_text' filter. Updated 'the_content' and 'widget_text' filters to replace all "home" HTTP URLs.

