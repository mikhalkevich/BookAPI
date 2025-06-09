<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public  function linkedInRedirect(){
        return Socialite::driver('linkedin')->redirect();
    }
    public function linkedInCallback(){

        $user = Socialite::driver('linkedin')->user();
        dd($user);
    }
}
