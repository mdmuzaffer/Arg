<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function privacy()
    {
        echo "privacy";
    }

    public function policy()
    {
        echo "policy";
    }

    public function test22(Request $request){
    echo "Hello test";
    }
}
