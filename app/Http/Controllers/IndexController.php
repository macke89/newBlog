<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {

        $posts = DB::table('posts')->latest('id')->paginate(15);

        return view('index', compact('posts'));
    }
}
