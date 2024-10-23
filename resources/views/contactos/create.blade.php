@extends('layouts.app')

@section('title', 'Crear Contacto')

@section('content')

<div class="content-wrapper">
    <section class="content-header" style="text-align: right;">
        <div class="container-fluid">
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            Crear Contacto
                        </div>
                        <div class="card-body">
                            <form action="{{ route('contactos.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre_usuario">Nombre</label>
                                    <input type="text" name="nombre_usuario" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="text" name="celular" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="asunto">Asunto</label>
                                    <input type="text" name="asunto" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select name="estado" class="form-control" required>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
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
