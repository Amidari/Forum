@extends('layouts.admin_layout')

@section('title', 'Все темы')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все темы</h1>
                </div><!-- /.col -->
            </div>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }} </h4>
                </div>
            @endif
        </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body p-0">
                            @foreach($sections as $section)
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th>
                                            {{$section['title']}}
                                        </th>
                                    </tr>
                                    </thead>

                                    @foreach($thems as $theme)
                                        @if($section['title'] == $theme->section['title'])
                                        <tbody>

                                            <tr>

                                                <td>
                                                    {{$theme['title']}}
                                                </td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{route('theme.edit', $theme['id'])}}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Изменить
                                                    </a>
                                                    <form action="{{route('theme.destroy', $theme['id'])}}"
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

                                        @endif
                                    @endforeach

                                    </tbody>
                                </table>
                            @endforeach


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
                <!-- /.content -->
            </div>
        </div>
    </section>

@endsection
