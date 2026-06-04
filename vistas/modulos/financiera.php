<?php
// Obtener convocatorias que tienen asignaciones
$convocatoriasActivas = ControladorFinanciera::ctrListarConvocatoriasFinanciera();
?>

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
    
    <!-- PESTAÑAS (TABS) AL ESTILO INSCRIPCIONES -->
    <div id="panel-financiera" class="card card-dark card-tabs bg-dark border border-secondary shadow">
        <div class="card-header p-0 pt-1 border-bottom-0" style="background-color: #343a40;">
            <ul class="nav nav-tabs" id="tabFinanciera" role="tablist">
                <?php foreach ($convocatoriasActivas as $key => $conv): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $key == 0 ? 'active' : ''; ?> font-weight-bold text-uppercase" 
                           id="tab-conv-<?php echo $conv['id']; ?>-tab" 
                           data-toggle="pill" 
                           href="#tab-conv-<?php echo $conv['id']; ?>" 
                           role="tab" 
                           aria-controls="tab-conv-<?php echo $conv['id']; ?>" 
                           aria-selected="<?php echo $key == 0 ? 'true' : 'false'; ?>" 
                           style="padding: 12px 20px;">
                            <i class="<?php echo $conv["apoyo_icono"] ? $conv["apoyo_icono"] : "fas fa-hand-holding-heart"; ?> mr-2 text-success"></i> 
                            <?php echo $conv["descripcion_apoyo"]; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div class="card-body" style="background-color: #2b3035;">
            <div class="tab-content" id="tabFinancieraContent">
                
                <?php if (count($convocatoriasActivas) === 0): ?>
                    <div class="alert alert-warning">
                        No hay convocatorias activas en este momento.
                    </div>
                <?php else: ?>
                    <?php foreach ($convocatoriasActivas as $key => $conv): 
                        // Obtener los beneficiarios de esta convocatoria usando el nuevo controlador
                        $beneficiarios = ControladorFinanciera::ctrMostrarBeneficiarios($conv["id"]);
                    ?>
                        <div class="tab-pane fade <?php echo $key == 0 ? 'show active' : ''; ?>" 
                             id="tab-conv-<?php echo $conv['id']; ?>" 
                             role="tabpanel" 
                             aria-labelledby="tab-conv-<?php echo $conv['id']; ?>-tab">
                            
                            <h3 class="mb-4 text-white"><?php echo $conv["descripcion_apoyo"]; ?></h3>

                            <div class="table-responsive">
                                <table id="tblBeneficiarios_<?php echo $conv['id']; ?>" class="table table-dark table-striped table-bordered dt-responsive nowrap tabla-beneficiarios" style="width:100%">
                                    <thead style="background-color: #198754; color: white;">
                                        <tr>
                                            <th>Identificación</th>
                                            <th>Aprendiz</th>
                                            <th>Ficha</th>
                                            <th>Programa</th>
                                            <th>Meses</th>
                                            <th>Inicio Pago</th>
                                            <th>Fin Pago</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($beneficiarios as $ben): ?>
                                            <tr>
                                                <td><?php echo $ben["identificacion"]; ?></td>
                                                <td><?php echo $ben["aprendiz"]; ?></td>
                                                <td><?php echo $ben["codigo_ficha"]; ?></td>
                                                <td><?php echo $ben["programa_formacion"]; ?></td>
                                                <td><?php echo $ben["meses_beneficio"]; ?></td>
                                                <td><?php echo $ben["fecha_inicio_pago"]; ?></td>
                                                <td><?php echo $ben["fecha_fin_pago"]; ?></td>
                                                <td class="text-center">
                                                    <?php 
                                                        $estadoClass = "btn-success";
                                                        if(strtoupper($ben["estado_asignacion"]) == "PENDIENTE") {
                                                            $estadoClass = "btn-warning text-dark";
                                                        } else if (strtoupper($ben["estado_asignacion"]) == "CANCELADO" || strtoupper($ben["estado_asignacion"]) == "RECHAZADO") {
                                                            $estadoClass = "btn-danger";
                                                        }
                                                    ?>
                                                    <button class="btn <?php echo $estadoClass; ?> btn-sm"><?php echo $ben["estado_asignacion"]; ?></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- BOTONES ABAJO -->
                            <div class="mt-4">
                                <button type="button" class="btn btn-success btn-sm mr-2 mb-2">Información adicional</button>
                                <button type="button" class="btn btn-success btn-sm mr-2 mb-2">Información bancaria</button>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!-- Estilos para las tabs oscuras -->
<style>
    .card-dark.card-tabs .nav-tabs .nav-link.active {
        background-color: #2b3035 !important;
        border-color: #6c757d #6c757d transparent !important;
        color: #fff !important;
    }
    
    .card-dark.card-tabs .nav-tabs .nav-link {
        color: #adb5bd;
        border-top: 3px solid transparent;
    }

    .card-dark.card-tabs .nav-tabs .nav-link:hover {
        color: #fff;
        border-top-color: #6c757d;
        background-color: #343a40;
    }
</style>

<!-- Inicialización dinámica de DataTables -->
<script>
$(document).ready(function () {
    $(".tabla-beneficiarios").each(function() {
        var table = $(this).DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["excel", "pdf"],
            language: {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        
        table.buttons().container().appendTo('#' + $(this).attr('id') + '_wrapper .col-md-6:eq(0)');
    });
});
</script>