<?php

namespace App\Lib;

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
}
