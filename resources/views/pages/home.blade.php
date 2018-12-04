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
    <style>
        body .box{
            background: #eee;
        }
        span{
            font-size:15px;
        }

        .box{
            padding:60px 0px;
        }

        .box-part{
            background:#FFF;
            border-radius:0;
            padding:60px 10px;
            margin:30px 0px;
        }
        .fa{
            color:#4183D7;
        }
    </style>
    <div class="box">
        <div class="container">
            <h2 class="text-center">Categorías</h2>
            <div class="row">
                <div class="col-lg-12">
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
    </div>
@stop

