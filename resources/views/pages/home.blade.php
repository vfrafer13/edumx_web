@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">
                @if(Auth::user()->sex == 0)
                    Bienvenida,
                @else
                    Bienvenido,
                @endif
                {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a>
        </div>
    </div>
@stop
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset("css/cards.css")}}" rel="stylesheet" />
    <div class="box" style="padding: 15px 15px 0 15px;">
        <h2 class="text-center">Categorías</h2>
        <div class="row">
            <div class="col-xs-12">
                <div class="box-part text-center">
                    <div class="title">
                        <a href="{{ URL::to('courses/') }}"><h4>Todos los cursos</h4></a>
                    </div>
                </div>
            </div>
        </div>
        @foreach($categories->chunk(3) as $items)
            <div class="row">
                @foreach($items as $item)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="box-part text-center">
                        <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
                        <div class="title">
                            <a href="{{ URL::to('categories/' . $item->id) }}"><h4>{{$item->name}}</h4></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
    </div>
@stop

