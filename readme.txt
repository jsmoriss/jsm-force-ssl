=== JSM's Force HTTP to HTTPS (SSL) | Simple, Safe, and Best for SEO ===
Plugin Name: JSM's Force HTTP to HTTPS
Plugin Slug: jsm-force-ssl
Text Domain: jsm-force-ssl
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/jsm-force-ssl/assets/
Tags: mixed content, insecure content, force ssl, https, ssl, secure, upload, proxy, load balancing
Contributors: jsmoriss
Requires PHP: 5.6
Requires At Least: 3.9
Tested Up To: 5.3
Stable Tag: 3.1.1

No setup required! Simply activate to force HTTP URLs to HTTPS using native WordPress filters and 301 permanent redirects for best SEO.

== Description ==

**A simple, safe, and reliable way to force HTTP URLs to HTTPS dynamically:**

No setup required!

Simply activate the plugin to force HTTP URLs to HTTPS.

**SIGNIFICANTLY DIFFERENT than other plugins of this type** (*in the best way*):

Other plugins use [PHP's output buffer](https://secure.php.net/manual/en/function.ob-start.php) to search &amp; replace URLs in the webpage HTML, which is error prone and negatively affects caching performance.

This plugin uses native WordPress filters instead for maximum performance and caching compatibility, along with 301 permanent redirects for best SEO ([301 redirects are considered best for SEO when moving from HTTP to HTTPS](https://en.wikipedia.org/wiki/HTTP_301)).

**Honors proxy / load-balancing variables for large hosting environments:**

* HTTP_X_FORWARDED_PROTO
* HTTP_X_FORWARDED_SSL

**Requirements:**

Your web server must be configured with an SSL certificate and able to handle HTTPS request. ;-)

**Simply activate the plugin and you're done:**

There are no plugin settings to adjust, and no changes are made to your WordPress configuration &mdash; simply activate or deactivate the plugin to enable / disable the filters and dynamic redirects.

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

**Version 3.1.1 (2019/11/13)**

Updated the tested to value for WordPress v5.3.

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.

**Version 3.1.0 (2019/05/07)**

* **New Features**
	* None.
* **Improvements**
	* Added support for the `$scheme` argument when filtering the 'home_url' and 'site_url' values.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.

== Upgrade Notice ==

= 3.1.1 =

(2019/11/13) Updated the tested to value for WordPress v5.3.

