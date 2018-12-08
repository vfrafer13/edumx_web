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
            {{ Form::model($course , array('route' => array('courses.update', $course->id), 'method' => 'PUT', 'enctype' => "multipart/form-data")) }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        {{ Form::label('description', 'Descripción') }}
                        {{ Form::text('description', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('category', 'Categoría') }}
                        {{ Form::select('category', $categories, null, array('class' => 'form-control border-input', 'required'=>'required')) }}

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('price', 'Precio (en MXN)') }}
                        {{ Form::number('price', null, array('class' => 'form-control border-input', 'required'=>'required', 'step' => 'any')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('duration', 'Duración (en horas)') }}
                        {{ Form::number('duration', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('topics', 'Temas') }}
                        {{ Form::text('topics', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('requirements', 'Requerimientos previos') }}
                        {{ Form::text('requirements', null, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="course-image">Portada del curso</label>

                <img src="{{ Storage::url($course->cover_path) }}" class="img-responsive" style="height:150px; margin: 10px">

                <input id="course-image" name="course-image" type="file" class="form-control">

            </div>

            <div class="form-group">
                <label for="course-file">Material</label>

                @foreach($course->files as $file)
                    <div style="margin: 5px">
                        <span class="col-sm-6">{{$file->name}}</span>
                        <a type="button" class="btn" onclick=""><i class="fa fa-trash"></i></a>
                    </div>
                @endforeach

                <input id="course-file" name="course-file[]" type="file" multiple class="form-control">
            </div>

            <div class="text-center">
                {{ Form::submit('Guardar cambios', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ route('users.courses.show', [$course->id]) }}">Cancelar</a>
            </div>
        {{ Form::close() }}


        </div>
    </div>

{{--    <div class="card">
        <div class="content">

            <form enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="course-image">Portada del curso</label>

                    <div class="file-loading">
                        <input id="course-image" name="course-image" type="file">
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="card">
        <div class="content">

            <div class="form-group">
                <label for="course-file">Material</label>

                <input type="hidden" name="course-id" id="course-id" value="asdf">

                <div class="file-loading">
                    <input id="course-file" name="course-file" type="file" multiple>
                </div>
            </div>

        </div>
    </div>--}}

{{--    <script>
        $(document).ready(function () {

            $('#course-image').fileinput({
                theme: 'explorer-fa',
                language: 'es',
                uploadExtraData: {course_id: '{{ $course->id }}'},
                uploadUrl: '{{ url('api/upload') }}',
                allowedFileExtensions: ['jpg', 'png', 'gif']
            });

            $('#course-file').fileinput({
                theme: 'explorer-fa',
                language: 'es',
                uploadExtraData: {course_id: '{{ $course->id }}'},
                uploadUrl: '{{ url('api/upload') }}'
                // allowedFileExtensions: ['jpg', 'png', 'pdf', 'txt']
            });

        });
    </script>--}}

@stop