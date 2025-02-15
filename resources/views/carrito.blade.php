@extends('layouts.base')

@section('title', 'SportGO - Carrito')

@section('main')
<div class="container">

    <div class="container mt-4">
        <h4 class="text-center" style="padding: .3em;">Carrito</h4>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mt-4">
                <div class="container overflow-y-auto" style="border:1px solid gray ; border-radius: 15px; height: 15em;">
                    @if(!$carrito)
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart mt-4" viewBox="0 0 16 16" style="color:gray; cursor:pointer;" id="buyCart-icon">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        <h4>¡Empezá tu carrito de compras!</h4>
                        <button type="submit" class="btn" style="border-radius: 10px; background-color: #d9db26;">Buscar Productos</button>
                    @else
                        @foreach($carrito["carrito"]["productos"] as $producto)
                            <div class="row">
                                <div class="col-6">

                                    <div class="row">
                                        <div class="col-12">
                                            <h4>{{ $producto['nombre'] }}</h4>
                                            <p class="d-flex">Cantidad: {{ $producto['cantidad'] }}</p>                      
                                        </div>      
                                    </div>

                                </div>


                                <div class="col-3 align-self-center">
                                    <h4>${{ $producto['precio_unitario'] }}</h4>
                                </div>
                            </div>
                            @endforeach
                    @endif
                </div>
            </div> 
            <div class="col-4 mt-1">
                <div class="mt-4" style="border:1px solid gray ; border-radius: 15px;">
                    <h5 class="ms-2 mt-2">Resumen de compra</h5>
                    <hr class="border border-secondary mt-0">
                    @if(!$carrito)
                        <p class="ms-2">Aqui veras los importes de tu compra una vez que agregues productos</p>
                    @else
                        @foreach($carrito["carrito"]["productos"] as $producto)
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12 ms-2">
                                            <p>{{ $producto['nombre'] }}</p>
                                            <p id="cantidad">Cantidad: {{ $producto['cantidad'] }}</p>
                                        </div>      
                                    </div>
                                </div>
                                <div class="col-6 align-self-center">
                                    <h3>${{ $producto['precio_total'] }}</h3>
                                </div>
                            </div>
                        @endforeach
                        <hr class="border border-secondary mt-0">
                        <h5 class="ms-2 mt-2">Total a pagar: ${{ $carrito["carrito"]["total_a_pagar"] }}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($carrito && session('user'))
        <div class="row">
            <div class="container mt-3 text-end">
                <button class="btn" style="border-radius: 10px; background-color: #d9db26;" onclick='location.href="/checkout"'>FINALIZAR COMPRA</button>
            </div>
        </div>
    @else

        <div class="row">
            <div class="container mt-3 text-end">
                <h5>Inicie sesión para poder continuar</h5>
                <button class="btn disabled" style="border-radius: 10px; background-color: #d9db26;">FINALIZAR COMPRA</button>
            </div>
        </div>
        
    @endif

        <div class="row">
            <div class="container mt-3 text-end">
                <button class="btn" style="border-radius: 10px; background-color: lightcoral;" onclick="document.getElementById('deleteCart-form').submit(); return false;">ELIMINAR CARRITO</button>
            </div>
        </div>
    
    <form id="deleteCart-form" action="{{ route('eliminar.carrito') }}" method="POST">
        @csrf
    </form>
</div>
@endsection