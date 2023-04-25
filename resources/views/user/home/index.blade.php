@extends('layouts.main')

@section('title', 'Главная')

@section('content')


    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Все темы</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <section class="content">
                    @foreach($sections as $section)
                        <div class="card">
                            <div class="card-body p-0">
                                <table class="table table-striped projects table-hover">
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
                                                    <a href="{{route('post.index')}}/?theme={{$theme['id']}}">{{$theme['title']}}</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                            @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </section>
    </div>
@endsection
