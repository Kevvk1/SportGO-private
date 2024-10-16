@extends('layouts.base')

@section('title', 'SportGO - Pago')
@section('head')
<script src="https://sdk.mercadopago.com/js/v2"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main')

    <div class="container-fluid">

        <div class="progress-stacked my-3">
            <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                <div class="progress-bar bg-warning text-dark">¿A dónde lo enviamos?</div>
            </div>
            <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <div class="progress-bar bg-success">Realizar el pago</div>
            </div>
        </div>


        <h1 class="mt-3 text-center">Ultimo paso: realizar pago</h1>
        <div class="container-fluid text-align-center" id="wallet_container" style="width: 20%;"></div>

    </div>

<script>
    const mp = new MercadoPago('APP_USR-f9f66983-2a3e-4639-8db4-518cd88c5b9e', {
        locale: "es-AR",
    });
    // Configura el widget de Mercado Pago Wallet
    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "{{ $preference->id }}", // Usa el ID de preferencia pasado desde el backend
        },
        customization: {
            texts: {
                valueProp: 'smart_option',
            },
        },
    });
</script>

@endsection