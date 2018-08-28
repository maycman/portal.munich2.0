@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <button class="btn btn-danger" onclick="history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span> Volver</button>
        </div>
    </div>
    <div class="row separa">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">¡Atención!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    No se encontrarón resultados en la Base de Datos.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection