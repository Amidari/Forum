@extends('layouts.admin_layout')

@section('title', 'пользователи')

@section('content')

    <div class="container">
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
            </tr>
            @endforeach
        </table>
    </div>
@endsection
