<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Section;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $theme = Theme::all();
        $sections = Section::all();
        return view('user.home.index',[
            'thems'=>$theme,
            'sections' => $sections
        ]);
    }

    public function show($userName, $userId)
    {

        $posts = Post::where('author_id', $userId)->get();

        return view('user.profile',[
            'user' => $userName,
            'posts' => $posts
        ]);
    }
}
