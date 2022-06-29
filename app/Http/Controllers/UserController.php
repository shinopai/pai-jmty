<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

class UserController extends Controller
{
    public function showProfile(User $user){
        $total_items = Item::count();

        return view('users.index', compact('user', 'total_items'));
    }
}
