@extends('layouts.app')

@section('title', 'Editar Empresa')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Editar Empresa: {{ $empresa->nombre }}</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            Editar Empresa
                        </div>
                        <div class="card-body">
                            <form action="{{ route('empresas.update', $empresa->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')  <!-- Método PUT para actualizar -->
                                
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $empresa->nombre) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $empresa->direccion) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $empresa->telefono) }}">
                                </div>

                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="text" name="celular" class="form-control" value="{{ old('celular', $empresa->celular) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="correo">Correo Electrónico</label>
                                    <input type="email" name="correo" class="form-control" value="{{ old('correo', $empresa->correo) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="link_pagina">Página Web</label>
                                    <input type="text" name="link_pagina" class="form-control" value="{{ old('link_pagina', $empresa->link_pagina) }}">
                                </div>

                                <div class="form-group">
                                    <label for="link_ubicacion">Ubicación (Google Maps)</label>
                                    <input type="text" name="link_ubicacion" class="form-control" value="{{ old('link_ubicacion', $empresa->link_ubicacion) }}">
                                </div>

                                <div class="form-group">
                                    <label for="ciudad_id">Ciudad</label>
                                    <select name="ciudad_id" class="form-control" required>
                                        @foreach($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}" {{ $ciudad->id == $empresa->ciudad_id ? 'selected' : '' }}>
                                                {{ $ciudad->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
