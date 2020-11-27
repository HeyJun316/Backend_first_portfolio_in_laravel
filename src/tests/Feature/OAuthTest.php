<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OAuthTest extends TestCase
{
    public function setUp(): void
 {
      parent::setUp();
      // $this->providerNameは上のsetUpメソッドであらかじめ定義しておく
      $this->providerName = 'google';
 }

 /**
  * @test
  */
  public function Googleの認証画面を表示できる()
  {
    //1.大きくいうと認証ページにリダイレクトしているかをチェックする

    // URLをコールする
    $response = $this->get(route('socialOAuth', ['provider' => $this->providerName]));
    //認証ページへリダイレクトしているかチェック
    $response->assertStatus(302);

    //2.リダイレクト先のURlが正しいか検証する

    //認証ページのURLを取得
    $target = parse_url($response->headers->get('location'));
    //認証ページのURLのhost箇所の文字列と'accounts.google.com'が同じであることを確認
    $this->assertEquals('accounts.google.com', $target['host']);
    // パラメータの検証
    $query = explode('&', $target['query']);
    $this->assertContains('redirect_uri=' . urlencode(config('services.google.redirect')), $query);
    $this->assertContains('client_id=' . config('services.google.client_id'), $query);
  }

 /**
  * @test
  */
 public function Googleアカウントでユーザー登録できる()
 {
     // URLをコール
     $this->get(route('oauthCallback', ['provider' => $this->providerName]))
         ->assertStatus(200);
 }


}