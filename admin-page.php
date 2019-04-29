<div class="wrap">
    <h1><?php _e( 'Login Page Logo', 'gl-wpl' ); ?></h1>
    <form method="post" action="options.php">
        <?php settings_fields( 'gl-lp-settings' ); ?>
        <?php do_settings_sections( 'gl-lp--settings' ); ?>
        <table class="form-table">
            <tr>
                <th><label for="login_page_logo_uplod"><?php _e( 'Upload Login Page Logo', 'gl-wpl' ); ?></label></th>
                <td>
                    <label for="login_page_logo_uplod">
                        <img class="show_gl_lp" src="<?php echo esc_url( get_option( 'login_page_logo' ) ); ?>" style="width:150px;">
                    </label><br>
                    <input type="text" id="login_page_logo" class="regular-text" name="login_page_logo" value="<?php echo get_option( 'login_page_logo' ); ?>">
                    <button id="login_page_logo_uplod" class="button-primary"><?php _e( 'Upload Logo', 'gl-wpl' ); ?></button>
                </td>
            </tr>
            <tr>
                <th><label for="login_page_logo_width"><?php _e( 'Logo Width', 'gl-wpl' ); ?></label></th>
                <td>
                    <input type="text" id="login_page_logo_width" class="regular-text" name="login_page_logo_width" value="<?php echo get_option( 'login_page_logo_width' ); ?>">         
                    <p class="description"><?php _e( 'with unit (e.g: px, %, em)', 'gl-wpl' ); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="login_page_logo_height"><?php _e( 'Logo Height', 'gl-wpl' ); ?></label></th>
                <td>
                    <input type="text" id="login_page_logo_height" class="regular-text" name="login_page_logo_height" value="<?php echo get_option( 'login_page_logo_height' ); ?>">         
                    <p class="description"><?php _e( 'with unit (e.g: px, %, em)', 'gl-wpl' ); ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <?php submit_button(); ?>          
                </td>
            </tr>
        </table>
    </form>
</div>