<?php

use Illuminate\Support\Str;

if (! function_exists('seoUrl')) {
    //Create seo friendly url
    function seoUrl($text)
    {
        return Str::slug($text);
    }
}

if (! function_exists('debug')) {
    function debug($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}



if (! function_exists('getFolder')) {
    function getFolder($folder_names, $lang = 'en')
    {
        $lang = $lang ?? app()->getLocale();
        // Connect to DB and get language data
        $language = DB::table('language')->where('lang_code', $lang)->first();

        if(is_array($folder_names)) {
            $folder_name = [];
            foreach ($folder_names as $name) {
                if (isset($language->{$name})) {
                    $folder_name[$name] = $language->{$name};
                } else {
                    $folder_name[$name] = null; // or handle the case where the folder name does not exist
                }
            }
        } elseif (is_string($folder_names)) {
            $folder_name = $language->{$folder_names} ?? null;  
        }

        if ($language) {
            if(env('APP_DEBUG')) {
                return $lang . '/' . implode('/', (array)$folder_name);
            }else{
                return implode('/', (array)$folder_name);
            }
        }
        return null; // Return null if no language found
    }
}

if (! function_exists('getUrl')) {
    function getUrl($value)
    {
        $lang = app()->getLocale();
        // Connect to DB and get language data
        $language = DB::table('language')->where('lang_code', $lang)->first();

        if ($language) {
            return $language->{$value} ?? null;
        }
    }
}

if(!function_exists('getSubMenuItems')) {
    function getSubMenuItems($menu_id = null)
    {
        $lang = app()->getLocale();
        if ($menu_id) {
            $subMenus = DB::table('menu')->where('lang', $lang)->where('parent_menu_id', $menu_id)->get();
            
            if ($subMenus->isNotEmpty()) {
                $menuItems = [];
                foreach ($subMenus as $subMenu) {
                    $menuItems[] = [
                        'id' => $subMenu->id,
                        'title' => $subMenu->title,
                        'link' => $subMenu->seo_url,
                        'image' => $subMenu->image
                    ];
                }
                return $menuItems;
            }
        }
        return null;
    }
}
