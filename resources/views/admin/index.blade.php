@extends('layouts.base')

@section('title', 'SportGO - Panel de administrador')

@section('main')
    <h1 style="text-align: center;">Panel de administrador</h1>
    <div class="container-fluid">
        <div class="row my-5">
            <div class="col-6 border text-center">
                <h3 class="text-center">Productos</h3>
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <button type="button" class="btn btn-primary" onclick="location.href='/admin/cargar'">Cargar producto</button>           
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-primary"  onclick="location.href='/admin/listado'">Consultar listado de productos</button>
                    </div>
                </div>
            </div>

            <div class="col-6 border text-center">
                <h3 class="text-center">Usuarios</h3>
                <div class="col-12 d-flex">
                    <div class="col-12 justify-content-center">
                        <button type="button" class="btn btn-primary"  onclick="location.href='/admin/usuarios'">Consultar listado de usuarios</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-6 border text-center">
                <h3 class="text-center">Pedidos</h3>
                <div class="col-12 d-flex">
                    <div class="col-6 justify-content-center">
                        <button type="button" class="btn btn-primary"  onclick="location.href='/admin/pedidos/pendientes'">Ver pedidos pendientes</button>
                    </div>
                    <div class="col-6 justify-content-center">
                        <button type="button" class="btn btn-primary"  onclick="location.href='/admin/pedidos/historico'">Ver historico de pedidos</button>
                    </div>
                </div>
            </div>

            <div class="col-6 border text-center">
                <h3 class="text-center">Cuenta</h3>
                <div class="col-12 d-flex">
                    <div class="col-12 justify-content-center">
                        <button type="button" class="btn btn-primary"  onclick="location.href='/admin/estadocuenta'">Ver estado de cuenta</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection