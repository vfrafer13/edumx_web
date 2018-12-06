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
            <div class="text-center">
                <a class="btn btn-small btn-info" href="{{ route('courses.edit', ['course' => $course->id]) }}">Editar</a>
                {{Form::open(['style' => 'display: inline-block', 'method'  => 'DELETE', 'route' => ['courses.destroy', $course->id]])}}
                    <button class="btn btn-small btn-danger">Eliminar</button>
                {{Form::close()}}
                <a class="btn btn-small btn-secondary" href="{{ url()->previous() }}">Regresar</a>
            </div>
        </div>
    </div>
@stop

