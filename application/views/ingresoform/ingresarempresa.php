<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> INGRESAR EMPRESA</h5>
</div>
<div class='well'>
    <div class="row">
        <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
            <label>Nit</label>
            <input type="text" class="form-control obligatorio" id="nit" name="nit" placeholder="NIT">
        </div>
        <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
            <label>Empresa</label>
            <input type="text" class="form-control obligatorio" id="empresa" name="empresa" placeholder="EMPRESA">
        </div>
        <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
            <label>Correo</label>
            <input type="text" name="correo" id="correo" class="form-control obligatorio" placeholder="CORREO">
        </div>
        <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 " align="right">
            <br><button type="button" class="btn btn-success" id="guardar">Enviar Correo</button>
        </div>
    </div>
</div>
<script>
    $('#guardar').click(function() {

        var empresa = $('#empresa').val();
        var correo = $('#correo').val();
        var nit = $('#nit').val();

        var datos = obligatorio($('.obligatorio'));

        if (datos == true) {
            Metronic.blockUI({
                target: '.container',
                message: 'Cargando...'
            });
            var url = "<?php echo base_url("index.php/ingresoform/enviocorreoempresa") ?>";
            $.post(url, {nit: nit, empresa: empresa, correo: correo}, function() {
                $.notific8('', {
                    horizontalEdge: 'bottom',
                    life: 5000,
                    theme: 'amethyst',
                    heading: 'Correo enviado Con exito'
                });
                $('#empresa').val('');
                $('#correo').val('');
                $('#nit').val('');
                Metronic.unblockUI('.container');
            });
        }

    });

    $('#nit').validCampoFranz('0123456789');


    $('#nit').change(function() {
        var num = $(this).val();
        console.log(num);
        if (isNaN(num)) {
            $('#emp_nit').val('');
            alert('Dato no correcto.')
            return  false;
        }

        var url = base_url_js + "index.php/ingresoform/confir_nit";
        var emp_nit = $(this).val();
        if (emp_nit != "") {
            Metronic.blockUI({
                target: '.container',
                message: 'Cargando...'
            });
            $.post(url, {emp_nit, emp_nit})
                    .done(function(msg) {
                        if (msg > 0) {
                            $.notific8('El Nit ya se Encuentra Registrado en el Sistema', {
                                horizontalEdge: 'bottom',
                                theme: 'ruby',
                                heading: 'ERROR',
                                sticky: false
                            });
                            $('#nit').val('');
                        }
                        Metronic.unblockUI('.container');
                    }).fail(function(msg) {
                Metronic.unblockUI('.container');
            })
        }
    })
</script>    