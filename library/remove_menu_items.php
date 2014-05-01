<?php
// remove for all but administrator
if ( ! current_user_can('manage_options') && wp_get_current_user()->user_login == 'p2pu-admin' ) {

	add_action( 'admin_menu', 'notadmin_remove_menus', 999 );

	function notadmin_remove_menus() {
		remove_menu_page('themes.php'); // Appearance
		remove_menu_page('admin.php?page=site-migration-export'); // Site export

	}
}
?>