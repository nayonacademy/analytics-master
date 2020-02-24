<?php
/**
 * Plugin Name: Analytics Master
 * Plugin URI: http://wordpress.org/plugins/analytics-master
 * Description: Best analytics for wordpress website and woocommerce
 * Version: 1.0.0
 * Author: Shariful Islam Nayon
 * Author URI: https://nayon.net
 * Text Domain: analytics-master

*/

// display dashboard widget
add_action('wp_dashboard_setup', function () {
  wp_add_dashboard_widget('analytics_master_widget', 'Analytics Master', 'analytics_master_display_widget');
  function analytics_master_display_widget() {
    ?>
    <div id="analytics_master_dashboard"></div>
    <?php
  }
});

// add to settings menu
add_action('admin_menu', function () {
  global $analytics_master_settings_page;
  $analytics_master_settings_page = add_options_page('Analytics Master Settings', 'Analytics Master', 'manage_options', 'analytics_master_settings', 'analytics_master_settings_do_page');
  // Draw the menu page itself
  function analytics_master_settings_do_page() {
    ?>
    <div id="analytics_master_settings"></div>
    <?php
  }

  // add link to settings on plugin page (next to "Deactivate")
  add_filter('plugin_action_links_' . plugin_basename(__FILE__), function ($links) {
    $settings_link = '<a href="options-general.php?page=analytics-master-settings">' . __( 'Settings' ) . '</a>';
    array_unshift($links, $settings_link);
    return $links;
  });
});