<?php

namespace WpFluentAdmin;


class Frontend
{

    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
    }

    public function admin_enqueue_scripts()
    {
        global $pagenow;


        // 判断是否为可变商品
        if ($pagenow === 'post.php' || $pagenow === 'post-new.php') {
            wp_enqueue_style('fluent-admin-main', WP_FLUENT_ADMIN_URL . 'source/styles/main.css', [], WP_FLUENT_ADMIN_VERSION, 'screen');
        }
    }
}
