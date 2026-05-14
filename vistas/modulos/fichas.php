    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Fichas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Fichas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card bg-dark text-white">
            <div class="card-header border-0 d-flex justify-content-between align-items-center">
                <h3 class="card-title font-weight-bold mb-0" style="font-size: 1.5rem; line-height: 2;">FICHAS</h3>
                <div class="card-tools ml-auto">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarFicha">
                        Agregar Ficha
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-dark table-bordered table-striped dt-responsive tablas nowrap" width="100%">
                    <thead style="background-color: #198754; color: white;">
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Código</th>
                            <th>Programa</th>
                            <th>Sede</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin Lectiva</th>
                            <th>Fecha Fin</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        $fichas = ControladorFichas::ctrMostrarFichas($item, $valor);

                        foreach ($fichas as $key => $value) {
                            $itemSede = "id_sede";
                            $valorSede = $value["sede_id"];
                            $sede = ControladorSedes::ctrMostrarSedes($itemSede, $valorSede);
                            $nombreSede = is_array($sede) ? $sede["descripcion_sede"] : "";

                            echo '<tr>
                                    <td>' . ($key + 1) . '</td>
                                    <td>' . $value["codigo"] . '</td>
                                    <td>' . $value["programa_ficha"] . '</td>
                                    <td>' . $nombreSede . '</td>
                                    <td>' . $value["fecha_inicio"] . '</td>
                                    <td>' . $value["fecha_fin_lectiva"] . '</td>
                                    <td>' . $value["fecha_fin"] . '</td>
                                    <td>';
                                    if ($value["estado"] == "activo") {
                                        echo "<button class='btn btn-xs btn-success btnActivarFicha' data-estadoFicha='inactivo' data-idFicha='" . $value["id_ficha"] . "'>activo</button>";
                                    } else {
                                        echo "<button class='btn btn-xs btn-danger btnActivarFicha' data-estadoFicha='activo' data-idFicha='" . $value["id_ficha"] . "'>inactivo</button>";
                                    }
                            echo '</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-light btnEditarFicha" data-idFicha="' . $value["id_ficha"] . '" data-toggle="modal" data-target="#modalEditarFicha"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-light btnConsultarFicha" data-idFicha="' . $value["id_ficha"] . '" data-toggle="modal" data-target="#modalConsultarFicha"><i class="fas fa-eye"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->

<!-- =======================================
MODAL AGREGAR FICHA
====================================== -->
<div id="modalAgregarFicha" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#343a40; color:white">
                    <h4 class="modal-title">Agregar Ficha</h4>
                    <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENTRADA PARA EL CÓDIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                </div>
                                <input type="text" class="form-control input-lg" name="nuevoCodigoFicha" placeholder="Ingresar código de la ficha" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA SEDE CON DATALIST -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                <input list="sedesList" class="form-control input-lg inputDatalistSede" id="nuevaSedeNombre" placeholder="Escriba y seleccione la sede" required>
                                <input type="hidden" name="nuevaSedeId" id="nuevaSedeId" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL PROGRAMA -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                </div>
                                <input type="text" class="form-control input-lg" name="nuevoProgramaFicha" placeholder="Ingresar programa de formación" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA FECHA DE INICIO -->
                        <div class="form-group">
                            <label>Fecha de Inicio:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control input-lg" name="nuevaFechaInicio">
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA FECHA FIN LECTIVA -->
                        <div class="form-group">
                            <label>Fecha Fin Lectiva:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                                </div>
                                <input type="date" class="form-control input-lg" name="nuevaFechaFinLectiva">
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA FECHA FIN -->
                        <div class="form-group">
                            <label>Fecha Fin (Etapa Productiva):</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-times"></i></span>
                                </div>
                                <input type="date" class="form-control input-lg" name="nuevaFechaFin">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar ficha</button>
                </div>
                <?php
                    $crearFicha = new ControladorFichas();
                    $crearFicha->ctrAgregarFicha();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- =======================================
MODAL EDITAR FICHA
====================================== -->
<div id="modalEditarFicha" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#343a40; color:white">
                    <h4 class="modal-title">Editar Ficha</h4>
                    <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENTRADA PARA EL CÓDIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                </div>
                                <input type="text" class="form-control input-lg" name="editarCodigoFicha" id="editarCodigoFicha" required>
                                <input type="hidden" name="idFichaEditar" id="idFichaEditar">
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA SEDE CON DATALIST -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                <input list="sedesList" class="form-control input-lg inputDatalistSede" id="editarSedeNombre" placeholder="Escriba y seleccione la sede" required>
                                <input type="hidden" name="editarSedeId" id="editarSedeId" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL PROGRAMA -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                </div>
                                <input type="text" class="form-control input-lg" name="editarProgramaFicha" id="editarProgramaFicha" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA FECHA DE INICIO -->
                        <div class="form-group">
                            <label>Fecha de Inicio:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control input-lg" name="editarFechaInicio" id="editarFechaInicio">
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA FECHA FIN LECTIVA -->
                        <div class="form-group">
                            <label>Fecha Fin Lectiva:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                                </div>
                                <input type="date" class="form-control input-lg" name="editarFechaFinLectiva" id="editarFechaFinLectiva">
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA FECHA FIN -->
                        <div class="form-group">
                            <label>Fecha Fin (Etapa Productiva):</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-times"></i></span>
                                </div>
                                <input type="date" class="form-control input-lg" name="editarFechaFin" id="editarFechaFin">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
                <?php
                    $editarFicha = new ControladorFichas();
                    $editarFicha->ctrEditarFicha();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- =======================================
MODAL CONSULTAR FICHA
====================================== -->
<div id="modalConsultarFicha" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#343a40; color:white">
                <h4 class="modal-title">Consultar Ficha</h4>
                <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box-body">

                    <div class="form-group">
                        <label>Código:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                            </div>
                            <input type="text" class="form-control input-lg" id="consultarCodigoFicha" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sede:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control input-lg" id="consultarSedeNombre" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Programa:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                            </div>
                            <input type="text" class="form-control input-lg" id="consultarProgramaFicha" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fecha de Inicio:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control input-lg" id="consultarFechaInicio" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fecha Fin Lectiva:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                            </div>
                            <input type="date" class="form-control input-lg" id="consultarFechaFinLectiva" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fecha Fin (Etapa Productiva):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-times"></i></span>
                            </div>
                            <input type="date" class="form-control input-lg" id="consultarFechaFin" readonly>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

<!-- DATALIST DE SEDES -->
<datalist id="sedesList">
    <?php
    $sedes = ControladorSedes::ctrMostrarSedes(null, null);
    foreach ($sedes as $sede) {
        echo '<option value="' . $sede["descripcion_sede"] . '" data-id="' . $sede["id_sede"] . '"></option>';
    }
    ?>
</datalist>