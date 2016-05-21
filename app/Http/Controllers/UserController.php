<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp;

class UserController extends Controller
{
    public function getUser(Request $request){
        $token = $request->session()->get('token');

        $client = new GuzzleHttp\Client();
        $response = $client->get('https://ivle.nus.edu.sg/api/Lapi.svc/Profile_View', [
                'query' => [
                    'APIKey' => getenv('IVLE_API_KEY'),
                    'AuthToken' => $token
            ]
        ]);

        return $response->getBody();
    }

    public function getUser2(Request $request){
        $token = $request->session()->get('token');

        $client = new GuzzleHttp\Client();
        $response = $client->get('http://localhost:8001/a', [
            'query' => [
                'APIKey' => getenv('IVLE_API_KEY'),
                'AuthToken' => $token
            ]
        ]);

        return $response->getBody();
    }
}
