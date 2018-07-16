<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <a id="btn-encuestas" href="/encuestas/servicio" type="button" class="btn btn-default">Encuestas</a>
            </div>
            @if(Auth::user()->hasRole('viewer'))
            @else
                <div class="btn-group" role="group">
                    <a id="btn-carga" href="/encuestas/carga" type="button" class="btn btn-default">Cargar Base</a>
                </div>
            @endif
            <div class="btn-group" role="group">
                <a id="btn-reportes" href="/encuestas/reportes" type="button" class="btn btn-default">Reportes</a>
            </div>
        </div>
    </div>
</div>