<?php

namespace App\Http\Controllers;

use App\Helpers\ScarpingHelper;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();

        return view('articles',)->with('articles',$articles);
    }
}
