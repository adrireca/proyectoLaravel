@include('parciales.head')

<div class="col-md-7 mx-5">
    <h2 class="featurette-heading fw-normal lh-1">Detalles de la pista {{$pista->id}}</h2>
    <p class="lead">Consulta todos los detalles</p>
</div>
<div class="container-fluid py-5 bg-light m-0">
    <div class="container">
        <div class="row">
            <div class="col-4">
                @if($pista->tipoPista=='tenis')
                    <img src="/img/wimbledon-pistas.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                @elseif($pista->tipoPista=='padel')
                    <img src="/img/padel1.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                @elseif($pista->tipoPista=='futbol')
                    <img src="/img/futbol1.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                @elseif($pista->tipoPista=='futbolSala')
                    <img src="/img/futbolSala1.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                @endif
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <p class="lead">Características</p>
                        @if($pista->luz)
                            <p>Esta pista tiene luz disponible</p>
                        @else
                            <p>Esta pista no tiene luz disponible</p>
                        @endif
                        @if($pista->cubierta)
                            <p>Esta pista está cubierta</p>
                        @else
                            <p>Esta pista no está cubierta</p>
                        @endif
                        @if($pista->disponible)
                            <div class="btn-group py-2">
                                <a href="/reserva/{{$pista->id}}"><button type="button" class="btn btn-sm btn-outline-primary">Reservar</button></a>
                            </div>
                        @else
                            <p class="text-danger">Pista no disponible</p>
                        @endif
                        <!-- @role('admin') -->
                        <div class="row">
                            <div class="col-1">
                                <div class="btn-group py-2">
                                    <a href="/modificar-pista/{{$pista->id}}"><button type="button" class="btn btn-sm btn-outline-primary">Editar</button></a>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="btn-group py-2">
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Borrar Pista</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Desea borrar esta la pista {{$pista->id}}. La acción no se podrá deshacer</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <form action="/pistas/{{$pista->id}}" method="post">
                                                        {{csrf_field()}}
                                                        @method('delete')
                                                        <input type="submit" class="btn btn-sm btn-outline-danger" value="Borrar">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Borrar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- @endrole -->
                        <nav>
                            <ul class="pagination">
                                @if($anteriorPista)
                                    <li class="page-item"><a class="page-link" href="/pistas/{{$anteriorPista}}">Anterior</a></li>
                                @else
                                    <li class="page-item disabled"><a class="page-link" href="/pistas/{{$anteriorPista}}">Anterior</a></li>
                                @endif
                                @if($siguientePista)
                                    <li class="page-item"><a class="page-link" href="/pistas/{{$siguientePista}}">Siguiente</a></li>
                                @else
                                    <li class="page-item disabled"><a class="page-link" href="/pistas/{{$siguientePista}}">Siguiente</a></li>
                                @endif
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('parciales.footer')
