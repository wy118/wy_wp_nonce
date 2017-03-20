<?php

namespace Wy_Wp_Nonce\Util;

class Field_Nonce extends Nonce {
  public function create_field($action = -1, $name = "_wpnonce", $referer = true , $echo = true) {
    $name = esc_attr($name);
    $nonce_field = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . $this->create_nonce($action) . '" />';
    if ($referer) {
      $nonce_field .= wp_referer_field(false);
    }

    if ($echo) {
      echo $nonce_field;
    }

    return $nonce_field;
  }
  
  public function verify_nonce ($value, $key) {
    wp_verify_nonce($value, $key);
  }
}