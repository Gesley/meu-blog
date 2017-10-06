<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\SocialAccountService;


class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callback(SocialAccountService $service)
    {
//        dd(Socialite::driver('facebook')->user());
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
//        dd($user);
        auth()->login($user);
        return redirect()->to('/home');
    }
}
