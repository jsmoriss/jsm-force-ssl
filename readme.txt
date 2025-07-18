=== JSM Force HTTP to HTTPS / SSL - No Setup, Fast and Reliable ===
Plugin Name: JSM Force HTTP to HTTPS
Plugin Slug: jsm-force-ssl
Text Domain: jsm-force-ssl
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/jsm-force-ssl/assets/
Tags: mixed content, insecure content, force ssl, redirect, seo
Contributors: jsmoriss
Requires PHP: 7.4.33
Requires At Least: 5.9
Tested Up To: 6.8.2
Stable Tag: 3.5.0

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

Your web server must already be configured with an SSL certificate and able to handle HTTPS connections. ;-)

== Installation ==

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes and/or incompatible API changes (ie. breaking changes).
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/jsm-force-ssl/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/jsm-force-ssl/)

<h3>Changelog / Release Notes</h3>

**Version 3.5.0 (2024/09/28)**

* **New Features**
	* None.
* **Improvements**
	* Improved PHP 'HTTP_HOST' and 'REQUEST_URI' server variable checks for command line execution.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Updated `JsmForceSsl::force_ssl_redirect()` to use not empty() instead of isset().
* **Requires At Least**
	* PHP v7.4.33.
	* WordPress v5.9.

== Upgrade Notice ==

= 3.5.0 =

(2024/09/28) Improved PHP 'HTTP_HOST' and 'REQUEST_URI' server variable checks for command line execution.

