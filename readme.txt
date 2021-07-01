=== JSM's Force HTTP to HTTPS (SSL) - Simple, Safe, Reliable, and Fast! ===
Plugin Name: JSM's Force HTTP to HTTPS
Plugin Slug: jsm-force-ssl
Text Domain: jsm-force-ssl
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/jsm-force-ssl/assets/
Tags: https, ssl, mixed content, insecure content, force ssl, simple, secure, upload, proxy, load balancing, cache
Contributors: jsmoriss
Requires PHP: 7.0
Requires At Least: 5.0
Tested Up To: 5.7.2
Stable Tag: 3.4.1

No setup required - simply activate to force HTTP URLs to HTTPS using native WordPress filters and permanent redirects for best SEO.

== Description ==

**A simple, safe, and reliable way to force HTTP URLs to HTTPS dynamically:**

No setup required - simply activate the plugin to force HTTP URLs to HTTPS.

There are no plugin settings to adjust, and no changes are made to your WordPress configuration.

**SIGNIFICANTLY FASTER than other popular plugins of this type:**

Other well known plugins use [PHP's output buffer](https://secure.php.net/manual/en/function.ob-start.php) to search &amp; replace URLs in the rendered HTML, which is a technique that is error prone and *negatively affects caching performance* (as changes are not cached).

This plugin uses standard WordPress filters instead of PHP's output buffer for maximum reliability, performance, caching compatibility, and uses 301 permanent redirects for best SEO results ([301 redirects are considered best for SEO when moving from HTTP to HTTPS](https://en.wikipedia.org/wiki/HTTP_301)).

**Supports advanced proxy / load-balancing HTTP headers:**

* `X-Forwarded-Proto` (aka `HTTP_X_FORWARDED_PROTO` server value)
* `X-Forwarded-Ssl` (aka `HTTP_X_FORWARDED_SSL` server value)

See [Web technology for developers &gt; HTTP &gt; HTTP headers &gt; X-Forwarded-Proto](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Forwarded-Proto) for more details.

= Plugin Requirements =

Your web server must already be configured with an SSL certificate and able to handle HTTPS request. ;-)

= Need a Boost to your Social and Search Ranking? =

Check out [the WPSSO Core plugin](https://wordpress.org/plugins/wpsso/) to rank higher and improve click-through-rates by presenting your content at its best on social sites and in search results - no matter how URLs are shared, re-shared, messaged, posted, embedded, or crawled.

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

**Version 3.4.1 (2021/02/14)**

* **New Features**
	* None.
* **Improvements**
	* Minor update for readme text and copyright date.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.0.
	* WordPress v5.0.

**Version 3.4.0 (2020/11/17)**

* **New Features**
	* None.
* **Improvements**
	* Updated the actions and filter hooks to use PHP_INT_MIN and PHP_INT_MAX.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.0.
	* WordPress v4.5.

== Upgrade Notice ==

= 3.4.1 =

(2021/02/14) Minor update for readme text and copyright date.

= 3.4.0 =

(2020/11/17) Updated the actions and filter hooks to use PHP_INT_MIN and PHP_INT_MAX.

