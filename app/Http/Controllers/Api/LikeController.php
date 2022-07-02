<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class LikeController extends Controller
{
    public function getLikeNumber(Item $item){
        return $item->users()->count();
    }

    public function likeItem(User $user, Item $item){
        $user->middleItems()->sync($item);
    }

    public function unlikeItem(User $user, Item $item){
        $user->middleItems()->detach($item);
    }

    public function checkLiked(User $user, Item $item){
        $res = $user->middleItems()->get();
        $res->where('item_id', $item);

        return $res->count();
    }
}
