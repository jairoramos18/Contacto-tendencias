@extends('layouts.app')

@section('title', 'Listado de Contactos')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid text-right">
            <a href="{{ route('contactos.create') }}" class="btn btn-primary mb-3" title="Nuevo Contacto">
                <i class="fas fa-plus nav-icon"></i> Nuevo Contacto
            </a>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white shadow-md rounded-lg">
                        <div class="card-header bg-secondary text-white text-lg font-semibold p-4">
                            @yield('title')
                        </div>
                        <div class="card-body p-4">
                            <table id="example1" class="min-w-full bg-white border border-gray-300 rounded-lg">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-4 py-2 text-left">ID</th>
                                        <th class="px-4 py-2 text-left">Nombre</th>
                                        <th class="px-4 py-2 text-left">Email</th>
                                        <th class="px-4 py-2 text-left">Celular</th>
                                        <th class="px-4 py-2 text-left">Asunto</th>
                                        <th class="px-4 py-2 text-left">Estado</th>
                                        <th class="px-4 py-2 text-left">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contactos as $contacto)
                                        <tr class="border-b hover:bg-gray-100">
                                            <td class="px-4 py-2">{{ $contacto->id }}</td>
                                            <td class="px-4 py-2">{{ $contacto->nombre_usuario }}</td>
                                            <td class="px-4 py-2">{{ $contacto->email }}</td>
                                            <td class="px-4 py-2">{{ $contacto->celular }}</td>
                                            <td class="px-4 py-2">{{ $contacto->asunto }}</td>
                                            <td class="px-4 py-2">
                                                <input data-type="contacto" 
                                                       data-id="{{ $contacto->id }}" 
                                                       class="toggle-class" 
                                                       type="checkbox" 
                                                       data-onstyle="success" 
                                                       data-offstyle="danger" 
                                                       data-toggle="toggle" 
                                                       data-on="Activo" 
                                                       data-off="Inactivo" 
                                                       {{ $contacto->estado == 'activo' ? 'checked' : '' }}>
                                            </td>
                                            <td class="px-4 py-2">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('contactos.edit', $contacto->id) }}" 
                                                       class="btn btn-info btn-sm" 
                                                       title="Editar">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form class="d-inline delete-form"
                                                          action="{{ route('contactos.destroy', $contacto) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
