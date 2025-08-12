@extends('theme.' . $theme . '.layout')
@section('titulo')
    Roles
@endsection

@section('scripts')
    <script src="{{ asset('assets/pages/scripts/admin/index.js') }}"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.mensaje')
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('rol.crear') }}" class="btn btn-block btn-success btn-sm">
                            <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                        </a>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-hover table-striped" id="tabla-data">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th class="width70"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td>{{ $rol->nombre }}</td>
                                    <td>
                                        <a href="{{ route("rol.editar", $rol) }}" class="btn-accion-tabla tooltipsC"
                                            title="Editar este registro">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <form action="{{ route("rol.eliminar", $rol) }}" class="d-inline form-eliminar"
                                            method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                title="Eliminar este registro">
                                                <i class="fa fa-fw fa-trash text-danger"></i>
                                            </button>
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
@endsection
