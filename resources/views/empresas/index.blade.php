@extends('layouts.app')

@section('title', 'Lista de Empresas')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="text-2xl font-bold">Lista de Empresas</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <a href="{{ route('empresas.create') }}" class="btn btn-primary">Crear Nueva Empresa</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-gray-800 text-white">
                            Empresas
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($empresas->isEmpty())
                                <div class="alert alert-warning">
                                    No hay empresas registradas.
                                </div>
                            @else
                                <table id="empresasTable" class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-blue-200 text-blue-800">
                                            <th class="px-2 py-2 text-sm">ID</th>
                                            <th class="px-2 py-2 text-sm">Nombre</th>
                                            <th class="px-2 py-2 text-sm">Logo</th>
                                            <th class="px-2 py-2 text-sm">Dirección</th>
                                            <th class="px-2 py-2 text-sm">Teléfono</th>
                                            <th class="px-2 py-2 text-sm">Celular</th>
                                            <th class="px-2 py-2 text-sm">Correo</th>
                                            <th class="px-2 py-2 text-sm">Página Web</th>
                                            <th class="px-2 py-2 text-sm">Ubicación</th>
                                            <th class="px-2 py-2 text-sm">Ciudad</th>
                                            <th class="px-2 py-2 text-sm">Estado</th>
                                            <th class="px-2 py-2 text-sm">Registrado Por</th>
                                            <th class="px-2 py-2 text-sm">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($empresas as $empresa)
                                            <tr class="border-b hover:bg-gray-100 {{ $loop->iteration % 2 == 0 ? 'bg-blue-50' : 'bg-white' }}">
                                                <td class="px-2 py-2 text-sm">{{ $empresa->id }}</td>
                                                <td class="px-2 py-2 text-sm">{{ $empresa->nombre }}</td>
                                                <td class="px-2 py-2 text-sm">
                                                    @if($empresa->logo)
                                                        <img src="{{ asset($empresa->logo) }}" alt="Logo" class="w-8 h-auto">
                                                    @else
                                                        Sin logo
                                                    @endif
                                                </td>
                                                <td class="px-2 py-2 text-sm">{{ $empresa->direccion }}</td>
                                                <td class="px-2 py-2 text-sm">{{ $empresa->telefono }}</td>
                                                <td class="px-2 py-2 text-sm">{{ $empresa->celular }}</td>
                                                <td class="px-2 py-2 text-sm">{{ $empresa->correo }}</td>
                                                <td class="px-2 py-2 text-sm">{{ $empresa->link_pagina }}</td>
                                                <td class="px-2 py-2 text-sm">{{ $empresa->link_ubicacion }}</td>
                                                <td class="px-2 py-2 text-sm">{{ $empresa->ciudad ? $empresa->ciudad->nombre : 'N/A' }}</td>
                                                <td class="px-2 py-2 text-sm">
                                                    <input data-type="empresa" 
                                                           data-id="{{ $empresa->id }}" 
                                                           class="toggle-class" 
                                                           type="checkbox" 
                                                           data-onstyle="success" 
                                                           data-offstyle="danger" 
                                                           data-toggle="toggle" 
                                                           data-on="Activo" 
                                                           data-off="Inactivo" 
                                                           {{ $empresa->estado ? 'checked' : '' }}>
                                                </td>
                                                <td class="px-2 py-2 text-sm">{{ $empresa->registradoPor ? $empresa->registradoPor->name : 'N/A' }}</td>
                                                <td class="px-2 py-2 text-sm">
                                                    <div class="btn-group" role="group" aria-label="Acciones">
                                                        <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-info btn-sm">Ver</a>
                                                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta empresa?');">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
