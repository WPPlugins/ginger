<?php

if(!function_exists("ginger_include_addons")) {
    function ginger_include_addons()
    {
        // check native gallery types
        $addons = array();
        $addondir = plugin_dir_path(__FILE__);

        $files = scandir($addondir);


        foreach ($files as $file) {
            if (is_dir($addondir . '/' . $file) && $file != "." && $file != "..") {
                if (file_exists($addondir . '/' . $file . '/index.php')) {
                    require_once($addondir . '/' . $file . '/index.php');
                    $addons[] = $file;
                }
            }
        }

        return $addons;
    }
}

$addons = ginger_include_addons();
