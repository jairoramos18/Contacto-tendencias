@extends('layouts.app')

@section('title', 'Detalles de la Empresa')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Detalles de la Empresa</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            {{ $empresa->nombre }}
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>ID:</strong> {{ $empresa->id }}</li>
                                <li class="list-group-item"><strong>Nombre:</strong> {{ $empresa->nombre }}</li>
                                <li class="list-group-item"><strong>Dirección:</strong> {{ $empresa->direccion }}</li>
                                <li class="list-group-item"><strong>Teléfono:</strong> {{ $empresa->telefono }}</li>
                                <li class="list-group-item"><strong>Celular:</strong> {{ $empresa->celular }}</li>
                                <li class="list-group-item"><strong>Correo:</strong> {{ $empresa->correo }}</li>
                                <li class="list-group-item"><strong>Ciudad:</strong> {{ $empresa->ciudad->nombre ?? 'No especificada' }}</li>
                                <!-- Agrega otros campos que quieras mostrar -->
                            </ul>
                            <a href="{{ route('empresas.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
