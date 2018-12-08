@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{ $course->name }}</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <td><b>Descripción</b></td>
                        <td>{{$course->description}}</td>
                    </tr>
                    <tr>
                        <td><b>Categoría</b></td>
                        <td>{{$course->cat->name}}</td>
                    </tr>

                    <tr>
                        <td><b>Precio</b></td>
                        <td>${{$course->price}}</td>
                    </tr>

                    <tr>
                        <td><b>Duración</b></td>
                        <td>{{$course->duration}}</td>
                    </tr>

                    <tr>
                        <td><b>Calificación</b></td>
                        <td>{{$course->rating}}</td>
                    </tr>

                    <tr>
                        <td><b>Requisitos</b></td>
                        <td>{{$course->requirements}}</td>
                    </tr>

                    <tr>
                        <td><b>Temas</b></td>
                        <td>{{$course->topics}}</td>
                    </tr>

                    <tr>
                        <td><b>Instructor</b></td>
                        <td>{{$course->instructorUser->name}}</td>
                    </tr>

                    <tr>
                        <td><b>Fecha de creación</b></td>
                        <td>{{date('d/m/Y', strtotime($course->created_at))}}</td>
                    </tr>

                </tbody>
            </table>

            @if(Auth::user()->courses()->find($course->id))
                <div class="form-group">
                    <h5>Material</h5>
                    @foreach($course->files as $file)
                        <div style="padding: 10px">
                            <a href="{{Storage::url($file->path)}}">{{$file->name}}</a>
                        </div>
                    @endforeach
                </div>
            @endif


            <div class="text-center">
                @if(Auth::id() == $course->instructor)
                    <a class="btn btn-small btn-info" href="{{ route('courses.edit', ['course' => $course->id]) }}">Editar</a>
                    {{Form::open(['style' => 'display: inline-block', 'method'  => 'DELETE', 'route' => ['courses.destroy', $course->id]])}}
                        <button class="btn btn-small btn-danger">Eliminar</button>
                    {{Form::close()}}
                @elseif($canBuy)
                    {{Form::open(['style' => 'display: inline-block', 'method'  => 'POST', 'route' => ['courses.buy', $course->id]])}}
                        <button class="btn btn-small btn-danger">Comprar</button>
                    {{Form::close()}}
                @endif
                <a class="btn btn-small btn-secondary" href="{{
                    request()->route()->named('users.courses.show') ?
                    route('users.courses') : route('courses.index')
                }}">Regresar</a>
            </div>
        </div>
    </div>
@stop

