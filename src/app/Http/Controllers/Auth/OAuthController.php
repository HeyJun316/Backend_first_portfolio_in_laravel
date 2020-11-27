<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
      /**
    * 各SNSのOAuth認証画面にリダイレクトして認証
    * @param string $provider サービス名
    * @return mixed
    */

  public function socialOAuth(string $provider)
  {
      return Socialite::driver($provider)->redirect();
  }


   /**
    * 各サイトからのコールバック
    * @param string $provider サービス名
    * @return mixed
    */
   public function handleProviderCallback($provider)
   {
       // TODO あとで実装
   }
}
