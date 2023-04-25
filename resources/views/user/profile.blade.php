@extends('layouts.main')

@section('title', "Профиль")

@section('content')
    <div class="container">
<h1 class="text-center mt-4">Профиль</h1>
        <h2 class="mt-3">Пользователь: {{$user}}</h2>

        <table class="table projects mt-4">

                <tr>
                    <td>
                        Пост
                    </td>
                    <td>
                        Дата
                    </td>
                    @if (isset(Auth::user()->name) and $user == Auth::user()->name)
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

                    @if (isset(Auth::user()->name) and $user == Auth::user()->name)
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm"
                           href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Изменить
                        </a>
                        <form action="#"
                              method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Удалить
                            </button>
                        </form>
                    </td>
                    @endif
                </tr>

            @endforeach


        </table>
        

    </div>

@endsection
