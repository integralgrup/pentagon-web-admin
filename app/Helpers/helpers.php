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
            return implode('/', (array)$folder_name);
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

if(!function_exists('getStaticText')) {
    function getStaticText($text_id = null)
    {
        $lang = app()->getLocale();
        if ($text_id) {
            $staticText = DB::table('static_text')->where('lang', $lang)->where('text_id', $text_id)->first();
            if ($staticText) {
                return $staticText->title;
            }
        }
        return null;
    }
}
if(!function_exists('createTmpFile')) {
    function createTmpFile($request, $inputName, $language)
    {
        if($request->hasFile($inputName)){
            //save image to temp folder
            $image = $request->file($inputName);
            $imageName = $language->lang_code . '-' . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $tmpPath = $language->path.'/'.$language->uploads_folder.'/'.$language->images_folder . '/temp/';

            if (!file_exists($tmpPath)) {
                mkdir($tmpPath, 0777, true);
            }

            copy($image->getRealPath(), $tmpPath . $imageName);

            $tmpImgPath = $tmpPath . $imageName;

            return $tmpImgPath;
        }
    }
}

if(!function_exists('moveFile')) {
    function moveFile($request, $language, $fileName, $enFileName, $imgTitle, $enImgTitle, $folderName, $tmpImgPath = null)
    {
        $image = $request->file($fileName) ?? $request->file($enFileName);
        $imageName = seoUrl($request->input($imgTitle) ?? $request->input($enImgTitle)) . '_' . time() . '.' . $image->getClientOriginalExtension();
        $folderPath = $language->path.'/'.$language->uploads_folder.'/'.$folderName ;
        $imgPath = $folderPath .'/'. $imageName;

        if(!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        if(isset($tmpImgPath) && file_exists($tmpImgPath)) {
            copy($tmpImgPath, $imgPath);
        }else{
            $image->move($folderPath, $imageName); // Move the image to the specified folder
        }
        return $imageName;
    }
}