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
 * Description: A quick and easy way to force HTTP webpage URLs to SSL / HTTPS with a permanent redirect.
 * Requires At Least: 3.7
 * Tested Up To: 4.7
 * Version: 1.0.1-1
 *
 * Version Components: {major}.{minor}.{bugfix}-{stage}{level}
 *
 *	{major}		Major code changes / re-writes or significant feature changes.
 *	{minor}		New features / options were added or improved.
 *	{bugfix}	Bugfixes or minor improvements.
 *	{stage}{level}	dev < a (alpha) < b (beta) < rc (release candidate) < # (production).
 *
 * See PHP's version_compare() documentation at http://php.net/manual/en/function.version-compare.php.
 * 
 * This script is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 3 of the License, or (at your option) any later
 * version.
 * 
 * This script is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License for more details at
 * http://www.gnu.org/licenses/.
 * 
 * Copyright 2017 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! defined( 'FORCE_SSL' ) )
	define( 'FORCE_SSL', true );

if ( ! defined( 'FORCE_SSL_ADMIN' ) )
	define( 'FORCE_SSL_ADMIN', true );

if ( ! defined( 'FORCE_SSL_LOGIN' ) )
	define( 'FORCE_SSL_LOGIN', true );

if ( ! class_exists( 'JSM_Force_SSL' ) ) {

	class JSM_Force_SSL {

		private static $instance;

		public static function &get_instance() {
			if ( ! isset( self::$instance ) )
				self::$instance = new self;
			return self::$instance;
		}

		public function __construct() {
			if ( defined( 'FORCE_SSL' ) && FORCE_SSL && ! is_admin() ) {
				add_action( 'init', array( __CLASS__, 'force_ssl_redirect' ), -9000 );
			}
			add_filter( 'upload_dir', array( __CLASS__, 'upload_dir_urls' ), 1000, 1 );
		}

		/*
		 * Redirect from HTTP to HTTPS if the current webpage URL is
		 * not HTTPS. A 301 redirect is considered a best practice when
		 * moving from HTTP to HTTPS. See
		 * https://en.wikipedia.org/wiki/HTTP_301 for more info.
		 */
		public static function force_ssl_redirect() {
			if ( empty( $_SERVER['HTTPS'] ) ) {
				wp_redirect( 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 301 );
				exit();
			}
		}

		/*
		 * Make sure the upload_dir protocol (for uploaded images,
		 * etc.) matches the webpage protocol.
		 */
		public static function upload_dir_urls( $param ) {
			foreach ( array( 'url', 'baseurl' ) as $key ) {
				$param[$key] = empty( $_SERVER['HTTPS'] ) ?
					preg_replace( '/^https:/', 'http:', $param[$key] ) :
					preg_replace( '/^http:/', 'https:', $param[$key] );
			}
			return $param;
		}
	}

	JSM_Force_SSL::get_instance();
}

?>
