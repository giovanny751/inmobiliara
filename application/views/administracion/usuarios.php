<div class="row">
    <div class="table-responsive ">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <th>Nombres</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Eliminar</th>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr>
                        <td><?php echo $usuario['usu_nombres_apellido']; ?></td>
                        <td><?php echo $usuario['usu_correo']; ?></td>
                        <?php if ($usuario['est_id'] == 1) { ?>
                            <td><button type="button" estado="1" usu_id="<?php echo $usuario['usu_id']; ?>" class="btn btn-primary estado">Activo</button></td>
                        <?php } elseif ($usuario['est_id'] == 2) { ?>
                            <td><button type="button" estado="2" usu_id="<?php echo $usuario['usu_id']; ?>" class="btn btn-default estado">Inactivo</button></td>
                        <?php } ?>
                        <td><button type="button" usu_id="<?php echo $usuario['usu_id']; ?>" class="btn btn-danger eliminar">Eliminar</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $('body').delegate('.estado', 'click', function() {
        var estado = $(this).attr('estado');
        var usuario = $(this).attr('usu_id');
        var url = "<?php echo base_url('index.php/administracion/cambioestado'); ?>";
        if (estado == 1) {
            $(this).replaceWith('<button type="button" estado="2" usu_id="' + usuario + '" class="btn btn-default estado" >Inactivo</button>');
            var numero = 2;
        }
        if (estado == 2) {
            $(this).replaceWith('<button type="button" estado="1" usu_id="' + usuario + '" class="btn btn-primary estado" >Activo</button>');
            var numero = 1;
        }
        $.post(url, {numero: numero, usuario: usuario}, function(data) {

        });
    });
    $('.eliminar').click(function() {
        var usuario = $(this).attr('usu_id');
        var url = "<?php echo base_url('index.php/administracion/eliminarusuario'); ?>";
        $.post(url, {usuario: usuario}, function(data) {

        });
        $(this).parents('tr').remove();
    });
</script>    