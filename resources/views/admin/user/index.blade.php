@extends('layouts.admin_layout')

@section('title', 'пользователи')

@section('content')

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <h4><i class="icon fa fa-check"></i>{{ session('success') }} </h4>
            </div>
        @endif
    <h1>Все пользователи</h1>
        <table class="table">
            <tr>
                <td>Имя</td>
                <td>Email</td>
                <td>Роль</td>
            </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>
                    @foreach($user->roles as $role)
                        {{$role['name']}}
                    @endforeach
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm"
                       href="{{route('user.edit', $user['id'])}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Изменить
                    </a>
                    <form action="{{route('user.destroy', $user['id'])}}"
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
