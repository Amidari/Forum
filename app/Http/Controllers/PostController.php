<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
session_start();
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       dd('$id');
//        if (isset($_SERVER['QUERY_STRING'])){
//            $_SESSION['theme'] = $_SERVER['QUERY_STRING'];
//        }
//        $themeId = $_SESSION['theme'];
//        var_dump($themeId);
//        $posts = Post::where('theme_id',$themeId)->Paginate(10);
//        $thems = Theme::where('id', $themeId)->get();
//        $users = User::all();
//        //foreach ($thems as $theme);
//
//        return view('user.post.index', [
//            'posts' => $posts,
//            //'themeId' => $themeId,
//            'thems' => $thems,
//            'users' => $users,
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param integer $themeId
     * @return \Illuminate\Http\Response
     */
    public function create(int $themeId)
    {
        $thems = Theme::where('id', $themeId)->get();
        return view('user.post.create', [
            'themeId' => $themeId,
            'thems' => $thems,
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
        return redirect("/")->withSuccess('Тема успешно добавлена');


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
        $post->delete();

        return redirect()->back()->withSuccess('Раздел успешно удален');
    }

    public function postId($id){


        $posts = Post::orderBy('created_at', 'DESC')->where('theme_id',$id)->Paginate(10);
        $thems = Theme::where('id', $id)->get();
        $users = User::all();

        return view('user.post.index', [
            'posts' => $posts,
            //'themeId' => $themeId,
            'thems' => $thems,
            'users' => $users,
        ]);

    }


}
