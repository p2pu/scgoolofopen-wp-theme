<?php
/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function community_members()
{

    $labels = array(
        'name' => _x('Members', 'Members', 'text_domain'),
        'singular_name' => _x('Members', 'Member', 'text_domain'),
        'menu_name' => __('Members', 'text_domain'),
        'all_items' => __('All Members', 'text_domain'),
        'parent_item' => __('Parent Members', 'text_domain'),
        'parent_item_colon' => __('Parent Members:', 'text_domain'),
        'new_item_name' => __('New Members', 'text_domain'),
        'add_new_item' => __('Add Members', 'text_domain'),
        'edit_item' => __('Edit Members', 'text_domain'),
        'update_item' => __('Update Members', 'text_domain'),
        'separate_items_with_commas' => __('Separate Members with commas', 'text_domain'),
        'search_items' => __('Search Members', 'text_domain'),
        'add_or_remove_items' => __('Add or remove Members', 'text_domain'),
        'choose_from_most_used' => __('Choose from the most used Members', 'text_domain'),
        'not_found' => __('Not Found', 'text_domain'),
    );
    $rewrite = array(
        'slug' => 'members',
        'with_front' => true,
        'hierarchical' => true,
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => $rewrite,
    );

    register_taxonomy('members', 'coummunity', $args);

}

// Hook into the 'init' action
add_action('init', 'community_members', 0);


function pippin_taxonomy_add_new_meta_field()
{
    // this will add the custom meta field to the add new term page



    ?>
    <div class="form-field">
        <label for="term_meta[profile]"><?php _e('Profile address'); ?></label>
        <input type="text" name="term_meta[profile]" id="term_meta[profile]" value="">

        <p class="description"><?php _e('Enter a link to members profile'); ?></p>
    </div>
    <?php
    $communities = query_posts(array('post_type' => 'coummunity'));
    if($communities) {?>
    <div class="form-field">
        <label for="term_meta[community]"><?php _e('Community group'); ?></label>
        <select name="term_meta[community]" id="term_meta[community]" >
            <option value="null">-------</option>
            <?php foreach( $communities as $community) {?>
                <option value="<?php echo $community->post_name; ?>">
                    <?php echo $community->post_title; ?>
                </option>;<?php
            }?>

        </select>
        <p class="description"><?php _e('Select community this member belongs to'); ?></p>
    </div><?php
    }?>
    <div class="form-field">
        <label for="term_meta[image]"><?php _e('Member image'); ?></label>
        <input type="text" name="term_meta[image]" id="term_meta[image]" value="" />

        <p class="description"><?php _e('Enter a link to members image'); ?></p>
    </div>

<?php
}

add_action('members_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2);
function pippin_taxonomy_edit_meta_field($term)
{

    // put the term ID into a variable
    $t_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option("taxonomy_$t_id"); ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label
                for="term_meta[profile]"><?php _e('Profile address'); ?></label></th>
        <td>
            <input type="text" name="term_meta[profile]" id="term_meta[profile]"
                   value="<?php echo esc_attr($term_meta['profile']) ? esc_attr($term_meta['profile']) : ''; ?>">

            <p class="description"><?php _e('Enter a link to members profile'); ?></p>
        </td>
    </tr>
    <?php
    $communities = query_posts(array('post_type' => 'coummunity'));
    if($communities) {?>
    <tr class="form-field">
        <th scope="row" valign="top"><label
                for="term_meta[community]"><?php _e('Community group'); ?></label></th>
        <td>
            <select name="term_meta[community]" id="term_meta[community]">
                <option value="null">-------</option>
                <?php foreach( $communities as $community) {?>
                    <option value="<?php echo $community->post_name; ?>"
                        <?php echo esc_attr($term_meta['community'])==$community->post_name? 'selected':'' ?>>
                        <?php echo $community->post_title; ?>
                    </option>;<?php
                }?>

            </select>
            <p class="description"><?php _e('Enter a Twitter hook of a member'); ?></p>
        </td>
    </tr><?php
    }?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="upload_image">Upload Image</label></th>
        <td>
            <label for="term_meta[image]"><?php _e('Member image'); ?></label>
            <input type="text" name="term_meta[image]" id="term_meta[image]"
                   value="<?php echo esc_attr($term_meta['image']) ? esc_attr($term_meta['image']) : ''; ?>" />

            <p class="description"><?php _e('Enter a link to members image'); ?></p>
        </td>
    </tr>
<?php
}

add_action('members_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2);

function save_taxonomy_custom_meta($term_id)
{
    if (isset($_POST['term_meta'])) {
        $t_id = $term_id;
        $term_meta = get_option("taxonomy_$t_id");
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset ($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option("taxonomy_$t_id", $term_meta);
    }
}

add_action('edited_members', 'save_taxonomy_custom_meta', 10, 2);
add_action('create_members', 'save_taxonomy_custom_meta', 10, 2);

// Register Custom Post Type
function coummunity_section()
{

    $labels = array(
        'name' => _x('Communities', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Community', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Community', 'text_domain'),
        'parent_item_colon' => __('Previous Community List:', 'text_domain'),
        'all_items' => __('Community List', 'text_domain'),
        'view_item' => __('View Community List', 'text_domain'),
        'add_new_item' => __('Add New Community List', 'text_domain'),
        'add_new' => __('Add Community List', 'text_domain'),
        'edit_item' => __('Edit Community List', 'text_domain'),
        'update_item' => __('Update Community List', 'text_domain'),
        'search_items' => __('Search Community List', 'text_domain'),
        'not_found' => __('Not found', 'text_domain'),
        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
    );
    $rewrite = array(
        'slug' => 'community',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $args = array(
        'label' => __('coummunity_section', 'text_domain'),
        'description' => __('Community', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor',),
        'taxonomies' => array('members'),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'rewrite' => $rewrite,
        'capability_type' => 'page',
    );
    register_post_type('coummunity', $args);

}

// Hook into the 'init' action
add_action('init', 'coummunity_section', 0);

function my_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('my-upload');
}

function my_admin_styles() {
    wp_enqueue_style('thickbox');
}

if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}