<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translations = Translation::with('user')->latest()->paginate(25);

        return view('admin.translation.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::latest()->get();
        $categories = Category::latest()->get();

        return view('admin.translation.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'source_language' => 'required',
            'target_language' => 'required',
            'source_text' => 'required',
            'translated_text' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['danger' => $validator->messages()->first()]);
        }
        try {

            DB::beginTransaction();

            $translation = new Translation;
            $translation->category_id = $request->category;
            $translation->source_language = $request->source_language;
            $translation->target_language = $request->target_language;
            $translation->source_text = $request->source_text;
            $translation->translated_text = $request->translated_text;
            $translation->save();

            DB::commit();

            return redirect()->route('admin.translation.index')->withErrors(['success' => "Word Created Successfully"]);
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['danger' => "Database Error. Please Contact Support"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
