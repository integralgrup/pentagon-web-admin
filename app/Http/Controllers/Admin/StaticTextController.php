<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaticText; // Assuming you have a StaticText model
use App\Models\Language; // Assuming you have a Language model to fetch languages

class StaticTextController extends Controller
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
        $staticTexts = StaticText::where('lang', app()->getLocale())->get();
        return view('admin.static_text.index', compact('staticTexts'));
    }

    public function create()
    {
        // Code to show create form
        $this->languages = Language::all();
        return view('admin.static_text.create', ['languages' => $this->languages]);
    }

    public function store(Request $request)
    {
        // Code to store static text
        try {
        if($request->has('text_id')) {
            $textId = $request->text_id; // Use the provided text_id
        } else {
            $textId = StaticText::max('text_id') + 1; // Increment the maximum text_id by 1
            if (!$textId) {
                $textId = 1; // If no texts exist, start with 1
            }
        }

        foreach($this->languages as $language) {
            $request->validate([
                'title_' . $language->lang_code => 'required|max:255',
                'page_name_' . $language->lang_code => 'required|max:255',
            ]);

            StaticText::updateOrCreate(
                ['text_id' => $textId, 'lang' => $language->lang_code],
                [
                    'title' => $request->input('title_' . $language->lang_code),
                    'page_name' => $request->input('page_name_' . $language->lang_code),
                ]
            );
        }

        return redirect()->back()->with('success', 'Statik text başarıyla kaydedildi.');

       } catch (\Throwable $th) {
        throw $th;
       }
    }

    public function edit($id)
    {
        // Code to show edit form
        $staticText = StaticText::where('text_id', $id)->get();
        return view('admin.static_text.edit', compact('staticText'));
    }

    public function destroy($id)
    {
        // Code to delete static text
        $staticText = StaticText::where('text_id', $id)->get();
        foreach ($staticText as $text) {
            $text->delete();
        }
        return redirect()->back()->with('success', 'Statik text başarıyla silindi.');
    }
}
