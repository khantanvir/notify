<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function check(){
        return view('form');
    }
    public function form_post(Request $request){
        $apiKey = 'w2q2smdjlh470ofb';
        $textToCheck = $request->input('desc');

        $client = new Client();
        $response = $client->post('https://www.copyscape.com/api/', [
            'form_params' => [
                'u' => 'khantanvir', // Replace with your Copyscape account email
                'k' => $apiKey,
                //'e' => 'text',
                'o' => 'cpsearch',
                't' => $textToCheck,
                'f' => 'json',
            ],
        ]);

        $result = $response->getBody()->getContents();

        // Handle the result and return a response
        return response()->json(['result' => $result]);
    }
}
