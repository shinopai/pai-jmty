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

  public static function isExistsImage($image){
    return Storage::exists($image);
  }
}
