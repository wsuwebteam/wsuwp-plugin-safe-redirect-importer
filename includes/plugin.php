<?php namespace WSUWP\Plugin\Safe_Redirect_Importer;

class Plugin {

	protected static $version = '1.0.0';

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

	public static function init() {

		require_once __DIR__ . '/importer.php';

	}
}

Plugin::init();
