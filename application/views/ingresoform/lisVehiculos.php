<script>
    ruta = "ingresoform/get_datavehiculo/<?php echo $id ?>";
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
                    <th>Nombre del Propietario</th>
                    <th>Placa</th>
                    <th>Numero de licencia</th>
                    <th>Marca</th>
                    <th>Capacidad</th>
                    <th>Tipo Carroceria</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div>
    <center><p><br>
        <a href="<?php echo base_url('index.php/administracion/vehiculo/' . $id); ?>" class="btn green" >Nuevo Vehiculo</a>
    </center>
</div>
