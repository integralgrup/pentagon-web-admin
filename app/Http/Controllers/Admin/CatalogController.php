<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Catalog;
use App\Models\CatalogGroup;
use App\Models\CatalogFile;
use App\Models\Language;
use App\Models\Brand;

class CatalogController extends Controller
{
    // Catalog Group management functions

    protected $languages;

    public function __construct()
    {
        $this->languages = Language::all();
        view()->share('languages', $this->languages);
    }

    public function groupIndex()
    {
        $catalogGroups = CatalogGroup::where('lang', app()->getLocale())->get();
        return view('admin.catalog.group.index', compact('catalogGroups'));
    }

    public function groupCreate()
    {
        
        $brands = Brand::select('brand_id', DB::raw('MIN(title) as title'))
               ->groupBy('brand_id')
               ->get();


        return view('admin.catalog.group.create', compact('brands'));
    }

    public function groupStore(Request $request)
    {
       
       try {
            if($request->has('catalog_group_id')){
                    $catalog_group_id = $request->catalog_group_id; // Use the provided catalog_group_id
            }else{
                    $catalog_group_id = CatalogGroup::max('catalog_group_id') + 1; // Increment the maximum catalog_group_id by 1
                    if (!$catalog_group_id) {
                        $catalog_group_id = 1; // If no catalog groups exist, start with 1
                    }
                }



       foreach($this->languages as $language) {
            $request->validate([
                'title_' . $language->lang_code => 'required|max:255',
                'seo_url_' . $language->lang_code => 'required|max:255',
                'bg_image_' . $language->lang_code => 'nullable|image|max:2048', // Assuming image is optional
                'alt_' . $language->lang_code => 'required|max:255',
                'seo_title_' . $language->lang_code => 'nullable|max:255',
                'seo_description_' . $language->lang_code => 'nullable|max:255',
                'seo_keywords_' . $language->lang_code => 'nullable|max:255',
            ]);

            if ($request->hasFile('bg_image_' . $language->lang_code)) {

                    $image = $request->file('bg_image_' . $language->lang_code);
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code)) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($language->lang_code.'/'.$language->uploads_folder.'/'.$language->catalog_files_folder), $imageName); // Save to public/uploads/blog

            } else {
                $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
            }

