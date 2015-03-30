<div class="row">
    <div class="col-lg-11 col-sm-11 col-xs-11 col-md-11">
        <div class="alert alert-info"><center><b>REGISTRO DE PREGUNTAS</b></center></div>
    </div>
    <div class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
        <a href="<?php base_url('index.php/preguntas/selecciontipo') ?>">
            <button type="button" class="btn btn-warning">Devolver</button>
        </a>
    </div>

</div>
<div class="row">
    <button type="button" data-toggle="modal" data-target="#myModal" op="1"  class="btn btn-info opciones modales">Nueva Pregunta</button>
    <br>
    <br>
    <div class="table-responsive ">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <th>Pregunta</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>Eliminar</th>
            </thead>
            <tbody>
                <?php foreach ($preguntas as $pregunta) { ?>
                    <tr>
                        <td><?php echo $pregunta['pre_pregunta']; ?></td>
                        <td align="center">
                            <?php if ($pregunta['pre_estado'] == 1) { ?>
                                <button type="button" estado="1" pre_id ="<?php echo $pregunta['pre_id']; ?>"  class="btn btn-warning estado">Activo</button>
                            <?php } else { ?>
                                <button type="button" estado="2" pre_id ="<?php echo $pregunta['pre_id']; ?>"  class="btn btn-default estado">Inactivo</button>
                            <?php } ?>
                        </td>
                        <td align="center"><button type="button" data-toggle="modal" data-target="#myModal" pre_id ="<?php echo $pregunta['pre_id']; ?>" op="2" class="btn btn-info modales">Editar</button></td>
                        <td align="center"><button type="button" pre_id ="<?php echo $pregunta['pre_id']; ?>"  class="btn btn-danger eliminar">Eliminar</button></td>
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
                <h4 class="modal-title" id="myModalLabel">Pregunta</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Pregunta</h5>
                    </div>
                    <div class="well">
                        <div class="row">

                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                                <div class="row">
                                    <textarea class="form-control obligatorio" id="pregunta"></textarea>
                                </div>
                                <div class="row">
                                    <label>Categoria</label>
                                    <select class="form-control obligatorio" id="tipos">
                                        <option value="">-Seleccionar-</option>
                                        <?php foreach ($tipo as $tipos) { ?>
                                            <option value="<?php echo $tipos['tipPre_id'] ?>"><?php echo $tipos['tipPre_tipo'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <label>Sub-Categoria</label>
                                    <select class="form-control obligatorio" id="opcionpregunta">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-offset-10 col-lg-offset-10 col-sm-offset-10 col-sx-offset-10 margenlogo' align='center' >
                        <button type="button" class="guardar btn btn-success" tipo="<?php echo $tipousuario; ?>">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<script>
    $('body').delegate('.estado', 'click', function() {
        var id = $(this).attr('pre_id');
        var estado = $(this).attr('estado');
        var url = "<?php echo base_url('index.php/preguntas/cambiodeestadopregunta') ?>";

        if (estado == 1) {
            var nombre = 'Inactivo';
            var estilo = 'default';
            var numero = 2;
        }
        if (estado == 2) {
            var nombre = 'Activo';
            var estilo = 'warning';
            var numero = 1;
        }

        $(this).replaceWith('<button type="button" estado="' + numero + '" pre_id="' + id + '" class="btn btn-' + estilo + ' estado" >' + nombre + '</button>');
        $.post(url, {id: id, estado: estado}, function() {

        });
    });

    $('body').delegate('.modales', 'click', function() {
        $('#pregunta').val('');
        $('.guardar').attr('op', $(this).attr('op'));
        $('.guardar').attr('pre_id', $(this).attr('pre_id'));
    });
    $('body').delegate('.modales', 'click', function() {
        $('#pregunta').val('');
        $('.guardar').attr('op', $(this).attr('op'));
        $('.guardar').attr('pre_id', $(this).attr('pre_id'));
    });

    $('#tipos').change(function() {

        var id = $(this).val();
        var url = "<?php echo base_url('index.php/preguntas/consultaopciones') ?>";
        $.post(url, {id: id}, function(data) {
            var option = "";

            $.each(data, function(key, val) {
                option += "<option value='" + val.opcPre_id + "' >" + val.opcPre_opcion + "</option>";
            });
            $('#opcionpregunta *').remove();
            $('#opcionpregunta').append(option);
        });
    });

    $('body').delegate('.eliminar', 'click', function() {

        var id = $(this).attr('pre_id');
        var url = "<?php echo base_url('index.php/preguntas/eliminarpregunta') ?>";
        $(this).parents('tr').remove();
        $.post(url, {id: id}, function(data) {
            alerta('verde','PREGUNTA ELIMINADA CORRECTAMENTE');
        });
    });

    $('body').delegate('.guardar', 'click', function() {

        var opcion = $(this).attr('op');
        var id = $(this).attr('pre_id');
        var tipousuario = $(this).attr('tipo');
        console.log(id);
        cantidad = obligatorio($('.obligatorio'));
        if (cantidad == true) {
            var pregunta = $('#pregunta').val();
            var tipos = $('#tipos').val();
            var opcionpregunta = $('#opcionpregunta').val();
            var url = "<?php echo base_url('index.php/preguntas/guardarpreguntas') ?>";
            $.post(url, {tipousuario: tipousuario, opcionpregunta: opcionpregunta, tipos: tipos, pregunta: pregunta, opcion: opcion, id: id}, function(data) {
                $('#pregunta').val('');
                    alerta('verde','PREGUNTA GUARDADA CORRECTAMENTE');
            });
        }

    });

</script>    