<?php

namespace App\Lib;

use Illuminate\Support\Facades\Storage;

class MyFunc
{
  public static function isLoginOrRegister()
  {
    $res = strstr(url()->current(), 'login');
    $res2 = strstr(url()->current(), 'register');

    if($res == 'login' || $res2 == 'register'){
      return true;
    }
  }

  public static function isExistsProfileImage($image){
    return Storage::disk('local')->exists('public/profile/'.$image);
  }

  public static function isExistsItemImage($image){
    return Storage::disk('local')->exists('public/item/'.$image);
  }

  public static function characterLimit($text){
    $limit = 100;

    if(mb_strlen($text) > $limit) {
      $title = mb_substr($text, 0, $limit);
      return $title.'...';
    } else {
      return $text;
    }
  }
}
