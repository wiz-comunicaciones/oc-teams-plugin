<?php namespace Wiz\Teams;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'wiz.teams::lang.plugin.name',
            'description' => 'wiz.teams::lang.plugin.description',
            'author'      => 'Wiz Comunicaciones',
            'icon'        => 'icon-users',
            'iconSvg'     => '/plugins/wiz/teams/assets/images/plugin-icon.svg',
            'homepage'    => 'https://github.com/wiz-comunicaciones/plugin-teams'
        ];
    }

    public function registerComponents()
    {
        return [
            \Wiz\Teams\Components\Members::class => 'Members',
        ];
    }

    public function registerPermissions()
    {
        return [
            'wiz.teams::manage_members' => [
                'tab'   => 'wiz.teams::lang.plugin.name',
                'label' => 'Gestionar integrantes',
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'wiz-teams' => [
                'label'       => 'Equipo',
                'url'         => Backend::url('wiz/teams/members'),
                'icon'        => 'icon-users',
                'iconSvg'     => '/plugins/wiz/teams/assets/images/plugin-icon.svg',
                'permissions' => ['wiz.teams::manage_members'],
                'order'       => 500,
            ],
        ];
    }
}