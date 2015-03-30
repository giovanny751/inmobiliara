<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> INGRESAR USUARIO</h5>
</div>
<div class="row">
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
        <label>Empresa</label>
        <?php echo form_dropdown('emp_id', $empresa, '', 'id="emp_id" class="form-control"') ?>
    </div>
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
        <label>TIPO IDENTIFICACION</label>
        <select class="form-control obligatorio" id="tipodocumento">
            <option value="">-Seleccionar-</option>
            <option value="1">CEDULA</option>
        </select>
    </div>
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
        <label>DOCUMENTO</label>
        <input type="text" class="form-control obligatorio" id="documento" name="documento" placeholder="DOCUMENTO">
    </div>
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
        <label>CORREO</label>
        <input type="text" name="correo" id="correo" class="form-control obligatorio" placeholder="CORREO">
    </div>
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 " align="right">
        <br><button type="button" class="btn btn-success" id="guardar">Enviar Correo</button>
    </div>
</div>
<script>
    $('#guardar').click(function() {

        var documento = $('#documento').val();
        var emp_id = $('#emp_id').val();
        var correo = $('#correo').val();
        var tipodocumento = $('#tipodocumento').val();

        var datos = obligatorio($('.obligatorio'));

        if (datos == true) {
            Metronic.blockUI({
                target: '.container',
                message: 'Cargando...'
            });
            var url = "<?php echo base_url("index.php/ingresoform/enviocorreousuario") ?>";
            $.post(url, {emp_id: emp_id, documento: documento, tipodocumento: tipodocumento, correo: correo})
                    .done(function() {
                $.notific8('', {
                    horizontalEdge: 'bottom',
                    life: 5000,
                    theme: 'amethyst',
                    heading: 'Correo enviado Con exito'
                });
                Metronic.unblockUI('.container');
                $('#documento').val('');
                $('#correo').val('');
                $('#tipodocumento').val('');
            }).fail(function() {
                $.notific8('', {
                    horizontalEdge: 'bottom',
                    life: 5000,
                    theme: 'amethyst',
                    heading: 'Error al Momento de Guardar'
                });
                Metronic.unblockUI('.container');
            })
        }

    });

    $('#documento').validCampoFranz('0123456789');
    $('#documento').change(function() {
        if (isNaN($(this).val())) {
            alert('valor no valido');
            $(this).val('');
        }
    })
    $('#correo').change(function() {
        //Utilizamos una expresion regular
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

        //Se utiliza la funcion test() nativa de JavaScript
        if (regex.test($('#correo').val().trim())) {

        }
        else {
            alert('La direccion de correo no es valida');
            $('#correo').val('');
        }
    });
</script>    