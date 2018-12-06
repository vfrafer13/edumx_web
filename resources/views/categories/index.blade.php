@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Cursos de {{$cat->name}}</a>
        </div>
    </div>
@stop
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset("css/cards.css")}}" rel="stylesheet" />
    <div class="box">
        <div class="container">
            @foreach($cat_courses->chunk(3) as $items)
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="box-part text-center">
                                <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
                                <div class="title">
                                    <h4>{{$item->name}}</h4>
                                </div>
                                <div class="text">
                                    <span>{{$item->description}}</span>
                                    <span>${{$item->price}} MXN</span>
                                </div>
                                <a href="{{ URL::to('courses/' . $item->id) }}">Ver más</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@stop