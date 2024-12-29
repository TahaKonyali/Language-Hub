<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $categories = Category::all();
        return view('dashboard.index', get_defined_vars());
    }

    public function settings()
    {
        return view('settings.index');
    }

    public function updateProfile(Request $request)
    {

        try {
            $user = Auth::user();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone_number = $request->phone_number;
            $user->bio = $request->bio;
            $user->save();

            return redirect()->back()->withErrors(['success' => 'Updated successfully.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
        }
    }
}
