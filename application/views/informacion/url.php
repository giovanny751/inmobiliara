<div class="row" align="center"><h3>Creacion URL</h3></div>
<div class="row" ><button type="button" at="1" id="nuevo" class="btn btn-success seleccion" data-toggle="modal" data-target="#myModal" >Nuevo</button></div>
<div class="row">
    <div class="table-responsive ">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <th>Nombre</th>
            <th>Url</th>
            <th>Opciones</th>
            <th>Eliminar</th>
            </thead>
            <tbody id="informacion">
                <?php foreach ($url as $informacion) { ?>
                    <tr>
                        <td><?php echo $informacion['infPer_nombre']; ?></td>
                        <td><?php echo $informacion['infPer_url']; ?></td>
                        <td align="center"><button type="button" urlid="<?php echo $informacion['infPer_id']; ?>" class="btn btn-info seleccion" at="2"  data-toggle="modal" data-target="#myModal">Opciones</button></td>
                        <td align="center"><button type="button" urlid="<?php echo $informacion['infPer_id']; ?>" class="btn btn-danger eliminar" >Eliminar</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificacion</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Editar</h5>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>NOMBRE</label><input type="text" id="nombre" name="nombre" class="obligatorio form-control">
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>URL</label><input type="text" id="url" name="url" class="obligatorio form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 col-md-offset-8 col-lg-offset-8 col-sm-offset-8 col-sx-offset-8 margenlogo' align='center' >
                        <button type="button" class="btn btn-primary guardar">Guardar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $('body').delegate('.eliminar', 'click', function () {

        var confirmar = confirm('esta seguro que desea eliminar la URL');
        if (confirmar == true) {
            var id = $(this).attr('urlid');
            var url = "<?php echo base_url('index.php/informacion/eliminarurl'); ?>";

            $.post(url, {id: id}, function (data) {

            });
        }
    });
    $('body').delegate('.seleccion', 'click', function () {

        $('#nombre').val('');
        $('#url').val('');

        var seleccion = $(this).attr('at');
        var id = $(this).attr('urlid');

        $('.guardar').attr('seleccion', seleccion)
        $('.guardar').attr('urlid', id)
    });

    $('.guardar').click(function () {

        var seleccion = $(this).attr('seleccion');

        var nombre = $('#nombre').val();
        var url = $('#url').val();
        var id = "";
        if (seleccion == 1) {
            var envio = "<?php echo base_url('index.php/informacion/guardarinformacion'); ?>";
            var id = "";
        }
        if (seleccion == 2) {
            var envio = "<?php echo base_url('index.php/informacion/editarinformacion'); ?>";
            var id = $(this).attr('urlid');
        }

        $.post(envio, {url: url, nombre: nombre, id: id}, function (data) {
            $('#nombre').val('');
            $('#url').val('');

            $('#informacion *').remove();
            var body = "";
            $.each(data, function (key, val) {
                body += "<tr>";
                body += "<td>" + val.infPer_nombre + "</td>";
                body += "<td>" + val.infPer_url + "</td>";
                body += "</tr>";
            });
            $('#informacion').append(body);
            $('#myModal').modal('hide');
        });
    });
</script>  