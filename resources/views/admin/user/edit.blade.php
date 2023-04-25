@extends('layouts.admin_layout')

@section('title', 'Изменить пользователя')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование темы: {{$user['title']}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }} </h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <form action="{{ route('user.update', $user['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Выбор роли</label>
                                    <select name="role_name" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{$role['name']}}" @if($user->hasRole($role['name'])) selected @endif> {{$role['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Имя пользователя</label>
                                    <input type="text" value="{{$user['name']}}" name="name" class="form-control" id="exampleInput" placeholder="Введите имя" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Email</label>
                                    <input type="text" value="{{$user['email']}}" name="email" class="form-control" id="exampleInput" placeholder="Введите email" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Изменить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
