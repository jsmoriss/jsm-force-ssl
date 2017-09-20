<?php
/*
 * Plugin Name: JSM's Force SSL / HTTPS
 * Text Domain: jsm-force-ssl
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/jsm-force-ssl/
 * Assets URI: https://jsmoriss.github.io/jsm-force-ssl/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: A simple and effective plugin to force webpage and media library URLs from HTTP to HTTPS with a permanent redirect.
 * Requires At Least: 3.7
 * Tested Up To: 4.8.2
 * Requires PHP: 5.3
 * Version: 1.1.3
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *	{major}		Major structural code changes / re-writes or incompatible API changes.
 *	{minor}		New functionality was added or improved in a backwards-compatible manner.
 *	{bugfix}	Backwards-compatible bug fixes or small improvements.
 *	{stage}.{level}	Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2017 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for...' );
}

/*
 * Define some standard WordPress constants, if not already defined. These
 * constants can be pre-defined as false in wp-config.php to turn disable a
 * specific forced SSL feature.
 */
if ( ! defined( 'FORCE_SSL' ) ) {
	define( 'FORCE_SSL', true );
}

if ( ! defined( 'FORCE_SSL_ADMIN' ) ) {
	define( 'FORCE_SSL_ADMIN', true );
}

if ( ! defined( 'FORCE_SSL_LOGIN' ) ) {
	define( 'FORCE_SSL_LOGIN', true );
}

if ( ! class_exists( 'JSM_Force_SSL' ) ) {

	class JSM_Force_SSL {

		private static $instance;

		public function __construct() {
			/*
			 * WordPress should redirect back-end / admin URLs just
			 * fine, but the front-end may need some help. Hook the
			 * 'init' action and check the protocol if FORCE_SSL is
			 * true.
			 */
			if ( defined( 'FORCE_SSL' ) && FORCE_SSL && ! is_admin() ) {
				add_action( 'init', array( __CLASS__, 'force_ssl_redirect' ), -9000 );
			}

			/*
			 * Make sure URLs from the upload directory - like
			 * images in the Media Library - use the correct
			 * protocol.
			 */
			add_filter( 'upload_dir', array( __CLASS__, 'upload_dir_urls' ), 1000, 1 );
		}

		public static function &get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/*
		 * Redirect from HTTP to HTTPS if the current webpage URL is
		 * not HTTPS. A 301 redirect is considered a best practice when
		 * moving from HTTP to HTTPS. See
		 * https://en.wikipedia.org/wiki/HTTP_301 for more info.
		 */
		public static function force_ssl_redirect() {
			// check for web server variables in case WP is being used from the command line
			if ( isset( $_SERVER['HTTP_HOST'] ) && isset( $_SERVER['REQUEST_URI'] ) ) {
				if ( ! self::is_https() ) {
					wp_redirect( 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 301 );
					exit();
				}
			}
		}

		/*
		 * Make sure URLs from the upload directory - like images in
		 * the Media Library - use the correct protocol. Adjusts the
		 * 'url' and 'baseurl' array keys to match the current protocol
		 * being used (HTTP or HTTPS).
		 */
		public static function upload_dir_urls( $param ) {
			foreach ( array( 'url', 'baseurl' ) as $key ) {
				if ( strpos( $param[$key], '//' ) === 0 ) {	// check for relative urls
					$param[$key] = self::is_https() ?
						'https:'.$param[$key] :
						'http:'.$param[$key];
				} else {
					$param[$key] = self::is_https() ?
						preg_replace( '/^http:/', 'https:', $param[$key] ) :
						preg_replace( '/^https:/', 'http:', $param[$key] );
				}
			}
			return $param;
		}

		/*
		 * Extend the WordPress is_ssl() function by also checking for
		 * proxy / load-balancing 'HTTP_X_FORWARDED_PROTO' and
		 * 'HTTP_X_FORWARDED_SSL' web server variables.
		 */
		private static function is_https() {
			if ( is_ssl() ) {		// since wp 2.6.0
				return true;
			} elseif ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 
				strtolower( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) === 'https' ) {
				return true;
			} elseif ( isset( $_SERVER['HTTP_X_FORWARDED_SSL'] ) && 
				strtolower( $_SERVER['HTTP_X_FORWARDED_SSL'] ) === 'on' ) {
				return true;
			} else {
				return false;
			}
		}
	}

	JSM_Force_SSL::get_instance();
}

?>
