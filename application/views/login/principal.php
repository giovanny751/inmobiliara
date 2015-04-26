<?php
//echo print_y($this->cart->contents());
$array_cart = $this->cart->contents();
if (empty($array_cart)) {
    $cod_cliente = '';
} else {
    foreach ($array_cart as $key => $value)
        $cod_cliente = $key;
}
?>
<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.equalizer.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
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

<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert-box <?php echo $this->session->flashdata('message_type'); ?>">
        <center><?php echo $this->session->flashdata('message'); ?></center>
    </div>
<?php } ?>
<br>
<?php
$i = 4;
$h = 1;
$g = 0;
$contador = count($imagenes);
//echo $contador;die;
if ($contador > 0) {
    ?>
    <div class="large-12 columns">
        <div class="large-3 columns ">
            <div class="large-12 columns panel catprincipal">
                <form method="post" id="envio" >
                    <label class="label" for="forma">Forma de ver los productos</label>
                    <select name="forma" id="forma"  style="text-align: center">
                        <option value=''>-Seleccionar-</option>
                        <option value='1'>Columnas</option>
                        <option value='2'>Filas</option>
                    </select>
                </form>
                <label class="label" for="ordenamiento">
                    Ordenar Productos
                </label>
                <select id="ordenamiento" style="text-align: center">
                    <option value=""></option>
                    <option value="1" >A-Z</option>
                    <option value="">Z-A</option>
                    <option value="">Precio</option>
                </select>
                <br>
            </div>
            <div class="large-12 columns panel catprincipal">
                <ul>
                    <?php foreach ($categorias as $cat => $idsub) { ?>

                        <li><?php echo $cat; ?>
                            <?php foreach ($idsub as $id => $subcategoria) { ?>
                                <ul><li><?php echo $subcategoria; ?></li></ul>
                            <?php } ?>
                        </li>    
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="large-9 columns">
            <?php
            foreach ($imagenes as $img) {

                if (!empty($cod_cliente)) {
                    if ($img->imgEnc_id == $array_cart[$cod_cliente]['id'])
                        $cantidad = $array_cart[$cod_cliente]['qty'];
                    else
                        $cantidad = 0;
                }else {
                    $cantidad = 0;
                }
                if (empty($forma) || $forma == 1) {
                    if ($i == 4) {
                        ?>
                        <div class="row">
                            <div class="large-12 columns">
                                <div class="row">
                                <?php } ?>    
                                <div class="large-3 small-6 columns principio">
                                    <center>
                                        <?php if ($img->ingEnc_promocion == 2) { ?>

                                            <img style="position: absolute;width: 30%; float: right;" width="100%" height="100%" src="<?php echo base_url('img/Estrella.png'); ?>" title='PROMOCION'>

                                        <?php } ?>  
                                        <span id="imaagen<?php echo $g; ?>">
                                            <img onerror="this.onerror=null;this.src='http://placehold.it/250x250&text=NYGSOFT';" class="imagenes" img_id="<?php echo $img->imgEnc_id; ?>" src="<?php echo base_url('uploads' . "/" . $img->id_emp . "/" . $img->imgDet_nombre); ?>"/>
                                        </span>

                                        <div class="large-12 small-12 columns panel datosimagenes" >
                                            <div class="large-8 small-8 columns">
                                                <h6 ><?php echo $img->imgEnc_nombre ?></h6>
                                            </div>
                                            <div class="large-4 small-4 columns">
                                                <i style="cursor:pointer" class="fa fa-cart-plus fa-2x" data-reveal-id="myModal"  onclick="activar('<?php echo $g; ?>', '<?php echo $img->imgEnc_nombre ?>', '<?php echo $img->imgEnc_id; ?>', '<?php echo $cantidad; ?>');" ></i>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                                <?php if ($h == 4 || $contador == $g + 1) { ?>        
                                </div>
                            </div>
                        </div>  
                        <?php
                        $i = 4;
                        $h = 0;
                    } else {
                        $i = 0;
                    }
                    $h++;
                    $g++;
                } else if ($forma == 2) {
                    ?>
                    <div class="large-6 columns">
                        <div class="large-12 colums">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 32%;height: 161px" rowspan="2" >
                                        <img  onerror="this.onerror=null;this.src='http://placehold.it/250x250&text=NYGSOFT';" class="imagenes" img_id="<?php echo $img->imgEnc_id; ?>" src="<?php echo base_url('uploads' . "/" . $img->id_emp . "/" . $img->imgDet_nombre); ?>"/>
                                    </td>
                                    <td style="width: 48%"><center><?php echo $img->imgEnc_nombre ?></center></td>
                                <td style="width: 20%">
                                <center>
                                    <i id="carrito" style="cursor:pointer" class="fa fa-cart-plus fa-2x" data-reveal-id="myModal"  onclick="activar('<?php echo $g; ?>', '<?php echo $img->imgEnc_nombre ?>', '<?php echo $img->imgEnc_id; ?>', '<?php echo $cantidad; ?>');" >
                                    </i>
                                </center>    
                                </td>
                                </tr>
                                <tr>
                                    <td style="width: 80%" colspan="2"><?php echo $img->imgEnc_descripcion_corta ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div><?php
} else {
    ?>
    <div class="large-12 columns">
        <div id="mainAlert1" data-alert class="alert-box secondary" tabindex="0" aria-live="assertive" role="dialogalert">
            <center><h4>NO SE ENCONTRARON PRODUCTOS</h4></center>
            <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
        </div>
    </div>
    <?php
}
?>
<br>
<div class="row"> 
    &nbsp;
</div>    
<div class="large-12 colums">
    <div class="row">
        <div class="large-offset-6 small-offset-5 colums">
            <center>
                <form method="post" id="f1">
                    <ul class="pagination"> 
                        <li class="arrow unavailable">
                            <!--<a href="">&laquo;</a></li>--> 
                            <?php
                            for ($i = 0; $i < $numeracion; $i++) {
                                if ($i + 1 == $numero)
                                    $class = "class='current grande'";
                                else
                                    $class = '';
                                ?>
                            <li <?php echo $class ?> class="numeracion grande"><a href="javascript:"><?php echo $i + 1; ?></a></li> 
                        <?php } ?>
                    </ul>
                </form>    
            </center>
        </div>
    </div>
</div>  
<br>
<footer class="row">
    <div class="large-12 columns">
        <hr>
        <div class="row">
            <div class="large-12 columns">
                <center><p>© Copyright NYGSOFT.COM 2015-2020</p></center>
            </div>
        </div>
    </div>
</footer>

<!--MODAL-->
<!-- Reveal Modals begin --> 
<div id="firstModalinicio" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <ul>
            <li class="redireccionmenu"  data-reveal-id="secondModal">INICIAR SESIÓN</li>
            <li class="redireccionmenu"  data-reveal-id="secondModal2">REGISTRESE </li>
            <li class="redireccionmenu">CARRITO DE COMPRAS</li>
            <li class="redireccionmenu">AYUDA</li>
        </ul>
    </div> 
    <a class="close-reveal-modal cerrarmodal" aria-label="Close">&#215;</a> 
</div> 

<div id="secondModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="secondModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <center><div class="iniciosesion">INICIO SESIÓN</div></center> 
        <form method="post" action="<?php echo base_url('index.php/login/verify') ?>">
            <label class="label" for="usuario">CORREO</label><input id="usuario" type="text" name="username" placeholder="CORREO" class="logeo">
            <label class="label" for="contrasena">CONTRASEÑA</label><input id="contrasena" type="password" name="password" placeholder="CONTRASEÑA" class="logeo">
            <center><input  type="submit" class="button radius success ingresarsesion" value="INGRESAR"></center>
        </form>
        <div class="row">
            <div class="large-12 columns" id="olvidocontrasena">
                <center>
                    <a href="<?php echo base_url('index.php/login/olvidocontrasena') ?>"  data-reveal-id="secondModal3">¿Olvido Contraseña?</a>
                </center>    
            </div>
        </div>
    </div> 
    <a class="close-reveal-modal cerrarmodal" aria-label="Close">&#215;</a> 
</div>
<div id="secondModal2" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="secondModal2"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    </div> 
    <a class="close-reveal-modal cerrarmodal" aria-label="Close">&#215;</a> 
    <center><h1>REGISTRO</h1></center> 
    <form method="post" id="formregistro" action="<?php echo base_url('index.php/login/registro') ?>">
        <div class="large-2 columns labelregistro" ><label for="nombre">Nombre</label></div><div class="large-10 columns "><input type="text" name="nombre" id="nombre" placeholder="Nombre" class="obligatorio registro"></div>
        <div class="large-2 columns labelregistro" ><label for="apellido">Apellido</label></div><div class="large-10 columns "><input type="text" name="apellido" id="apellido" placeholder="Apellido" class="obligatorio registro" ></div>
        <div class="large-2 columns labelregistro" ><label for="correo">Correo</label></div><div class="large-10 columns "><input type="text" name="correo" id="correo" placeholder="Correo" class="obligatorio registro" ></div>
        <div class="large-2 columns labelregistro" ><label for="rcorreo">Repetir Correo</label></div><div class="large-10 columns "><input type="text" name="rcorreo" id="rcorreo" placeholder="Repetir Correo" class="obligatorio registro"></div>
        <div class="large-2 columns labelregistro" ><label for="telefono">Telefono</label></div><div class="large-10 columns "><input type="text" name="telefono" id="telefono" placeholder="Telefono" class="obligatorio registro" ></div>
        <div class="large-2 columns labelregistro" ><label for="celular">Celular</label></div><div class="large-10 columns "><input type="text" name="celular" id="celular" placeholder="Celular" class="obligatorio registro"></div>
        <div class="large-2 columns labelregistro" ><label for="contrasena">Contraseña</label></div><div class="large-10 columns "><input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="obligatorio registro" ></div>
    </form>
    <div class="large-12 columns"><center><input style="width: 100%;height: 80px;font-size: 50px" type="submit" class="button radius success enviar" value="Registrar"></center></div>
    <div class="large-12 columns alerta">

    </div>
</div> 
<div id="secondModal3" class="reveal-modal tiny" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="secondModal3"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    </div> 
    <a class="close-reveal-modal cerrarmodal" aria-label="Close">&#215;</a> 
    <div class="iniciosesion"><center>OLVIDO CONTRASEÑA</h3></center></div> 
    <form method="post" id="formregistro" action="<?php echo base_url('index.php/login/registro') ?>">
        <div class="large-12 columns" >
            <label class="label" for="correo">Correo</label>
            <input type="text" name="correo" id="correo" placeholder="Correo" class="registro logeo">
        </div>
    </form>
    <div class="large-12 columns">
        <center>
            <input style="width: 100%;height: 80px;font-size: 50px" type="submit" class="button radius success tiny enviar" value="Enviar">
        </center>
    </div>
</div> 

<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

    <form id='enviarproducto'  method="post">
        <!--<div class="large-12 small-12 columns principio panel">-->
        <div class="large-12 small-12 columns principio">
            <div style="display: none">
                <input type="hidden" name="opciones[no hay]" value="" id="opciones">
                <input type="hidden" name="id_producto" id="id_producto" value="1">
                <input type="hidden" name="nombre_producto" id="nombre_producto" value="maqueta">
                <input type="hidden" name="precio_producto" id="precio_producto" value="0">
            </div>
            <div class="row">
                <ul class="pricing-table control" data-equalizer-watch>
                    <li class="title">CANTIDAD</li>
                    <li class="bullet-item" id="imagenes">

                    </li>
                    <li class="bullet-item">
                        <input class="number2"  type="text" value="0" nim="0" max="50" name="cantidad" id="cantidad">
                    </li>
                    <li class="bullet-item">
                        <button class="button tiny agregarproducto" type="button"><i class="fa fa-cart-plus" ></i> Agregar</button>
                    </li>
                </ul>
            </div>    
        </div>
    </form>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div>
<div class="preload">
    <img class="load" src="<?php echo base_url('img/blanco.jpg') ?>" width="128" height="128" />
</div>
<style>
    .estiloobligatorio{
        background-color: orange;
    }
</style>
<script>

    $('.enviar').click(function () {

        var datosobligatorios = obligatorio();

        if (datosobligatorios == true) {
            $('#formregistro').submit();
        } else {
            if ($('#error').length == 0) {
                $('.alerta').append('<center><h4 id="error" style="color:red">POR FAVOR INGRESAR TODOS LOS DATOS</h4></center>');
            }
        }
    });
    function obligatorio() {
        var i = 0;
        $('.obligatorio').each(function (key, val) {
            if ($(this).val() == "") {
                $(this).addClass('estiloobligatorio');
                console.log($(this));
                i++;
            } else {
                $(this).removeClass('estiloobligatorio');
            }
        });
        if (i == 0) {
            return true;
        }
        else {
            return false;
        }
    }

    $('#forma').change(function () {
//        $('#envio').attr('action', '<?php echo base_url('index.php/login/filtros'); ?>');
        $('#envio').submit();
    });

    $('document').ready(function () {
        var ancho = $('body').width();

        if (ancho <= 1000) {
            $('.label').remove( );
            $('#firstModalinicio,#secondModal3,#myModal,#secondModal2,#secondModal').addClass('full');
//            $('#carrito').addClass('fa-2x');
        } else {
            $('#myModal,#firstModal,#secondModal').addClass('tiny');
            $('#secondModal2').addClass('small');
        }
    });

    $(".preload, .load").hide();

    $('.agregarproducto').click(function () {
        $(".preload, .load").show();
        var url = "<?php echo base_url('index.php'); ?>/login/agregar_carrito";

        $.post(url, $('#enviarproducto').serialize())
                .done(function (msg) {
                    $(".preload, .load").hide();
                })
                .fail(function (msg) {
                    $(".preload, .load").hide();
                });

    });
    function activar(id, nombre, produc, cantidad) {
        var imagen = $('#imaagen' + id).html();
        console.log(imagen);
        $('#imagenes').html(imagen);
        $('#nombre_producto').val(nombre);
        $('#id_producto').val(produc);
        $('#cantidad').val(cantidad);
        $('#opciones').val(imagen);
    }
    $('.number2').change(function () {
        var numbre = $(this).val();
        if (isNaN(numbre)) {
            alert('Valor Incorrecto');
            $(this).val('0');
        }
    })

//  -----------------------------------------------------------------------------
//                      AUTOCOMPLETAR  
//  -----------------------------------------------------------------------------  
//    $(function () {
//        function log(message) {
//            $("<div>").text(message).prependTo("#log");
//            $("#log").scrollTop(0);
//        }
//        $("#buscarproducto").autocomplete({
//            source: function (request, response) {
//                $.ajax({
//                    url: "<?php echo base_url('index.php/login/autocomplete') ?>",
//                    dataType: "jsonp",
//                    data: {
//                        q: request.term
//                    },
//                    success: function (data) {
//                        
//                        response(data);
//                        
//                    }
//                });
//            },
//            minLength: 3,
//            select: function (event, ui) {
//            
//                log(ui.item ?
//                        "Selected: " + ui.item.label :
//                        "Nothing selected, input was " + this.value);
//            },
//            open: function () {
//                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
//            },
//            close: function () {
//                $(this).removeClass("ui-cor ner-top").addClass("ui-corner-all");
//            }
//        });
//    });
//------------------------------------------------------------------------------

    $('.imagenes').click(function () {
        var id = $(this).attr('img_id');
        var form = "<form method='get' action='<?php echo base_url('index.php/login/producto'); ?>' id='producto'>";
        form += "<input type='hidden' value='" + id + "' name='img'>";
        form += "</form>";

        $('body').append(form);

        $('#producto').submit();
    });
    $('.categorias').click(function () {
        var id = $(this).attr('cat_id');
        var form = "<form method='post' action='<?php echo base_url('index.php/login/index'); ?>' id='producto'>";
        form += "<input type='hidden' value='" + id + "' name='categoria'>";
        form += "</form>";

        $('body').append(form);

        $('#producto').submit();
    });

    $(document).foundation();

    $('.numeracion').click(function () {
        var numeracion = $(this).text();
        $('#f1').append('<input type="hidden" value="' + numeracion + '" name="numeracion">');
        $('#f1').submit();
    });

</script>