<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class IVLEAuthController extends Controller
{
    public function getAuthUrl(){
        return Redirect::to('https://ivle.nus.edu.sg/api/login/?apikey=' . getenv('IVLE_API_KEY') . '&url=' . getenv('APP_URL') . '/auth/ivle/callback' );
    }

    public function handleAuthCallback(Request $request){
        $token = Input::get('token');

        $request->session()->put('token', $token);

        return redirect('/me');
    }
}
