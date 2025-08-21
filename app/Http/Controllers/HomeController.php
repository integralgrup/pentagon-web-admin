<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Language;
use App\Models\Sector;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\About;


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
}
