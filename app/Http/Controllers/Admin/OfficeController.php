<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\Language;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::all();
        view()->share('languages', $this->languages);
    }
    /**
     * Display a listing of the offices.
     */
    public function index()
    {
        $offices = Office::where('lang', app()->getLocale())->orderBy('sort', 'asc')->get();
        return view('admin.office.index', compact('offices'));
    }

    /**
     * Show the form for creating a new office.
     */
    public function create()
    {
        return view('admin.office.create');
    }

    /**
     * Store a newly created office in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        try {
            if($request->has('office_id')){
                $office_id = $request->input('office_id');
            }else{
                $office_id = Office::max('office_id') + 1;
                if(!$office_id) {
                    $office_id = 1;
                }
            }
            foreach($this->languages as $language) {
                $data = $request->validate([
                    'title_' . $language->lang_code => 'required|string|max:100',
                    'description_' . $language->lang_code => 'required|string',
                    'lat_' . $language->lang_code => 'required|string|max:50',
                    'long_' . $language->lang_code => 'required|string|max:50',
                ]);

                Office::updateOrCreate(
                    ['office_id' => $office_id, 'lang' => $language->lang_code],
                    [
                        'title' => $data['title_' . $language->lang_code],
                        'description' => $data['description_' . $language->lang_code],
                        'lat' => $data['lat_' . $language->lang_code],
                        'long' => $data['long_' . $language->lang_code],
                    ]
                );
            }
            return redirect()->back()->with('success', 'Ofis başarıyla kaydedildi.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified office.
     */
    public function edit(Office $office)
    {
        $offices = Office::where('office_id', $office->office_id)->get();
        return view('admin.office.edit', compact('offices'));
    }

    /**
     * Update the specified office in storage.
     */
    public function update(Request $request, Office $office)
    {
        $validated = $request->validate([
            'lang' => 'required|string|max:10',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'lat' => 'required|string|max:50',
            'long' => 'required|string|max:50',
            'sort' => 'nullable|integer',
        ]);

        $office->update($validated);

        return redirect()->route('admin.office.index')->with('success', 'Office updated successfully.');
    }

    /**
     * Remove the specified office from storage.
     */
    public function destroy(Office $office)
    {
        $office->delete();

        return redirect()->route('admin.office.index')->with('success', 'Office deleted successfully.');
    }
}
