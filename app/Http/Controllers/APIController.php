<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function getData()
    {
        return [
            "name" => "P. Wandee",
            "email" => "pichit.wd@bru.ac.th",
            "department" => "Information Technology"
        ];
    }
    public function getPostdata()
    {
        $data = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/posts');
        return view('post')->with('data', json_decode($data, true));
    }
    public function getPostDataByID($id){
        $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/posts/' .$id);
        return view('post-id')->with('data', json_decode($response, true));
    }
    public function getUser(){

        $response = Http::withoutVerifying()->get('https://reqres.in/api/users');
        $user = json_decode($response->getBody(),true)['data'];
        return view('user')->with('data', $user);
    }
}
