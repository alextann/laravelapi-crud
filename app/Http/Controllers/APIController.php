<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
