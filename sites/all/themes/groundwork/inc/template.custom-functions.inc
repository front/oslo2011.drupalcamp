<?php // $Id$
// perceptivity.eu  websitecrew.com

/**
 * @file template.custom-functions.inc
 */

/**
 * Clean a string of unwanted characters.
 *
 * @param $string
 *   The string
 * @return
 *   The converted string
 */
function safe_string($string) {
  $string = drupal_strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $string));
  return $string;
}

/**
 * Limit the length of a string.
 *
 * @param $string
 *   The string
 * @param $lenght
 *   The lenght of the trimmed string
 * @$ellipsis
 *
 * @return
 *   The converted string
 */
function wordlimit($string, $length = 50, $ellipsis = "...") {
  $words = explode(' ', strip_tags($string));
  if (count($words) > $length)
    return implode(' ', array_slice($words, 0, $length)) . $ellipsis;
  else
    return $string;
}

/**
 * Set a default color scheme and set a cookie.
 */
function get_gw_colors() {
  $scheme = theme_get_setting('color_scheme');
  if (!$scheme) {
    $scheme = 'silver-stream.css';
  }
  if (isset($_COOKIE["gwcolors"])) {
    $scheme = $_COOKIE["gwcolors"];
  }
  return $scheme;
}

function gw_user_bar() {
  global $user;                                                               
  $output = '';

  if (!$user->uid) {                                                          
    $output .= theme('item_list', array(
      l(t('Login'), 'user/login'),
      l(t('Register'), 'user/register')));                           
  }                                                                           
  else {                                                                      
    $output .= theme('item_list', array(
      l(t('Create content'), 'node/add'),
      l(t('View account'), 'user/'.$user->uid, array('title' => t('View my account'))),
      l(t('Log out'), 'logout')));
  }
   

     
  return $output;
}