@extends('layouts.main')

@section('title', "Профиль")

@section('content')
    <div class="container">
<h1 class="text-center mt-4">Профиль</h1>
        <h2 class="mt-3">Пользователь: {{$user['name']}}</h2>
        @hasanyrole('moder|admin')

        @if ($user->hasRole('user'))
        <a class="btn btn-danger btn-sm"
           href="{{route('profile.ban', $user)}}">
            Забанить
        </a>
        @elseif ($user->hasRole('ban'))
            <a class="btn btn-success btn-sm"
               href="{{route('profile.unban', $user)}}">
                Разбанить
            </a>
        @endif

        @endhasanyrole
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <h4><i class="icon fa fa-check"></i>{{ session('success') }} </h4>
            </div>
        @endif

        <table class="table projects mt-4">

                <tr>
                    <td>
                        Пост
                    </td>
                    <td>
                        Дата
                    </td>
                    @if (isset(Auth::user()->name) and $user['name'] == Auth::user()->name)
                    <td>
                        Управление
                    </td>
                    @endif
                </tr>


            @foreach($posts as $post)


                <tr>
                    <th>
                        <a href="{{route('post.show', $post)}}">{{$post['title']}}</a>
                    </th>
                    <td>
                        {{$post['created_at']}}
                    </td>

                    @if (isset(Auth::user()->name) and $user['name'] == Auth::user()->name)
                        @include('panel.edit-delite')
                    @endif
                </tr>

            @endforeach


        </table>


    </div>

@endsection
