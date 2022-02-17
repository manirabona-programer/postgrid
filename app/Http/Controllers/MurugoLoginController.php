<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use RwandaBuild\MurugoAuth\Facades\MurugoAuth;

class MurugoLoginController extends Controller {
    public function redirectToMurugo(){
        return MurugoAuth::redirect();
    }

    public function murugoCallback() {
        $murugoUser = MurugoAuth::user();
        $user = $murugoUser->user;

        if(!$user){
            User::create([
                'name' => $murugoUser->name,
                'murugo_user_id' => $murugoUser->id,
            ]);
        }

        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
