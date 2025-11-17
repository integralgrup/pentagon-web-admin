<?php
//Create a new file at app/Http/Controllers/Admin/MenuController.php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Code;
class CodeController extends Controller
{
    
    /**
     * Display a listing of the menu items.
     *
     * @return \Illuminate\View\View
     */
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::all();
        view()->share('languages', $this->languages);
    }
    public function index()
    {
        // Here you would typically fetch menu items from the database
        // For now, we will return a simple view
        $codes =  Code::all(); // Fetch all menu items
        return view('admin.code.index', compact('codes'));
    }

    // You can add more methods here for creating, editing, and deleting menu items
    /**
     * Show the form for creating a new menu item.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $languages =  Language::all(); // Fetch all menu items
        return view('admin.language.create', compact('languages'));
    }

    /**
     * Store a newly created menu item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());
        try {
            //Create or update existing language items
            // Check if the request has an id field to determine if it's an update or create

            foreach($this->languages as $language) {
                $request->validate([
                    'ga_code' => 'nullable|string',
                    'bitrix_form_code' => 'nullable|string',
                    'bitrix_widget_code' => 'nullable|string',
                    'yandex_metrica_code' => 'nullable|string',
                    'facebook_pixel_code' => 'nullable|string',
                    'microsoft_clarity_code' => 'nullable|string',
                    'google_tag_manager_head_code' => 'nullable|string',
                    'google_tag_manager_body_code' => 'nullable|string',
                ]);

                

                // Fill the language model with the request data
                Code::updateOrCreate(
                    ['lang' => $language->lang_code],
                    [
                        'ga_code' => $request->input('ga_code_' . $language->lang_code) ?? $request->input('ga_code_en'),
                        'bitrix_form_code' => $request->input('bitrix_form_code_' . $language->lang_code) ?? $request->input('bitrix_form_code_en'),
                        'bitrix_widget_code' => $request->input('bitrix_widget_code_' . $language->lang_code) ?? $request->input('bitrix_widget_code_en'),
                        'yandex_metrica_code' => $request->input('yandex_metrica_code_' . $language->lang_code) ?? $request->input('yandex_metrica_code_en'),
                        'facebook_pixel_code' => $request->input('facebook_pixel_code_' . $language->lang_code) ?? $request->input('facebook_pixel_code_en'),
                        'microsoft_clarity_code' => $request->input('microsoft_clarity_code_' . $language->lang_code) ?? $request->input('microsoft_clarity_code_en'),
                        'google_tag_manager_head_code' => $request->input('google_tag_manager_head_code_' . $language->lang_code) ?? $request->input('google_tag_manager_head_code_en'),
                        'google_tag_manager_body_code' => $request->input('google_tag_manager_body_code_' . $language->lang_code) ?? $request->input('google_tag_manager_body_code_en')
                    ]
                );
            }

            // Redirect back with success message
            return redirect()->back()
                         ->with('success', 'Kod güncelleme başarılı!');
            //return redirect()->route('admin.menu')->with('success', 'Menu item created successfully.');
        } catch (\Exception $e) {
            throw($e);
            return redirect()->back()->withErrors(['error' => 'Failed to edit item: ' . $e->getMessage()]);
        }
       
    }

    /**
     * Show the form for editing the specified language item.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $languages = Language::all(); // Fetch all language items
        $codes = Code::all(); // Fetch the language item by ID
        return view('admin.code.edit', compact('codes', 'languages'));    
    }





}