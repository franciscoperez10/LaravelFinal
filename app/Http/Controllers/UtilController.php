<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function index() {

        $myName = 'Francisco Perez';
        $loginUser = [
            'name' => 'Francisco Perez',
            'email' => 'francisco@gmail.com',
            'phone' => '1234567890'
        ];

        return view('utils.homepage', compact('myName', 'loginUser',));
    }

}


