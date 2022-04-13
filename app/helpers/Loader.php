<?php

if (!function_exists('load_view')) {
    function load_view(string $name, array $vars = [])
    {
        extract($vars);
        if (file_exists(SDF_APP_VIEW . $name))
            require SDF_APP_VIEW . $name;
        else if (file_exists(SDF_APP_VIEW . $name . '.php'))
            require SDF_APP_VIEW . $name . '.php';
        else
            print_r("Warning. Can't Load $name");
    }
}