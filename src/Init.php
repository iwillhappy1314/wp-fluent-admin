<?php

namespace WpFluentAdmin;

class Init
{

    /**
     * constructor.
     */
    public function __construct()
    {
        $classes = [
            Frontend::class,
            Options::class,
        ];

        foreach ($classes as $class) {
            new $class;
        }


        add_filter('admin_body_class', [$this, 'add_body_class']);
    }


    function add_body_class($classes)
    {
        $options        = get_option('fluent_admin_options');
        $current_screen = get_current_screen();

        if ($current_screen->base === 'post' && in_array($current_screen->post_type, $options[ 'post_types_support' ])) {
            $classes .= ' wp-fluent-admin';
        }

        return $classes;
    }
}