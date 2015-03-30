<div class="row">
    <div class="table-responsive ">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <th>Propietario</th>
            <th>Vehiculo</th>
            <th>Estado</th>
            <th>Eliminar</th>
            </thead>
            <tbody>
                <?php foreach ($vehiculos as $vehiculo) { ?>
                    <tr>
                        <td><?php echo $vehiculo['veh_nombrepropietario']; ?></td>
                        <td><?php echo $vehiculo['tipVeh_nombre']; ?></td>
                        <?php if ($vehiculo['est_id'] == 1) { ?>
                            <td><button type="button" estado="1" veh_id="<?php echo $vehiculo['veh_id']; ?>" class="btn btn-primary estado">Activo</button></td>
                        <?php } elseif ($vehiculo['est_id'] == 2) { ?>
                            <td><button type="button" estado="2" veh_id="<?php echo $vehiculo['veh_id']; ?>" class="btn btn-default estado">Inactivo</button></td>
                        <?php } ?>
                        <td><button type="button" veh_id="<?php echo $vehiculo['veh_id']; ?>" class="btn btn-danger eliminar">Eliminar</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $('body').delegate('.estado', 'click', function() {
        var estado = $(this).attr('estado');
        var usuario = $(this).attr('veh_id');
        var url = "<?php echo base_url('index.php/administracion/cambioestadovehiculo'); ?>";
        if (estado == 1) {
            $(this).replaceWith('<button type="button" estado="2" veh_id="' + usuario + '" class="btn btn-default estado" >Inactivo</button>');
            var numero = 2;
        }
        if (estado == 2) {
            $(this).replaceWith('<button type="button" estado="1" veh_id="' + usuario + '" class="btn btn-primary estado" >Activo</button>');
            var numero = 1;
        }
        $.post(url, {numero: numero, usuario: usuario}, function(data) {

        });
    });
    $('.eliminar').click(function() {
        var vehiculo = $(this).attr('veh_id');
        var url = "<?php echo base_url('index.php/administracion/eliminarvehiculo'); ?>";
        $.post(url, {vehiculo: vehiculo}, function(data) {

        });
        $(this).parents('tr').remove();
    });
</script>    