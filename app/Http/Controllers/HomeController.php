<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct(){

            $this->middleware('auth');
            $this->middleware('complete');

    }

    /**
     * Show the application home (predict) page to the user
     * 
     * @return Response
     */
    public function index()
    {
               return view('pages.home'); 
    }

}
