@extends('layouts.base')

@section('title', 'SportGO - Mi perfil')

@section('main')

    <h1 class="mt-3 text-center">Mi perfil</h1>

    @if(!$usuario)
        <div class="container-fluid text-center mt-5">
            <p class="fs-5">No se encontró el usuario</p>
        </div>
    @else
        <div class="container-fluid">
            <div class="container border shadow p-3 mb-5 bg-body-tertiary rounded my-5">
                <h4>Información personal</h4>
                <div class="row">
                    <div class="col-6 mb-2">
                        Nombre: {{$usuario -> nombres}}
                    </div>
                    <div class="col-6 mb-2">
                        Apellido: {{$usuario -> apellidos}}
                    </div>
                    <div class="col-6 mb-2">
                        DNI: {{$usuario -> dni}}
                    </div>
                    <div class="col-6 mb-2">
                        Fecha de nacimiento: {{$usuario -> fecha_nacimiento}}
                    </div>
                </div>
            </div>
            <div class="container border shadow p-3 mb-5 bg-body-tertiary rounded my-5">
                <h4>Información de la cuenta</h4>
                <div class="row">
                    <div class="col-6 mb-2">
                        Correo electrónico: {{$usuario -> email}}
                    </div>
                    <div class="col-6">
                        Fecha de creación de cuenta: {{$usuario -> created_at}}
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection