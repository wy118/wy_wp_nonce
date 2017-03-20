<?php

/*
 * Plugin Name: Custom Nonce Plugin
 * Description: A plugin that implement WP base nonce in OOP
 * Version:     1.0
 *
 */

use Wy_Wp_Nonce\Util; 

global $url_nonce, $field_nonce;
$url_nonce = new Util\Url_Nonce();
$field_nonce = new Util\Field_Nonce();