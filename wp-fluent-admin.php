<?php
/*
Plugin Name: WP Fluent Admin
Plugin URI: https://www.wpzhiku.com/
Description: Description
Version:            1.0.0
Author: 一刀
Author URI: https://www.wpzhiku.com
*/

defined('WPINC') || die;

const WP_FLUENT_ADMIN_VERSION = '1.0.0';
const WP_FLUENT_ADMIN_MAIN_FILE = __FILE__;
define('WP_FLUENT_ADMIN_PATH', plugin_dir_path(__FILE__));
define('WP_FLUENT_ADMIN_URL', plugin_dir_url(__FILE__));

if ( ! is_file(WP_FLUENT_ADMIN_PATH . 'vendor/autoload.php')) {
    spl_autoload_register(function ($class)
    {
        $prefix = 'WpFluentAdmin';

        if (strpos($class, $prefix) === false) {
            return;
        }

        $class    = substr($class, strlen($prefix));
        $location = WP_FLUENT_ADMIN_PATH . 'src' . str_replace('\\', '/', $class) . '.php';

        if (is_file($location)) {
            require_once($location);
        }
    });
} else {
    require_once(WP_FLUENT_ADMIN_PATH . 'vendor/autoload.php');
}


register_activation_hook(WP_FLUENT_ADMIN_MAIN_FILE, 'wp_fluent_admin_activation');
register_deactivation_hook(WP_FLUENT_ADMIN_MAIN_FILE, 'wp_fluent_admin_deactivation');
register_uninstall_hook(WP_FLUENT_ADMIN_MAIN_FILE, 'wp_fluent_admin_uninstallation_action_action');

function wp_fluent_admin_activation()
{
    new WpFluentAdmin\Actions\ActivationAction();
}


function wp_fluent_admin_deactivation()
{
    new WpFluentAdmin\Actions\DeactivationAction();
}


function wp_fluent_admin_uninstallation_action_action()
{
    new WpFluentAdmin\Actions\DeactivationAction();
}

add_action('plugins_loaded', function ()
{
    load_plugin_textdomain('wp-fluent-admin', false, dirname(plugin_basename(__FILE__)) . '/languages/');

    new \WpFluentAdmin\Init();
});
