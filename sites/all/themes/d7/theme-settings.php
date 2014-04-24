<?php
/**
 * Implements hook_form_system_theme_settings_alter() function.
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function d7_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  // From the always awesome Zen
  if (isset($form_id)) {
   return;
  }

  $form['d7_development'] = array(
   '#type' => 'fieldset',
   '#title' => t('Custom Development'),
   '#description' => t(''),
  );

  $form['d7_development']['d7_development'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Development Mode'),
    '#default_value' => theme_get_setting('d7_development'),
    '#description' => t(''),
  );
}
