<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::query();

        if ($request->search) {
            $categories = $categories->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $categories->latest()->paginate(25);

        return view('admin.category.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['danger' => $validator->messages()->first()]);
        }
        try {

            DB::beginTransaction();

            $category = new Category;
            $category->name = $request->name;
            $category->image = $this->addFile($request->image, 'uploads/images/');
            $category->save();

            DB::commit();

            return redirect()->route('admin.category.index')->withErrors(['success' => "Category Created Successfully"]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', get_defined_vars());
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'sometimes',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['danger' => $validator->messages()->first()]);
        }
        try {

            DB::beginTransaction();

            $category = Category::find($id);
            if (!$category) {
                return redirect()->back()->withErrors(['danger' => "Invalid Id"]);
            }

            $category->name = $request->name;
            if($request->image){
                $category->image = $this->addFile($request->image, 'uploads/images/');
            }
            $category->save();

            DB::commit();

            return redirect()->route('admin.category.index')->withErrors(['success' => "category Updated Successfully"]);
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['danger' => "Database Error. Please Contact Support"]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            DB::beginTransaction();

            $category = Category::find($id);
            if (!$category) {
                return redirect()->back()->withErrors(['danger' => "Invalid Id"]);
            }
            $category->delete();

            DB::commit();

            return redirect()->back()->withErrors(['danger' => "Category Deleted"]);
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['danger' => "Database Error. Please Contact Support"]);
        }
    }
}
