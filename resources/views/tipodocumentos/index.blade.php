@extends('layouts.app')

@section('title','Listado De Tipos de Documentos')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
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
							<a href="{{ route('tipodocumentos.create') }}" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover" style="width:100%">
								<thead class="text-primary">
									<tr>
										<th width="10px">ID</th>
										<th width="90px">Tipo Documento</th>
										<th width="60px">Abreviatura</th>
										<th width="60px">Estado</th>
										<th width="60px">Acción</th>
									</tr>
								</thead>
								<tbody>
									@foreach($tipodocumentos as $tipodocumento)
									<tr>
										<td>{{ $tipodocumento->id }}</td>
										<td>{{ $tipodocumento->nombre }}</td>
										<td>{{ $tipodocumento->abreviatura }}</td>
										<td>
											<input data-type="tipodocumento" data-id="{{$tipodocumento->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
											data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $tipodocumento->estado ? 'checked' : '' }}>
										</td>
										<td>
											<a href="{{ route('tipodocumentos.edit',$tipodocumento->id) }}" class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>
											<form class="d-inline delete-form" action="{{ route('tipodocumentos.destroy', $tipodocumento) }}" method="POST">
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
