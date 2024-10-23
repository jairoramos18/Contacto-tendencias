@extends('layouts.app')

@section('title', 'Crear Empresa')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Crear Empresa</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            Crear Empresa
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('empresas.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="text" name="celular" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="correo">Correo Electrónico</label>
                                    <input type="email" name="correo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="link_pagina">Página Web</label>
                                    <input type="text" name="link_pagina" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="link_ubicacion">Ubicación (Google Maps)</label>
                                    <input type="text" name="link_ubicacion" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="ciudad_id">Ciudad</label>
                                    <select name="ciudad_id" class="form-control" required>
                                        <option value="">Seleccione una ciudad</option>
                                        @foreach($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
