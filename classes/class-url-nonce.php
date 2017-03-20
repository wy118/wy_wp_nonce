<?php

namespace Wy_Wp_Nonce;

class Url_Nonce extends Nonce {
  function create_url ($actionurl, $action = -1, $name = '_wpnonce') {
    $actionurl = str_replace('&amp;', '&', $actionurl);
    return esc_html(add_query_arg($name, $this->create_nonce($action), $actionurl));
  }
}