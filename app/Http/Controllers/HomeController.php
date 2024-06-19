<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\DesignCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all designs with their categories
        $designs = Design::with('categories')->get();
        $categories = DesignCategory::all();

        return view('welcome', compact('designs', 'categories'));
    }


    public function filter(DesignCategory $designCategory)
    {
        $query = Design::whereHas('categories', function ($query) use ($designCategory) {
            $query->where('id', $designCategory->id);
        });

        $categories = DesignCategory::all();
        $designs = $query->with('categories')->get();


        return view('welcome', compact('designs', 'categories'));
    }

    public function details(Design $design)
    {
        return view('store.details', compact('design'));
    }

}


