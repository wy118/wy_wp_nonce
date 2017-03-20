<?php

/*
 * Plugin Name: Custom Nonce Plugin
 * Description: A plugin that implement WP base nonce in OOP
 * Version:     1.0
 *
 */

use Wy_Wp_Nonce\Util; 
/*
include_once('util/class-nonce.php');
include_once('util/class-url-nonce.php');
include_once('util/class-field-nonce.php');
*/
require_once(trailingslashit(dirname( __FILE__)) . 'inc/autoloader.php' );

global $url_nonce, $field_nonce;
$url_nonce = new Util\Url_Nonce();
$field_nonce = new Util\Field_Nonce();