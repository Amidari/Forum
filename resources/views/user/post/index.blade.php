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


        <h2 class="mt-3">{{$theme}}</h2>
        <a href="{{route('post.create')}}/?theme={{$themeId}}" type="button" class="btn btn-success mt-4">Добавить статью</a>


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
                            {{$user['name']}}
                        @endif
                        @endforeach
                    </td>
                    @role('moder')
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
                    @endrole
                </tr>

            @endforeach


        </table>


    </div>

@endsection
