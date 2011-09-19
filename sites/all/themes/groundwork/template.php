<?php // $Id$

/**
 * @file template.php
 * Do not modify this file.
 */

// Run nothing if the database is inactive.
if (db_is_active()) {
  /**
   * Implementation of hook_theme
   */
  function groundwork_theme() {
  // Register theme function for the system_settings_form.
    return array(
      'system_settings_form' => array(
        'arguments' => array('form' => NULL, 'key' => 'groundwork'),
      ),
    );
    // Include the theme settings.
    include(drupal_get_path('theme', 'groundwork') .'/inc/template.theme-settings.inc');
  }

  /**
   * Implementation of hook_preprocess()
   *
   * This function checks to see if a hook has a preprocess file associated with
   * it, and if so, loads it.
   *
   * @param $vars
   *   An array of variables to pass to the theme template.
   * @param $hook
   *   The name of the template being rendered.
   */
  function groundwork_preprocess(&$vars, $hook) {
    global $user;
    $vars['is_admin'] = in_array('admin', $user->roles);
    $vars['logged_in'] = ($user->uid > 0) ? TRUE : FALSE;
    $vars['theme_path'] = base_path() . path_to_theme() .'/';

    // Include preprocess functions if and when required.
    if (is_file(drupal_get_path('theme', 'groundwork') .'/inc/template.preprocess-'. str_replace('_', '-', $hook) .'.inc')) {
      include(drupal_get_path('theme', 'groundwork') .'/inc/template.preprocess-'. str_replace('_', '-', $hook) .'.inc');
    }
  }

  // Include custom functions.
  include_once(drupal_get_path('theme', 'groundwork') .'/inc/template.custom-functions.inc');

  // Include theme overrides.
  include_once(drupal_get_path('theme', 'groundwork') .'/inc/template.theme-overrides.inc');

  // Include some jQuery.
  include_once(drupal_get_path('theme', 'groundwork') .'/inc/template.theme-js.inc');


  // Auto-rebuild the theme registry during theme development.
  if (theme_get_setting('rebuild_registry')) {
    drupal_set_message(t('The theme registry has been rebuilt. <a href="!link">Turn off</a> this feature on production websites.', array('!link' => url('admin/build/themes/settings/'. $GLOBALS['theme']))), 'warning');
  }
}
