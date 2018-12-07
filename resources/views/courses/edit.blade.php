@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Editar Curso</a>
        </div>
    </div>
@stop
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="content">
            {{ Form::model($course , array('route' => array('courses.update', $course->id), 'method' => 'PUT')) }}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('description', 'Descripción') }}
                        {{ Form::text('description', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('price', 'Precio (en MXN)') }}
                        {{ Form::number('price', null, array('class' => 'form-control border-input', 'required'=>'required', 'step' => 'any')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('duration', 'Duración (en horas)') }}
                        {{ Form::number('duration', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('topics', 'Temas') }}
                        {{ Form::text('topics', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('requirements', 'Requerimientos previos') }}
                        {{ Form::text('requirements', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('category', 'Categoría') }}
                        {{ Form::select('category', $categories, null, array('class' => 'form-control border-input', 'required'=>'required')) }}

                    </div>
                </div>
            </div>
            <div class="text-center">
                {{ Form::submit('Guardar cambios', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ url()->previous() }}">Cancelar</a>
            </div>
        {{ Form::close() }}
        </div>
    </div>
@stop