<?php

namespace WpFluentAdmin;

use Wenprise\SettingsApi;

class Options
{

    private $settings_api;

    function __construct()
    {
        $this->settings_api = new SettingsApi();

        add_action('admin_init', [$this, 'admin_init']);
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    function admin_init()
    {

        //set the settings
        $this->settings_api->set_sections($this->get_settings_sections());
        $this->settings_api->set_fields($this->get_settings_fields());

        //initialize settings
        $this->settings_api->admin_init();
    }

    function get_settings_sections()
    {
        $sections = [
            [
                'id'    => 'fluent_admin_options',
                'title' => __('Fluent Admin Options', 'wp-fluent-admin'),
            ],
        ];

        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields()
    {

        $post_types          = get_post_types(['_builtin' => false,], OBJECT);
        $build_in_post_types = [
            'post' => __('Post', 'wp-fluent-admin'),
            'page' => __('Page', 'wp-fluent-admin'),
        ];

        $post_types = wp_list_pluck($post_types, 'label', 'name');

        return [
            'fluent_admin_options' => [
                [
                    'name'    => 'post_types_support',
                    'label'   => __('Enable for post type', 'wp-fluent-admin'),
                    'type'    => 'multicheck',
                    'default' => ['one' => 'one', 'four' => 'four'],
                    'options' => $build_in_post_types + $post_types,
                ],
            ],
        ];
    }

    function admin_menu()
    {
        add_options_page('Fluent Admin', 'Fluent Admin', 'delete_posts', 'settings_api_test', [$this, 'plugin_page']);
    }

    function plugin_page()
    {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages()
    {
        $pages         = get_pages();
        $pages_options = [];
        if ($pages) {
            foreach ($pages as $page) {
                $pages_options[ $page->ID ] = $page->post_title;
            }
        }

        return $pages_options;
    }

}