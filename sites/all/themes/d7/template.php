<?php

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function d7_preprocess_maintenance_page(&$vars) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  // d7_preprocess_html($vars);
  // d7_preprocess_page($vars);

  // This preprocessor will also be used if the db is inactive. To ensure your
  // theme is used, add the following line to your settings.php file:
  // $conf['maintenance_theme'] = 'd7';
  // Also, check $vars['db_is_active'] before doing any db queries.
}

/**
 * Implements hook_modernizr_load_alter().
 *
 * @return
 *   An array to be output as yepnope testObjects.
 */
/* -- Delete this line if you want to use this function
function d7_modernizr_load_alter(&$load) {

}

/**
 * Implements hook_preprocess_html()
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function d7_preprocess_html(&$vars) {
  if (theme_get_setting('d7_development') == 1) {
    $basehold = array(
      '#tag' => 'link',
      '#attributes' => array(
        'href' => '//basehold.it/24',
        'rel' => 'stylesheet',
      ),
    );
   drupal_add_html_head($basehold, 'basehold.it');
  }
}

/**
 * Override or insert variables into the page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function d7_preprocess_page(&$vars) {

}

/**
 * Override or insert variables into the region templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function d7_preprocess_region(&$vars) {

}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function d7_preprocess_block(&$vars) {

}
// */

/**
 * Override or insert variables into the entity template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function d7_preprocess_entity(&$vars) {

}
// */

/**
 * Override or insert variables into the node template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function d7_preprocess_node(&$vars) {
  $node = $vars['node'];
}
// */

/**
 * Override or insert variables into the field template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("field" in this case.)
 */
/* -- Delete this line if you want to use this function
function d7_preprocess_field(&$vars, $hook) {

}
// */

/**
 * Override or insert variables into the comment template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function d7_preprocess_comment(&$vars) {
  $comment = $vars['comment'];
}
// */

/**
 * Override or insert variables into the views template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function d7_preprocess_views_view(&$vars) {
  $view = $vars['view'];
}
// */


/**
 * Override or insert css on the site.
 *
 * @param $css
 *   An array of all CSS items being requested on the page.
 */
function d7_css_alter(&$css) {
  if (theme_get_setting('d7_development')) {
    $theme_path = drupal_get_path('theme', 'd7');
    if (isset($css[$theme_path . '/css/main.min.css'])) {
      $css[$theme_path . '/css/main.min.css']['data'] = $theme_path . '/css/main.css';
    }
  }
}
// */

/**
 * Override or insert javascript on the site.
 *
 * @param $js
 *   An array of all JavaScript being presented on the page.
 */
function d7_js_alter(&$js) {
  if (theme_get_setting('d7_development')) {
    $theme_path = drupal_get_path('theme', 'd7');
    if (isset($js[$theme_path . '/js/main.min.js'])) {
      $js[$theme_path . '/js/main.min.js']['data'] = $theme_path . '/js/main.js';
    }
    //check if modernizr and libraries is enabled
    /*if (module_exists('modernizr') && module_exists('libraries')) {
      //get the library path
      $modernizr_path = libraries_get_path('modernizr');
      if (isset($js[$modernizr_path . '/modernizr.min.js'])) {
        //$js[$modernizr_path . '/modernizr.min.js']['data'] = $modernizr_path . '/modernizr.js';
      }
    }*/
  }
}
// */
