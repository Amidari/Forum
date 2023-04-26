@extends('layouts.main')

@section('title', 'Добавить пост')

@section('content')

    <div class="container">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @foreach($thems as $theme)
                        <h1 class="m-0">Добавить статью для темы: {{$theme['title']}}</h1>
                        @endforeach
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
                                        <label for="summernote">Текст</label>
                                        <textarea name="text" id="summernote" rows="15" class="form-control" placeholder="Введите текст" required></textarea>
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


    <script>
        $(document).ready(function() {
            $("#summernote").summernote();
        });
    </script>

@endsection
