@extends('layouts.base')

@section('title', 'SportGO - Cargar productos')

@section('main')

        <!-- Mostrar mensajes flash -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center mt-2" role="alert">
                <strong>¡Éxito!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center mt-2" role="alert">
                <strong>Error:</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show text-center mt-2" role="alert">
                <strong>Advertencia:</strong> {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show text-center mt-2" role="alert">
                <strong>¡Ups!</strong> Hay algunos problemas con el formulario:
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        
    <div class="container">

        <form class="form-carga" method="POST" action="{{ route('producto.cargar') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-12 my-3">
                    <h2 style="text-align: center;">Cargar nuevo producto</h2>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="nombre_producto">Nombre</label>
                            <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Ingrese el nombre del producto" aria-label="Nombre del producto" required>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="descripcion_producto">Descripcion</label>
                            <input type="text" name="descripcion_producto" id="descripcion_producto" class="form-control" placeholder="Ingrese la descripción del producto" aria-label="Descripción del producto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="precio_producto">Precio unitario</label>
                            <input type="text" name="precio_producto" id="precio_producto" class="form-control" placeholder="Ingrese el precio del producto" aria-label="Precio del producto" required>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="stock_producto">Stock disponible (en unidades)</label>
                            <input type="text" name="stock_producto" id="stock_producto" class="form-control" aria-label="Stock del producto" placeholder="Ingrese el stock del producto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 my-4">
                            <label for="codigo_producto">Código de producto</label>
                            <input type="text" name="codigo_producto" id="codigo_producto" class="form-control" placeholder="Ingrese el código de producto" aria-label="Código del producto" required>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 text-center">
                            <span style="color: gray;">Todos los campos son obligatorios</span>
                        </div>
                    </div>
                    


                    <div class="row text-center">
                        <div class="col-12 p-2">
                            <button type="submit" class="btn btn-warning cargarBoton" value="cargar" name="action" style="background-color: #d9db26; border-radius: 15px;"> 
                                <h5 class="mt-1">Cargar</h5>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $('.cargarBoton').click(function() {
            $(this).html(`
                <div class="spinner-border text-dark" role="status">
                <span class="visually-hidden">Loading...</span>
                </div>
            `);
        });
    </script>
    
@endsection
