<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default settings for charts.
    |--------------------------------------------------------------------------
    */

    'default' => [
        'type' => 'line', // The default chart type.
        'library' => 'material', // The default chart library.
        'element_label' => 'Element', // The default chart element label.
        'title' => 'My Cool Chart', // Default chart title.
        'height' => 400, // 0 Means it will take 100% of the division height.
        'width' => 0, // 0 Means it will take 100% of the division width.
        'responsive' => false, // Not recommended since all libraries have diferent sizes.
        'background_color' => 'inherit', // The chart division background color.
        'colors' => [], // Default chart colors if using no template is set.
        'one_color' => false, // Only use the first color in all values.
        'template' => 'material', // The default chart color template.
        'legend' => true, // Whether to enable the chart legend (where applicable).
        'x_axis_title' => false, // The title of the x-axis
        'y_axis_title' => null, // The title of the y-axis (When set to null will use element_label value).
        'loader' => [
            'active' => true, // Determines the if loader is active by default.
            'duration' => 500, // In milliseconds.
            'color' => '#000000', // Determines the default loader color.
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | All the color templates available for the charts.
    |--------------------------------------------------------------------------
    */
    'templates' => [
        'material' => [
            '#2196F3', '#F44336', '#FFC107',
        ],
        'red-material' => [
            '#B71C1C', '#F44336', '#E57373',
        ],
        'indigo-material' => [
            '#1A237E', '#3F51B5', '#7986CB',
        ],
        'blue-material' => [
            '#0D47A1', '#2196F3', '#64B5F6',
        ],
        'teal-material' => [
            '#004D40', '#009688', '#4DB6AC',
        ],
        'green-material' => [
            '#1B5E20', '#4CAF50', '#81C784',
        ],
        'yellow-material' => [
            '#F57F17', '#FFEB3B', '#FFF176',
        ],
        'orange-material' => [
            '#E65100', '#FF9800', '#FFB74D',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Assets required by the libraries.
    |--------------------------------------------------------------------------
    */

    'assets' => [
        'global' => [
            'scripts' => [
                'js/jquery.min.js',
            ],
        ],

        'canvas-gauges' => [
            'scripts' => [
                'js/gauge.min.js',
            ],
        ],

        'chartist' => [
            'scripts' => [
                'js/chartist.min.js',
            ],
            'styles' => [
                'css/chartist.min.css',
            ],
        ],

        'chartjs' => [
            'scripts' => [
                'js/chart.min.js',
            ],
        ],

        'fusioncharts' => [
            'scripts' => [
                'js/fusioncharts.js',
                'js/fusioncharts.theme.fint.js',
            ],
        ],

        'google' => [
            'scripts' => [
                'js/jsapi.js',
                'js/loader.js',
                "google.charts.load('current', {'packages':['corechart', 'gauge', 'geochart', 'bar', 'line']})",
            ],
        ],

        'highcharts' => [
            'styles' => [
                // The following CSS is not added due to color compatibility errors.
                // 'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/css/highcharts.css',
            ],
            'scripts' => [
                'js/highcharts.js',
                'js/offline-exporting.js',
                'js/map.js',
                'js/data.js',
                'js/world.js',
            ],
        ],

        'justgage' => [
            'scripts' => [
                'js/raphael.min.js',
                'js/justgage.min.js',
            ],
        ],

        'morris' => [
            'styles' => [
                'css/morris.css',
            ],
            'scripts' => [
                'js/raphael.min.js',
                'js/morris.min.js',
            ],
        ],

        'plottablejs' => [
            'scripts' => [
                'js/d3.min.js',
                'js/plottable.min.js',
            ],
            'styles' => [
                'js/plottable.css',
            ],
        ],

        'progressbarjs' => [
            'scripts' => [
                'js/progressbar.min.js',
            ],
        ],

        'c3' => [
            'scripts' => [
                'js/d3.min.js',
                'js/c3.min.js',
            ],
            'styles' => [
                'css/c3.min.css',
            ],
        ],
    ],
];
