<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItem;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function create(User $user){
        $categories = Category::all();
        $total_items = Item::count();

        return view('items.create', compact('user', 'categories', 'total_items'));
    }

    public function store(StoreItem $request, User $user){
        if (config('app.env') === 'heroku') {
          if($request->hasFile('item_image')){
            $image = request()->file('item_image')->getClientOriginalName();
            Storage::disk('s3')->putFile('/', $image);
        }
        }else{
            if($request->hasFile('item_image')){
                $image = request()->file('item_image')->getClientOriginalName();
                request()->file('item_image')->storeAs('public/item', $image);
            }
        }

        $category_id = Category::find($request->category_id)->value('id');

        $user->items()->create([
            'name' => $request->name,
            'item_image' => $image,
            'price' => $request->price,
            'comment' => $request->comment,
            'category_id' => $category_id
        ]);

        return redirect('/')->with('flash', '新たな商品を投稿しました');
    }

    public function show(User $user, Item $item){
        $total_items = Item::count();

        return view('items.show', compact('user', 'item', 'total_items'));
    }

    public function search(Request $request){
        $query = Item::query();
        $search_word = $request->keyword;
        $category_id = $request->category_id;

        $query->where('name', 'LIKE', '%'.$search_word.'%');

        if($category_id != null){
            $query->where('category_id', $category_id);
            $category = Category::find($category_id)->name;
        }else{
            $category = '全カテゴリー';
        }

        $items = $query->paginate(50);
        $total_items = Item::count();
        $categories = Category::all();

        return view('items.result', compact('items', 'search_word', 'category_id', 'category', 'total_items', 'categories'));
    }

    public function showAllPerCategory(Category $category){
        $items = Item::where('category_id', $category->id)->paginate(50);
        $total_items = Item::count();
        $category_name = Category::find($category->id)->name;

        return view('items.category', compact('items', 'total_items', 'category_name'));
    }
}
