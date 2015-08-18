<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.getambassador.com
 * @since      1.0.0
 *
 * @package    Ambassador
 * @subpackage Ambassador/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ambassador
 * @subpackage Ambassador/public
 * @author     Ambassador <support@getambassador.com>
 */
class Ambassador_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ambassador-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ambassador-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Render the Universal Snippet if a Universal ID is set
	 *
	 * @since  1.0.0
	 */
	public function render_snippet() {
		$universal_id = get_option( $this->option_name . '_universal_id' );
		$snippet = ($universal_id) ? "<script>(function (u, n, i, v, e, r, s, a, l) {u[r] = {}; u[r].uid = '". $universal_id ."';a = n.createElement(v); a.src = e; a.async = s;n.getElementsByTagName(i)[0].appendChild(a);})(window, document, 'head', 'script', 'https://cdn.getambassador.com/us.js', 'mbsy', true);</script>" : '';
		echo $snippet;
	}

}
