@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? 'Show Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('producto.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Prod Id:</strong>
                            {{ $producto->prod_id }}
                        </div>
                        <div class="form-group">
                            <strong>Prod Descripcion:</strong>
                            {{ $producto->prod_descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Prod Precioc:</strong>
                            {{ $producto->prod_precioc }}
                        </div>
                        <div class="form-group">
                            <strong>Prod Preciov:</strong>
                            {{ $producto->prod_preciov }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
