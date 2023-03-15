<?php namespace Mates\Login;

use Backend;
use Mates\Login\Classes\Extend\UserExtend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'login',
            'description' => 'No description provided yet...',
            'author' => 'mates',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        UserExtend::UserExtend();
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Mates\Login\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'mates.login.some_permission' => [
                'tab' => 'login',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'login' => [
                'label' => 'Tokens',
                'url' => Backend::url('mates/login/tokens'),
                'icon' => 'icon-address-book',
                'permissions' => ['mates.login.*'],
                'order' => 500,
            ],
        ];
    }
}
