<?php
/**
 * Plugin Name: JSM's Force SSL / HTTPS
 * Text Domain: jsm-force-ssl
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/jsm-force-ssl/
 * Assets URI: https://jsmoriss.github.io/jsm-force-ssl/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Description: Safe, amazingly fast, simple and effective - force HTTP URLs to HTTPS using WordPress filters and permanent redirects.
 * Requires PHP: 5.6
 * Requires At Least: 3.8
 * Tested Up To: 5.1.1
 * Version: 2.2.0
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *      {major}         Major structural code changes / re-writes or incompatible API changes.
 *      {minor}         New functionality was added or improved in a backwards-compatible manner.
 *      {bugfix}        Backwards-compatible bug fixes or small improvements.
 *      {stage}.{level} Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2017-2019 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for...' );
}

/**
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

			add_action( 'plugins_loaded', array( __CLASS__, 'load_textdomain' ) );

			/**
			 * WordPress should redirect back-end / admin URLs just
			 * fine, but the front-end may need some help. Hook the
			 * 'init' action and check the protocol if FORCE_SSL is
			 * true.
			 */
			if ( defined( 'FORCE_SSL' ) && FORCE_SSL && ! is_admin() ) {
				add_action( 'init', array( __CLASS__, 'force_ssl_redirect' ), -9000 );
			}

			if ( defined( 'FORCE_SSL_ADMIN' ) && FORCE_SSL_ADMIN && is_admin() ) {
				self::maybe_server_https_on();
			}

			/**
			 * Make sure URLs from the upload directory - like
			 * images in the Media Library - use the correct
			 * protocol.
			 */
			add_filter( 'upload_dir', array( __CLASS__, 'upload_dir_urls' ), 1000, 1 );


			/**
			 * Adjust the URL returned by the WordPress
			 * plugins_url() function.
			 */
			add_filter( 'plugins_url', array( __CLASS__, 'update_url' ), 1000, 1 );

			/**
			 * Check the content for http images.
			 */
			add_filter( 'the_content', array( __CLASS__, 'filter_text' ), 1000, 1 );
			add_filter( 'widget_text', array( __CLASS__, 'filter_text' ), 1000, 1 );
		}

		public static function &get_instance() {

			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public static function load_textdomain() {

			load_plugin_textdomain( 'jsm-force-ssl', false, 'jsm-force-ssl/languages/' );
		}

		/**
		 * Redirect from HTTP to HTTPS if the current webpage URL is
		 * not HTTPS. A 301 redirect is considered a best practice when
		 * moving from HTTP to HTTPS. See
		 * https://en.wikipedia.org/wiki/HTTP_301 for more info.
		 */
		public static function force_ssl_redirect() {

			/**
			 * Make sure web server variables exist in case WP is
			 * being used from the command line.
			 */
			if ( isset( $_SERVER[ 'HTTP_HOST' ] ) && isset( $_SERVER[ 'REQUEST_URI' ] ) ) {

				if ( ! self::is_https() ) {

					wp_redirect( 'https://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ], 301 );

					exit();
				}
			}
		}

		/**
		 * Make sure URLs from the upload directory - like images in
		 * the Media Library - use the correct protocol. Adjusts the
		 * 'url' and 'baseurl' array keys to match the current protocol
		 * being used (HTTP or HTTPS).
		 */
		public static function upload_dir_urls( $param ) {

			foreach ( array( 'url', 'baseurl' ) as $key ) {
				$param[ $key ] = self::update_url( $param[ $key ] );
			}

			return $param;
		}

		public static function update_url( $url ) {

			if ( strpos( $url, '/' ) === 0 ) {		// Skip relative URLs.
				return $url;
			}

			$prot_slash = self::get_prot() . '://';

			if ( strpos( $url, $prot_slash ) === 0 ) {	// Skip correct URLs.
				return $url;
			}

			return preg_replace( '/^([a-z]+:\/\/)/', $prot_slash, $url );
		}

		public static function filter_text( $content ) {

			$http_home_url  = get_home_url( null, '/', 'http' );

			if ( false !== strpos( $content, $http_home_url ) ) {	// Optimize.

				$https_home_url = self::update_url( $http_home_url );

				if ( $http_home_url !== $https_home_url ) {	// Just in case.
					$content = str_replace( $http_home_url, $https_home_url, $content );
				}
			}

			return $content;
		}

		/**
		 * If WordPress is hosted behind a reverse proxy that provides
		 * SSL, but is hosted itself without SSL, these options will
		 * initially send any requests into an infinite redirect loop.
		 * To avoid this, you may configure WordPress to recognize the
		 * HTTP_X_FORWARDED_PROTO header (assuming you have properly
		 * configured the reverse proxy to set that header). 
		 */
		private static function maybe_server_https_on() {

			if ( isset( $_SERVER[ 'HTTP_X_FORWARDED_PROTO' ] ) && 
				strpos( $_SERVER[ 'HTTP_X_FORWARDED_PROTO' ], 'https' ) !== false ) {

				$_SERVER[ 'HTTPS' ] = 'on';
			}
		}

		private static function get_prot( $url = '' ) {

			if ( ! empty( $url ) ) {

				return self::is_https( $url ) ? 'https' : 'http';

			} elseif ( self::is_https() ) {

				return 'https';

			} elseif ( is_admin() )  {

				if ( defined( 'FORCE_SSL_ADMIN' ) && FORCE_SSL_ADMIN ) {
					return 'https';
				}

			} elseif ( defined( 'FORCE_SSL' ) && FORCE_SSL ) {
				return 'https';
			}

			return 'http';
		}

		/**
		 * Extend the WordPress is_ssl() function by also checking for
		 * proxy / load-balancing 'HTTP_X_FORWARDED_PROTO' and
		 * 'HTTP_X_FORWARDED_SSL' web server variables.
		 */
		private static function is_https( $url = '' ) {

			static $cache = array();

			if ( isset( $cache[ $url ] ) ) {
				return $cache[ $url ];
			}

			if ( ! empty( $url ) ) {

				if ( strpos( $url, '://' ) && 

					parse_url( $url, PHP_URL_SCHEME ) === 'https' ) {

					return $cache[ $url ] = true;

				} else {
					return $cache[ $url ] = false;
				}

			} else {

				if ( is_ssl() ) {

					return $cache[ $url ] = true;

				/**
				 * In some setups, HTTP_X_FORWARDED_PROTO might
				 * contain a comma-separated list (ie.
				 * "http,https"), so use strpos() to check for
				 * "https" within a possible comma-separated
				 * list.
				 */
				} elseif ( isset( $_SERVER[ 'HTTP_X_FORWARDED_PROTO' ] ) && 
					strpos( $_SERVER[ 'HTTP_X_FORWARDED_PROTO' ], 'https' ) !== false ) {

					return $cache[ $url ] = true;

				} elseif ( isset( $_SERVER[ 'HTTP_X_FORWARDED_SSL' ] ) && 
					strtolower( $_SERVER[ 'HTTP_X_FORWARDED_SSL' ] ) === 'on' ) {

					return $cache[ $url ] = true;
				}
			}

			return $cache[ $url ] = false;
		}
	}

	JSM_Force_SSL::get_instance();
}
