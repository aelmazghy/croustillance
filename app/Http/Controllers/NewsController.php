<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actualite;

class NewsController extends Controller
{
    public function index(){

        //get news
        $news = Actualite::all();

        return view('gest.news.index', compact('news'));
    }
}

