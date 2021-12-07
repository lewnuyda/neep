<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function main()
    {

        return view('main');

    }
    public function contact_us()
    {
        return view('contact_us');
    }


}
