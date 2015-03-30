<script>
    ruta = "ingresoform/get_dataEmpleado/<?php echo $id ?>";
</script>
<div class='alert alert-info'>
    <center><b><?php echo strtoupper($titulo); ?></b></center>
</div>
<div class="portlet box blue">
    <div class="caption">
        &nbsp;&nbsp;<i class="fa fa-users"></i>
        Detalle
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Cargo</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
