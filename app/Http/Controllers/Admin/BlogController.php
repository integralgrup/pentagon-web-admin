<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogSlider; // Assuming you have a BlogSlider model for the blog slider
use App\Models\Language; // Assuming you have a Language model to fetch languages

class BlogController extends Controller
{

    public function index()
    {
        // code to list all blogs where lang is en
        $blogs = Blog::where('lang', 'en')->get();
        $languages = Language::all(); // Assuming you have a Language model to fetch languages
        return view('admin.blog.index', compact('blogs', 'languages'));
    }

    public function create()
    {
        // code to show create blog form
        $languages = Language::all();
        return view('admin.blog.create', compact('languages'));
    }

    public function store(Request $request)
    {
        // code to store new blog

        //dd($request->all());

        if ($request->has('blog_id')) {
                $blog_id = $request->blog_id; // Use the provided blog_id
            }else{
                $blog_id = Blog::max('blog_id') + 1; // Increment the maximum blog_id by 1
                if (!$blog_id) {
                    $blog_id = 1; // If no blog items exist, start with 1
                }
            }
        try {

             $languages = Language::all();
            
            //validation
            foreach ($languages as $language) {
                
                $request->validate([
                    'title_' . $language->lang_code => 'required|max:100',
                    'seo_url_' . $language->lang_code => 'required|max:255',
                    'description_' . $language->lang_code => 'required',
                    'image_' . $language->lang_code => 'nullable|image|max:2048', // Assuming image is optional
                    'alt_' . $language->lang_code => 'required|max:255',
                    'seo_title_' . $language->lang_code => 'nullable|max:255',
                    'seo_description_' . $language->lang_code => 'nullable|max:255',
                    'seo_keywords_' . $language->lang_code => 'nullable|max:255',
                ]);

                // save image if it exists
                if ($request->hasFile('image_' . $language->lang_code)) {
                    
                    $image = $request->file('image_' . $language->lang_code);
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code)) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($language->lang_code.'/'.$language->uploads_folder.'/'.$language->blog_images_folder), $imageName); // Save to public/uploads/blog

                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                Blog::updateOrCreate(
                    ['blog_id' => $blog_id, 'lang' => $language->lang_code],
                    [
                        'title' => $request->input('title_' . $language->lang_code),
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



            return redirect()->route('admin.blog')->with('success', 'Blog başarıyla kaydedildi.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        // code to show edit blog form
        $blogs = Blog::where('blog_id', $id)->get();
        //dd($blogs);
        $languages = Language::all();
        
        return view('admin.blog.edit', compact('blogs', 'languages'));
    }

    public function destroy($id)
    {
        // code to delete blog
        Blog::where('blog_id', $id)->delete();
        BlogSlider::where('blog_id', $id)->delete();
        return redirect()->route('admin.blog')->with('success', 'Blog başarıyla silindi.');
    }

    // Blog Slider Methods
    public function sliderIndex($id)
    {
        // code to list all sliders for a specific blog where lang is en
        $sliders = BlogSlider::where(['blog_id' => $id, 'lang' => 'en'])->get();
        return view('admin.blog.slider.index', compact('sliders', 'id'));
    }

    public function sliderCreate($id)
    {
        // code to show create blog slider form
        $languages = Language::all();
        return view('admin.blog.slider.create', compact('id', 'languages'));
    }

    public function sliderStore(Request $request, $id)
    {

        $languages = Language::all();

        try {
            if($request->has('slider_id')) {
            $slider_id = $request->slider_id; // Use the provided slider_id
        }
        else {
            $slider_id = BlogSlider::max('slider_id') + 1; // Increment the maximum slider_id by 1
            if (!$slider_id) {
                $slider_id = 1; // If no sliders exist, start with 1
            }
        }

        foreach ($languages as $language) {
            $request->validate([
                'image_' . $language->lang_code => 'nullable|mimes:jpg,jpeg,png,mp4|max:4096',
                'alt_' . $language->lang_code => 'required|max:255',
            ]);

            if ($request->hasFile('image_' . $language->lang_code)) {

                $image = $request->file('image_' . $language->lang_code);
                // Add original file extension
                $imageName = seoUrl($request->input('alt_' . $language->lang_code)) .  '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path($language->lang_code.'/'.$language->uploads_folder.'/'.$language->blog_images_folder), $imageName);

            }else {
                $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
            }

            BlogSlider::updateOrCreate(
                ['slider_id' => $slider_id, 'lang' => $language->lang_code],
                [
                    'blog_id' => $id,
                    'media_file' => $imageName,
                    'alt' => $request->input('alt_' . $language->lang_code),
                ]
            );
        }

        return redirect()->route('admin.blog.slider.index', $id)->with('success', 'Slider başarıyla kaydedildi.');
        } catch (\Throwable $th) {
            throw $th;
        }

        
    }

    public function sliderEdit($id, $slider_id)
    {
        $slider = BlogSlider::where('slider_id', $slider_id)->get();
        $languages = Language::all();
        return view('admin.blog.slider.edit', compact('slider', 'id', 'slider_id', 'languages'));
    }

    public function sliderUpdate(Request $request, $id, $slider_id)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
            'alt' => 'required|max:255',
        ]);

        $slider = BlogSlider::findOrFail($sliderId);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs(
                'images/blog/' . $id . '/slider',
                time() . '_' . $request->file('image')->getClientOriginalName(),
                'public'
            );
            $slider->image = basename($imagePath);
        }

        $slider->alt = $request->input('alt');
        $slider->save();

        return redirect()->route('admin.blog.slider.index', $id)->with('success', 'Slider başarıyla güncellendi.');
    }

    public function sliderDestroy($id, $sliderId)
    {
        BlogSlider::where('id', $sliderId)->delete();
        return redirect()->route('admin.blog.slider.index', $id)->with('success', 'Slider başarıyla silindi.');
    }

}
