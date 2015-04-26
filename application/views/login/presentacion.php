<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/jquery.cycle2.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<script src="<?php echo base_url('js/jquery.cycle2.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/font-awesome.css" rel="stylesheet" type="text/css') ?>" />

<style>
    body{
        background-image: url('<?php echo base_url('img/pattern.png') ?>');
    }
    .categoryTitle {
        bottom: 367%;
        height: 355%;
        margin: 0;
        overflow: hidden;
        position: absolute;
        top: inherit;
        left: -28%;
        z-index: 1;
    }
    @media screen and (max-width: 1000px) {
        .categoryTitle {
            display:none;
            bottom: 500%;
            height: 355%;
            margin: 0;
            overflow: hidden;
            position: absolute;
            top: inherit;
            left: -28%;
            z-index: 1;
        }
        .textomenu{
            width: 56%;
            left: 6%;
        }
        .botonytextomenu{
            top: 22px;
            position:absolute;
        }
        .botonmenu{
            width: 100px;
            left: 62%;
        }
        .menu{
            width: 100%;
            height: 140px;
            background-color: 008cba;
        }
        #carrito{
            display: none;
        }
        .imagenes{
            cursor: pointer;
            width: 70px;
            height: 60px;
            border: 2px solid black ;
        }
        #slider,.catprincipal,.datosimagenes{
            display: none;
        }
        .imagenes{
            width: 270px;
            height: 280px;
            margin-top: 20px;
        }
        #tipolistado{
            left: 79%;
            position: absolute;
            top: 19px;
            width: 100px;
        }
        #tipolistado{
            cursor: pointer;
        }
        #letrasesion{
            display:none;
        }
        #buscador,.botonbuscador{
            height: 89px;
            font-size: 70px;
        }
        .redireccionmenu{
            font-size: 60px;
            list-style-type: none;

        }
        .redireccionmenu:hover{
            color:white;
            background-color: blue;
            cursor:pointer;
        }
        .logeo{
            height: 89px !important;
            font-size: 70px !important;
        }
        .grande{

            line-height: 4.6rem !important;
            width: 3.6rem !important;
            font-size: 3rem !important;
        }
        .labelregistro{
            display: none;
        }
        .registro{
            width: 100% !important;
            height: 70px !important;
            font-size: 50px !important;
        }
        .cerrarmodal{
            width: 100px !important;
            height: 100px !important;
            font-size: 90px !important;
        }
        .ingresarsesion{
            width: 100%;
            height: 80px;
            font-size: 50px;
        }
        #olvidocontrasena{
            font-size: 50px;
        }
        .iniciosesion{
            font-size: 80px;
            margin-top: 120px;
        }
    }
    @media screen and (min-width: 1001px ) {
        .botonbuscador{
            height: 37px !important;
            /*background-color:white !important;*/
            border-left-width: 4px;
        }
        #letrasesion{
            display:block;
            color: white;
        }
        #imgsesion,.listado{
            display:none;
        }
        .iniciosesion{
            font-size: 38px;
            margin-top: 30px;
        }
        .menu{
            position: fixed;
            top: 0px;
            left: 0px;
            z-index: 10;
            background-color: #008cba;
        }
        .menu,.blanco{
            max-height: 20%;
            min-height: 59px;
            width: 100%;
        }

        .botonytextomenu{
            top: 18%;
            position:absolute;
        }
        .textomenu{
            width: 29%;
            left: 30%;
        }
        .botonmenu{
            width: 200px;
            left: 59%;
        }
        #carrito{
            left: 84%;
            top:27%;
            width: 80px;
            height: 35px;
            color:white;
        }
        .orbit-container img {
            border: 0 none;
            width: 100%;
        }
        .imagenes{
            cursor: pointer;
            width: 152px;
            height: 142px;
        }
        #tipolistado{
            display:none;
        }
        #sesion,#carrito{
            position:absolute;
            cursor: pointer;
        }
        #sesion{
            left: 3%;
            top:27%;
        }
        #secondModal{
            /*position: fixed !important;*/
        }
        .reveal-modal{
            background-color: #f5e7fd !important;
        }
    }

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
    .orbit-container img {
        border: 0 none;
        width: 100%;
    }
</style>
<div class="blanco"></div>
<div class="menu">
    <div data-reveal-id="secondModal" id="sesion">
        <?php
        ?>
        <span id="letrasesion">
            <?php
            if (!empty($user))
                echo $user[0]->ing_nombre . " " . $user[0]->ing_apellido;
            else
                echo "INICIAR SESIÓN";
            ?>
        </span>
    </div>
    <form method="post" action='<?php echo base_url('index.php/login/index') ?>'>
        <div class="textomenu botonytextomenu">
            <input type="text" value="" placeholder="Buscar Producto" id='buscador' name="buscador" />
        </div>
        <div class="botonmenu botonytextomenu">  
            <button class="button radius tiny success botonbuscador" >BUSCAR</button>
        </div >
        <div >
            <a href="<?php echo base_url('index.php/carrito') ?>" id="carrito">CARRITO</a>
        </div>
    </form>
    <div id="tipolistado"  data-reveal-id="firstModalinicio">
        <i class="fa fa-list fa-4x"></i>
    </div>
</div>
<div class="large-12 columns">
    <div class="large-3 columns panel">

    </div>
    <div class="large-9 columns">
        <div class="row"  style="width: 100%;">
        <ul class="example-orbit" data-orbit>
            <li style="width: 100%;height: 400px">
                <img style="width: 100%;height: 100%" src="<?php echo base_url('img/carrito.jpg') ?>">
                <div class="orbit-caption">
                    Caption One.
                </div>
            </li>
            <li class="active" style="width: 100%;height: 100%">
                <img style="width: 100%;height: 100%"  src="<?php echo base_url('img/portada.jpg') ?>">
                <div class="orbit-caption">
                    Caption Two.
                </div>
            </li>
            <li style="width: 100%;height: 100%">
                <img style="min-width: 100%;width: 100%;height: 100%"  src="<?php echo base_url('img/portada.jpg') ?>">
                <div class="orbit-caption">
                    Caption Three.
                </div>
            </li>
        </ul>

    </div>
    </div>
</div>
<div class="large-12 columns" style="width: 100%;height: 250px">
    <img style="width: 100%;height: 100%"  src="<?php echo base_url('img/portada.jpg') ?>">
</div>

<div class="large-12 columns" style="width: 100%;height: 250px;margin-top: 30px;">
    <img style="width: 100%;height: 100%"  src="<?php echo base_url('img/portada.jpg') ?>">
</div>

<div class="large-6 columns" style="height: 250px;margin-top: 30px;">
    <img style="width: 100%;height: 100%"  src="<?php echo base_url('img/portada.jpg') ?>">
</div>
<div class="large-6 columns" style="height: 250px;margin-top: 30px;">
    <img style="width: 100%;height: 100%"  src="<?php echo base_url('img/portada.jpg') ?>">
</div>
<footer>
    
</footer>
<script>
 $(document).foundation();
</script>