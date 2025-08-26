<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Language;
use App\Models\Sector;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\BlogSlider;
use App\Models\About;
use App\Models\Menu;
use App\Models\Career;
use App\Models\CareerJob;
use App\Models\CareerSlider;
use App\Models\Catalog;
use App\Models\CatalogGroup;
use App\Models\Office;
use App\Models\Page;
use Illuminate\Support\Facades\DB;


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
            $how_we_do = DB::table('about_how_we_do')->where('lang', app()->getLocale())->get()->toArray();
            $what_we_do =  DB::table('about_what_we_do')->where('lang', app()->getLocale())->get()->toArray();
            $memberships = DB::table('about_memberships')->where('lang', app()->getLocale())->get()->toArray();
            //debug($memberships);
            $politics = DB::table('about_politics')->where('lang', app()->getLocale())->get()->toArray();
            //dd($politics);
            return view('about', compact('about', 'how_we_do', 'what_we_do', 'memberships', 'politics'));
        }

        if($menu->page_type == 'sector') {
            if($slug2!= null) {
                $sector = Sector::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->first();
                $slider1 = DB::table('sector_slider_1')->where(['lang' => app()->getLocale(), 'sector_id' => $sector->sector_id])->get();
                $slider2 = DB::table('sector_slider_2')->where(['lang' => app()->getLocale(), 'sector_id' => $sector->sector_id])->get();
                //dd($slider1, $slider2);
                return view('sector', compact('sector', 'slider1', 'slider2'));
            }
            
        }

        if($menu->page_type == 'career') {
            $career = Career::where(['lang' => app()->getLocale()])->first();
            $careerJobs = CareerJob::where(['lang' => app()->getLocale()])->get();
            $careerSlider = CareerSlider::where(['lang' => app()->getLocale()])->get();
            if($slug2!= null) {
                $careerJob = CareerJob::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->first();
                return view('career-job', compact('career', 'careerJobs', 'careerJob'));
            }
            return view('career', compact('career', 'careerJobs', 'careerSlider'));
        }

        if($menu->page_type == 'brand') {
            if($slug2!= null) {
                $brand = Brand::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->first();
                $slider1 = DB::table('brand_slider_1')->where(['lang' => app()->getLocale(), 'brand_id' => $brand->brand_id])->get();
                $slider2 = DB::table('brand_slider_2')->where(['lang' => app()->getLocale(), 'brand_id' => $brand->brand_id])->get()->toArray();
               //debug($slider2);
                return view('brand', compact('brand', 'slider1', 'slider2'));
            }
            
        }

        if($menu->page_type == 'catalog') {
            
            if($slug2!= null) {
                $catalogGroup = CatalogGroup::where([
                    'lang' => app()->getLocale(),
                    'seo_url' => $slug2,
                ])
                ->with([
                    'catalogs' => function ($q) {
                        $q->where('lang', app()->getLocale())
                          ->with(['files' => function ($q2) {
                              $q2->where('lang', app()->getLocale());
                          }]);
                    }
                ])  
                // eager load related catalogs
                ->firstOrFail();
                return view('catalog', compact('catalogGroup'));
            }
        }

        if($menu->page_type == 'blog') {
            if($slug2!= null) {
                // Get blog posts limit 5 as array
                $blogs = Blog::where(['lang' => app()->getLocale()])->limit(5)->get()->toArray();
                //dd($blogs);
                $blog = Blog::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->firstOrFail();
                $blogSlider = BlogSlider::where(['lang' => app()->getLocale(), 'blog_id' => $blog->blog_id])->get();
                //dd($blogSlider);
                return view('blog-detail', compact('blog', 'blogs', 'blogSlider'));
            }else{
                $blogs = Blog::where(['lang' => app()->getLocale()])->limit(5)->get()->toArray();
                return view('blog', compact('blogs'));
            }
            
        }

        if($menu->page_type == 'contact') {
            $offices = Office::where(['lang' => app()->getLocale()])->get();
            return view('contact', compact('offices'));
        }

        if($menu->page_type == 'page') {
            $page = Page::where(['lang' => app()->getLocale(), 'seo_url' => $slug])->first();
            //dd($page);
            return view('page', compact('page'));
        }

        //return view('page', compact('page'));
    }
}
