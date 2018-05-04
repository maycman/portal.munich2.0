@extends("layout")
@section("content")
<div class="container animated fadeInDown">
    <div class="row vertical-align">
        <div class="col-sm-6 col-md-offset-3">
            <div class="title-sub">Servicio de 4 Semanas</div>
        </div>
    </div>
</div>
<div class="container-fluid animated fadeInDown">
    <div class="row">
        <div class="col-sm-2">
            <button class="btn btn-danger" onclick="history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span> Volver</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2 mgn-top">
            {!! Alert::render() !!}
        </div>
    </div>
</div>
<div class="container-fluid mgn-top animated bounceInUp">
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Fecha de llegada</th>
                        <th>Chasis</th>
                        <th>Tipo de automovil</th>
                        <th>Ultimo servicio realizado</th>
                        <th>Fecha ultimo servicio</th>
                        <th>Servicio pendiente</th>
                        <th>Fecha servicio pendiente</th>
                        <th>Proximo servicio</th>
                        <th>Fecha proximo servicio</th>
                        <th>Tecnico que llevó el servicio</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach($datos as $row)
                        <tr>
                            <td>{{ $row->id_auto }}</td>
                            <td>{{ $row->fecha_llegada }}</td>
                            <td>{{ $row->chasis }}</td>
                            <td>{{ $row->tipo_auto }}</td>
                            <td>{{ $row->ultimo_servicio }}</td>
                            <td>{{ $row->fecha_ultimo_servicio }}</td>
                            <td>{{ $row->servicio_pendiente }}</td>
                            <td>{{ $row->fecha_servicio_pendiente }}</td>
                            <td>{{ $row->proximo_servicio }}</td>
                            <td>{{ $row->fecha_proximo_servicio }}</td>
                            <td>{{ $row->tecnico }}</td>
                            <td>
                                <a class="btn btn-default btn-small" href="/4semanas/agrega/{{ $row->id_auto }}">
                                @if($row->tecnico==""||$row->ultimo_servicio==null)
                                Agregar servicio
                                @else
                                Editar
                                @endif
                                </a>
                                @if($row->tecnico!="")
                                <a data-toggle="modal" class="btn btn-success btn-small" href="#confirmar">Liberar</a>
                                <a id="liberar" class="hide" href="/4semanas/liberar/{{ $row->id_auto }}">Submit</a>
                                @endif
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