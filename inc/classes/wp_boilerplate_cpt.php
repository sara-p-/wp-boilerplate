<?php
    class WP_Boilerplate_CPT {
        static function project() {
            $labels = [
                'name'                  => _x('Projects', 'Post Type General Name', 'wp_boilerplate'),
                'singular_name'         => _x('Project', 'Post Type Singular Name', 'wp_boilerplate'),
                'menu_name'             => __('Projects', 'wp_boilerplate'),
                'name_admin_bar'        => __('Projects', 'wp_boilerplate'),
                'archives'              => __('Item Archives', 'wp_boilerplate'),
                'attributes'            => __('Item Attributes', 'wp_boilerplate'),
                'parent_item_colon'     => __('Parent Project:', 'wp_boilerplate'),
                'all_items'             => __('All Projects', 'wp_boilerplate'),
                'add_new_item'          => __('Add New Project', 'wp_boilerplate'),
                'add_new'               => __('Add Project', 'wp_boilerplate'),
                'new_item'              => __('New Project', 'wp_boilerplate'),
                'edit_item'             => __('Edit Project', 'wp_boilerplate'),
                'update_item'           => __('Update Project', 'wp_boilerplate'),
                'view_item'             => __('View Project', 'wp_boilerplate'),
                'view_items'            => __('View Projects', 'wp_boilerplate'),
                'search_items'          => __('Search Projects', 'wp_boilerplate'),
                'not_found'             => __('Not found', 'wp_boilerplate'),
                'not_found_in_trash'    => __('Not found in Trash', 'wp_boilerplate'),
                'featured_image'        => __('Featured Image', 'wp_boilerplate'),
                'set_featured_image'    => __('Set featured image', 'wp_boilerplate'),
                'remove_featured_image' => __('Remove featured image', 'wp_boilerplate'),
                'use_featured_image'    => __('Use as featured image', 'wp_boilerplate'),
                'insert_into_item'      => __('Insert into item', 'wp_boilerplate'),
                'uploaded_to_this_item' => __('Uploaded to this item', 'wp_boilerplate'),
                'items_list'            => __('Items list', 'wp_boilerplate'),
                'items_list_navigation' => __('Items list navigation', 'wp_boilerplate'),
                'filter_items_list'     => __('Filter items list', 'wp_boilerplate'),
            ];
            $args = [
                'label'                 => __('Project', 'wp_boilerplate'),
                'description'           => __('A collection of portfolio pieces.', 'wp_boilerplate'),
                'labels'                => $labels,
                'supports'              => [ 'title', 'thumbnail' ],
                'taxonomies'            => [ 'project_categories' ],
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 20,
                'menu_icon'             => 'dashicons-welcome-widgets-menus',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'page',
            ];
            register_post_type('project', $args);
        }
    
        // Register Custom Taxonomy
        static function project_categories() {
            $labels = [
                'name'                       => _x('Project Categories', 'Taxonomy General Name', 'wp_boilerplate'),
                'singular_name'              => _x('Project Category', 'Taxonomy Singular Name', 'wp_boilerplate'),
                'menu_name'                  => __('Project Category', 'wp_boilerplate'),
                'all_items'                  => __('All Items', 'wp_boilerplate'),
                'parent_item'                => __('Parent Item', 'wp_boilerplate'),
                'parent_item_colon'          => __('Parent Item:', 'wp_boilerplate'),
                'new_item_name'              => __('New Item Name', 'wp_boilerplate'),
                'add_new_item'               => __('Add New Item', 'wp_boilerplate'),
                'edit_item'                  => __('Edit Item', 'wp_boilerplate'),
                'update_item'                => __('Update Item', 'wp_boilerplate'),
                'view_item'                  => __('View Item', 'wp_boilerplate'),
                'separate_items_with_commas' => __('Separate items with commas', 'wp_boilerplate'),
                'add_or_remove_items'        => __('Add or remove items', 'wp_boilerplate'),
                'choose_from_most_used'      => __('Choose from the most used', 'wp_boilerplate'),
                'popular_items'              => __('Popular Items', 'wp_boilerplate'),
                'search_items'               => __('Search Items', 'wp_boilerplate'),
                'not_found'                  => __('Not Found', 'wp_boilerplate'),
                'no_terms'                   => __('No items', 'wp_boilerplate'),
                'items_list'                 => __('Items list', 'wp_boilerplate'),
                'items_list_navigation'      => __('Items list navigation', 'wp_boilerplate'),
            ];
            $args = [
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            ];
            register_taxonomy('project_categories', [ 'project' ], $args);
        }
        // add_action('init', 'project_categories', 0);
    
    }