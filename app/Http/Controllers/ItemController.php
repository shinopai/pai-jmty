<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItem;
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
        if($request->hasFile('item_image')){
            $image = request()->file('item_image')->getClientOriginalName();
            request()->file('item_image')->storeAs('public/item', $image);
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
}
