<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/31/18
 * Time: 10:48 AM
 */

?>

<div class="wrap"> <!-- WP container -->

    <?php
        // check if setting saved (form successfully processed)
        if ( isset( $_GET['settings-updated'] ) && ( count( get_settings_errors('edp_messages' ) ) < 1 ) ) {

            // add settings saved message
            add_settings_error( 'edp_messages', 'edp_message', 'Settings Saved', 'updated' );
        }

        // show error/update messages
        settings_errors( 'edp_messages' );
    ?>


    <div class="container-fluid"><!-- form container -->

            <form action="options.php" method="POST" >

                <div class="row">
                    <h2>Donation Setup</h2>
                    <p>
                        Just a few configurations, and you can start accepting donations!
                        <br />Oh, and reading the <a href="https://github.com/josephldaigle/elavon-donation/blob/master/README.md">documentation</a> never hurts.
                    </p>
                </div>

                <div class="row">&nbsp;</div>

                <div class="row"><!-- Live Section -->
                    <h4>Live API Login (Required)</h4>
                    <small>Used to execute live transactions.</small>
                </div>

                <div class="row">&nbsp;</div>

                <div class="form-group row">
                    <label for="edp_api_mode" class="col-xs-4 col-sm-3 col-form-label">API Mode:</label>
                    <div class="col-xs-4 col-sm-6">
                        <input type="checkbox" id="edp_api_mode" class="form-control" name="edp_api_mode" <?php print(( $val = get_option('edp_api_mode') ) ? 'checked' : '') ?> data-toggle="toggle"
                        data-onstyle="success" data-offstyle="primary" data-on="Live" data-off="Demo" data-size="small" data-style="quick" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edp_api_account_number_prod" class="col-xs-6 col-sm-3 col-form-label">Account Number:</label>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <input type="text" id="edp_api_account_number_prod" class="form-control" name="edp_api_account_number_prod" value="<?php print(esc_attr( ( $val = get_option('edp_api_account_number_prod') ) ? $val : '' )); ?>" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edp_api_user_id_prod" class="col-xs-6 col-sm-3 col-form-label">User ID:</label>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <input type="text" id="edp_api_user_id_prod" class="form-control" name="edp_api_user_id_prod" value="<?php print(esc_attr( ( $val = get_option('edp_api_user_id_prod') ) ? $val : '' )); ?>" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edp_api_pass_prod" class="col-xs-6 col-sm-3 col-form-label">PIN:</label>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <input type="password" class="form-control" id="edp_api_pass_prod" name="edp_api_pass_prod" value="<?php printf(esc_attr( ( $val = get_option('edp_api_pass_prod') ) ? $val : '' )); ?>" required data-toggle="password" data-placement="after" data-eye-class="fa" data-eye-open-class="fas fa-eye" data-eye-close-class="fas fa-eye-slash" >
                    </div>
                </div>

                <div class="row">&nbsp;</div>

                <div class="row">
                    <h4>Demo API Login</h4>
                    <small>Used to execute transactions in demo mode.</small>
                </div>

                <div class="row">&nbsp;</div>

                <div class="form-group row"><!-- Demo Section -->
                    <label for="edp_api_account_number_test" class="col-xs-6 col-sm-3 col-form-label">Account Number:</label>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <input type="text" id="edp_api_account_number_test" class="form-control"  name="edp_api_account_number_test" value="<?php print(esc_attr( ( $val = get_option('edp_api_account_number_test') ) ? $val : '' )); ?>" required />
                    </div>
                </div>

                <div class="form-group row"><!-- Demo Section -->
                    <label for="edp_api_user_id_test" class="col-xs-6 col-sm-3 col-form-label">User ID:</label>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <input type="text" id="edp_api_user_id_test" class="form-control" name="edp_api_user_id_test" value="<?php print(esc_attr( ( $val = get_option('edp_api_user_id_test') ) ? $val : 'webpage' )); ?>" required />
                    </div>
                </div>

                <div class="form-group row"><!-- Demo Section -->
                    <label for="edp_api_pass_test" class="col-xs-6 col-sm-3 col-form-label">PIN:</label>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <input type="password" id="edp_api_pass_test" class="form-control" name="edp_api_pass_test" value="<?php print(esc_attr( ( $val = get_option('edp_api_pass_test') ) ? $val : '' )); ?>" required data-toggle="password" data-placement="after" data-eye-class="fa" data-eye-open-class="fas fa-eye" data-eye-close-class="fas fa-eye-slash"/>
                    </div>
                </div>

                <?php
                    // output security fields for the registered setting "edp_options"
                    settings_fields('edp_options');

                    // output save settings button
                    submit_button('Save');

                ?>
            </form>
    </div>
</div>