<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.equalizer.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />

<script src="http://www.elevateweb.co.uk/wp-content/themes/radial/jquery.elevatezoom.min.js" type="text/javascript"></script>

<div style="width: 100%;height: 70px;background-color: #008cba">

    <form method="post" action='<?php echo base_url('index.php/login/index') ?>'>
        <div data-reveal-id="firstModal" style="position:absolute;left: 3%;top: 3%">
            INICIAR SESIÓN
        </div>
        <div style="width: 29%;position:absolute;left: 30%;top: 3%">
            <input type="text" value="" placeholder="Buscar Producto" id='buscador' name="buscador" />
        </div>
        <div style="width: 200px;position:absolute;left: 59%;top: 3%">  
            <input type="submit" class="button radius tiny success" value="Buscar">
        </div >

        <div style="position:absolute;left: 85%;">
            <a href="<?php echo base_url('index.php/carrito') ?>" style="color:black">CARRITO</a>
        </div>

    </form>    
</div>

<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <h2 id="firstModalTitle">INICIO SESION</h2> 
        <form method="post" action="<?php echo base_url('index.php/login/verify') ?>">
            <label>CORREO</label><input type="text" name="username">
            <label>CONTRASEÑA</label><input type="password" name="password">
            <input type="submit" class="button radius success" value="INGRESAR">
        </form>
    </div> 
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div> 


<div class="row">
    <br>
    <center><h4><?php echo strtoupper($datos[0]->imgEnc_nombre) ?></h4></center>
    <hr>
    <div class="large-2 small-12 columns" >

        <?php foreach ($datos as $imagenes) { ?>
            <div class="large-12 small-3 columns subimagenes" >
                <img class="imagenes imagenprincipal1"   data-reveal-id="firstModal2" dato  src="<?php echo base_url('uploads' . "/" . $imagenes->id_emp . "/" . $imagenes->imgDet_nombre); ?>">
            </div>
        <?php } ?>
    </div>
    <div  class="large-6 small-12 columns ">
        <div class="large-12 small-12 imgprincipal " style="width: 100%;height: 75%">
            <img style='width: 100%;height: 100%;' class="imagenprincipal" src="<?php echo base_url('uploads' . "/" . $datos[0]->id_emp . "/" . $datos[0]->imgDet_nombre); ?>">
        </div>
    </div>
    <div class="large-4 small-12 columns panel" >
        <form id='adjuntarcotizacion' method="post">
            <input type="hidden" name="opciones[no hay]" value="" id="opciones">
            <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $id ?>">
            <input type="hidden" name="nombre_producto" id="nombre_producto" value="<?php echo strtoupper($datos[0]->imgEnc_nombre) ?>">
            <input type="hidden" name="precio_producto" id="precio_producto" value="0">
            <ul class="pricing-table control" data-equalizer-watch>
                <li class="title">COTIZACIÓN</li>
                <li class="bullet-item price"><b>Categoria</b></li>
                <li class="bullet-item"><?php echo $datos[0]->cat_categoria ?></li>
                <li class="bullet-item price"><b>Sub-Categoria</b></li>
                <li class="bullet-item"><?php echo $datos[0]->sub_subcategoria ?></li>
                <li class="bullet-item">
                    <input type="text" placeholder="CANTIDAD" id="cantidad" name="cantidad">
                </li>
                <li class="cta-button">
                    <button type="button" class="button radius enviar">Enviar</button>
                </li>
            </ul>
        </form>    
    </div>
</div>

<div class="row">
    <hr/>
    <div class="large-12 columns">
        <h4>Descripción</h4>
        <p>
            <?php
            $datos = str_replace("a", " ", $datos[0]->imgEnc_descripcion_larga);
            echo $datos
            ?>
        </p>
    </div>
</div>

<div class="row">
    <hr>
    <div class="large-12 columns">
        <h4>PRODUCTOS</h4>
        <img src="http://placehold.it/200x150&text=[img]">
        <img src="http://placehold.it/200x150&text=[img]">
        <img src="http://placehold.it/200x150&text=[img]">
        <img src="http://placehold.it/200x150&text=[img]">
    </div>
</div>

<footer class="row">
    <div class="large-12 columns">
        <hr>
        <div class="row">
            <div class="large-6 columns">
                <p>© Copyright no one at all. Go to town.</p>
            </div>
            <div class="large-6 columns">
                <ul class="inline-list right">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="preload">
    <img class="load" src="<?php echo base_url('img/blanco.jpg') ?>" width="128" height="128" />
</div>
<style>
    div.preload{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: white;
        opacity: 0.8;
        z-index: 10000;
    }

    div img.load{
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -64px;
        margin-top: -64px;
        z-index: 15000;
    }
</style>
<script>

    $(".preload, .load").hide();

    $('.enviar').click(function () {
        $(".preload, .load").show();
        var url = "<?php echo base_url('index.php'); ?>/login/agregar_carrito";
        $.post(url, $('#adjuntarcotizacion').serialize())
                .done(function (msg) {
                    $(".preload, .load").hide();
                })
                .fail(function (msg) {
                    $(".preload, .load").hide();
                });

    });

    $(".imagenprincipal").elevateZoom({
        zoomType: "lens",
        lensShape: "round",
        lensSize: 200
    });

//    $(".imagenprincipal").elevateZoom({
//			zoomWindowFadeIn: 500,
//			zoomWindowFadeOut: 500,
//			lensFadeIn: 500,
//			lensFadeOut: 500
//});

//    $("#imagenprincipal").elevateZoom({
//  zoomType				: "inner",
//  cursor: "crosshair"
//});


    $(document).foundation();
    $('.subimagenes').mouseover(function () {

        var dato = $(this).html();
        var clase = dato.replace('imagenprincipal1', 'imagenprincipal');
        var objeto = clase.replace('dato', 'style="width: 100%;height: 100%;cursor:pointer"');


//        console.log(objeto);

        $('.imgprincipal').html(objeto);

    });
</script>
