<?php

namespace Wy_Wp_Nonce\Util;

class Nonce {
  private $lifetime_sec = DAY_IN_SECONDS;
  
  public function __construct() {
  }
  
  public function create_nonce($action = -1) {
    $user = wp_get_current_user();
    $uid = (int)$user->ID;
    if (!$uid) {
      $uid = apply_filters('nonce_user_logged_out', $uid, $action);
    }

    $token = wp_get_session_token();
    $i = wp_nonce_tick();

    return substr(wp_hash($i . '|' . $action . '|' . $uid . '|' . $token, 'nonce'), -12, 10);
  }
  
  public function set_lifetime($lifetime_sec) {
    $this->lifetime_sec = $lifetime_sec;
  }
  
  protected function nonce_tick() {
    return ceil(time() / ($this->lifetime_sec / 2));
  }
}