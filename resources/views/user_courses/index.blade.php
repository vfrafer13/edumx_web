@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Mis cursos</a>
            @if(Auth::user()->role == 1)
                <a class="btn btn-small btn-info" href="{{ URL::to('courses/create') }}"><i class="ti-plus"></i></a>
            @endif
        </div>
    </div>
@stop
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset("css/cards.css")}}" rel="stylesheet" />
    <div class="box" style="padding: 0 15px;">

        @if($courses->count()>0)
            @foreach($courses->chunk(3) as $items)
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="box-part text-center">
                                @if($item->cover_path)
                                    <img src="{{Storage::url($item->cover_path)}}" class="img-responsive" style="height: 150px; margin: auto">
                                @else
                                    <div style="height: 150px; margin: auto; line-height: 150px">
                                        <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
                                    </div>
                                @endif
                                <div class="title">
                                    <h4>{{$item->name}}</h4>
                                </div>
                                <div class="text">
                                    <span>{{$item->description}}</span>
                                    <span>${{$item->price}} MXN</span>
                                </div>
                                <a href="{{ route('users.courses.show', $item->id) }}">Ver más</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif

    </div>
@stop