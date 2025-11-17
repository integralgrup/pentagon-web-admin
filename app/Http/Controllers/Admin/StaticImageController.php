<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaticImage; // Assuming you have a StaticImage model
use App\Models\Language; // Assuming you have a Language model to fetch languages

class StaticImageController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::all();
        view()->share('languages', $this->languages);
    }

    public function index()
    {
        // Code to list all static texts
        $staticImages = StaticImage::where('lang', 'en')->get();
        //dd($staticTexts);
        
        //dd($staticImages);
        return view('admin.static_image.index', compact('staticImages'));
    }

    public function create()
    {
        // Code to show create form
        $this->languages = Language::all();
        return view('admin.static_image.create', ['languages' => $this->languages]);
    }

    public function store(Request $request)
    {
        //dd($request->all());

        if ($request->has('image_id')) {
            $image_id = $request->image_id; // Use the provided image_id
        }else{
            $image_id = StaticImage::max('image_id') + 1; // Increment the maximum image_id by 1
            if (!$image_id) {
                $image_id = 1; // If no image items exist, start with 1
            }
        }

        try {

            $languages = Language::all();
            
            //validation
            foreach ($languages as $language) {
                if($language->lang_code == 'en'){
                    $request->validate([
                        'title_' . $language->lang_code => 'required|max:400',
                        'image_' . $language->lang_code => 'nullable|image|max:2048', // Assuming image is optional
                        'alt_' . $language->lang_code => 'required|max:255',
                    ]);
                }
                if ($request->hasFile('image_en') || $request->hasFile('image_' . $language->lang_code)) {
                    $tmpImgPath = createTmpFile($request, 'image_en', $languages[0]);
                    $imageName = moveFile($request,$language,'image_' . $language->lang_code, 'image_en', 'alt_' . $language->lang_code, 'alt_en', $language->images_folder, $tmpImgPath);
                    //dd($imageName);
                }else{
                    $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                StaticImage::updateOrCreate(
                    ['image_id' => $image_id, 'lang' => $request->input('lang_' . $language->lang_code)],
                    [
                        'title' => $request->input('title_' . $language->lang_code) ?? $request->input('title_en'),
                        'image' => $imageName,
                        'alt' => $request->input('alt_' . $language->lang_code) ?? $request->input('alt_en'),
                    ]
                );

            }

            return redirect()->route('admin.static_image.index')->with('success', 'Sabit Görsel başarıyla kaydedildi.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        // Code to update static text
        $textId = $request->input('text_id');

        foreach($this->languages as $language) {
            $request->validate([
                'static_text.' . $language->lang_code => 'nullable|max:5000',
            ]);

            StaticText::updateOrCreate(
                ['text_id' => $textId, 'lang' => $language->lang_code],
                [
                    'title' => $request->input('static_text.' . $language->lang_code) ?? $request->input('static_text.en'),
                ]
            );
        }

        return redirect()->back()->with('success', 'Statik text başarıyla güncellendi.');
    }

    public function edit($id)
    {
        // Code to show edit form
        $staticImages = StaticImage::where('image_id', $id)->get();
        return view('admin.static_image.edit', compact('staticImages'));
    }

    public function destroy($id)
    {
        // Code to delete static text
        $staticImage = StaticImage::where('image_id', $id)->get();
        foreach ($staticImage as $image) {
            $image->delete();
        }
        return redirect()->back()->with('success', 'Statik görsel başarıyla silindi.');
    }
}
