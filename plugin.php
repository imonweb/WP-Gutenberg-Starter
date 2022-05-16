<?php
/**
  * Plugin Name: WP Gutenberg Block Starter
 * Description: A boilerplate plugin structure for WP Gutenberg Block Development
 * Author: Imon
 * Author URI: https://www.imonweb.co.uk
 * Text-Domain: wp-gutenberg-starter
 */

if( ! defined( 'ABSPATH' ) ) : exit(); endif; 

final class WP_Your_Class_Name {

  const VERSION = '1.0.0';

   
  /* ====== Contruct Function ====== */

  private function __contruct() {
    $this->plugin_constants();
    add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
  }

   
  /* ====== Define plugin constants ====== */
  
  public function plugin_constants() {
    define( 'PREFIX_VERSION', self::VERSION );
    define( 'PREFIX_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
    define( 'PREFIX_PLUGIN_URL', trailingslashit( plugin_url( '/',  __FILE__ ) ) );
  }

   
  /* ====== Singleton Instance ====== */
  
  public static function init() {
    static $instance = false;
    if( ! $instance ){
      $instance = new self();
    } 
    return $instance;
  }

   
  /* ====== Plugin init ====== */

  public function init_plugin() {
    $this->enqueue_scripts();
  }

   
  /* ====== Enqueue Scripts ====== */

  public function enqueue_scripts() {
    add_action( 'enqueue_block_editor_assets', [ $this, 'register_block_editor_assets' ] );
    add_action( 'admin_enqueue_scripts', [ $this, 'register_admin_scripts' ] );
    add_action( 'admin_enqueue_scripts', [ $this, 'register_public_scripts' ] );
    add_action( 'init', [ $this, 'register_blocks'] );
  }
 
  /* ====== Register Block Editor Assets ====== */

  public function register_block_editor_assets() {

  }

  /* ====== Register Admin Scripts ====== */

  public function register_admin_scripts() {
     wp_enqueue_scripts(
      'prefix-editor',
      PREFIX_PLUGIN_URL . '/assets/js/editor.js',
      rand(),
      true
    );

    wp_enqueue_style(
      'prefix-editor',
      PREFIX_PLUGIN_URL . '/assets/css/editor.css',
      [],
      false,
      'all'
    );
  }

  /* ====== Register Public Scripts ====== */

  public function register_public_scripts() {
    wp_enqueue_scripts(
      'prefix-public',
      PREFIX_PLUGIN_URL . '/assets/js/scripts.js',
      rand(),
      true
    );

    wp_enqueue_style(
      'prefix-public',
      PREFIX_PLUGIN_URL . '/assets/css/style.css',
      [],
      false,
      'all'
    );
  }

  /* ====== Register Blocks ====== */

  public function register_blocks() {
    register_block_type( 'prefix-blocks/block', [
      'style'           => 'prefix-block',
      'editor_style'    => 'prefix-editor',
      'editor_scripts'  => ''
    ] );
  }
 
 
} /*  End Class */

 
/*  
* Init Main Plugin 
*/

function prefix_run_plugin() {
  return WP_Your_Class_Name::init();
}

// Run the plugin
prefix_run_plugin();