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
        /*background-color: rgba(0, 0, 0, 0.3);*/
        /*background-image: url('<?php echo base_url('img/Estrella.png'); ?>');*/
        bottom: 367%;
        height: 355%;
        margin: 0;
        overflow: hidden;
        position: absolute;
        top: inherit;
        left: -28%;
        z-index: 1;
    }
    @media screen and (max-width: 700px) {
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
    }
    @media screen and (max-width: 700px) {
        .textomenu{
            width: 50%;
            left: 5%;
        }
        .botonytextomenu{
            top: 2%;
            position:absolute;
        }
        .botonmenu{
            width: 100px;
            left: 55%;
        }
        .menu{
            width: 100%;
            height: 70px;
            background-color: 008cba;
        }

    }

    @media screen and (min-width: 701px ) {
        .menu{
            width: 100%;
            height: 70px;
            background-color: 008cba;  
        }
        .botonytextomenu{
            top: 2%;
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
    }
</style>

<!--<nav class="top-bar" data-topbar>
    <ul class="title-area">

        <li class="name">
            <h1>
                <a href="#" data-reveal-id="firstModal">Iniciar sesion</a> 
            </h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
    </ul>
</nav>-->

<div class="menu">
    <form method="post" action='<?php echo base_url('index.php/login/index') ?>'>
        <div class="textomenu botonytextomenu">
            <input type="text" value="" placeholder="Buscar Producto" id='buscador' name="buscador" />
        </div>
        <div class="botonmenu botonytextomenu">  
            <input type="submit" class="button radius tiny success" value="Buscar">
        </div >

        <div style="position:absolute;left: 85%;">
            <a href="<?php echo base_url('index.php/carrito') ?>" style="color:black">CARRITO</a>
        </div>
    </form>    
</div>


<div class="large-12 columns"  >
    <ul class="example-orbit" data-orbit>
        <?php
        if (!empty($imagenesslide)) {
            foreach ($imagenesslide as $img) {
                ?>
                <li >
                    <img  onerror="this.onerror=null;this.src='http://placehold.it/1350x400&amp;text=[%20img%1350%20]';" src="<?php echo base_url('uploads') . "/" . $img->emp_id . "/" . $img->sli_nombre_archivo; ?>">
                </li>
                <?php
            }
        } else {
            ?>
            <li><img  onerror="this.onerror=null;this.src='http://placehold.it/1350x400&amp;text=[%20img%1350%20]';" src="http://placehold.it/1350x400&amp;text=[%20img%1350%20]"></li> 
        <?php } ?>
    </ul>
</div>
<!--<div class="row" >
    <div class="large-12 small-12 columns right" style="padding-top: 3%">
        <div class="row collapse">
            <div class="large-3 small-12 columns">
                <form >

                    <a href="#" class="postfix button expand split">Categorias 
                        <span data-dropdown="drop"></span>
                    </a><br> 
                    <ul id="drop" class="f-dropdown" data-dropdown-content> 
<?php foreach ($categorias as $cat) { ?>
                                        <li cat_id="<?php echo $cat->cat_id ?>" class="categorias"><a href="javascript:"><?php echo $cat->cat_categoria ?></a></li> 
<?php } ?>
                    </ul>
                </form>

            </div>
            <form method="post" action='<?php echo base_url('index.php/login/index') ?>'>
                <div class="large-7 small-12 columns">
                    <input type="text" value="<?php echo $buscador; ?>" placeholder="Buscar Producto" id='buscador' name="buscador" />
                </div>
                <div class="large-2 small-12 columns">
                    <input type="submit" class="postfix button expand filtro" value="Buscar">
                </div>
            </form>    
        </div>
    </div>
</div>   -->
<br>
<?php
$i = 4;
$h = 1;
$g = 0;
$contador = count($imagenes);
//echo $contador;die;
if ($contador > 0) {
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
                            <span id="imaagen<?php echo $g; ?>">
                                <img  onerror="this.onerror=null;this.src='http://placehold.it/250x250&text=NYGSOFT';" class="imagenes" img_id="<?php echo $img->imgEnc_id; ?>" style="cursor: pointer;width: 100%;height: 26%" src="<?php echo base_url('uploads' . "/" . $img->id_emp . "/" . $img->imgDet_nombre); ?>"/>
                            </span>

                            <div class="large-12 small-12 columns panel" >
                                <div class="large-8 small-8 columns">
                                    <h6 ><?php echo $img->imgEnc_nombre ?></h6>
                                </div>
                                <div class="large-4 small-4 columns">
                                    <i style="cursor:pointer" class="fa fa-cart-plus fa-2x" data-reveal-id="myModal"  onclick="activar('<?php echo $g; ?>', '<?php echo $img->imgEnc_nombre ?>', '<?php echo $img->imgEnc_id; ?>', '<?php echo $cantidad; ?>');" ></i>
                                    <?php if ($img->ingEnc_promocion == 2) { ?>
                                        <div class="categoryTitle box">
                                            <img width="100%" height="100%" src="<?php echo base_url('img/Estrella.png'); ?>" title='PROMOCION'>
                                        </div>
                                    <?php } ?>  
                                </div>
                            </div>
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
                            <td style="width: 20%" rowspan="2" >
                                <img  onerror="this.onerror=null;this.src='http://placehold.it/250x250&text=NYGSOFT';" class="imagenes" img_id="<?php echo $img->imgEnc_id; ?>" style="cursor: pointer;width: 100%;height: 26%" src="<?php echo base_url('uploads' . "/" . $img->id_emp . "/" . $img->imgDet_nombre); ?>"/>
                            </td>
                            <td style="width: 60%"><center><?php echo $img->imgEnc_nombre ?></center></td>
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
} else {
    ?>
    <div class="row">
        <div id="mainAlert1" data-alert class="alert-box secondary" tabindex="0" aria-live="assertive" role="dialogalert">
            <center><h4>NO SE ENCONTRARON PRODUCTOS</h4></center>
            <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
        </div>
    </div>
    <?php
}
?>
<div class="row">
    <center>
        <form method="post" id="f1">
            <ul class="pagination"> 
                <li class="arrow unavailable">
                    <!--<a href="">&laquo;</a></li>--> 
                    <?php
                    for ($i = 0; $i < $numeracion; $i++) {
                        if ($i + 1 == $numero)
                            $class = "class='current'";
                        else
                            $class = '';
                        ?>
                    <li <?php echo $class ?> class="numeracion"><a href="javascript:"><?php echo $i + 1; ?></a></li> 
                <?php } ?>
                <!--<li class="arrow"><a href="">&raquo;</a></li>--> 
            </ul>
        </form>    
    </center>
</div>
<div class="row"> 
    <form method="post" id="envio">
        <div class="large-2 columns">
            <label>Forma de ver los productos</label>
        </div>
        <div class="large-3 columns">
            <select name="forma" id="forma">
                <option value=''>-Seleccionar-</option>
                <option value='1'>Columnas</option>
                <option value='2'>Filas</option>
            </select>
        </div>
        <div class="large-2 columns">
            <button type="button" class="button radius tiny enviarorden">Enviar</button>
        </div>
        <div class="large-5 columns">
            &nbsp;
        </div>
    </form>    
</div>

<script>
    $('.enviarorden').click(function () {
        $('#envio').submit();
    });
</script>    

<footer class="row">
    <div class="large-12 columns">
        <hr>
        <div class="row">
            <div class="large-12 columns">
                <p>© Copyright NYGSOFT.COM 2015-2020</p>
            </div>
        </div>
    </div>
</footer>

<!--MODAL-->
<!-- Reveal Modals begin --> 
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

    $('document').ready(function () {
        var ancho = $('body').width();
        if (ancho < 700) {
            $('#firstModal').addClass('full');
            $('#myModal').addClass('full');
//            $('#carrito').addClass('fa-2x');
        } else {
            $('#myModal').addClass('tiny');
//            $('#carrito').addClass('fa-4x');
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
        var form = "<form method='post' action='<?php echo base_url('index.php/login/producto'); ?>' id='producto'>";
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