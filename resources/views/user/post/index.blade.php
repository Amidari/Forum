@extends('layouts.main')

@section('title', 'Посты')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <h4><i class="icon fa fa-check"></i>{{ session('success') }} </h4>
            </div>
        @endif

        @foreach($thems as $theme)
        <h2 class="mt-3">{{$theme['title']}}</h2>
        @endforeach
            @hasanyrole('user|moder|admin')
        <a href="{{route('post.create.new', $theme['id'])}}" type="button" class="btn btn-success mt-4">Добавить статью</a>
            @endhasanyrole

        <table class="table projects mt-4">

            @foreach($posts as $post)


                <tr>
                    <th>
                        <a href="{{route('post.show', $post)}}">{{$post['title']}}</a>
                    </th>
                    <td>
                        {{$post['created_at']}}
                    </td>
                    <td>@foreach($users as $user)
                        @if($user['id'] == $post['author_id'])
                                <a href="/profile/{{$user['name']}}/{{$user['id']}}">{{$user['name']}}</a>
                        @endif
                        @endforeach
                    </td>
                    @hasanyrole('moder|admin')
                    @include('panel.edit-delite')
                    @endhasanyrole
                </tr>

            @endforeach

        </table>

            <div class="text-center">
                {{ $posts->links() }}
            </div>
    </div>

@endsection
