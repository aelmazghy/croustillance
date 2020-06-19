<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Actualite;

class NewsController extends Controller
{
    public function index(){

        //get news
        $news = Actualite::all();

        return view('admin.news.index', compact('news'));
    }
}
