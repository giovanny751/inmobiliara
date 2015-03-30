<link rel="stylesheet" href="<?php echo base_url('dist/css/font-awesome.min.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url('dist/js/summernote.js?v=' . date("d-h")); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('dist/js/script_summernote.js?v=' . date("d-h")); ?>"></script>
<link href="<?php echo base_url('dist/css/summernote.css?v=' . date("d-h")); ?>" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script>
    $(function() {
        $("#accordion").accordion({
            active: 0
        });
    });
</script>

<div class="widgetTitle">
    <center><h5>
            <i class="glyphicon glyphicon-ok"></i>
            Administrador de inicio 
        </h5></center>
</div>
<p><br>
<div id="accordion">
    <h3>Pagina de Inicio</h3>
    <div >
        <p>
            <?php
            echo form_textarea('emp_inicio', (isset($inicio[0]->emp_inicio) ? $inicio[0]->emp_inicio : ""), 'id="emp_inicio" class="textareasumer"  ');
            ?>
        </p>
        <center>
            <?php if (isset($inicio[0]->emp_id)) {
                ?> 
                <button id="g_politicas" class="btn green">Guardar</button>
                <?php }  else {
                    ?> 
                No hay empresa asociada
                <?php 
                }
            ?>


        </center>
    </div>
</div>
<script>
    $('#g_politicas').click(function() {
        var emp_inicio = $('#emp_inicio').code();
        var url = base_url_js + "/index.php/administracion/guardar_admin_inicio_emp";
        modal('.container', 'cargando');
        $.post(url, {emp_inicio: emp_inicio})
                .done(function(msg) {
            quit_modal('.container');
            alerta('verde', 'Los Datos Fueron Guardados con Exito');
        }).fail(function(msg) {
            quit_modal('.container');
            alerta('rojo', 'Error al Guardar');
        })
    })
</script>






