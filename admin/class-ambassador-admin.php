<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.getambassador.com
 * @since      1.0.0
 *
 * @package    Ambassador
 * @subpackage Ambassador/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ambassador
 * @subpackage Ambassador/admin
 * @author     Ambassador <support@getambassador.com>
 */
class Ambassador_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'ambassador';

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ambassador_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ambassador_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ambassador-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ambassador_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ambassador_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ambassador-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {

		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Ambassador Settings', 'ambassador' ),
			__( 'Ambassador', 'ambassador' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);

	}

	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/ambassador-admin-display.php';
	}

	/**
	 * Register all related settings of this plugin
	 *
	 * @since  1.0.0
	 */
	public function register_setting() {
		// Add a General section
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', 'ambassador' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);
		add_settings_field(
			$this->option_name . '_universal_id',
			__( 'Universal ID', 'ambassador' ),
			array( $this, $this->option_name . '_universal_id_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_universal_id' )
		);
		register_setting( $this->plugin_name, $this->option_name . '_universal_id', 'sanitize_text_field' );
	}

	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function ambassador_general_cb() {
		echo '<p>' . __( 'Add your Ambassador Universal ID below.', 'ambassador' ) . '</p>';
	}

	/**
	 * Render the Universal ID input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function ambassador_universal_id_cb() {
		$universal_id = get_option( $this->option_name . '_universal_id' );
		echo '<input type="text" name="' . $this->option_name . '_universal_id' . '" id="' . $this->option_name . '_universal_id' . '" value="' . $universal_id . '">';
	}

}
