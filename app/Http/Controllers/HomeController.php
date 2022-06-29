<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $total_items = Item::count();
        $free_items = Item::where('price', 0)->orderBy('id', 'desc')->limit(12)->get();

        return view('home.index', compact('categories', 'total_items', 'free_items'));
    }
}
