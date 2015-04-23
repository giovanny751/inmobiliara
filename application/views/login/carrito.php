
<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/font-awesome.css" rel="stylesheet" type="text/css') ?>" />

<style>
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
    .imagenes{
        width: 100% !important;
        height: 100% !important;
    }
</style>

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

<div class="row">
    <div class="large-3 columns">
            <center>
                <a href="#">
                    <img src="<?php echo base_url('img/blanco.jpg') ?>" width="300px" height="240px"/>
                </a>  
            </center> 
    </div>
    <div class="large-9 columns">
        <div class="panel">
            <center><h1>COTIZACIÓN DE PRODUCTOS</h1></center>
        </div>
    </div>
</div>

<div class="row">

    <!--<div class="large-9 small-12 columns">-->
    <?php // echo "<pre>";var_dump($this->cart->contents());die; ?>
    <!--<div class="row">-->

<!--<div class="large-2 columns small-3"><img src="http://placehold.it/80x80&text=[img]"/></div>-->
    <div class="large-12 small-12 columns">
        <div class="row">

            <ul class="button-group">
                <li><a href="<?php base_url('index.php') ?>" class="button secondary">Volver al listado</a></li>
                <li><a href="#" class="button info">Información</a></li>
                <li><a href="#" class="button">Siguiente Paso</a></li>
            </ul>
        </div>
        <div class="row">
            <article class="contenido">

                <hr>
                <form action="<?php echo base_url(); ?>index.php/login/actualizar_carrito" method="post">
                    <table class="carrito" border="1" style="width: 100%">
                        <tr>
                            <th width="20%"><center>Imagen</center></th>
                        <th width="60%"><center>Nombre del producto</center></th>
                        <th width="10%"><center>Cantidad</center></th>
                        <th width="10%"><center>Precio</center></th>
                        </tr>
                        <?php
                        foreach ($this->cart->contents() as $item):
                            ?>
                            <input type="hidden" name="rowid[]" value="<?php echo $item['rowid']; ?>">
                            <tr>
                                <td>
                                    <?php
                                    if ($item['options']['0'] != 'ya')
                                        echo $item['options']['0'];
                                    else
                                        echo "";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $item['name'];
                                    if ($this->cart->has_options($item['rowid']) === TRUE):
                                        ?>
                                    <?php endif; ?>
                                </td>
                                <!--<td>Bs.F. <?php echo number_format($item['price'], 2, ',', '.'); ?></td>-->
                                <td>
                                    <input style="text-align: center" type="text" name="qty[]" value="<?php echo $item['qty']; ?>" maxlength="3" size="5">
                                </td>
                                <td>
                                    
                                </td> 
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </table>
                </form>
            </article>
        </div>
        <hr/>
        <div class="row">

            <ul class="button-group">
                <li><a href="<?php base_url('index.php/login/principal') ?>" class="button secondary">Volver al listado</a></li>
                <li><a href="#" class="button info">Información</a></li>
                <li><a href="#" class="button">Siguiente Paso</a></li>
            </ul>
        </div>    
    </div>
</div> 
<script>

    $('document').ready(function () {
        var ancho = $('body').width();
        if (ancho < 700) {
            $('#firstModal').addClass('full');
        }
    });


    $(document).foundation();
</script>
