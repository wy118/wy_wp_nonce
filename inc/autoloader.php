<?php

spl_autoload_register('wy_wp_nonce_autoloader');

function wy_wp_nonce_autoloader($class_name) {
  if (strpos($class_name, 'Wy_Wp_Nonce') === false) {
    return;
  }
 
  $file_parts = explode('\\', $class_name);
    
  $namespace = '';
  for ($i = count($file_parts) - 1; $i > 0; $i--) {
    $current = strtolower( $file_parts[ $i ] );
    $current = str_ireplace( '_', '-', $current );
      
    if (count($file_parts) - 1 === $i) {
      $file_name = "class-$current.php";
    } else {
      $namespace = '/' . $current . $namespace;
    }
  }
    
  $filepath  = trailingslashit(dirname(dirname( __FILE__)) . $namespace);
  $filepath .= $file_name;
  if (file_exists($filepath)) {
    include_once($filepath);
  } else {
    wp_die(
      esc_html( "The file attempting to be loaded at $filepath does not exist." )
    );
  }
}