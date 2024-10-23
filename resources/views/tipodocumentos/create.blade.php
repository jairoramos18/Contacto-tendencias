@extends('layouts.app')

@section('title', 'Crear Tipo Documento')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <!-- Puedes agregar un título o mensaje aquí si lo deseas -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3>{{ __('Crear Tipo Documento') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('tipodocumentos.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <!-- Campo para el nombre -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre <strong class="text-danger">*</strong></label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                                   name="nombre" 
                                                   placeholder="Por ejemplo, Cédula de Ciudadanía" 
                                                   autocomplete="off" 
                                                   value="{{ old('nombre') }}">
                                            <!-- Mostrar el mensaje de error si existe -->
                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Campo para la abreviatura -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Abreviatura <strong class="text-danger">*</strong></label>
                                            <input type="text" class="form-control @error('abreviatura') is-invalid @enderror" 
                                                   name="abreviatura" 
                                                   placeholder="Por ejemplo, CC" 
                                                   autocomplete="off" 
                                                   value="{{ old('abreviatura') }}">
                                            <!-- Mostrar el mensaje de error si existe -->
                                            @error('abreviatura')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Campos ocultos para estado y registrado por -->
                                <input type="hidden" name="estado" value="1">
                                <input type="hidden" name="registradopor" value="{{ Auth::user()->id }}">
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3">
                                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                                    </div>
                                    <div class="col-lg-2 col-md-3">
                                        <a href="{{ route('tipodocumentos.index') }}" class="btn btn-danger btn-block">Atrás</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

