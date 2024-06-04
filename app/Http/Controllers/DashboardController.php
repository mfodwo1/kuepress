<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\DesignCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all designs with their categories
        $designs = Design::with('categories')->get();
        $categories = DesignCategory::all();

        return view('welcome', compact('designs', 'categories'));
    }
}
