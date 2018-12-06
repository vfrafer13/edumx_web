@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Nuevo Curso</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            {{ Form::open(array('url' => 'courses')) }}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name', Input::old('name'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('description', 'Descripción') }}
                        {{ Form::text('description', Input::old('description'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('price', 'Precio (en MXN)') }}
                        {{ Form::text('price', Input::old('price'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('duration', 'Duración (en horas)') }}
                        {{ Form::text('duration', Input::old('duration'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('topics', 'Temas') }}
                        {{ Form::text('topics', Input::old('topics'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('requirements', 'Requerimientos previos') }}
                        {{ Form::text('requirements', Input::old('requirements'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('category', 'Categoría') }}
                        {{ Form::select('category', $categories, Input::old('category'), array('class' => 'form-control border-input', 'required'=>'required')) }}

                    </div>
                </div>
            </div>
            <div class="text-center">
                {{ Form::submit('Guardar curso', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ URL::to('user_courses/') }}">Cancelar</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>

@stop