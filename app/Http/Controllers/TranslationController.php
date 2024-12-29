<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Translation;
use App\Models\WordExplorer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TranslationController extends Controller
{
    public function index(Request $request)
    {
        $translations = Translation::query();
        
        $user_id = Auth::id();
        $translations = $translations->where('user_id', $user_id);

        if($request->category_id){
            $translations = $translations->where('category_id', $request->category_id);
        }

        if($request->language){
            $translations = $translations->where('target_language', $request->language);
        }
        
        $translations = $translations->with('category')->latest()->get();
        $categories = Category::all();
        $languages = Language::all();
        return view('translations.index', get_defined_vars());
    }

    public function wordExplorer(Request $request)
    {
        $translations = WordExplorer::query();

        if($request->category_id){
            $translations = $translations->where('category_id', $request->category_id);
        }

        if($request->language){
            $translations = $translations->where('target_language', $request->language);
        }
        
        $translations = $translations->with('category')->latest()->paginate(1);
        $categories = Category::all();
        $languages = Language::all();

        $translations->appends($request->all()); 
        return view('word-explorer.index', get_defined_vars());
    }

    public function translate(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-free.deepl.com/v2/translate',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "text": ["' . $request->text . '"],
            "source_lang": "' . $request->source_lang . '",
            "target_lang": "' . $request->target_lang . '"
        }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: DeepL-Auth-Key ' . env('MIX_DEEPL_KEY'),
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return response()->json(json_decode($response, true));
    }

    public function store(Request $request)
    {
        try {
            $translation = new Translation;
            $translation->user_id = Auth::id();
            $translation->category_id = $request->category_id;
            $translation->source_language = $request->source_language;
            $translation->target_language = $request->target_language;
            $translation->source_text = $request->source_text;
            $translation->translated_text = $request->translated_text;
            $translation->save();

            return response()->json($translation);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function delete(Request $request)
    {

        $translation = Translation::find($request->id);
        $translation->delete();

        return redirect()->back()->withErrors(['danger' => "Translation deleted."]);
    }
}
