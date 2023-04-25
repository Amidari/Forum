@extends('layouts.main')

@section('title', "Профиль")

@section('content')
    <div class="container">

        <h2 class="mt-3">{{$user}}</h2>

        <table class="table projects mt-4">

            @foreach($posts as $post)


                <tr>
                    <th>
                        <a href="{{route('post.show', $post)}}">{{$post['title']}}</a>
                    </th>
                    <td>
                        {{$post['created_at']}}
                    </td>
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
                </tr>

            @endforeach


        </table>


    </div>

@endsection
