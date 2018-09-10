<?php

/*-----------------------------------------------------------------------------------*/
/*	Include Admin Scripts
/*-----------------------------------------------------------------------------------*/ 
function rypecore_admin_scripts() {
    if (is_admin()) {
		wp_register_script('admin-js', get_template_directory_uri() . '/admin.js', array('jquery'), '', true);
		wp_enqueue_script('admin-js');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script( 'jquery-ui-sortable' );
    }
}
add_action('admin_enqueue_scripts', 'rypecore_admin_scripts');

/*-----------------------------------------------------------------------------------*/
/*	Include Theme Stylesheets
/*-----------------------------------------------------------------------------------*/
function load_rypecore_stylesheets() {
	if (!is_admin()) {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
	}
}
add_action('wp_enqueue_scripts', 'load_rypecore_stylesheets');


/*-----------------------------------------------------------------------------------*/
/*	Include theme options
/*-----------------------------------------------------------------------------------*/

// create settings menu
add_action('admin_menu', 'rypecore_theme_options_create_menu');

function rypecore_theme_options_create_menu() {

    //create new top-level menu
    add_menu_page('Theme Options', 'Theme Options', 'administrator', 'theme_options', 'rypecore_theme_options_page' , null, 99 );

    //call register settings function
    add_action( 'admin_init', 'register_rypecore_theme_options' );
}

function register_rypecore_theme_options() {
    register_setting( 'rypecore-settings-group', 'filter_fields_order' );
}

function rypecore_theme_options_page() {
    ?>

    <div class="wrap">
        <h2>Theme Options</h2>
        <br/>

        <?php settings_errors(); ?>

        <form method="post" action="options.php" id="theme-options-form">
            <?php settings_fields( 'rypecore-settings-group' ); ?>
            <?php do_settings_sections( 'rypecore-settings-group' ); ?>

            <?php
            $fields_order_default = array(
                0 => array(
                    'id' => '0',
                    'name' => 'List Item 1',
                    'slug' => 'list_item_1'
                ),
                1 => array(
                    'id' => '1',
                    'name' => 'List Item 2',
                    'slug' => 'list_item_2'
                ),
                2 => array(
                    'id' => '2',
                    'name' => 'List Item 3',
                    'slug' => 'list_item_3'
                ),
                3 => array(
                    'id' => '3',
                    'name' => 'List Item 4',
                    'slug' => 'list_item_4'
                ),
                4 => array(
                    'id' => '4',
                    'name' => 'List Item 5',
                    'slug' => 'list_item_5'
                ),
            );
            ?>

            <div class="admin-module"> 
                <label><b>Sortable List</b> <em>(Drag & drop to rearrange order)</em></label>

                <ul class="filter-fields-list">
                    <?php 
                        $filter_fields_order = get_option('filter_fields_order', $fields_order_default); 
                        foreach($filter_fields_order as $value) { ?>

                            <?php
                                if(isset($value['id'])) { $id = $value['id']; }
                                if(isset($value['name'])) { $name = $value['name']; }
                                if(isset($value['slug'])) { $slug = $value['slug']; }
                            ?>

                            <li class="sortable-item">
                                <?php echo $name; ?>
                                <input type="hidden" name="filter_fields_order[<?php echo $id; ?>][id]" value="<?php echo $id; ?>" />
                                <input type="hidden" name="filter_fields_order[<?php echo $id; ?>][name]" value="<?php echo $name; ?>" />
                                <input type="hidden" name="filter_fields_order[<?php echo $id; ?>][slug]" value="<?php echo $slug; ?>" />
                            </li>
                    <?php } ?>
                </ul>
            </div>

            <?php submit_button(); ?>
        </form>

    </div>
    <?php
}


?>