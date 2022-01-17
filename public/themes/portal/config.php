<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists, this
    | is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities this is cool
    | feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        'before' => function ($theme) {
            $theme->setAuthor('Damian Białkowski & Michał Mansfelski');
        },

        'asset' => function ($asset) {
            $asset->themePath()->add([
                                         ['bootstrap', 'css/bootstrap.min.css'],
                                         ['style', 'css/style.css'],
                                         ['bootstrap', 'js/bootstrap.min.js'],
                                         ['jquery', 'js/jquery.min.js'],
                                         ['main', 'js/main.js'],
                                     ]);
        },


        'beforeRenderTheme' => function ($theme) {
            // To render partial composer
            /*
            $theme->partialComposer('header', function($view){
                $view->with('auth', Auth::user());
            });
            */
        },

        'beforeRenderLayout' => array(

            'mobile' => function ($theme) {
                // $theme->asset()->themePath()->add('ipad', 'css/layouts/ipad.css');
            }

        )

    )
);
