
@extends('layouts.main')

@section('title', 'Изменить пост')

@section('content')

    <div class="container">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                            <h1 class="m-0">Изменить пост: {{$post['title']}}</h1>
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <h4><i class="icon fa fa-check"></i>{{ session('success') }} </h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <form action="{{ route('post.update', $post) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group col-md-6">
                                        <label>Заголовок</label>
                                        <input type="text" value="{{$post['title']}}" name="title" class="form-control" id="exampleInput" placeholder="Введите заголовок" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Текст</label>
                                        <textarea name="text" id="summernote" rows="15" class="form-control" placeholder="Введите текст" required>{!!$post['text'] !!}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                </div>
                                <input type="hidden" name="themeId" value="{{$post['theme_id']}}" class="form-control" id="exampleInput">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>




@endsection
