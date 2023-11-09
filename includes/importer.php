<?php namespace WSUWP\Plugin\Safe_Redirect_Importer;

class Importer {

	public static function init() {

		add_action( 'admin_menu', array( __CLASS__, 'add_importer_settings_page' ) );

	}


	public static function add_importer_settings_page() {
		add_submenu_page(
			'tools.php',
			'Safe Redirect Manager Importer',
			'Safe Redirect Importer',
			'manage_options',
			'safe_redirect_importer',
			array( __CLASS__, 'add_importer_page_content' )
		);
	}


	public static function add_importer_page_content() {

		$imported = array();

		if ( isset( $_POST['sri_import_file'] ) && ! empty( $_POST['sri_import_file'] ) ) {

			$imported = self::import_csv( esc_url( $_POST['sri_import_file'] ) );

		}

		include_once Plugin::get( 'dir' ) . 'templates/importer.php';

	}


	protected static function import_csv( $url_path ) {

		$created = array();

		$data = file_get_contents( $url_path );

		$redirects = array();

		if ( $data ) {

			$rows = explode( "\n", $data );

			foreach( $rows as $row ) {

				$redirects[] = str_getcsv( $row );
			}
		}

		if ( ! empty( $redirects ) ) {

			$created = self::create_redirects( $redirects );

		}

		return $created;

	}


	protected static function create_redirects( $redirects ) {

		$created = array();

		foreach ( $redirects as $redirect ) {

			if ( ! empty( $redirect[1] ) && ( false !== strpos( $redirect[1], 'https' ) ) ) {

				wp_insert_post( 
					array(
						'post_title'  => 'Auto Draft',
						'post_type'   => 'redirect_rule',
						'post_status' => 'publish',
						'meta_input'  => array(
							'_redirect_rule_from'        => ( ! empty( $redirect[0] ) ) ? $redirect[0] : '',
							'_redirect_rule_to'          => ( ! empty( $redirect[1] ) ) ? $redirect[1] : '',
							'_redirect_rule_status_code' => ( ! empty( $redirect[2] ) ) ? $redirect[2] : '',
							'_redirect_rule_notes'       => ( ! empty( $redirect[3] ) ) ? $redirect[3] : '',
						)
					)
				);

				$created[] = $redirect[0] . ' to ' . $redirect[1];

			}
		}

		return $created;

	}
}

Importer::init();
