@extends('layouts.main')

@section('title', 'Пост')

@section('content')
<div class="container">




    <div class="card mt-4">
        <div class="card-body mt-4">
            <p class="card-title col-md-10"><a href="/profile/{{$user['name']}}/{{$user['id']}}">{{$user['name']}}</a></p>
            <p class="card-title col-md">{{$post['created_at']}}</p>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                Тема: {{$post['title']}}</h5>
            <p class="card-text">{!! $post['text'] !!}</p>
        </div>
    </div>

</div>

@endsection
