
    <div class="row" align="center">
        <h3>PROVEEDORES</h3>
    </div>
    <div class="row">
        <!--        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success">NUEVO</button>-->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-accion="nuevo_provedor" data-target="#opcion">NUEVO</button>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <th>DOCUMENTO</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>ESTADO</th>
                <th>OPCIONES</th>
                </thead>
                <tbody>
                    <?php
//                    echo "<pre>";
//                    print_r($proveedores);
//                    echo "</pre>";
                    ?>
                    <?php foreach ($proveedores as $pro) {
                        ?>

                        <tr>
                            <td><?php echo $pro['pro_identificacion'] ?></td>
                            <td><?php echo $pro['pro_nombre'] ?></td>
                            <td><?php echo $pro['pro_correo'] ?></td>
                            <td><?php echo $pro['pro_estado'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#opcion" data-accion="nuevo_producto" data-id="<?php echo $pro['pro_id'] ?>">Productos</button>
                            </td>

                        </tr>  

                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>




<script>

    $('#guardar').click(function() {
        var url = "<?php echo base_url('index.php/proveedores/guardarproveedor') ?>";
        $.post(url, $('#ingreso').serialize(), function(data) {

        });
    });

    $('#opcion').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var accion = button.data('accion')
        $('#contenido').html('')
        var titulo = "";
        var url = "";
        var id = "";
        switch (accion) {
            case 'nuevo_provedor':
                titulo = '<h5><i class="glyphicon glyphicon-pencil"></i> Nuevo</h5>';
                url = '<?php echo base_url('index.php'); ?>/proveedores/crear_provedor';
                $('#guardar').show();
                break;
            case 'nuevo_producto':
                titulo = "Productos";
                url = '<?php echo base_url('index.php/'); ?>/proveedores/crear_prodcutos';
                id = button.data('id')
                $('#guardar').hide();
                break;
        }
        $.post(url, {id: id})
                .done(function(msg) {
                    $('#contenido').html(msg)
                }).fail(function(msg) {
            alert('Error al traer la información');
        })


//        var recipient = button.data('id') 
        var modal = $(this)
        modal.find('.modal-title').html(titulo)
    });
    

</script>