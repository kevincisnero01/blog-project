@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Actualizar Usuario</h1>

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('status')}}</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

@stop

@section('content')
<div class="card">
    <div class="card-body">
    {!! Form::model($user,['route' => ['admin.users.update',$user->id],'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Ingrese su nombre','required' => 'required']) !!}
            @error('name') <span class="text-red">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            {!! Form::label('email','Correo') !!}
            {!! Form::text('email',null, ['class' => 'form-control','placeholder' => 'Ingrese su correo example@gmail.com','required' => 'required']) !!}
            @error('email') <span class="text-red">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Roles</label><br>               
            @foreach ($roles as $role)
                <label for="{{ $role->name }}" class="mr-2">
                    {!! Form::radio('role', $role->id,null, ['id' => $role->name,'required' => 'required']) !!}
                    {{ $role->name }}
                </label>
            @endforeach
            <br>
            @error('role') <span class="text-red">{{ $message }}</span> @enderror
        </div>

        {!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary btn-lg mt-2']) !!}
        
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-2 float-right">Volver</a>

    {!! Form::close() !!}
    </div>
</div>  
@stop