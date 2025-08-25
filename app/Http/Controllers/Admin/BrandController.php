<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Language; // Assuming you have a Language model to fetch languages
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{

    public function index()
    {
        // code to list all brands where lang is en
        $brands = Brand::where('lang', 'en')->get();
        //dd($brands);
        $languages = Language::all(); // Assuming you have a Language model to fetch languages
        return view('admin.brand.index', compact('brands', 'languages'));
    }

    public function create()
    {
        // code to show create brand form
        $languages = Language::all();
        return view('admin.brand.create', compact('languages'));
    }

    public function store(Request $request)
    {
        // code to store new brand

        //dd($request->all());

        if ($request->has('brand_id')) {
                $brand_id = $request->brand_id; // Use the provided brand_id
            }else{
                $brand_id = Brand::max('brand_id') + 1; // Increment the maximum brand_id by 1
                if (!$brand_id) {
                    $brand_id = 1; // If no brand items exist, start with 1
                }
            }
        try {

             $languages = Language::all();
            
            //validation
            foreach ($languages as $language) {
                
                $request->validate([
                    'title_' . $language->lang_code => 'required|max:100',
                    'title_1_' . $language->lang_code => 'required|max:100',
                    'url_' . $language->lang_code => 'required|max:255',
                    'seo_url_' . $language->lang_code => 'required|max:255',
                    'description_' . $language->lang_code => 'required',
                    'bg_image_' . $language->lang_code => 'nullable|max:2048|mimes:webp,svg,jpg,jpeg,png', // Assuming image is optional
                    // webp or svg or jpg or png
                    'image_' . $language->lang_code => 'nullable|max:2048|mimes:webp,svg,jpg,jpeg,png',
                    'alt_' . $language->lang_code => 'required|max:255',
                    'url_' . $language->lang_code => 'required|max:255',
                    'seo_title_' . $language->lang_code => 'nullable|max:255',
                    'seo_description_' . $language->lang_code => 'nullable|max:255',
                    'seo_keywords_' . $language->lang_code => 'nullable|max:255',
                ]);

                // save image if it exists
                if ($request->hasFile('image_' . $language->lang_code)) {
                    
                    $image = $request->file('image_' . $language->lang_code);
                    // Add original file extension
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code)) .  '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($language->lang_code.'/'.$language->uploads_folder.'/'.$language->brand_images_folder), $imageName);
                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                if ($request->hasFile('bg_image_' . $language->lang_code)) {
                    $bgImage = $request->file('bg_image_' . $language->lang_code);
                    // Add original file extension
                    $bgImageName = seoUrl($request->input('alt_' . $language->lang_code)) .  '_bg_' . time() . '.' . $bgImage->getClientOriginalExtension();
                    $bgImage->move(public_path($language->lang_code.'/'.$language->uploads_folder.'/'.$language->brand_images_folder), $bgImageName);
                } else {
                    $bgImageName = $request->input('old_bg_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                Brand::updateOrCreate(
                    ['brand_id' => $brand_id, 'lang' => $language->lang_code],
                    [
                        'title' => $request->input('title_' . $language->lang_code),
                        'title_1' => $request->input('title_1_' . $language->lang_code),
                        'url' => $request->input('url_' . $language->lang_code),
                        'bg_image' => $bgImageName,
                        'description' => $request->input('description_' . $language->lang_code),
                        'image' => $imageName,
                        'alt' => $request->input('alt_' . $language->lang_code),
                        'seo_url' => $request->input('seo_url_' . $language->lang_code),
                        'seo_title' => $request->input('seo_title_' . $language->lang_code),
                        'seo_description' => $request->input('seo_description_' . $language->lang_code),
                        'seo_keywords' => $request->input('seo_keywords_' . $language->lang_code),
                    ]
                );

            }



            return redirect()->route('admin.brand')->with('success', 'Marka başarıyla kaydedildi.');
        } catch (\Exception $e) {
            //return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
            dd($e);
        }
    }

    public function edit($id)
    {
        // code to show edit brand form
        $brands = Brand::where('brand_id', $id)->get();
        //dd($brands);
        $languages = Language::all();

        return view('admin.brand.edit', compact('brands', 'languages'));
    }

    public function destroy($id)
    {
        // code to delete brand
        Brand::where('brand_id', $id)->delete();
        //BrandSlider::where('brand_id', $id)->delete();
        return redirect()->route('admin.brand')->with('success', 'Marka başarıyla silindi.');
    }

    // Additional methods for brand slider1 can be added here if needed

    // For example, you can add methods for creating, updating, and deleting brand sliders

    public function slider1Index($id)
    {
        // code to list all sliders for a specific brand where lang is en use DB Facade
        $sliders = DB::table('brand_slider_1')->where(['brand_id' => $id, 'lang' => 'en'])->get();
        return view('admin.brand.slider1.index', compact('sliders', 'id'));
    }

    // slider1 create method
    public function slider1Create($id)
    {
        $languages = Language::all();
        return view('admin.brand.slider1.create', compact('id', 'languages'));
    }

    // slider1 store method
    public function slider1Store(Request $request, $id)
    {
        $languages = Language::all();

        //dd($request->all());

        try {

            if($request->has('slider_id')){
                $sliderId = $request->input('slider_id');
                // Update existing slider
            }else{
                // Select max id
                $sliderId = DB::table('brand_slider_1')->where('brand_id', $id)->max('id') + 1;
            }


            foreach ($languages as $language) {

                //Validation
                $request->validate([
                    'title_' . $language->lang_code => 'required|string|max:255',
                    'title_1_' . $language->lang_code => 'required|string|max:255',
                    'description_' . $language->lang_code => 'required|string',
                    'alt_' . $language->lang_code => 'required|string|max:255',
                    'image_' . $language->lang_code => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]); 

                if ($request->hasFile('image_' . $language->lang_code)) {
                    $image = $request->file('image_' . $language->lang_code);
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code)) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($language->lang_code . '/' . $language->uploads_folder . '/' . $language->brand_images_folder), $imageName);
                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null);
                }

                //DB::table('brand_slider_1') updateOrCreate
                $record = DB::table('brand_slider_1')
                    ->where('slider_id', $sliderId)
                    ->where('lang', $language->lang_code)
                    ->first();

                if ($record) {
                    DB::table('brand_slider_1')
                        ->where('slider_id', $sliderId)
                        ->where('lang', $language->lang_code)
                        ->update([
                            'title' => $request->input('title_' . $language->lang_code),
                            'title_1' => $request->input('title_1_' . $language->lang_code),
                            'description' => $request->input('description_' . $language->lang_code),
                            'image' => $imageName,
                            'alt' => $request->input('alt_' . $language->lang_code),
                        ]);
                } else {
                    DB::table('brand_slider_1')->insert([
                        'slider_id' => $sliderId,
                        'lang' => $language->lang_code,
                        'brand_id' => $id,
                        'slider_id' => $sliderId,
                        'title' => $request->input('title_' . $language->lang_code),
                        'title_1' => $request->input('title_1_' . $language->lang_code),
                        'description' => $request->input('description_' . $language->lang_code),
                        'image' => $imageName,
                        'alt' => $request->input('alt_' . $language->lang_code),
                    ]);
                }

            }

            return redirect()->route('admin.brand.slider1.index', $id)->with('success', 'Slider başarıyla eklendi.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $th->getMessage()]);
        }

        
    }

    // Slider1 edit method
    public function slider1Edit($id, $sliderId)
    {
        $languages = Language::all();
        //get sliders array with the specified slider_id, I don't need first row
        $sliders = DB::table('brand_slider_1')->where('slider_id', $sliderId)->get();

        return view('admin.brand.slider1.edit', compact('sliders', 'id', 'sliderId', 'languages'));
    }


    // slider1 destroy
    public function slider1Destroy($id, $sliderId)
    {
        DB::table('brand_slider_1')->where('id', $sliderId)->delete();
        return redirect()->route('admin.brand.slider1.index', $id)->with('success', 'Slider başarıyla silindi.');
    }

    // Slider2 Index
    public function slider2Index($id)
    {
        // code to list all sliders for a specific brand where lang is en use DB Facade
        $sliders = DB::table('brand_slider_2')->where(['brand_id' => $id, 'lang' => 'en'])->get();
        return view('admin.brand.slider2.index', compact('sliders', 'id'));
    }

    // slider2 create method
    public function slider2Create($id)
    {
        $languages = Language::all();
        return view('admin.brand.slider2.create', compact('id', 'languages'));
    }

    // slider2 store method
    public function slider2Store(Request $request, $id)
    {
        $languages = Language::all();

        //dd($request->all());

        try {

            if($request->has('slider_id')){
                $sliderId = $request->input('slider_id');
                // Update existing slider
            }else{
                // Select max id
                $sliderId = DB::table('brand_slider_2')->where('brand_id', $id)->max('id') + 1;
            }


            foreach ($languages as $language) {

                //Validation
                $request->validate([
                    'title_' . $language->lang_code => 'required|string|max:255',
                    'description_' . $language->lang_code => 'required|string|max:255',
                    'category_' . $language->lang_code => 'required|string|max:255',
                    'url_' . $language->lang_code => 'required|string|max:255',
                    'alt_' . $language->lang_code => 'required|string|max:255',
                    'image_' . $language->lang_code => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]); 

                if ($request->hasFile('image_' . $language->lang_code)) {
                    $image = $request->file('image_' . $language->lang_code);
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code)) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($language->lang_code . '/' . $language->uploads_folder . '/' . $language->brand_images_folder), $imageName);
                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null);
                }

                //DB::table('brand_slider_2') updateOrCreate
                $record = DB::table('brand_slider_2')
                    ->where('slider_id', $sliderId)
                    ->where('lang', $language->lang_code)
                    ->first();

                if ($record) {
                    DB::table('brand_slider_2')
                        ->where('slider_id', $sliderId)
                        ->where('lang', $language->lang_code)
                        ->update([
                            'title' => $request->input('title_' . $language->lang_code),
                            'description' => $request->input('description_' . $language->lang_code),
                            'category' => $request->input('category_' . $language->lang_code),
                            'url' => $request->input('url_' . $language->lang_code),
                            'image' => $imageName,
                            'alt' => $request->input('alt_' . $language->lang_code),
                        ]);
                } else {
                    DB::table('brand_slider_2')->insert([
                        'slider_id' => $sliderId,
                        'lang' => $language->lang_code,
                        'brand_id' => $id,
                        'slider_id' => $sliderId,
                        'title' => $request->input('title_' . $language->lang_code),
                        'description' => $request->input('description_' . $language->lang_code),
                        'category' => $request->input('category_' . $language->lang_code),
                        'url' => $request->input('url_' . $language->lang_code),
                        'image' => $imageName,
                        'alt' => $request->input('alt_' . $language->lang_code),
                    ]);
                }

            }

            return redirect()->route('admin.brand.slider2.index', $id)->with('success', 'Slider başarıyla eklendi.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $th->getMessage()]);
        }

        
    }

    // Slider2 edit method
    public function slider2Edit($id, $sliderId)
    {
        $languages = Language::all();
        //get sliders array with the specified slider_id, I don't need first row
        $sliders = DB::table('brand_slider_2')->where('slider_id', $sliderId)->get();

        return view('admin.brand.slider2.edit', compact('sliders', 'id', 'sliderId', 'languages'));
    }


    // slider2 destroy
    public function slider2Destroy($id, $sliderId)
    {
        DB::table('brand_slider_2')->where('id', $sliderId)->delete();
        return redirect()->route('admin.brand.slider2.index', $id)->with('success', 'Slider başarıyla silindi.');
    }

}
