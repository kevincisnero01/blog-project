@extends('adminlte::page')

@section('title', 'Crear Post')

@section('content_header')
    <h1>Crear Nuevo Post</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{ Form::open(['route' => 'admin.posts.store']) }}

        <div class="form-group">
            {{ Form::label('name','Nombre') }}
            {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese el Nombre']) }}
            @error('name') <span class="text-danger">{{ $message}}</span> @enderror
        </div>

        <div class="form-group">
            {{ Form::label('slug','Slug') }}
            {{ Form::text('slug',null,['class' => 'form-control','placeholder' => 'Ingrese el Slug','readonly']) }}
            @error('slug') <span class="text-danger">{{ $message}}</span> @enderror
        </div>

        <div class="form-group">
            <p class="font-weight-bold">Categoria</p>
            {{ Form::select('category_id',$categories,null, ['class' => 'form-control']) }}
            @error('category_id') <span class="text-danger d-block">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <p class="font-weight-bold">Etiquetas</p>
            @foreach($tags as $tag)
                <label class="mr-2">
                    {{ Form::checkbox('tags[]',$tag->id,null) }}
                    {{ $tag->name}}
                </label>
            @endforeach
            @error('tags') <span class="text-danger d-block">{{ $message}}</span> @enderror
        </div>

        <div class="form-group">
            {{ Form::label('extract','Extracto') }}
            {{ Form::textarea('extract',null, ['class' => 'form-control','placeholder' => 'Ingrese el extracto del post que desea escribir...','rows' => '3']) }}
            @error('extract') <span class="text-danger">{{ $message}}</span> @enderror
        </div>

        <div class="form-group">
            {{ Form::label('body','Cuerpo del Post') }}
            {{ Form::textarea('body',null, ['class' => 'form-control','placeholder' => 'Ingrese el cuerpo del post que desea escribir...','rows' => '5']) }}
            @error('body') <span class="text-danger">{{ $message}}</span> @enderror
        </div>

         <div class="form-group">
            <p class="font-weight-bold">Estado</p>
                <label class="mr-2">
                    {{ Form::radio('status',1,true) }}
                    Borrador
                </label>
                <label class="mr-2">
                    {{ Form::radio('status',2) }}
                    Publicado
                </label>
            @error('status') <span class="text-danger">{{ $message}}</span> @enderror
        </div>

        {{ Form::submit('Crear Post',['class' => 'btn btn-primary btn-lg']) }}

        {{ Form::close() }}
    </div>
</div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
