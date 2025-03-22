<?php

GFForms::include_addon_framework();

class GFDateRangeTimePicker extends GFAddOn {

	protected $_version = '1.0';
	protected $_min_gravityforms_version = '2.4';
	protected $_slug = 'gravityforms-date-range-picker';
	protected $_path = 'gravityforms-date-range-picker/plugin.php';
	protected $_full_path = __FILE__;
	protected $_title = 'Date Range Time Picker Field for GravityForms';
	protected $_short_title = 'Date Range Time Picker Field';

	private static $_instance = null;

	/**
	 * Returns an instance of this class, and stores it in the $_instance property.
	 */
	public static function get_instance() {
		if ( self::$_instance == null ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Include the field early so it is available when entry exports are being performed.
	 */
	public function pre_init() {
		parent::pre_init();
		if ( $this->is_gravityforms_supported() && class_exists( 'GF_Field' ) ) {
			require_once( 'includes/class-gf-daterangetime-picker-field.php' );
		}
	}

	/**
	 * Include javascript libraries
	 */
	public function scripts() {
		$scripts = array(
           		array(
                		'handle'  => 'hammer',
                		'src'     => 'https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js',
                		'version' => $this->_version,
                		'deps'    => array( 'jquery', 'moment' ),
                		'enqueue' => array(
                    			array( 'field_types' => array( 'simple' ) )
                		)
                	),
           		array(
                		'handle'  => 'gravityforms_datetimepicker',
                		'src'     => $this->get_base_url() . '/assets/js/calentim.min.js',
                		'version' => $this->_version,
                		'deps'    => array( 'jquery', 'moment' ),
                		'enqueue' => array(
                    			array( 'field_types' => array( 'simple' ) )
                		)
                	),
           		array(
                		'handle'  => 'gravityforms_datetimepicker_init',
                		'src'     => $this->get_base_url() . '/assets/js/datepicker-init.js',
                		'version' => $this->_version,
                		'deps'    => array( 'jquery' , 'moment', 'hammer', 'gravityforms_datetimepicker'),
                		'enqueue' => array(
                    			array( 'field_types' => array( 'simple' ) )
                		)
                	),
            	);

		return array_merge( parent::scripts(), $scripts );
	}

	/**
	 * Include styles
	 */
	public function styles() {
		$styles = array(
            		array(
                		'handle'  => 'fontawesome',
                		'src'     => 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
                		'version' => $this->_version,
                		'enqueue' => array(
                    			array( 'field_types' => array( 'simple' ) )
                		)
            		),
            		array(
                		'handle'  => 'daterangetimepicker',
                		'src'     => $this->get_base_url() . '/assets/css/calentim.min.css',
                		'version' => $this->_version,
                		'enqueue' => array(
                    			array( 'field_types' => array( 'simple' ) )
                		)
            		)
		);
		return array_merge( parent::styles(), $styles );
	}
}

GFAddOn::register( 'GFDateRangeTimePicker' );
