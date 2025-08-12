@extends('theme.' . $theme . '.layout')
@section('titulo')
    Menú
@endsection

@section("styles")
    <link rel="stylesheet" href="{{ asset('assets/js/jquery-nestable/jquery.nestable.css') }}">
@endsection

@section("scriptsPlugins")
<script src="{{ asset("assets/js/jquery-nestable/jquery.nestable.js") }}"></script>
@endsection

@section("scripts")
<script src="{{ asset("assets/pages/scripts/admin/menu/index.js") }}"></script>
@endsection

@section("contenido")
{{-- {{ dd($menus) }} --}}
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Menús</h3>
            </div>
            <div class="box-body">
                @csrf
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach ($menus as $key => $item)
                            {{-- {{ $item["menu_id"] }} --}}
                            @if ($item["menu_id"] != null)
                                @break
                            @endif
                            @include("admin.menu.menu-item", ["item" => $item])
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
