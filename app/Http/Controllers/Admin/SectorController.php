<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Language; // Assuming you have a Language model to fetch languages
use Illuminate\Support\Facades\DB; // For database operations

class SectorController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::all();
        view()->share('languages', $this->languages);
    }
    // Display a list of sectors
    public function index()
    {
        $sectors = Sector::where('lang', app()->getLocale())->get();
        return view('admin.sector.index', compact('sectors'));
    }

    // Show form to create a new sector
    public function create()
    {
        return view('admin.sector.create');
    }

    // Store new sector in database
    public function store(Request $request)
    {
        if ($request->has('sector_id')) {
                $sector_id = $request->sector_id; // Use the provided sector_id
            }else{
                $sector_id = Sector::max('sector_id') + 1; // Increment the maximum sector_id by 1
                if (!$sector_id) {
                    $sector_id = 1; // If no sector items exist, start with 1
                }
            }
        try {
            foreach($this->languages as $language){
                $request->validate([
                    'lang_'.$language->lang_code => 'required|string|max:10',
                    'title_'.$language->lang_code => 'required|string|max:100',
                    'title_1_'.$language->lang_code => 'required|string|max:255',
                    'seo_url_'.$language->lang_code => 'required|string|max:255',
                    'description_'.$language->lang_code => 'required|string',
                    'bg_image_'.$language->lang_code => 'nullable|image',
                    'image_'.$language->lang_code => 'nullable|image',
                    'alt_'.$language->lang_code => 'required|string|max:255',
                    'seo_title_'.$language->lang_code => 'nullable|string|max:255',
                    'seo_description_'.$language->lang_code => 'nullable|string|max:255',
                    'seo_keywords_'.$language->lang_code => 'nullable|string|max:255',
                ]);

                if ($request->hasFile('image_' . $language->lang_code)) {

                        $image = $request->file('image_' . $language->lang_code);
                        $imageName = seoUrl($request->input('alt_' . $language->lang_code)) . '_' . time() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path($language->lang_code.'/'.$language->uploads_folder.'/'.$language->sector_images_folder), $imageName); // Save to public/uploads/blog

                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                if ($request->hasFile('bg_image_' . $language->lang_code)) {

                        $bgImage = $request->file('bg_image_' . $language->lang_code);
                        $bgImageName = seoUrl($request->input('alt_' . $language->lang_code)) . '_bg_' . time() . '.' . $bgImage->getClientOriginalExtension();
                        $bgImage->move(public_path($language->lang_code.'/'.$language->uploads_folder.'/'.$language->sector_images_folder), $bgImageName); // Save to public/uploads/blog

                } else {
                    $bgImageName = $request->input('old_bg_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                $data = [
                    'sector_id' => $sector_id,
                    'lang' => $language->lang_code,
                    'title' => $request->input('title_'.$language->lang_code),
                    'title_1' => $request->input('title_1_'.$language->lang_code),
                    'seo_url' => $request->input('seo_url_'.$language->lang_code),
                    'description' => $request->input('description_'.$language->lang_code),
                    'bg_image' => $bgImageName,
                    'image' => $imageName,
                    'alt' => $request->input('alt_'.$language->lang_code),
                    'seo_title' => $request->input('seo_title_'.$language->lang_code),
                    'seo_description' => $request->input('seo_description_'.$language->lang_code),
                    'seo_keywords' => $request->input('seo_keywords_'.$language->lang_code),
                ];

                Sector::updateOrCreate(
                    ['sector_id' => $sector_id, 'lang' => $language->lang_code],
                    $data
                );

                
            }

            return redirect()->route('admin.sector.index')->with('success', 'Sektör başarıyla kaydedildi!');

        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('admin.sector.index')->with('error', 'Sektör kaydedilirken bir hata oluştu!');
        }
    }

    // Show form to edit sector
    public function edit(Sector $sector)
    {
        $sectors = Sector::where('sector_id', $sector->sector_id)->get();
        return view('admin.sector.edit', compact('sector', 'sectors'));
    }

    // Update sector
    public function update(Request $request, Sector $sector)
    {
        $request->validate([
            'lang' => 'required|string|max:10',
            'title' => 'required|string|max:100',
            'title_1' => 'required|string|max:255',
            'description' => 'required|string',
            'bg_image' => 'nullable|image',
            'image' => 'nullable|image',
            'alt' => 'required|string|max:255',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'seo_keywords' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('bg_image')) {
            $data['bg_image'] = $request->file('bg_image')->store('sectors', 'public');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sectors', 'public');
        }

        $sector->update($data);

        return redirect()->route('admin.sector.index')->with('success', 'Sector updated successfully!');
    }

    // Delete sector
    public function destroy(Sector $sector)
    {
        $sector->delete();
        return redirect()->route('admin.sector.index')->with('success', 'Sector deleted successfully!');
    }

    public function slider1Index($id)
    {
        // code to list all sliders for a specific sector where lang is en use DB Facade
        $sliders = DB::table('sector_slider_1')->where(['sector_id' => $id, 'lang' => 'en'])->get();
        return view('admin.sector.slider1.index', compact('sliders', 'id'));
    }

    // slider1 create method
    public function slider1Create($id)
    {
        
        return view('admin.sector.slider1.create', compact('id'));
    }

    // slider1 store method
    public function slider1Store(Request $request, $id)
    {

        //dd($request->all());

        try {

            if($request->has('slider_id')){
                $sliderId = $request->input('slider_id');
            }else{
                // Select max id
                $sliderId = DB::table('sector_slider_1')->where('sector_id', $id)->max('id') + 1;
            }


            foreach ($this->languages as $language) {

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
                    $image->move(public_path($language->lang_code . '/' . $language->uploads_folder . '/' . $language->sector_images_folder), $imageName);
                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null);
                }

                //DB::table('sector_slider_1') updateOrCreate
                $record = DB::table('sector_slider_1')
                    ->where('slider_id', $sliderId)
                    ->where('lang', $language->lang_code)
                    ->first();

                if ($record) {
                    DB::table('sector_slider_1')
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
                    DB::table('sector_slider_1')->insert([
                        'slider_id' => $sliderId,
                        'lang' => $language->lang_code,
                        'sector_id' => $id,
                        'slider_id' => $sliderId,
                        'title' => $request->input('title_' . $language->lang_code),
                        'title_1' => $request->input('title_1_' . $language->lang_code),
                        'description' => $request->input('description_' . $language->lang_code),
                        'image' => $imageName,
                        'alt' => $request->input('alt_' . $language->lang_code),
                    ]);
                }

            }

            return redirect()->back()->with('success', 'Slider başarıyla eklendi.');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $th->getMessage()]);
        }

        
    }

    // Slider1 edit method
    public function slider1Edit($id, $sliderId)
    {
        //get sliders array with the specified slider_id, I don't need first row
        $sliders = DB::table('sector_slider_1')->where('slider_id', $sliderId)->get();

        return view('admin.sector.slider1.edit', compact('sliders', 'id', 'sliderId'));
    }


    // slider1 destroy
    public function slider1Destroy($id, $sliderId)
    {
        DB::table('brand_slider_1')->where('id', $sliderId)->delete();
        return redirect()->route('admin.brand.slider1.index', $id)->with('success', 'Slider başarıyla silindi.');
    }

    // Slider2 methods
    public function slider2Index($id)
    {
        // code to list all sliders for a specific sector where lang is en use DB Facade
        $sliders = DB::table('sector_slider_2')->where(['sector_id' => $id, 'lang' => 'en'])->get();
        return view('admin.sector.slider2.index', compact('sliders', 'id'));
    }

    // slider1 create method
    public function slider2Create($id)
    {

        return view('admin.sector.slider2.create', compact('id'));
    }

    // slider1 store method
    public function slider2Store(Request $request, $id)
    {

        //dd($request->all());

        try {

            if($request->has('slider_id')){
                $sliderId = $request->input('slider_id');
            }else{
                // Select max id
                $sliderId = DB::table('sector_slider_2')->where('sector_id', $id)->max('id') + 1;
            }


            foreach ($this->languages as $language) {

                //Validation
                $request->validate([
                    'title_' . $language->lang_code => 'required|string|max:255',
                    'alt_' . $language->lang_code => 'required|string|max:255',
                    'image_' . $language->lang_code => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]); 

                if ($request->hasFile('image_' . $language->lang_code)) {
                    $image = $request->file('image_' . $language->lang_code);
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code)) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($language->lang_code . '/' . $language->uploads_folder . '/' . $language->sector_images_folder), $imageName);
                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null);
                }

                //DB::table('sector_slider_1') updateOrCreate
                $record = DB::table('sector_slider_2')
                    ->where('slider_id', $sliderId)
                    ->where('lang', $language->lang_code)
                    ->first();

                if ($record) {
                    DB::table('sector_slider_2')
                        ->where('slider_id', $sliderId)
                        ->where('lang', $language->lang_code)
                        ->update([
                            'title' => $request->input('title_' . $language->lang_code),
                            'image' => $imageName,
                            'alt' => $request->input('alt_' . $language->lang_code),
                        ]);
                } else {
                    DB::table('sector_slider_2')->insert([
                        'slider_id' => $sliderId,
                        'lang' => $language->lang_code,
                        'sector_id' => $id,
                        'slider_id' => $sliderId,
                        'title' => $request->input('title_' . $language->lang_code),
                        'image' => $imageName,
                        'alt' => $request->input('alt_' . $language->lang_code),
                    ]);
                }

            }

            return redirect()->back()->with('success', 'Slider başarıyla eklendi.');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $th->getMessage()]);
        }

        
    }

    // Slider2 edit method
    public function slider2Edit($id, $sliderId)
    {
        //get sliders array with the specified slider_id, I don't need first row
        $sliders = DB::table('sector_slider_2')->where('slider_id', $sliderId)->get();

        return view('admin.sector.slider2.edit', compact('sliders', 'id', 'sliderId'));
    }


    // slider2 destroy
    public function slider2Destroy($id, $sliderId)
    {
        DB::table('sector_slider_2')->where('id', $sliderId)->delete();
        return redirect()->route('admin.sector.slider2.index', $id)->with('success', 'Slider başarıyla silindi.');
    }
}
