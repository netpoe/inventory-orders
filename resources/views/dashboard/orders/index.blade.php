@extends('layouts.dashboard')

@section('head-link')
    <link href="css/dashboard/orders/index.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Nombre Apellido</h4>
                        <h6>Status de verificación: <span class="text-gray">El visitador recibió los documentos</span></h6>
                        <h6>Status global: <span class="text-gray">Solicitud terminada</span></h6>
                        <nav class="user-resources-nav">
                            <small>Acceso rápido</small>
                            <a href="#" class="card-link">Usuario</a>
                            <a href="#" class="card-link">Préstamos</a>
                            <a href="#" class="card-link">Verificación</a>
                            <a href="#" class="card-link">Solicitud</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-block">
                        <!-- <h4 class="card-title">Acciones de la sección</h4> -->
                        <nav class="mt-0 user-resources-nav">
                            <small>Acciones de la sección</small>
                            <button class="btn btn-primary">Registrar nueva gestión</button>
                            <button class="btn btn-secondary">Enviar recordatorio</button>
                            <button class="btn btn-secondary">Subir documento interno</button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <div class="title">
                            <span>Estado histórico del usuario</span>
                        </div>
                        <nav class="action"></nav>
                    </div>
                    <div class="card-block card-block-scroll">
                        <div class="gestion-historica-del-usuario">
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Registro</h6>
                                    <p>El usuario se registró el 26 de Agosto del 2014 a las 18:53 horas</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Solicitud iniciada</h6>
                                    <p>El usuario inició una solicitud con ID: <a href="#">1234567</a> el 26 de Agosto del 2014 a las 18:56 horas</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Solicitud cancelada</h6>
                                    <p>El usuario canceló la solicitud <a href="#">1234567</a> el 26 de Agosto del 2014 a las 18:56 horas</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Solicitud rechazada</h6>
                                    <p>La solicitud <a href="#">12345</a> del usuario no procedió. Razones: Rechazo automático.</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Solicitud terminada</h6>
                                    <p>El usuario terminó la solicitud <a href="#">1234567</a> el 26 de Agosto del 2014 a las 18:56 horas</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Llamada de verificación pendiente</h6>
                                    <p>El usuario tiene pendiente una llamada de verificación</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Cita de verificación pendiente</h6>
                                    <p>El usuario tiene pendiente agendar una cita de verificación</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Cita de verificación agendada</h6>
                                    <p>El usuario tiene una cita de verificación con Gestor Nombre el 21 de Noviembre del 2017 a las 12:45pm</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Rechazado después de cita de verificación</h6>
                                    <p>El usuario fue rechazado después de la cita de verificación. Razón: La ubicación del negocio no coincide con la dirección del negocio.</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Préstamo pendiente</h6>
                                    <p>El usuario tiene un préstamo pendiente de dispersión</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Préstamo vigente</h6>
                                    <p>El usuario tiene un préstamo vigente con ID <a href="#">12345</a> de $50,000</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Préstamo atrasado</h6>
                                    <p>El usuario tiene un préstamo atrasado con ID <a href="#">12345</a> de $50,000</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small></small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <h6>Estatus: Nueva solicitud disponible</h6>
                                    <p>El usuario tiene una nueva solicitud disponible</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="title">
                            <span>Gestión histórica del usuario</span>
                        </div>
                        <nav class="action"></nav>
                    </div>
                    <div class="card-block card-block-scroll">
                        <div class="gestion-historica-del-usuario">
                            <article>
                                <div class="top">
                                    <small>Gestor: Nombre Apellido</small>
                                    <small>Hace 3 días</small>
                                </div>
                                <div class="content">
                                    <!-- <h6>Motivo: </h6> -->
                                    <p>El cliente indica que no le ha llegado ningún correo de verificación</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small>Gestor: Nombre Apellido</small>
                                    <small>Hace 7 días</small>
                                </div>
                                <div class="content">
                                    <!-- <h6>Motivo: </h6> -->
                                    <p>El cliente llamó para indicar que no ha recibido su préstamo desde hace 3 días</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                            <article>
                                <div class="top">
                                    <small>Gestor: Nombre Apellido</small>
                                    <small>Hace 7 días</small>
                                </div>
                                <div class="content">
                                    <!-- <h6>Motivo: </h6> -->
                                    <p>El cliente llamó para felicitar al equipo de atención el cliente por su gran soporte</p>
                                </div>
                                <div class="bottom"></div>
                            </article>
                        </div>
                    </div>
                    <div class="card-footer">
                        <fieldset class="form-group">
                            <textarea name="" class="form-control" placeholder="Escribe para registrar una nueva gestión"></textarea>
                        </fieldset>
                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-secondary">Enviar</button>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <div class="title">
                            <span>Bitácora de verificación</span>
                        </div>
                        <nav class="action"></nav>
                    </div>
                    <div class="card-block"> </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="title">
                            <span>Gestión de documentos</span>
                        </div>
                        <nav class="action"></nav>
                    </div>
                    <div class="card-block"> </div>
                </div>
            </div>
        </div>
    </div>
@endsection