<?php

return [
    /*
     * Please set absolute path or relative path from base_path()
     * Default value is app_path('UseCases')
     */
    'root_path' => app_path('UseCases'),

    /*
     * Please set a root namespace for UseCase
     * Default value is 'App\\UseCases\\'
     */
    'namespace' => 'App\\UseCases\\',

    /*
     * If you want to change a class names, you can do it.
     * __USE_CASE__ will be replaced the UseCase name
     */
    'name' => [
        'adapter' => '__USE_CASE__Adapter',
        'inputdata' => 'InputData',
        'viewmodel' => 'ViewModel',
    ],
];