            CatalogGroup::updateOrCreate(
                ['catalog_group_id' => $catalog_group_id, 'lang' => $language->lang_code],
                [
                    'brand_id' => $request->input('brand_id'),
                    'title' => $request->input('title_' . $language->lang_code),
                    'seo_url' => $request->input('seo_url_' . $language->lang_code),
                    'bg_image' => $imageName,
                    'alt' => $request->input('alt_' . $language->lang_code),
                    'seo_title' => $request->input('seo_title_' . $language->lang_code),
                    'seo_description' => $request->input('seo_description_' . $language->lang_code),
                    'seo_keywords' => $request->input('seo_keywords_' . $language->lang_code),
                ]
            );

        }
        return redirect()->back()->with('success', 'Katalog grubu başarıyla oluşturuldu/güncellendi.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $th->getMessage());
       }
       
    }

    public function groupEdit($id)
    {
        $catalogGroup = CatalogGroup::where('catalog_group_id', $id)->get();
        $brands = Brand::select('brand_id', DB::raw('MIN(title) as title'))
               ->groupBy('brand_id')
               ->get();
        return view('admin.catalog.group.edit', compact('catalogGroup', 'brands'));
    }

    public function groupDestroy($id)
    {
        $catalogGroup = CatalogGroup::findOrFail($id);
        $catalogGroup->delete();
        return redirect()->route('admin.catalog.group.index')->with('success', 'Catalog group deleted successfully.');
    }

    // Catalog methods
    public function catalogIndex($catalogGroupId)
    {
        $catalogs = Catalog::where(['catalog_group_id' => $catalogGroupId, 'lang' => app()->getLocale()])->get();
        return view('admin.catalog.catalog.index', compact('catalogs', 'catalogGroupId'));
    }

    public function catalogCreate($catalogGroupId)
    {
        $catalogGroup = CatalogGroup::findOrFail($catalogGroupId);
        return view('admin.catalog.catalog.create', compact('catalogGroup'));
    }

    public function catalogStore(Request $request)
    {
       try {
        if($request->has('catalog_id')) {
            $catalogId = $request->catalog_id; // Use the provided catalog_id
        } else {
            $catalogId = Catalog::max('catalog_id') + 1; // Increment the maximum catalog_id by 1
            if (!$catalogId) {
                $catalogId = 1; // If no catalogs exist, start with 1
            }
        }

        foreach($this->languages as $language) {
            $request->validate([
                'title_' . $language->lang_code => 'required|max:255',
            ]);

            Catalog::updateOrCreate(
                ['catalog_id' => $catalogId, 'lang' => $language->lang_code],
                [
                    'catalog_group_id' => $request->input('catalog_group_id'),
                    'title' => $request->input('title_' . $language->lang_code),
                    'sort' => $request->input('sort_' . $language->lang_code, 0), // Default sort to 0 if not provided
                ]
            );
        }

        return redirect()->back()->with('success', 'Katalog başarıyla oluşturuldu/güncellendi.');

       } catch (\Throwable $th) {
        throw $th;
       }
    }

    public function catalogEdit($id)
    {
        $catalogs = Catalog::where('catalog_id', $id)->get();
        $catalogGroup = CatalogGroup::findOrFail($catalogs->first()->catalog_group_id);
        return view('admin.catalog.catalog.edit', compact('catalogs', 'catalogGroup'));
    }

    public function catalogDestroy($id)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->delete();
        return redirect()->route('admin.catalog.index', $catalog->catalog_group_id)->with('success', 'Catalog deleted successfully.');
    }

    //CatalogFile methods
    public function catalogFileIndex($catalogId)
    {
        $catalogFiles = CatalogFile::where(['catalog_id' => $catalogId, 'lang' => app()->getLocale()])->get();
        return view('admin.catalog.file.index', compact('catalogFiles', 'catalogId'));
    }

    public function catalogFileCreate($catalogId)
    {
        $catalog = Catalog::findOrFail($catalogId);
        return view('admin.catalog.file.create', compact('catalog'));
    }

    public function catalogFileStore(Request $request)
    {
        try {
        if($request->has('file_id')) {
            $fileId = $request->file_id; // Use the provided file_id
        } else {
            $fileId = CatalogFile::max('file_id') + 1; // Increment the maximum file_id by 1
            if (!$fileId) {
                $fileId = 1; // If no files exist, start with 1
            }
        }

        foreach($this->languages as $language) {
            $request->validate([
                'catalog_id' => 'required|integer|exists:catalog,catalog_id',
                'title_' . $language->lang_code => 'required|max:255',
                'image_' . $language->lang_code => 'nullable|image|max:2048', // Assuming image is optional
                'file_' . $language->lang_code => 'nullable|file|mimes:pdf|max:10240', // 10MB Max
                'alt_' . $language->lang_code => 'required|max:255',
                'description_' . $language->lang_code => 'required',
            ]);

            if ($request->hasFile('image_' . $language->lang_code)) {

                    $image = $request->file('image_' . $language->lang_code);
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code)) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($language->lang_code.'/'.$language->uploads_folder.'/'.$language->catalog_files_folder), $imageName); // Save to public/uploads/blog

            } else {
                $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
            }

            if ($request->hasFile('file_' . $language->lang_code)) {

                    $file = $request->file('file_' . $language->lang_code);
                    $fileName = seoUrl($request->input('alt_' . $language->lang_code)) . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path($language->lang_code.'/'.$language->uploads_folder.'/'.$language->catalog_files_folder), $fileName); // Save to public/uploads/blog

            } else {
                $fileName = $request->input('old_file_' . $language->lang_code, null); // Use old file if no new file is uploaded
            }

            CatalogFile::updateOrCreate(
                ['file_id' => $fileId, 'lang' => $language->lang_code],
                [
                    'catalog_id' => $request->input('catalog_id'),
                    'title' => $request->input('title_' . $language->lang_code),
                    'description' => $request->input('description_' . $language->lang_code),
                    'image' => $imageName,
                    'file' => $fileName,
                    'alt' => $request->input('alt_' . $language->lang_code),
                    'sort' => $request->input('sort_' . $language->lang_code, 0), // Default sort to 0 if not provided
                ]
            );
        }

        return redirect()->back()->with('success', 'Katalog Dosyası başarıyla oluşturuldu/güncellendi.');

       } catch (\Throwable $th) {
           dd($th);
           return redirect()->back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyin.');
       }
    }

    public function catalogFileEdit($id)
    {
        $catalogFiles = CatalogFile::where(['catalog_id' => $id])->get();
        $catalogId = $id;   
        return view('admin.catalog.file.edit', compact('catalogFiles', 'catalogId'));
    }

    public function catalogFileDestroy($id)
    {
        // Find rows with file_id = $id as array
        $catalogFiles = CatalogFile::where('file_id', $id)->get();

        foreach ($catalogFiles as $catalogFile) {
            $catalogFile->delete();
        }

        return redirect()->route('admin.catalog.files.index', $catalogFiles->first()->catalog_id)
            ->with('success', 'Catalog file deleted successfully.');
    }

}
