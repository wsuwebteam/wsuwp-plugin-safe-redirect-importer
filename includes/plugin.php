<?php namespace WSUWP\Plugin\Safe_Redirect_Importer;

class Plugin {

	protected static $version = '1.0.1';

	public static function get( $property ) {
		switch ( $property ) {
			case 'version':
				return self::$version;

			case 'dir':
				return plugin_dir_path( dirname( __FILE__ ) );

			case 'url':
				return plugin_dir_url( dirname( __FILE__ ) );

			default:
				return '';
		}
	}


	public static function increase_srm_limit( $amount ) {

		return 1000;

	}


	public static function init() {

		require_once __DIR__ . '/importer.php';

		add_filter( 'srm_max_redirects', array( __CLASS__, 'increase_srm_limit' ) );

	}

}

Plugin::init();
