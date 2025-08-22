<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Language;
use App\Models\Sector;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\About;
use App\Models\Menu;
use App\Models\Career;
use App\Models\Catalog;
use App\Models\Office;


class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('lang', app()->getLocale())->get();
        $languages = Language::all();
        $sectors = Sector::where('lang', app()->getLocale())->get();
        $brands = Brand::where('lang', app()->getLocale())->get();
        $blogs = Blog::where('lang', app()->getLocale())->get();
        $about = About::where('lang', app()->getLocale())->first();

        return view('home', compact('sliders', 'languages', 'sectors', 'brands', 'blogs', 'about'));
    }

    public function route($slug, $slug2 = null)
    {
        $menu = Menu::where(['seo_url' => $slug, 'lang' => app()->getLocale()])->firstOrFail();
        //dd($menu);
        // If the menu item has a page_type of 'about', fetch the about data
        if($menu->page_type == 'about') {
            $about = About::where('lang', app()->getLocale())->first();
            return view('about', compact('about'));
        }

        if($menu->page_type == 'sector') {
            $sector = Sector::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->first();
            return view('sector', compact('sector'));
        }

        if($menu->page_type == 'career') {
            $career = Career::where(['lang' => app()->getLocale()])->first();
            return view('career', compact('career'));
        }

        if($menu->page_type == 'brand') {
            $brand = Brand::where(['lang' => app()->getLocale()])->first();
            return view('brand', compact('brand'));
        }

        if($menu->page_type == 'catalog') {
            $catalog = Catalog::where(['lang' => app()->getLocale()])->first();
            return view('catalog', compact('catalog'));
        }

        if($menu->page_type == 'blog') {
            if($slug2!= null) {
                $blog = Blog::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->firstOrFail();
                return view('blog-detail', compact('blog'));
            }else{
                $blog = Blog::where(['lang' => app()->getLocale()])->first();
                return view('blog', compact('blog'));
            }
            
        }

        if($menu->page_type == 'contact') {
            $offices = Office::where(['lang' => app()->getLocale()])->get();
            return view('contact', compact('offices'));
        }

        //return view('page', compact('page'));
    }
}
