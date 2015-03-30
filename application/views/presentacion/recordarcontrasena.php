

<div class="row">
    <div class="col-sm-4 col-xs-2 col-lg-4 col-md-4"></div>
    <div class="col-sm-4 col-xs-8 col-lg-4 col-md-4">
        <div class="widgetTitle" style="margin-top: 20px;">
            <h5><i class="glyphicon glyphicon-ok"></i> CAMBIAR CONTRASEÑA </h5>
        </div>
        <div class="well">
            <div class="row">
                <label>Contraseña</label><input type="password" id="password" class="form-control obligatorio" />
            </div>
            <div class="row">
                <label>Repetir Contraseña</label><input type="password" id="rpassword" class="form-control obligatorio" />
            </div>
            <div class="row alerta">

            </div>
            <div class="row" align="right">
                <button type="text" id="guardar" class="btn btn-success guardar">Guardar</button>
            </div>
        </div>
    </div> 
</div>
</div>
<script>
    $('body').delegate('.guardar', 'click', function() {

        var respuesta = obligatorio($('.obligatorio'));

        if (respuesta == true && $('#password').val() == $('#rpassword').val()) {

            $('.error').remove();

            var url = "<?php echo base_url('index.php/presentacion/guardarcontrasena') ?>";
            $.post(url, {password: $('#password').val()}, function() {
            $.notific8('', {
                horizontalEdge: 'bottom',
                life: 5000,
                theme: 'lime sticky',
                heading: 'Contraseña Actualizada'
            });
            });
        }
        if ($('#password').val() != $('#rpassword').val()) {
            $.notific8('', {
                horizontalEdge: 'bottom',
                life: 5000,
                theme: 'ruby sticky',
                heading: 'No coinciden las contraseñas'
            });
        }

    });
</script>    