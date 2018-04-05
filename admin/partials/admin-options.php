<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/31/18
 * Time: 10:48 AM
 */

?>

<div class="wrap">
    <?php

        if ( isset( $_GET['settings-updated'] ) && ( count( get_settings_errors('edp_messages' ) ) < 1 ) ) {
            // add settings saved message with the class of "updated"
            add_settings_error( 'edp_messages', 'edp_message', 'Settings Saved', 'updated' );
        }

        // show error/update messages
        settings_errors( 'edp_messages' );

    ?>

    <form action="options.php" method="POST">
		<?php
			// output security fields for the registered setting "edp_options"
			settings_fields('edp_options');

			// output setting sections and their fields
			do_settings_sections('elavon-donation');

            // output save settings button
			submit_button('Save');
		?>
	</form>
</div>