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
 * Description: A quick and easy way to force all HTTP URLS to HTTPS with a permanent redirect.
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
			$is_admin = is_admin();
			$is_forced = defined( 'FORCE_SSL' ) && FORCE_SSL ? true : false;

			if ( $is_forced ) {
				if ( $is_admin ) {
					load_plugin_textdomain( 'jsm-force-ssl', false, 'jsm-force-ssl/languages/' );
					add_action( 'in_admin_header', array( $this, 'check_home_url' ), 900000 );
				} elseif ( empty( $_SERVER['HTTPS'] ) ) {
					add_action( 'init', array( __CLASS__, 'force_ssl_redirect' ), -9000 );
					add_filter( 'upload_dir', array( __CLASS__, 'upload_dir_https' ), 1000, 1 );
				}
			}
		}

		public static function force_ssl_redirect() {
			if ( empty( $_SERVER['HTTPS'] ) ) {	// just in case
				// 301 redirect is considered a best practice for upgrading from HTTP to HTTPS
				// see https://en.wikipedia.org/wiki/HTTP_301 for more info
				wp_redirect( 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 301 );
				exit();
			}
		}

		public static function upload_dir_https( $param ) {
			foreach ( array( 'url', 'baseurl' ) as $key ) {
				if ( ! empty( $_SERVER['HTTPS'] ) ) {
					$param[$key] = preg_replace( '/^http:/', 'https:', $param[$key] );
				}
			}
			return $param;
		}

		public function check_home_url() {
			if ( strpos( home_url(), 'https' ) !== 0 )
				add_action( 'all_admin_notices', array( $this, 'home_url_warning' ), -1000 );
		}

		public function home_url_warning() {
			echo '<div class="notice notice-warning" style="display:block !important; visibility:visible !important;"><p>';
			echo '<strong>'. __( 'Warning', 'jsm-force-ssl' ).'</strong> &mdash; ';
			echo __( 'HTTP URLs are being redirected to HTTPS but your Site Address (URL) is not an HTTPS URL.', 'jsm-force-ssl' ).' '.
				sprintf( __( 'Please update the <a href="%1$s">Site Address (URL) option in the WordPress General Settings page</a>.',
					'jsm-force-ssl' ), get_admin_url( null, 'options-general.php' ) );
			echo '</p></div>';
		}
	}

	JSM_Force_SSL::get_instance();
}

?>
