<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Here you would typically fetch data for the about page
        // For now, we will return a simple view
        // Fetch all about content where lang is 'en'
        $aboutContent = About::where('lang', 'en')->get(); // Adjust
        // the language as needed
        return view('admin.about.index', compact('aboutContent'));
    }

    // You can add more methods here for creating, editing, and deleting about content
    /**
     * Show the form for creating a new about content.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $languages = Language::all(); // Fetch all languages for the dropdown
        return view('admin.about.create', compact('languages'));    

    }

    /**
     * Store a newly created about content in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
    //dd($request->all());
        try {
            $languages = Language::all(); // Fetch all languages for the dropdown

            if($request->hasFile('image_en')){
                //save image to temp folder
                $image = $request->file('image_en');
                $imageName = 'aaaa'.time() . '.' . $image->getClientOriginalExtension();
                $tmpPath = $languages[0]->path.'/'.$languages[0]->uploads_folder.'/'.$languages[0]->images_folder . '/temp/';
                
                if (!file_exists($tmpPath)) {
                    mkdir($tmpPath, 0777, true);
                }

                copy($image->getRealPath(), $tmpPath . $imageName);

                $tmpImgPath = $tmpPath . $imageName;

            }

            if($request->hasFile('bg_video_en')){
                //save image to temp folder
                $bgVideo = $request->file('bg_video_en');
                $bgVideoName = 'bbbb'.time() . '.' . $bgVideo->getClientOriginalExtension();
                $tmpBgVideoPath = $languages[0]->path.'/'.$languages[0]->uploads_folder.'/'.$languages[0]->images_folder . '/temp/';
                if (!file_exists($tmpBgVideoPath)) {
                    mkdir($tmpBgVideoPath, 0777, true);
                }
                copy($bgVideo->getRealPath(), $tmpBgVideoPath . $bgVideoName);

                $tmpBgVideoPath = $tmpBgVideoPath . $bgVideoName;
            }

            if($request->hasFile('mission_image_en')){
                //save image to temp folder
                $missionImage = $request->file('mission_image_en');
                $missionImageName = 'cccc'.time() . '.' . $missionImage->getClientOriginalExtension();
                $tmpMissionImagePath = $languages[0]->path.'/'.$languages[0]->uploads_folder.'/'.$languages[0]->images_folder . '/temp/';
                if (!file_exists($tmpMissionImagePath)) {
                    mkdir($tmpMissionImagePath, 0777, true);
                }
                copy($missionImage->getRealPath(), $tmpMissionImagePath . $missionImageName);

                $tmpMissionImagePath = $tmpMissionImagePath . $missionImageName;
            }

            if($request->hasFile('vision_image_en')){
                //save image to temp folder
                $visionImage = $request->file('vision_image_en');
                $visionImageName = 'dddd'.time() . '.' . $visionImage->getClientOriginalExtension();
                $tmpVisionImagePath = $languages[0]->path.'/'.$languages[0]->uploads_folder.'/'.$languages[0]->images_folder . '/temp/';
                if (!file_exists($tmpVisionImagePath)) {
                    mkdir($tmpVisionImagePath, 0777, true);
                }
                copy($visionImage->getRealPath(), $tmpVisionImagePath . $visionImageName);

                $tmpVisionImagePath = $tmpVisionImagePath . $visionImageName;
            }

//dd($tmpImgPath, $tmpBgVideoPath, $tmpMissionImagePath, $tmpVisionImagePath);

                foreach ($languages as $language) {
                    // Validate the request data
                    if($language->lang_code == 'en'){
                        $request->validate([
                            'lang_' . $language->lang_code => 'required|string|max:10',
                            'upper_title_' . $language->lang_code => 'required|string|max:100',
                            'title_' . $language->lang_code => 'required|string|max:100',
                            'title_1_' . $language->lang_code => 'required|string|max:255',
                            'description_' . $language->lang_code => 'required|string',
                            'image_' . $language->lang_code => 'nullable|image|max:2048',
                            'alt_' . $language->lang_code => 'required|string|max:255',
                            //bg_video should be 50MB limit
                            'bg_video_' . $language->lang_code => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:51200', // 50MB
                            'mission_title_' . $language->lang_code => 'required|string|max:255',
                            'mission_text_' . $language->lang_code => 'required|string',
                            'mission_image_' . $language->lang_code => 'nullable|image|max:2048',
                            'vision_title_' . $language->lang_code => 'required|string|max:255',
                            'vision_text_' . $language->lang_code => 'required|string',
                            'vision_image_' . $language->lang_code => 'nullable|image|max:2048',
                            'seo_title_' . $language->lang_code => 'required|string|max:255',
                            'seo_description_' . $language->lang_code => 'required|string|max:255',
                            'seo_keywords_' . $language->lang_code => 'nullable|string|max:255',
                        ]);
                    }

                    

                    if ($request->hasFile('image_' . $language->lang_code) || $request->hasFile('image_en')) {

                        $image = $request->file('image_' . $language->lang_code) ?? $request->file('image_en');
                        $imageName = seoUrl($request->input('alt_' . $language->lang_code) ?? $request->input('alt_en')) . '_' . time() . '.' . $image->getClientOriginalExtension();
                        $folderPath = $language->path.'/'.$language->uploads_folder.'/'.$language->images_folder ;
                        $imgPath = $folderPath .'/'. $imageName;

                        if (!file_exists($folderPath)) {
                            mkdir($folderPath, 0777, true);
                        }

                        // Copy image from temp to final location

                        if(isset($tmpImgPath) && file_exists($tmpImgPath)){
                            copy($tmpImgPath, $imgPath);
                        }else{
                            $image->move($folderPath, $imageName);
                        }

                    } else {
                        $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                    }

                    

                    if ($request->hasFile('bg_video_' . $language->lang_code) || $request->hasFile('bg_video_en')) {
                        $video = $request->file('bg_video_' . $language->lang_code) ?? $request->file('bg_video_en');
                        $videoName = seoUrl($request->input('title_' . $language->lang_code) ?? $request->input('title_en')) . '_' . time() . '.' . $video->getClientOriginalExtension();
                        $videoFolderPath = $language->path.'/'.$language->uploads_folder.'/'.$language->images_folder; // full path inside public/
                        $videoPath = $videoFolderPath .'/'. $videoName;
                            // Create folder if it doesn't exist
                            if (!file_exists($videoFolderPath)) {
                                mkdir($videoFolderPath, 0777, true);
                            }

                            // Copy video from temp to final location
                            if (isset($tmpBgVideoPath) && file_exists($tmpBgVideoPath)) {
                                copy($tmpBgVideoPath, $videoPath);
                            } else {
                                $video->move($videoFolderPath, $videoName);
                            }

                    } else {
                        $videoName = $request->input('old_bg_video_' . $language->lang_code, null); // Use old video if no new video is uploaded
                    }

                     if ($request->hasFile('mission_image_' . $language->lang_code) || $request->hasFile('mission_image_en')) {
                        $missionImage = $request->file('mission_image_' . $language->lang_code) ?? $request->file('mission_image_en');
                        $missionImageName =  seoUrl($request->input('mission_title_' . $language->lang_code) ?? $request->input('mission_title_en')) . '_' . time() . '.' . $missionImage->getClientOriginalExtension();
                        $missionFolderPath = $language->path.'/'.$language->uploads_folder.'/'.$language->images_folder; // full path inside public/
                        $missionImgPath = $missionFolderPath .'/'. $missionImageName;
                            // Create folder if it doesn't exist
                            if (!file_exists($missionFolderPath)) {
                                mkdir($missionFolderPath, 0777, true);
                            }

                            if (isset($tmpMissionImagePath) && file_exists($tmpMissionImagePath)) {
                                copy($tmpMissionImagePath, $missionImgPath);
                            } else {
                                $missionImage->move($missionFolderPath, $missionImageName);
                            }

                    } else {
                        $missionImageName = $request->input('old_mission_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                    }

                    

                     if ($request->hasFile('vision_image_' . $language->lang_code) || $request->hasFile('vision_image_en')) {
                        $visionImage = $request->file('vision_image_' . $language->lang_code) ?? $request->file('vision_image_en');
                        $visionImageName =  seoUrl($request->input('vision_title_' . $language->lang_code) ?? $request->input('vision_title_en')) . '_' . time() . '.' . $visionImage->getClientOriginalExtension();
                        $visionFolderPath = $language->path.'/'.$language->uploads_folder.'/'.$language->images_folder; // full path inside public/
                        $visionImgPath = $visionFolderPath .'/'. $visionImageName;
                            // Create folder if it doesn't exist
                            if (!file_exists($visionFolderPath)) {
                                mkdir($visionFolderPath, 0777, true);
                            }

                            if (isset($tmpVisionImagePath) && file_exists($tmpVisionImagePath)) {
                                copy($tmpVisionImagePath, $visionImgPath);
                            } else {
                                $visionImage->move($visionFolderPath, $visionImageName);
                            }

                    } else {
                        $visionImageName = $request->input('old_vision_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                    }
                    // Create or update the about content for the specific language
                    About::updateOrCreate(
                        [
                            'lang' => $language->lang_code,
                        ],
                        [
                            'upper_title' => $request->input('upper_title_' . $language->lang_code) ?: $request->input('upper_title_en'),
                            'title' => $request->input('title_' . $language->lang_code) ?: $request->input('title_en'),
                            'title_1' => $request->input('title_1_' . $language->lang_code) ?: $request->input('title_1_en'),
                            'description' => $request->input('description_' . $language->lang_code) ?: $request->input('description_en'),
                            'image' => $imageName, // save relative path
                            'alt' => $request->input('alt_' . $language->lang_code) ?: $request->input('alt_en'),
                            'bg_video' => $videoName, // save relative path
                            'mission_title' => $request->input('mission_title_' . $language->lang_code) ?: $request->input('mission_title_en'),
                            'mission_text' => $request->input('mission_text_' . $language->lang_code) ?: $request->input('mission_text_en'),
                            'mission_image' => $missionImageName, // save relative path
                            'vision_title' => $request->input('vision_title_' . $language->lang_code) ?: $request->input('vision_title_en'),
                            'vision_text' => $request->input('vision_text_' . $language->lang_code) ?: $request->input('vision_text_en'),
                            'vision_image' => $visionImageName, // save relative path
                            'seo_title' => $request->input('seo_title_' . $language->lang_code) ?: $request->input('seo_title_en'),
                            'seo_description' => $request->input('seo_description_' . $language->lang_code) ?: $request->input('seo_description_en'),
                            'seo_keywords' => $request->input('seo_keywords_' . $language->lang_code) ?: $request->input('seo_keywords_en'),
                        ]
                    );

                }

                // unlink tmp images
                if (isset($tmpImgPath)) {
                    @unlink($tmpImgPath);
                }
                if (isset($tmpBgVideoPath)) {
                    @unlink($tmpBgVideoPath);
                }
                if (isset($tmpMissionImagePath)) {
                    @unlink($tmpMissionImagePath);
                }
                if (isset($tmpVisionImagePath)) {
                    @unlink($tmpVisionImagePath);
                }

            return redirect()->route('admin.about')->with('success', 'Hakkımızda içeriği başarıyla kaydedildi.');
        } catch (\Exception $e) {
            throw $e;
            //return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified about content.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $about_contents = About::all(); // Fetch all about contents
        $languages = Language::all(); // Fetch all languages for the dropdown
        //$aboutContent = About::where('id', $id)->first(); // Fetch the specific about content by ID
        return view('admin.about.edit', compact('about_contents', 'languages'));
    }

    /**
     * Update the specified about content in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function howWeDoIndex(Request $request)
    {
        // Fetch all "how we do" content
        $languages = Language::all(); // Fetch all languages for the dropdown
        // Fetch all "how we do" content from DB with group by content_id 
        $how_we_do = DB::table('about_how_we_do')
        //where('lang', $request->input('lang', 'en')) // Filter by language if provided
            ->where('lang', $request->input('lang', 'en')) // Filter by language if provided
            ->get();
        return view('admin.about.how_we_do.index', compact('languages','how_we_do'));
    }

    public function howWeDoCreate()
    {
        $languages = Language::all(); // Fetch all languages for the dropdown

        return view('admin.about.how_we_do.create', compact('languages'));
    }

    public function howWeDoStore(Request $request)
    {
        try {
            $languages = Language::all(); // Fetch all languages for the dropdown

            if ($request->has('content_id')) {
                $content_id = $request->input('content_id'); // Use the provided content_id
            } else {
                $content_id = DB::table('about_how_we_do')->max('content_id') + 1; // Increment the maximum content_id by 1
                if (!$content_id) {
                    $content_id = 1; // If no content exists, start with 1
                }   
            }

            if($request->hasFile('image_en')){
                //save image to temp folder
                $image = $request->file('image_en');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $tmpPath = $languages[0]->path.'/'.$languages[0]->uploads_folder.'/'.$languages[0]->images_folder . '/temp/';
                
                if (!file_exists($tmpPath)) {
                    mkdir($tmpPath, 0777, true);
                }

                copy($image->getRealPath(), $tmpPath . $imageName);

                $tmpImgPath = $tmpPath . $imageName;

            }

            foreach ($languages as $language) {
                // Validate the request data
                if ($language->lang_code === 'en') {
                    $request->validate([
                        'title_' . $language->lang_code => 'required|string|max:100',
                        'title_1_' . $language->lang_code => 'required|string|max:255',
                        'description_' . $language->lang_code => 'required|string',
                        'image_' . $language->lang_code => 'nullable|image|max:2048',
                        'alt_' . $language->lang_code => 'required|string|max:255',
                    ]);
                }

                if ($request->hasFile('image_' . $language->lang_code) || $request->hasFile('image_en')) {

                    $howWeDoImage = $request->file('image_' . $language->lang_code) ?? $request->file('image_en');
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code) ?? $request->input('alt_en')) . '_' . time() . '.' . $howWeDoImage->getClientOriginalExtension();
                    $folderPath = $language->path.'/'.$language->uploads_folder.'/'.$language->images_folder ;
                    $imgPath = $folderPath .'/'. $imageName;

                        if (!file_exists($folderPath)) {
                            mkdir($folderPath, 0777, true);
                        }

                        // Copy image from temp to final location
                        if (isset($tmpImgPath) && file_exists($tmpImgPath)) {
                            copy($tmpImgPath, $imgPath);
                        } else {
                            $howWeDoImage->move($folderPath, $imageName);
                        }

                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                // Create or update the "how we do" content for the specific language
                DB::table('about_how_we_do')->updateOrInsert(
                    [
                        'lang' => $language->lang_code,
                        'content_id' => $content_id, // Use the content_id for grouping
                    ],
                    [
                        'content_id' => $content_id,
                        'title' => $request->input('title_' . $language->lang_code) ?? $request->input('title_en'),
                        'title_1' => $request->input('title_1_' . $language->lang_code) ?? $request->input('title_1_en'),
                        'description' => $request->input('description_' . $language->lang_code) ?? $request->input('description_en'),
                        'image' => $imageName, // save relative path
                        'alt' => $request->input('alt_' . $language->lang_code) ?? $request->input('alt_en'),
                    ]
                );
            }
            // unlink tmp image
            if (isset($tmpImgPath)) {
                @unlink($tmpImgPath);
            }
            
            return redirect()->route('admin.about.how_we_do')->with('success', 'Nasıl Yaparız içeriği başarıyla kaydedildi.');
        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function howWeDoEdit($id)
    {
        $howWeDoContent = DB::table('about_how_we_do')->where('content_id', $id)->get(); // Fetch the specific "how we do" content by ID
        $languages = Language::all(); // Fetch all languages for the dropdown
        return view('admin.about.how_we_do.edit', compact('howWeDoContent', 'languages'));
    }

    // what we do methods

    public function whatWeDoIndex(Request $request)
    {
        $whatWeDoContent =  DB::table('about_what_we_do')
        //where('lang', $request->input('lang', 'en')) // Filter by language if provided
            ->where('lang', $request->input('lang', 'en')) // Filter by language if provided
            ->get();
        $languages = Language::all(); // Fetch all languages for the dropdown
        return view('admin.about.what_we_do.index', compact('whatWeDoContent', 'languages'));
    }

    public function whatWeDoCreate()
    {
        $languages = Language::all();
        return view('admin.about.what_we_do.create', compact('languages'));
    }

    public function whatWeDoStore(Request $request)
    {
        try {
            $languages = Language::all(); // Fetch all languages for the dropdown

            if ($request->has('content_id')) {
                $content_id = $request->input('content_id'); // Use the provided content_id
            } else {
                $content_id = DB::table('about_what_we_do')->max('content_id') + 1; // Increment the maximum content_id by 1
                if (!$content_id) {
                    $content_id = 1; // If no content exists, start with 1
                }   
            }

            if($request->hasFile('image_en')){
                //save image to temp folder
                $image = $request->file('image_en');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $tmpPath = $languages[0]->path.'/'.$languages[0]->uploads_folder.'/'.$languages[0]->images_folder . '/temp/';
                
                if (!file_exists($tmpPath)) {
                    mkdir($tmpPath, 0777, true);
                }

                copy($image->getRealPath(), $tmpPath . $imageName);

                $tmpImgPath = $tmpPath . $imageName;

            }

            foreach ($languages as $language) {
                // Validate the request data
                if ($language->lang_code === 'en') {
                    $request->validate([
                        'title_' . $language->lang_code => 'required|string|max:100',
                        'title_1_' . $language->lang_code => 'required|string|max:255',
                        'description_' . $language->lang_code => 'required|string',
                        'image_' . $language->lang_code => 'nullable|image|max:2048',
                        'alt_' . $language->lang_code => 'required|string|max:255',
                    ]);
                }

                if ($request->hasFile('image_' . $language->lang_code) || $request->hasFile('image_en')) {
                    $image      = $request->file('image_' . $language->lang_code) ?? $request->file('image_en');
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code) ?? $request->input('alt_en')) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $folderPath = $language->path.'/'.$language->uploads_folder.'/'.$language->images_folder ;
                    $imgPath = $folderPath .'/'. $imageName;

                        if (!file_exists($folderPath)) {
                            mkdir($folderPath, 0777, true);
                        }

                        // Copy image from temp to final location
                        if (isset($tmpImgPath) && file_exists($tmpImgPath)) {
                            copy($tmpImgPath, $imgPath);
                        } else {
                            $image->move($folderPath, $imageName);
                        }
                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                // Create or update the "how we do" content for the specific language
                DB::table('about_what_we_do')->updateOrInsert(
                    [
                        'lang' => $language->lang_code,
                        'content_id' => $content_id, // Use the content_id for grouping
                    ],
                    [
                        'content_id' => $content_id,
                        'title' => $request->input('title_' . $language->lang_code),
                        'title_1' => $request->input('title_1_' . $language->lang_code),
                        'description' => $request->input('description_' . $language->lang_code),
                        'image' => $imageName, // save relative path
                        'alt' => $request->input('alt_' . $language->lang_code),
                    ]
                );
            }
            return redirect()->route('admin.about.what_we_do')->with('success', 'Neler Yaparız içeriği başarıyla kaydedildi.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function whatWeDoEdit($id)
    {
        $whatWeDoContent = DB::table('about_what_we_do')->where('content_id', $id)->get();
        //dd($whatWeDoContent);
        $languages = Language::all();
        return view('admin.about.what_we_do.edit', compact('whatWeDoContent', 'languages'));
    }

    public function membershipsIndex(Request $request)
    {
        $membershipsContent = DB::table('about_memberships')
            ->where('lang', $request->input('lang', 'en')) // Filter by language if provided
            ->get();
        $languages = Language::all();
        return view('admin.about.memberships.index', compact('membershipsContent', 'languages'));
    }

    public function membershipsCreate()
    {
        $languages = Language::all();
        return view('admin.about.memberships.create', compact('languages'));
    }

    public function membershipsStore(Request $request)
    {
        try {

            $languages = Language::all(); // Fetch all languages for the dropdown

            if($request->hasFile('image_en')){
                //save image to temp folder
                $image = $request->file('image_en');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $tmpPath = $languages[0]->path.'/'.$languages[0]->uploads_folder.'/'.$languages[0]->images_folder . '/temp/';
                
                if (!file_exists($tmpPath)) {
                    mkdir($tmpPath, 0777, true);
                }

                copy($image->getRealPath(), $tmpPath . $imageName);

                $tmpImgPath = $tmpPath . $imageName;

            }

            

            if ($request->has('content_id')) {
                $content_id = $request->input('content_id'); // Use the provided content_id
            } else {
                $content_id = DB::table('about_memberships')->max('content_id') + 1; // Increment the maximum content_id by 1
                if (!$content_id) {
                    $content_id = 1; // If no content exists, start with 1
                }   
            }

            foreach ($languages as $language) {
                // Validate the request data
                if ($language->lang_code === 'en') {
                    $request->validate([
                        'title_' . $language->lang_code => 'required|string|max:100',
                        'title_1_' . $language->lang_code => 'required|string|max:255',
                        'url_' . $language->lang_code => 'required|string|max:255',
                        'image_' . $language->lang_code => 'nullable|image|max:2048',
                        'alt_' . $language->lang_code => 'required|string|max:255',
                ]);
            }

                if ($request->hasFile('image_' . $language->lang_code) || $request->hasFile('image_en')) {

                   $imageName = $this->moveFile($request, $language, $tmpImgPath);

                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                // Create or update the "how we do" content for the specific language
                DB::table('about_memberships')->updateOrInsert(
                    [
                        'lang' => $language->lang_code,
                        'content_id' => $content_id, // Use the content_id for grouping
                    ],
                    [
                        'title' => $request->input('title_' . $language->lang_code) ?? $request->input('title_en'),
                        'title_1' => $request->input('title_1_' . $language->lang_code) ?? $request->input('title_1_en'),
                        'url' => $request->input('url_' . $language->lang_code) ?? $request->input('url_en'),
                        'image' => $imageName ?? '',
                        'alt' => $request->input('alt_' . $language->lang_code) ?? $request->input('alt_en'),
                    ]
                );
            } // <-- Add this closing brace for the foreach loop
            // unlink tmp image
            if (isset($tmpImgPath)) {
                @unlink($tmpImgPath);
            }
            return redirect()->route('admin.about.memberships')->with('success', 'Üyelik içeriği başarıyla kaydedildi.');
        } catch (\Exception $e) {
            //throw $e;
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function membershipsEdit($id)
    {
        $membershipsContent = DB::table('about_memberships')->where('content_id', $id)->get();
        $languages = Language::all();
        return view('admin.about.memberships.edit', compact('membershipsContent', 'languages'));
    }

    public function membershipsDestroy(Request $request, $id)
    {
        try {
            DB::table('about_memberships')->where('content_id', $id)->delete();
            return redirect()->route('admin.about.memberships')->with('success', 'Üyelik içeriği başarıyla silindi.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    // about politics methods
    public function politicsIndex(Request $request)
    {
        $politicsContent = DB::table('about_politics')
            ->where('lang', $request->input('lang', 'en')) // Filter by language if provided
            ->get();
        return view('admin.about.politics.index', compact('politicsContent'));
    }

    public function politicsCreate()
    {
        $languages = Language::all();
        return view('admin.about.politics.create', compact('languages'));
    }

    public function politicsStore(Request $request)
    {
        try {
            $languages = Language::all(); // Fetch all languages for the dropdown

            if ($request->has('content_id')) {
                $content_id = $request->input('content_id'); // Use the provided content_id
            } else {
                $content_id = DB::table('about_politics')->max('content_id') + 1; // Increment the maximum content_id by 1
                if (!$content_id) {
                    $content_id = 1; // If no content exists, start with 1
                }
            }

            foreach ($languages as $language) {
                // Validate the request data
                $request->validate([
                    'title_' . $language->lang_code => 'required|string|max:100',
                    'description_' . $language->lang_code => 'required|string',
                    'image_' . $language->lang_code => 'nullable|image|max:2048',
                    'alt_' . $language->lang_code => 'required|string|max:255',
                ]);

                if ($request->hasFile('image_' . $language->lang_code)) {
                    $politicsImage = $request->file('image_' . $language->lang_code);
                    $imageName = seoUrl($request->input('alt_' . $language->lang_code)) . '_' . time() .  '.webp';
                    $folderPath = getFolder(['uploads_folder','images_folder']);
                    if(!file_exists($folderPath)) {
                        mkdir($folderPath, 0755, true);
                    }
                    $politicsImage->move($folderPath, $imageName); // Move the image to the specified folder
                } else {
                    $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                // Create or update the "how we do" content for the specific language
                DB::table('about_politics')->updateOrInsert(
                    [
                        'lang' => $language->lang_code,
                        'content_id' => $content_id, // Use the content_id for grouping
                    ],
                    [
                        'content_id' => $content_id,
                        'title' => $request->input('title_' . $language->lang_code),
                            'description' => $request->input('description_' . $language->lang_code),
                        'image' => $imageName, // save relative path
                        'alt' => $request->input('alt_' . $language->lang_code),
                    ]
                );
            }
            return redirect()->route('admin.about.politics')->with('success', 'Politika içeriği başarıyla kaydedildi.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function politicsEdit($id)
    {
        $politicsContent = DB::table('about_politics')->where('content_id', $id)->get();
        $languages = Language::all();
        return view('admin.about.politics.edit', compact('politicsContent', 'languages'));
    }

    public function politicsDestroy(Request $request, $id)
    {
        try {
            DB::table('about_politics')->where('content_id', $id)->delete();
            return redirect()->route('admin.about.politics')->with('success', 'Politika içeriği başarıyla silindi.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    protected function moveFile($request, $language, $tmpImgPath = null)
    {
        $image = $request->file('image_' . $language->lang_code) ?? $request->file('image_en');
        $imageName = seoUrl($request->input('alt_' . $language->lang_code) ?? $request->input('alt_en')) . '_' . time() . '.' . $image->getClientOriginalExtension();
        $folderPath = $language->path.'/'.$language->uploads_folder.'/'.$language->images_folder ;
        $imgPath = $folderPath .'/'. $imageName;

        if(!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        if(isset($tmpImgPath) && file_exists($tmpImgPath)) {
            copy($tmpImgPath, $imgPath);
        }else{
            $image->move($folderPath, $imageName); // Move the image to the specified folder
        }
        return $imageName;
    }

}
