<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterInfo; // Assuming you have a FooterInfo model
use App\Models\Language; // Assuming you have a Language model to fetch languages

class FooterInfoController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::all();
        view()->share('languages', $this->languages);
    }

    public function index()
    {
        $footerInfo = FooterInfo::all();
        return view('admin.footer_info.index', compact('footerInfo'));
    }

    public function create()
    {
        $footerInfo = FooterInfo::all();
        if($footerInfo->isEmpty()) {
            return view('admin.footer_info.create');
        }else{
            return view('admin.footer_info.edit', compact('footerInfo'));
        }
    }

    public function store(Request $request)
    {
        try {

            foreach($this->languages as $language) {
                $request->validate([
                    'address_' . $language->lang_code => 'required|max:255',
                    'phone_' . $language->lang_code => 'required|max:255',
                    'email_' . $language->lang_code => 'required|email|max:255',
                    'map_url_' . $language->lang_code => 'required|max:255',
                    'facebook_url_' . $language->lang_code => 'required|max:255',
                    'youtube_url_' . $language->lang_code => 'nullable|max:255',
                    'linkedin_url_' . $language->lang_code => 'nullable|max:255',
                    'x_url_' . $language->lang_code => 'nullable|max:255',
                    'instagram_url_' . $language->lang_code => 'nullable|max:255',
                ]);

                FooterInfo::updateOrCreate(
                    ['lang' => $language->lang_code],
                    [
                        'address' => $request->input('address_' . $language->lang_code),
                        'phone' => $request->input('phone_' . $language->lang_code),
                        'email' => $request->input('email_' . $language->lang_code),
                        'map_url' => $request->input('map_url_' . $language->lang_code),
                        'facebook_url' => $request->input('facebook_url_' . $language->lang_code),
                        'youtube_url' => $request->input('youtube_url_' . $language->lang_code),
                        'linkedin_url' => $request->input('linkedin_url_' . $language->lang_code),
                        'x_url' => $request->input('x_url_' . $language->lang_code),
                        'instagram_url' => $request->input('instagram_url_' . $language->lang_code),
                    ]
                );
            }

            return redirect()->back()->with('success', 'Footer bilgisi başarıyla kaydedildi.');

       } catch (\Throwable $th) {
            throw $th;
       }
    }

    public function edit($id)
    {
        $footerInfo = FooterInfo::all();
        return view('admin.footer_info.edit', compact('footerInfo'));
    }

    public function destroy($id)
    {
        $footerInfo = FooterInfo::findOrFail($id);
        $footerInfo->delete();
        return redirect()->route('admin.footer_info.index');
    }
}
