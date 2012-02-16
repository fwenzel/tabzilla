<?php
/*
Plugin Name: WP-Tabzilla
Plugin URI: https://github.com/mozilla/tabzilla
Description: This plugin adds the One Mozilla universal tab ("Tabzilla") to any wordpress blog.
Version: 1.0
Author: Mozilla
Author URI: http://mozilla.org
License: MPL2
*/

/**
 * Add Tabzilla CSS file to theme header.
 */
function tabzilla_add_css() {
    $http = (is_ssl() ? 'https': 'http');
    wp_register_style('tabzilla', "{$http}://www.mozilla.org/tabzilla/media/css/tabzilla.css");
    wp_enqueue_style('tabzilla');
}
add_action('wp_print_styles', 'tabzilla_add_css');


/**
 * Add Tabzilla link and JS to HTML output.
 */
function add_tabzilla_html() {
    echo <<<EOS
<script type='text/javascript' src='//www.mozilla.org/tabzilla/media/js/tabzilla.js'></script>
<script>var tab=document.createElement('a');tab.href="http://www.mozilla.org/";tab.id="tabzilla";
tab.innerHTML="mozilla";var body=document.getElementsByTagName('body')[0];body.insertBefore(tab,body.firstChild);</script>
EOS;
}
add_action('wp_footer', 'add_tabzilla_html');
