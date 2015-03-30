<script>
    ruta = "ingresoform/get_datatable/<?php echo $id ?>";
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
                    <th>NIT</th>
                    <th>Razon Social</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>Nombre Reprecentante</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
