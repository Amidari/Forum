@extends('layouts.main')

@section('title', 'Добавить пост')

@section('content')
    <div class="container">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить статью</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <form action="{{ route('post.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group col-md-6">
                                        <label>Заголовок</label>
                                        <input type="text" name="title" class="form-control" id="exampleInput" placeholder="Введите заголовок" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput">Текст</label>
                                        <textarea name="text" rows="10" class="form-control" id="exampleInput" placeholder="Введите текст" required></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                                <input type="hidden" name="themeId" value="{{$themeId}}" class="form-control" id="exampleInput">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection
