<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.equalizer.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />

<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <h2 id="firstModalTitle">INICIO SESION</h2> 
        <form method="post" action="<?php echo base_url('index.php/login/verify') ?>">
            <label>CORREO</label><input type="text" name="username" placeholder="CORREO">
            <label>CONTRASEÑA</label><input type="password" name="password" placeholder="CONTRASEÑA">
            <input type="submit" class="button radius success" value="INGRESAR">
        </form>
        <div class="row">
            <div class="large-12 columns" >
                <a href="<?php echo base_url('index.php/login/olvidocontrasena') ?>">¿Olvido contraseña?</a>
            </div>
        </div>
    </div> 
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div>

<style>
    body{
        background-image: url('<?php echo base_url('img/pattern.png') ?>');
    }
</style>

<nav class="top-bar" data-topbar>
    <ul class="title-area">

        <li class="name">
            <h1>
                <a href="#" data-reveal-id="firstModal">Iniciar sesion</a> 
            </h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
    </ul>
</nav>

<div class="row" data-equalizer style="margin-top: 10%;">
    <div class="large-offset-4 large-4 columns">
        <ul class="pricing-table control" data-equalizer-watch>
            <li class="title">OLVIDO CONTRASEÑA</li>
            <li class="bullet-item">
                <input type="text" placeholder="CORREO" id="correo">
            </li>
            <li class="cta-button">
                <button type="button" class="button radius enviar">Enviar</button>
            </li>
        </ul>
    </div>
</div>
<script>
    $(document).foundation({
        equalizer: {
            // Specify if Equalizer should make elements equal height once they become stacked.
            equalize_on_stack: false
        }
    });

    $(document).foundation();
    $('.enviar').click(function () {
        var correo = $('#correo').val();

        $.post("<?php echo base_url('index.php/login/envioolvidocontrasena') ?>", {correo: correo})
                .done(function (msg) {
//                    alert($('.control').length);
                    if ($('.alerta').length == 0)
                        $('.control').append('<li class="row alerta bullet-item" style="color:blue"><center><b>Correo Enviado Correctamente</b></center></li>');
                })
                .fail(function (msg) {
                    if ($('.alertaerror').length == 0)
                        $('.control').append('<div class="row alertaerror" style="color:blue"><center><b>Error por favor comunicarce con el administrador</b></center></div>');
                });
    });
</script>    