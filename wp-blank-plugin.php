<?php
/*
Plugin Name: Blank
Description: Blueprint for develop new WordPress plugin
Author: Simone manfredini
Author URI: https://simonemanfre.it/
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages/
Text Domain: blank
Version: 0.0.2
Requires at least: 5.5
Requires PHP: 7.4
*/
/*  This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

defined( 'ABSPATH' ) || exit; // Exit if accessed directly


// TODO Sostituire "blank" con "nome_plugin" nei nomi, nelle funzioni e nelle costanti


// COSTANTI PLUGIN
define( 'BLANK_VERSION', '0.0.2' );
define( 'BLANK_PLUGIN_FILE', __FILE__ );
define( 'BLANK_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BLANK_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


// CARICAMENTO TRADUZIONI
function trp_blank_plugin_load_textdomain() {
    load_plugin_textdomain( 'blank', false, dirname( plugin_basename( BLANK_PLUGIN_FILE ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'trp_blank_plugin_load_textdomain' );


// ATTIVAZIONE / DISATTIVAZIONE
function trp_blank_plugin_activate() {
    // Qui puoi aggiungere logica di attivazione (opzioni di default, flush rewrite rules, ecc.)
}
register_activation_hook( BLANK_PLUGIN_FILE, 'trp_blank_plugin_activate' );

function trp_blank_plugin_deactivate() {
    // Qui puoi aggiungere logica di disattivazione (flush rewrite rules, cleanup temporaneo, ecc.)
}
register_deactivation_hook( BLANK_PLUGIN_FILE, 'trp_blank_plugin_deactivate' );

// La cancellazione definitiva dei dati (opzioni, tabelle custom, ecc.) va gestita in uninstall.php,
// non qui: uninstall.php viene eseguito solo alla rimozione del plugin dall'elenco plugin.


// PAGINA OPZIONI PLUGIN
function trp_blank_plugin_option_page() {
    add_options_page(
        __( 'Impostazioni Blank', 'blank' ),
        __( 'Blank', 'blank' ),
        'manage_options',
        'blank',
        'trp_blank_plugin_option_page_html'
    );
}
add_action( 'admin_menu', 'trp_blank_plugin_option_page' );

function trp_blank_plugin_option_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <p><?php esc_html_e( 'Qui puoi aggiungere il contenuto della pagina delle impostazioni.', 'blank' ); ?></p>
        <?php
        // TODO Esempio Settings API:
        // settings_fields( 'blank_options_group' );
        // do_settings_sections( 'blank' );
        // submit_button();
        ?>
    </div>
    <?php
}
