<?php
/**
 * Plugin Name:       PRTE Course Certificate
 * Plugin URI:        https://www.prte.com.br
 * Description:       Esse plugin controla a geração de certificados de cursos.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Pedro Renan / Osvaldo Aurélio / Nivaldo Neto / Lucas Eduardo
 * Author URI:        https://www.prte.com.br
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

 /**
 * Register the "book" custom post type
 */
function wp_prte_course_certificate_setup_post_type() {
  register_post_type( 'prte_course', ['public' => true, 'label' => 'hackeando o wp' ] ); 
} 
add_action( 'init', 'wp_prte_course_certificate_setup_post_type' );


/**
* Activate the plugin.
*/
function wp_prte_course_certificate_activate() { 
  // Trigger our function that registers the custom post type plugin.
  wp_prte_course_certificate_setup_post_type(); 
  // Clear the permalinks after the post type has been registered.
  flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'wp_prte_course_certificate_activate' );

/**
 * Deactivation hook.
 */
function wp_prte_course_certificate_deactivate() {
  // Unregister the post type, so the rules are no longer in memory.
  unregister_post_type( 'prte_course' );
  // Clear the permalinks to remove our post type's rules from the database.
  flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'wp_prte_course_certificate_deactivate' );

register_uninstall_hook(__FILE__, 'wp_prte_course_certificate_function_to_run');



add_action( 'admin_menu', 'wp_prte_course_certificate_options_page' );
function wp_prte_course_certificate_options_page() {
    add_menu_page(
        'PRTE',
        'PRTE Options',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/view.php',
        null,
        '',
        20
    );
}