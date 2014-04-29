/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {

// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.ajax_browscap = {
  attach: function(context, settings) {
    var ajaxBrowscap = {
      browser: function() {
        return $.getJSON('/ajax-browscap').then(function(data) {
          return data;
        });
      },
      formatProperty: function(prop, value) {
        value = value.toLowerCase().replace(/[^a-z0-9-]+/gi, '-');
        return prop + '-' + value;
      }
    };
    ajaxBrowscap.browser().done(function(browserData) {
      var classes = [],
          i = 0;

      for (var prop in browserData) {
        if (browserData.hasOwnProperty(prop)) {
          classes[i] = ajaxBrowscap.formatProperty(prop, browserData[prop]);
          i++;
        }
      }
      $('html').addClass(classes.join(' '));
    });
  }

};

})(jQuery, Drupal, this, this.document);