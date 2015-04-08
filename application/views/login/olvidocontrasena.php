
<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />

<style>
    body{
        background-image: url('<?php echo base_url('img/pattern.png') ?>');
    }
</style>

<div class="row panel control" style="margin-top: 15%;" >
    <center><h1>OLVIDO CONTRASEÑA</h1></center>
    <div class="large-2 columns">
        <center><label for="correo">CORREO</label></center>
    </div>
    <div class="large-10 columns"> 
        <input type="text" placeholder="CORREO" id="correo">
    </div>
    <div class="row" align="center">
        <button type="button" class="button radius enviar">Enviar</button>
    </div>
</div>
<script>
    $('.enviar').click(function(){
        
        var correo = $('#correo').val();
        
        $.post("<?php echo base_url('index.php/login/envioolvidocontrasena') ?>",{correo:correo})
                .done(function(msg){
//                    alert($('.control').length);
                    if($('.alerta').length == 0)
                    $('.control').append('<div class="row alerta" style="color:blue"><center><b>Correo Enviado Correctamente</b></center></div>');
                })
                .fail(function(msg){
                    if($('.alertaerror').length == 0)
                    $('.control').append('<div class="row alertaerror" style="color:blue"><center><b>Error por favor comunicarce con el administrador</b></center></div>');
                });
    });
</script>    