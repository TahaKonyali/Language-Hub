<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Language;
use App\Models\QuizAttempt;
use App\Models\Translation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $quizes = QuizAttempt::count();
        $translations = Translation::count();
        $languages = Language::count();

        $year = Carbon::now()->year;

        $monthlyCounts = Translation::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();
            
        $monthlyCounts = array_values(array_replace(array_fill(1, 12, 0), $monthlyCounts));


        return view('admin.dashboard.index', get_defined_vars());
    }
}
