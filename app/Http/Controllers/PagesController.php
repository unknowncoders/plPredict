<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
        public function faq(){

                return view('pages.faq');

        }

        public function rules(){

                return view('pages.rules');

        }
}
