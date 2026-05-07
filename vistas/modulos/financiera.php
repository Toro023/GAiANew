<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Financiera</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">Financiera</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Apoyo de sostenimiento</h3>
        </div>

        <div class="card-body">

            <!-- BOTONES SUPERIORES -->
            <div class="mb-3">
                <button class="btn btn-success mr-2 mb-2">
                    <i class="fas fa-lock"></i> Apoyo de sostenimiento
                </button>

                <button class="btn btn-success mr-2 mb-2">
                    <i class="fas fa-car"></i> Apoyo de transporte
                </button>

                <button class="btn btn-success mr-2 mb-2">
                    <i class="fas fa-utensils"></i> Apoyo de alimentación
                </button>

                <button class="btn btn-success mr-2 mb-2">
                    <i class="fas fa-phone"></i> Apoyo de datos
                </button>
            </div>

            <!-- TABLA SOSTENIMIENTO -->
            <table id="tblSostenimiento" class="table tbl-GAiA table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Ficha</th>
                        <th>Estado</th>
                        <th>Última modificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Arnulfo Salamandra</td>
                        <td>arnulfo.salamandra@gmail.com</td>
                        <td>3063989</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>06/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Juan Pérez</td>
                        <td>juan@gmail.com</td>
                        <td>3063990</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm">Pendiente</button>
                        </td>
                        <td>07/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>María López</td>
                        <td>maria@gmail.com</td>
                        <td>3063991</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>08/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Carlos Ramírez</td>
                        <td>carlos@gmail.com</td>
                        <td>3063992</td>
                        <td class="text-center"><button class="btn btn-success btn-sm">Aprobado</button></td>
                        <td>09/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- TABLA TRANSPORTE -->
            <table id="tblTransporte/" class="table tbl-GAiA table-bordered table-striped" style="display:none">
                <thead>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Ficha</th>
                        <th>Estado</th>
                        <th>Última modificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Arnulfo Salamandra</td>
                        <td>arnulfo.salamandra@gmail.com</td>
                        <td>3063989</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>06/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Juan Pérez</td>
                        <td>juan@gmail.com</td>
                        <td>3063990</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>07/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Luisa Martínez</td>
                        <td>luisa@gmail.com</td>
                        <td>3063993</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>10/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Andrés Torres</td>
                        <td>andres@gmail.com</td>
                        <td>3063994</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>11/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>



            <!-- TABLA ALIMENTACIÓN -->
            <table id="tblAlimentacion/" class="table tbl-GAiA table-bordered table-striped" style="display:none">
                <thead>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Ficha</th>
                        <th>Estado</th>
                        <th>Última modificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Arnulfo Salamandra</td>
                        <td>arnulfo.salamandra@gmail.com</td>
                        <td>3063989</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>06/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Juan Pérez</td>
                        <td>juan@gmail.com</td>
                        <td>3063990</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>07/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Sofía Herrera</td>
                        <td>sofia@gmail.com</td>
                        <td>3063995</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>12/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Diego Castro</td>
                        <td>diego@gmail.com</td>
                        <td>3063996</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm">Pendiente</button>
                        </td>
                        <td>13/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- TABLA DATOS -->
            <table id="tblDatos/" class="table tbl-GAiA table-bordered table-striped" style="display:none">
                <thead>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Ficha</th>
                        <th>Estado</th>
                        <th>Última modificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Arnulfo Salamandra</td>
                        <td>arnulfo.salamandra@gmail.com</td>
                        <td>3063989</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>06/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Juan Pérez</td>
                        <td>juan@gmail.com</td>
                        <td>3063990</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>07/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Valentina Rojas</td>
                        <td>vale@gmail.com</td>
                        <td>3063997</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>14/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Julián Vega</td>
                        <td>julian@gmail.com</td>
                        <td>3063998</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aprobado</button>
                        </td>
                        <td>15/11/2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-pdf"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-file-alt"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="far fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-outline-info border-0">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>


            <!-- BOTONES ABAJO -->
            <div class="mt-3">
                <button type="button" class="btn btn-success btn-sm mr-2 mb-2">Información adicional</button>

                <button type="button" class="btn btn-success btn-sm mr-2 mb-2">Información bancaria</button>
            </div>

        </div>
    </div>
</section>
<!-- /.content -->