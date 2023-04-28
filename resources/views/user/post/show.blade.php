@extends('layouts.main')

@section('title', 'Пост')

@section('content')
    <div class="container mt-5">

        <div class="card">
            <div class="card-title mt-3 ml-3">
                @foreach($thems as $theme)
                    <h2 class="m-0">Тема: {{$theme['title']}}</h2>
                @endforeach
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr class="table-primary">
                        <th colspan="2">
                            Тема: {{$post['title']}}
                        </th>
                    </tr>
                    <tr>
                        <td width="15%"><a href="/profile/{{$user['name']}}">{{$user['name']}}</a>
                            <br> {{$post['created_at']}}</td>
                        <td>{!! $post['text'] !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
