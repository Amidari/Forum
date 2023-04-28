<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $user = User::all()->count();
        $theme = Theme::all()->count();
        $section = Section::all()->count();
        return view('admin.home.index',[
            'user' => $user,
            'theme' => $theme,
            'section' => $section,
        ]);
    }
}
