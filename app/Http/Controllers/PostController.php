<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themeId = htmlspecialchars($_GET["theme"]);
        $posts = Post::where('theme_id', $themeId)->get();
        $thems = Theme::where('id', $themeId)->get();
        $users = User::all();
        foreach ($thems as $theme);

        return view('user.post.index', [
            'posts' => $posts,
            'themeId' => $themeId,
            'theme' => $theme['title'],
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themeId = (htmlspecialchars($_GET["theme"]));
        return view('user.post.create', [
            'themeId' => $themeId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = auth()->user();
        $post = new Post();

        $post->title = $request->title;
        $post->text = $request->text;
        $post->author_id = $user['id'];
        $post->theme_id = $request->themeId;
        $post->save();
        return redirect("post/?theme=$request->themeId")->withSuccess('Тема успешно добавлена');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $users = User::where('id', $post['author_id'])->get();
        foreach ($users as $user);

       return view('user.post.show',[
           'post' => $post,
           'user' => $user,
           'userName' => $user['name'],
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('user.post.edit', [
            'id' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

}
