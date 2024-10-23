@extends('layouts.app')

@section('title','Listado De Ciudades')

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
						<div class="card-header bg-secondary" style="font-size: 1.75rem;font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem;">
							@yield('title')
							<a href="{{ route('ciudads.create') }}" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover" style="width:100%">
                                <thead class="text-primary">
									<th width="10px">ID</th>
									<th>País</th>
									<th>Departamento</th>
									<th>Ciudad</th>
									<th width="60px">Estado</th>
									<th width="50px">Acción</th>
                                </thead>
                                <tbody>
									@foreach($ciudads as $ciudad)
									<tr>
										<td>{{ $ciudad->id }}</td>
										<td>{{ $ciudad->departamento->pais->nombre }}</td>
										<td>{{ $ciudad->departamento->nombre }}</td>
										<td>{{ $ciudad->nombre }}</td>
										<td>
											<input data-type="ciudad" data-id="{{$ciudad->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
											data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $ciudad->estado ? 'checked' : '' }}>
										</td>
										<td>
											<a href="{{ route('ciudads.edit',$ciudad->id) }}" class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>
											<form class="d-inline delete-form" action="{{ route('ciudads.destroy', $ciudad) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
											</form>
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
